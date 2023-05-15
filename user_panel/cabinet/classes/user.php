<?php
include("php_crypto.php");
include ("master_account.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";
//
//$servername = "localhost";
//$username = "trd_db_user";
//$password = "trd_db_pass01";
//$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


class User
{

    public $user_email;
    public $id;
    public $telegram;
    public $nickname;
    public $kucoinConnections;
    public $kucoinMasterAccount;

    public function __construct($_user_email, $_user_id = null)
    {
        global $conn;
        $this->user_email = $_user_email;
//        $this->id = $_user_id;
        $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'");
        $fetchResult = $result->fetch_all(MYSQLI_ASSOC)[0];
        $this->id = $fetchResult['id'];
        $this->telegram = $fetchResult['telegram'];
        $this->nickname = $fetchResult['nickname'];
        $this->LoadKucoinMasterAccount();


    }

    public function isVerified()
    {

        if (!$this->exist())
            return false;

        global $conn;
        $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'");
        $row = $result->fetch_assoc();
        $isVerified = $row['verified'];
        if ($isVerified == 1)
            return true;
        else return false;
    }

    public function isConnected()
    {

        if (!$this->exist())
            return false;

        global $conn;
        $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'");
        $row = $result->fetch_assoc();
        $isConnected = $row['connected'];
        if ($isConnected == 1)
            return true;
        else return false;
    }

    public function SetConnectionStatus($status)
    {
        global $conn;
        $conn->query("UPDATE `users` SET `connected` = '" . $status . "' WHERE `email` = '" . $this->user_email . "'");
    }

    public function exist()
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'");
        if ($result->num_rows == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function GetUserRecord()
    {
        global $conn;
        $output = "";

        $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'");
        $row = $result->fetch_assoc();

        foreach ($row as $key => $value) {
            $output .= " | " . $key . " = " . $value . " | ";
        }
        return $output;
    }

    public function GetUserState()
    {
        if ($this->exist()) {
            $output = "";
            $output .= $this->GetUserRecord();
            $output .= " --- State -->";
            $output .= "[verified:" . ($this->isVerified() ? 'verified' : 'not verified') .
                ', connected:' . ($this->isConnected() ? 'connected' : 'not connected') . "]";
            return $output;
        } else {
            return "user does not exist by email:" . $this->user_email;
        }
    }

    public function SaveApiKey($apiKey)
    {
        global $conn;

        $encryptedApiKey = EncryptText($apiKey);

        //$result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` = $this->id");
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` =" . $this->id);


        if ($result->num_rows == 0) {
            $conn->query("INSERT INTO `accounts` (`id`, `apikey`, `user_id`, `account_type_id`) VALUES (NULL, '" . $encryptedApiKey . "', '" . $this->id . "', '" . 2 . "');");
            return json_encode(array("status" => "success",
                "msg" => "new record created"));
        } else {
            $conn->query("UPDATE `accounts` SET `apikey` = '" . $encryptedApiKey . "' WHERE `user_id`= '" . $this->id . "'");
            return json_encode(array("status" => "success",
                "msg" => "record updated"));
        }
    }

    public function SaveSecretKey($secretKey)
    {
        global $conn;

        $encryptedSecretKey = EncryptText($secretKey);

        // $result = $conn->query("SELECT * FROM `api_keys` WHERE `user_email` = '".$this->user_email."'");
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` =" . $this->id);

        if ($result->num_rows == 0) {
            $conn->query("INSERT INTO `accounts` (`id`, `secretkey`, `user_id`, `account_type_id`) VALUES (NULL, '" . $encryptedSecretKey . "', '" . $this->id . "', '" . 2 . "');");
            return json_encode(array("status" => "success",
                "msg" => "new key created"));
        } else {
            $conn->query("UPDATE `accounts` SET `secretkey` = '" . $encryptedSecretKey . "' WHERE `user_id`= '" . $this->id . "'");
            return json_encode(array("status" => "success",
                "msg" => "record updated"));
        }
    }

    public function SavePassphrase($passphrase)
    {
        global $conn;

        $encryptedpassphrase = EncryptText($passphrase);

        // $result = $conn->query("SELECT * FROM `api_keys` WHERE `user_email` = '".$this->user_email."'");
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` =" . $this->id);

        if ($result->num_rows == 0) {
            $conn->query("INSERT INTO `accounts` (`id`, `passphrase`, `user_id`, `account_type_id`) VALUES (NULL, '" . $encryptedpassphrase . "', '" . $this->id . "', '" . 2 . "');");
            return json_encode(array("status" => "success",
                "msg" => "new key created"));
        } else {
            $conn->query("UPDATE `accounts` SET `passphrase` = '" . $encryptedpassphrase . "' WHERE `user_id`= '" . $this->id . "'");
            return json_encode(array("status" => "success",
                "msg" => "record updated"));
        }
    }


    public function GetApiKey()
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` = '" . $this->id . "'");

        if ($result->num_rows != 0) {
            return DecryptText($result->fetch_assoc()['apikey']);
        } else {
            return json_encode(array("status" => "failed", "msg" => "no such user in api key table"));
        }
    }


    public function GetSecretKey()
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` = '" . $this->id . "'");
        if ($result->num_rows != 0) {
            return DecryptText($result->fetch_assoc()['secretkey']);
        } else {
            return json_encode(array("status" => "failed", "msg" => "no such user in api key table"));
        }
    }

    public function GetPassphrase()
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` = '" . $this->id . "'");
        if ($result->num_rows != 0) {
            return DecryptText($result->fetch_assoc()['passphrase']);
        } else {
            return json_encode(array("status" => "failed", "msg" => "no such user in api key table"));
        }
    }

    public function SetNewPass($newPass)
    {
        global $conn;
        $conn->query("UPDATE `users` SET `pass` = '" . $newPass . "' WHERE `email` = '" . $this->user_email . "'");
    }

    public function SetNewNickname($newNickname)
    {
        global $conn;
        $conn->query("UPDATE `users` SET `nickname` = '" . $newNickname . "' WHERE `email` = '" . $this->user_email . "'");
    }

    public function IsConnectedToMaster($exchangePoint, $masterId)
    {
        global $conn;

        $connection_table = "";

        //
        if ($exchangePoint == 'kucoin') {
            $connection_table = "kucoin_connections";
        }

        if ($exchangePoint == 'binance') {
            $connection_table = "binance_connections";
        }

        if ($exchangePoint == 'FTX') {
            $connection_table = "ftx_connections";
        }

        $query = "SELECT * FROM `" . $connection_table . "` WHERE master_user_id = " . $masterId . " AND follower_user_id = " . $this->id . ";";
        $result = $conn->query($query);

        if ($result->num_rows != 0) {
            return true;
        } else {
            return false;
        }

    }

    public function GetConnections($exchangePoint){

        global $conn;

        if ($exchangePoint == 'kucoin') {
            $table = 'kucoin_connections';
            $this->kucoinConnections = $this->QueryAllConnections($table);
            return $this->kucoinConnections;
        }

        //TODO for all points

    }

    //Firstly Get all connections
    public function GetConnectionByMasterID($exchangePoint, $masterID){
        if($exchangePoint == 'kucoin'){
            foreach ($this->kucoinConnections as $kucoinConnection){
                if($kucoinConnection['master_user_id'] == $masterID){
                    return $kucoinConnection;
                }
            }
        }

        return null;
    }

    private function QueryAllConnections($tableName){
        global $conn;
        $result = $conn->query("SELECT * FROM ". $tableName ." 
                                        inner join users on users.id = kucoin_connections.follower_user_id
                                        WHERE users.id = ". $this->id .";");

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function GetAccountID($accountType){
        global $conn;

        if($accountType == 'kucoin'){
            $query = "SELECT * from accounts
                        where user_id = ". $this->id . " and account_type_id = 2";

            $result = $conn->query($query);

            if($result->num_rows != 0){
                return $result->fetch_all(MYSQLI_ASSOC)[0]['id'];
            } else {
                return null;
            }
        }
    }


    public function LoadKucoinMasterAccount(){
        global $conn;
        $query = "Select * from users
                    inner join (SELECT id as master_account_id, user_id as master_user_id, need_balance,  roi, account_id from master_accounts) 
                            as master_accounts_table on master_accounts_table.master_user_id = users.id 
                    inner join (SELECT id as account_id, account_type_id from accounts) as account_table on account_table.account_id = master_accounts_table.account_id
                    
                        where id = ". $this->id ." and account_table.account_type_id = 2";

        $result = $conn->query($query);

        if($result->num_rows != 0){
            $kucoinAccountResult = $result->fetch_all(MYSQLI_ASSOC)[0];
            $this->kucoinMasterAccount = new MasterAccount('kucoin',
                                                                $kucoinAccountResult['master_account_id'],
                                                                $kucoinAccountResult['need_balance'],
                                                                $kucoinAccountResult['roi']);

        }

        return $this->kucoinMasterAccount;
    }

    public function DropMasterKucoinAccount(){
        global $conn;

        if($this->LoadKucoinMasterAccount() != null){
            //delete all kucoin connections where master_user_id == user id

            $query = "DELETE FROM `kucoin_connections` WHERE master_user_id = ". $this->id . ";";
            $removeConnectionsResult = $conn->query($query);

            $deleteMasterAccountQuery = "DELETE FROM `master_accounts` WHERE `master_accounts`.`id` = " . $this->kucoinMasterAccount->id .";";
            $removeMasterAccountResult = $conn->query($deleteMasterAccountQuery);

            return array("deleteMasterAccountQuery" => $deleteMasterAccountQuery, "removeConnectionsResult" => $removeConnectionsResult, "removeMasterAccountResult" => $removeMasterAccountResult);

        } else {
            return null;
        }
    }
}
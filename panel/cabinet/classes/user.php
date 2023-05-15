<?php
use NMSPC_trdMonetization\UserDebt;

include("php_crypto.php");
include ("master_account.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/ConnectionIntervalModel.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/UserConnectionIntervals.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/UserTransactions.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/Debtor/UserDebt.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/UserAirdropCalculator.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/UserBalance.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/AirDropPointsBucket.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/UserSocialHandler.php");

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


    /**
     * @var UserDebt $dept
     * @var MasterAccount $kucoinMasterAccount
     */

    public $user_email;
    public $id;
    public $authentication_verified;
    public $two_auth_enable;
    public $telegram;
    public $nickname;
    public $kucoinConnections;
    public $kucoinMasterAccount;

    public $debt;
    public $transactions;
    public $connectionIntervals;
    public $airdropCalculator;
    public $balance;

    public $clientIp;
    public $lastSeenDebBlog;

    public $disabled;
    public $socials;


    public function __construct($_user_email, $_user_id = null)
    {
        global $conn;
        if($_user_email != null){
            $this->user_email = $_user_email;
            $query = "SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'";
            $result = $conn->query($query);
            if($result == false){
                var_dump($result);
                var_dump($query);
            }
            $fetchResult = $result->fetch_all(MYSQLI_ASSOC)[0];
            $this->id = $fetchResult['id'];
        } else if($_user_id != null){
            $this->id = $_user_id;
            $result = $conn->query("SELECT * FROM `users` WHERE `id` = '" . $this->id . "'");
            $fetchResult = $result->fetch_all(MYSQLI_ASSOC)[0];
            $this->user_email = $fetchResult['email'];
        }

        $this->authentication_verified = $fetchResult['authentication_verified'];
        $this->two_auth_enable = $fetchResult['two_auth_enable'];
        $this->user_email = $fetchResult['email'];
        $this->telegram = $fetchResult['telegram'];
        $this->nickname = $fetchResult['nickname'];
        $this->clientIp = $fetchResult['client_ip'];
        $this->lastSeenDebBlog = $fetchResult['last_seen_dev_blog_date'];
        $this->LoadKucoinMasterAccount();

        $this->debt = new UserDebt($this->id);
        $this->transactions = new UserTransactions($this->id);
        $this->connectionIntervals = new UserConnectionIntervals($this->id);
        $this->airdropCalculator = new UserAirdropCalculator($this);
        $this->balance = new UserBalance($this);
        $this->socials = new UserSocialHandler($this);

        $this->disabled = $fetchResult['disabled'];

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

        return $this->ApiKeysAreConnected();

//        if (!$this->exist())
//            return false;
//
//        global $conn;
//        $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $this->user_email . "'");
//        $row = $result->fetch_assoc();
//        $isConnected = $row['connected'];
//        if ($isConnected == 1)
//            return true;
//        else return false;
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


    //---- Kucoin Account --------------
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

    public function SaveKucoinUSDTTradeAccountID($accountId){
        //This function saves the accountID for the kucoin account to prevent the multiapikey connection in the AirDrop

        global $conn;

        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` =" . $this->id);

        if ($result->num_rows == 0) {
            return json_encode(array("status" => "failed",
                "msg" => "user_not_exist"));
        } else {
            $conn->query("UPDATE `accounts` SET `kucoin_usdt_trade_account_id` = '". $accountId ."' WHERE `user_id` = ". $this->id .";");
            return json_encode(array("status" => "success",
                "msg" => "record updated"));
        }
    }


    public function ApiKeysAreConnected(){
        global $conn;
        $result = $conn->query("SELECT * FROM `accounts` WHERE `user_id` = '" . $this->id . "'");

        if ($result->num_rows != 0) {
            return true;
        } else {
            return false;
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

    //----------------------------

    public function SetNewPass($newPass)
    {
        global $conn;
        $newPassHash = password_hash($newPass, CRYPT_BLOWFISH);
        $conn->query("UPDATE `users` SET `pass_hash` = '" . $newPassHash . "' WHERE `email` = '" . $this->user_email . "'");
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


    public function IsConnectedToOneOfTheMaster($exchangePoint){
        global $conn;
        if ($exchangePoint == 'kucoin') {
         $connection_table = "kucoin_connections";
        }

        if ($exchangePoint == 'binance') {
         $connection_table = "binance_connections";
        }

        if ($exchangePoint == 'FTX') {
            $connection_table = "ftx_connections";
        }

        $query = "SELECT * FROM `" . $connection_table . "` WHERE follower_user_id = " . $this->id . ";";
        $result = $conn->query($query);

        if ($result->num_rows != 0) {
            return true;
        } else {
            return false;
        }        
    }

    public function IsKucoinMaster(){
        if($this->kucoinMasterAccount != null){
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
                    inner join (SELECT id as master_account_id, user_id as master_user_id, need_balance,  roi, account_id, master_account_date_creation from master_accounts) 
                            as master_accounts_table on master_accounts_table.master_user_id = users.id 
                    inner join (SELECT id as account_id, account_type_id from accounts) as account_table on account_table.account_id = master_accounts_table.account_id
                    
                        where id = ". $this->id ." and account_table.account_type_id = 2";

        $result = $conn->query($query);

        if($result->num_rows != 0){
            $kucoinAccountResult = $result->fetch_all(MYSQLI_ASSOC)[0];
            $this->kucoinMasterAccount = new MasterAccount('kucoin',
                                                                $kucoinAccountResult['master_account_id'],
                                                                $kucoinAccountResult['need_balance'],
                                                                $kucoinAccountResult['roi'],
                                                                $kucoinAccountResult['master_account_date_creation'],
                                                                );
            $this->kucoinMasterAccount->user = $this;

        }

        return $this->kucoinMasterAccount;
    }

    public function DropMasterKucoinAccount(){
        global $conn;

        if($this->LoadKucoinMasterAccount() != null){

            //accrue AirDrop Points
            $airDropBucketHandler = new AirDropPointsBucket();
            $airDropBucketHandler->AddBecomeMasterPointsForUser($this->id, $this->kucoinMasterAccount->GetPositiveAirDropDays());

            //Send email to subscribers
            SendUnsubscribeEmailsToFollowers($this->nickname, $this->GetAllConnectedUsersAsArray());
            //Close all intervals by masterID;
            ConnectionIntervalModel::CloseAllConnectionIntervalsByMasterId($this->id);
            //Delete all connections
            $query = "DELETE FROM `kucoin_connections` WHERE master_user_id = ". $this->id . ";";
            $removeConnectionsResult = $conn->query($query);
            //Delete Master Order history
            $deleteOrderHistoryResult = $this->DropMasterOrderHistory();
            //Delete Balance History
            $this->DropBalanceHistory();
            $deleteMasterAccountQuery = "DELETE FROM `master_accounts` WHERE `master_accounts`.`id` = " . $this->kucoinMasterAccount->id .";";
            $removeMasterAccountResult = $conn->query($deleteMasterAccountQuery);
            return array("deleteMasterAccountQuery" => $deleteMasterAccountQuery, "removeConnectionsResult" => $removeConnectionsResult, "removeMasterAccountResult" => $removeMasterAccountResult, 'deleteOrderHistoryResult' => $deleteOrderHistoryResult);

        } else {
            return null;
        }
    }


    public function DropMasterOrderHistory(){
        $data = array("delete_master_order_history"=>array('master_email' => $this->user_email)); //TODO rename the parameters
        $data_string = json_encode($data);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://cunion.io:2083');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $result2 = curl_exec($ch);
        return json_decode($result2)->result;
    }


    public function GetAllConnectedUsersAsArray(){
        global $conn;
        //GetAllConnectedFollowers
        $query = "SELECT email FROM `kucoin_connections` 
                        inner join users on users.id = kucoin_connections.follower_user_id 
                        where master_user_id = " .$this->id;

        $resultArray = [];
        $followerArray = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

        foreach ($followerArray as $follower){
            $resultArray[] = $follower['email'
            ];
        }

        return $resultArray;

    }

    public function Get_user_connection_master_kucoin(){
        global $conn;
        //SELECT * FROM `kucoin_connections`
        // INNER JOIN users on users.id = kucoin_connections.master_user_id
        // where kucoin_connections.follower_user_id = 133


       // var_dump("id user",$this->id);

        $result = $conn->query(" SELECT * FROM `kucoin_connections`
         INNER JOIN users on users.id = kucoin_connections.master_user_id
         where kucoin_connections.follower_user_id ='" . $this->id . "'");
        if ($result->num_rows != 0) {
            $array= ($result->fetch_all(MYSQLI_ASSOC));
            return json_encode($array);
        } else {
            return json_encode(array("status" => "failed", "msg" => "no such "));
        }
    }


    public function Delete_keys_kucoin(){
        global $conn;

        $this->DropBalanceHistory();

        $query = "UPDATE users set users.connected=NULL where users.id = ". $this->id . ";";
        $user_connected = $conn->query($query);

        $this->DropMasterKucoinAccount();

        ConnectionIntervalModel::CloseAllConnectionIntervalsByFollowerId($this->id);

        $delete_kucoin_connections = "DELETE kucoin_connections,accounts from kucoin_connections RIGHT JOIN accounts on accounts.user_id=kucoin_connections.follower_user_id  WHERE accounts.user_id = ". $this->id .";";
        $removeMasterAccountResult = $conn->query($delete_kucoin_connections);
        return array("code"=>3,"removeMasterAccountResult" => $removeMasterAccountResult);
    }


    function IsAdmin($status = '') {

        if($status == 'super'){
            $admins = [
//                'wydebinance@gmail.com',
                'h77ps@protonmail.com',
                'Wyde90@gmail.com',
            ];
        } else {
            $admins = [
                'evgeniymarketplace@gmail.com',
                'dindik@tut.by',
                'Wyde90@gmail.com',
                'h77ps@protonmail.com',
            ];
        }

        if(in_array($this->user_email, $admins)){
            return true;
        } else {
            return false;
        }
    }

    function DropBalanceHistory(){
        global $conn;

        $query = "DELETE FROM `kucoin_balances` WHERE `kucoin_balances`.`user_id` = ". $this->id;
        $conn->query($query);
    }

    function IsDebtor(){
        if($this->user_email == 'wydebinance@gmail.com' || $this->user_email == 'Wyde90@gmail.com'){
            return true;
        }

        //TODO
        $DAYS_6 = 6 * 24 * 60 * 60;
        $TIME_CURRENT = time();
        $firstConnectionInterval = $this->connectionIntervals->GetFirstConnectionInterval();
        $lastTransaction = $this->transactions->GetLastTransaction();

        $result = false;

        if($this->debt->GetTotalDebt() > 1){
            if($lastTransaction != null){
                if(strtotime($lastTransaction['date']) < $TIME_CURRENT - $DAYS_6 ) {
//                    var_dump("Trns debt");
                    $result = true;
                }
            } else {
                if(strtotime($firstConnectionInterval->connectedAt) < $TIME_CURRENT - $DAYS_6){
//                    var_dump("Conn Debt");
                    $result = true;
                }
            }
        }

        return $result;
    }


    public function Enable()
    {
        global $conn;

        $this->disabled = false;

        $query = "UPDATE `users` SET `disabled` = '0' WHERE `users`.`id` = " . $this->id . ";";
        return $conn->query($query);
    }

    public function Disable()
    {
        $this->disabled = true;
        global $conn;
        $query = "UPDATE `users` SET `disabled` = '1' WHERE `users`.`id` = " . $this->id . ";";
        return $conn->query($query);
    }

    public function DisconnectFromMaster(){
        global  $conn;

        if($this->IsConnectedToOneOfTheMaster('kucoin')){

            //GetExisting connection
            $query = "SELECT * FROM `kucoin_connections` WHERE follower_user_id = " . $this->id;
            $result = $conn->query($query);

            if($result->num_rows != 0){
                $connectionRecord = $result->fetch_all(MYSQLI_ASSOC)[0];

                //Get master Id from existing connection
                $masterId = $connectionRecord['master_user_id'];


                //Remove all kucoin FLW_MST connections
                $query = "DELETE FROM `kucoin_connections` WHERE `kucoin_connections`.`follower_user_id` = " . $this->id;
                $removeResult = $conn->query($query);

                //Close connection interval by followerID master Id;
                $closingIntervalResult = ConnectionIntervalModel::CloseConnectionInterval($this->id, $masterId);

                return array('result' => 'success',
                    'remove_result' => $removeResult,
                    'closing_interval_result' => $closingIntervalResult);

            } else {
                return array('result' => 'failed', 'msg'=>'user_has_no_connection_records_in_db');
            }

        } else {
            return array('result' => 'failed', 'msg'=>'user_is_not_connected_to_any_of_master');
        }
    }

    public function GetReferralUserList(){
        global $conn;
        $query = 'SELECT * FROM users where ref_user_id = ' . $this->id;
        $result = $conn->query($query);
        $userList = [];
        if($result->num_rows !=0){
            $userRecords = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($userRecords as $userRecord){
                $userList [] = new User($userRecord['email']);
            }
        }

        return $userList;
    }

    public function CalculateReferralEarning(){
        $referralCoefficient = 0.05;

        $totalEarnings = 0;
        $referralUserList = $this->GetReferralUserList();
        foreach ($referralUserList as $refUser){
            /**
             * @var User $refUser
             */
            $totalEarnings = $totalEarnings + $refUser->transactions->GetTotalCompletedTransactionsSum();
        }

        return $totalEarnings * 0.05;
    }

    public function SetLastSeenDevBlog(){
        global $conn;
        $query = "UPDATE `users` SET `last_seen_dev_blog_date` = CURRENT_TIMESTAMP WHERE `users`.`id` = ". $this->id .";";
        $result = $conn->query($query);
        return $result;
    }


}



function SendUnsubscribeEmailsToFollowers($masterNickName, array $followersEmail){
    $data = array("master_nickname" => $masterNickName, 'followers_by_master' => $followersEmail, 'action'=>"unsubscribe_mail"); //TODO rename the parameters
    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://cunion.io:2053/spam');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));

    $result = curl_exec($ch);
}
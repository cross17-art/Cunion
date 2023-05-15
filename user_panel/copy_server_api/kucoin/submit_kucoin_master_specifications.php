<?php
session_start();
include("../../cabinet/classes/user.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database =  "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_email'])) {

    $json = file_get_contents('php://input');
    $obj = json_decode($json);
    $user = new User($_SESSION['user_email']);

    $user_id = $user->id;
    $usingDeposit = $obj->using_deposit;
    $minDeposit = $obj->req_deposit;
    $telegram = $obj->telegram;
    $tradeType = $obj->trade_type;
    $averageTrades = $obj->average_trades;
    $baseAsset = $obj->base_asset;
    $roi = 0;


    $query = "SELECT * from master_accounts
                inner join (SELECT account_type_id, user_id as account_user_id from accounts) as account_table
                on account_table.account_user_id = master_accounts.user_id
                where account_type_id = 2 and user_id = ". $user->id .";";

    $result = $conn->query($query);

    //delete existing account
    if($result->num_rows != 0){
        //master account already exist
        $masterRecordID = $result->fetch_all(MYSQLI_ASSOC)[0]['id'];
        $query = "DELETE FROM `master_accounts` WHERE `master_accounts`.`id` = ". $masterRecordID .";";
        $conn->query($query);
    }

    //add as master new account
    $exchangeAccountID = $user->GetAccountID('kucoin');
    $insertAccountQuery = "INSERT INTO `master_accounts` (`id`, `user_id`, `account_id`, `need_balance`,  `roi`, `using_deposit`, `trade_type`, `base_asset`) 
                    VALUES (NULL, '". $user->id ."', '". $exchangeAccountID ."', '". $minDeposit ."', '". $roi ."', '". $usingDeposit ."', '". $tradeType ."', '". $baseAsset ."');";
    $insertMasterAccountResult = $conn->query($insertAccountQuery);

    $query = "UPDATE `users` SET `telegram` = '". $telegram ."' WHERE `users`.`id` = ". $user_id .";";
    $insertTelegramResult = $conn->query($query);
    echo json_encode(array("status" => 'success', 'body' => $obj, 'insertAccountQuery' => $insertAccountQuery, 'insertMasterAccountResult' => $insertMasterAccountResult, '$insertTelegramResult' => $insertTelegramResult));

    $user->LoadKucoinMasterAccount();


} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}




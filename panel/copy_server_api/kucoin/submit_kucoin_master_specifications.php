<?php
session_start();
include("../../cabinet/classes/user.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php");

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

    $user_id = $conn->real_escape_string($user->id);
    $usingDeposit = $conn->real_escape_string($obj->using_deposit);
    $minDeposit = $conn->real_escape_string($obj->req_deposit);
    $telegram = $conn->real_escape_string($obj->telegram);
    $tradeType = $conn->real_escape_string($obj->trade_type);
    $averageTrades = $conn->real_escape_string($obj->average_trades);
    $baseAsset = $conn->real_escape_string($obj->base_asset);
    $tradeDirection = $conn->real_escape_string($obj->trade_direction);
    $roi = 0;
    $shortDsr = $conn->real_escape_string($obj->dsr);



    $stringValidator = new StringValidator();


    if($stringValidator->ThreadExistInArray([$user_id, $usingDeposit, $minDeposit, $telegram, $tradeType, $averageTrades, $baseAsset, $tradeDirection, $shortDsr])){
        echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist', 'short_dsr' => $shortDsr, 'thread_strings'=>$stringValidator->threadStrings));
        die;
    }

    if($tradeDirection == 'mixed'){
        $tradeDirection = "S/L";
    }


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
    $insertAccountQuery = "INSERT INTO `master_accounts` (`id`, `user_id`, `account_id`, `need_balance`,  `roi`, `using_deposit`, `trade_type`, `base_asset`, `trade_direction`, `short_description`) 
                    VALUES (NULL, '". $user->id ."', '". $exchangeAccountID ."', '". $minDeposit ."', '". $roi ."', '". $usingDeposit ."', '". $tradeType ."', '". $baseAsset ."', '". $tradeDirection ."', '". $shortDsr ."');";
    $insertMasterAccountResult = $conn->query($insertAccountQuery);

    $query = "UPDATE `users` SET `telegram` = '". $telegram ."' WHERE `users`.`id` = ". $user_id .";";
    $insertTelegramResult = $conn->query($query);
    echo json_encode(array("status" => 'success', 'body' => $obj, 'insertAccountQuery' => $insertAccountQuery, 'insertMasterAccountResult' => $insertMasterAccountResult, '$insertTelegramResult' => $insertTelegramResult));

    $user->LoadKucoinMasterAccount();
    $user->DropMasterOrderHistory();

} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}




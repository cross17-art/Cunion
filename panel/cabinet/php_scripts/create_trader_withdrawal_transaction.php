<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TraderTransactionHandler.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$json = file_get_contents('php://input');
//$post = json_decode($json);
$traderWithdrawalData = json_decode($json);

$string_validator = new StringValidator();

$amount = $traderWithdrawalData->trader_withdrawal_amount;
$address = $traderWithdrawalData->trader_withdrawal_address;

if($string_validator->ThreadExistInArray([$amount, $address])){
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
    die;
}


if (!isset($_SESSION['logged'])) {
    echo json_encode(array('status' => 'failed', 'msg' => 'session not exist'));
} else{
    $user = new User($_SESSION['user_email']);
    $traderTransactionHandler = new TraderTransactionHandler();
    $result = $traderTransactionHandler->CreateNewTraderTransaction($user->id,
        $traderWithdrawalData->trader_withdrawal_amount,
        $traderWithdrawalData->trader_withdrawal_address);

    echo json_encode(array(
        'status'=>'success',
        'amount' => $traderWithdrawalData->trader_withdrawal_amount,
        'address' => $traderWithdrawalData->trader_withdrawal_address,
        'user_id'=> $user->id,
        'transaction_handler_result' => $result));
}



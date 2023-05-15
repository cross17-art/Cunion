<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/ReferralTransactionHandler.php");
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
$referralWithdrawalData = json_decode($json);

$string_validator = new StringValidator();
if($string_validator->ThreadExistInArray([$referralWithdrawalData->ref_withdrawal_amount, $referralWithdrawalData->ref_withdrawal_address])){
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
    die;
}

if (!isset($_SESSION['logged'])) {
    echo json_encode(array('status' => 'failed', 'msg' => 'session not exist'));
} else{
    $user = new User($_SESSION['user_email']);
    $referralTransactionHandler = new ReferralTransactionHandler();
    $result = $referralTransactionHandler->CreateNewReferralTransaction($user->id,
        $referralWithdrawalData->ref_withdrawal_amount,
        $referralWithdrawalData->ref_withdrawal_address);

    echo json_encode(array(
        'status'=>'success',
        'amount' => $referralWithdrawalData->ref_withdrawal_amount,
        'address' => $referralWithdrawalData->ref_withdrawal_address,
        'user_id'=> $user->id,
        'transaction_handler_result' => $result));
}



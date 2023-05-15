<?php

session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
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
$transactionData = json_decode($json);

$string_validator = new StringValidator();

if($string_validator->ThreadExistInArray([$transactionData->amount,
                                            $transactionData->address,
                                            $transactionData->txn_id,
                                            $transactionData->status_url])){
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
    die;
}



if (!isset($_SESSION['logged'])) {
    echo json_encode(array('status' => 'failed', 'msg' => 'session not exist'));
} else{
    $user = new User($_SESSION['user_email']);
    $query = "INSERT INTO `coinpayments_transactions` (`id`, `date`, `user_id`, `amount`, `address`, `txn_id`, `status_url`, `completed`) 
                VALUES (NULL, current_timestamp(), '". $user->id . "', '" . $transactionData->amount . "', '" . $transactionData->address . "', '" . $transactionData->txn_id . "', '" .  $transactionData->status_url ."', '0');";

    $result = $conn->query($query);
    if($result == false){
        echo json_encode(array('status'=>'failed', 'msg'=>'failed sql request', 'sql_request' => $query));
    } else {
        echo json_encode(array('status' => 'success', 'query' => $query, 'result' => $result));
    }
}

?>
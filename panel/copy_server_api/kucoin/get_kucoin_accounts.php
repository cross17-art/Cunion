<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/KeyKeeper.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";

$stringValidator = new StringValidator();

$key = $_GET['key'];
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


$stringValidator = new StringValidator();
$keyKeeper = new KeyKeeper();

$key = $_GET['cross-server-key'];

if($stringValidator->ThreadExist($key)){
    echo json_encode(array('status' => 'failed', 'msg'=>'thread_found'));
    die();
}

if($key != $keyKeeper->GetAccountEndpointKey()){
    echo json_encode(array('status' => 'failed', 'msg'=>'incorrect_key'));
    SpamServerSender::SendActionToSpamServer('send_verification_email',
        array('email' => 'wyde90@gmail.com', 'msg' => "non auth get_kucoin_accounts"));
    die();
}

//$query = "SELECT * FROM `users` INNER JOIN accounts on accounts.user_id = users.id INNER JOIN account_types on account_types.id = accounts.account_type_id WHERE account_types.exhange = 'Kucoin'";
$query = "SELECT email, user_id, apikey, secretkey, passphrase  FROM `users` INNER JOIN accounts on accounts.user_id = users.id INNER JOIN account_types on account_types.id = accounts.account_type_id WHERE account_types.exhange = 'Kucoin'";

$result = $conn->query($query);
$accounts = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(array('status' => "success", 'accounts' => $accounts));



<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/KeyKeeper.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";

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
    die();
}


//
//SELECT * from kucoin_connections
//
//$query = "SELECT master_email from kucoin_connections
//            INNER JOIN
//                (SELECT users.email as follower_email, id as follower_id from users) as follower_table
//                    on follower_table.follower_id = kucoin_connections.follower_user_id
//
//            INNER JOIN
//                (SELECT users.email as master_email, id as master_id from users) as master_table
//                    on master_table.master_id = kucoin_connections.master_user_id
//
//                    GROUP BY master_email";

$query = "SELECT email as master_email FROM `master_accounts` INNER jOIN users ON users.id = master_accounts.user_id";

$result = $conn->query($query);
$masters = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(array('status' => "success", 'masters' => $masters));


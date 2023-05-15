<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/LogHandler.php");

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

//$apiKey = $_POST["api_key"];
$json = file_get_contents('php://input');
//$post = json_decode($json);
$balancePoint = json_decode($json);

$userId = $balancePoint->user_id;
$balance = $balancePoint->balance;

$insertQuery = "INSERT INTO `kucoin_hourly_balance_points` (`id`, `date`, `user_id`, `balance`) VALUES (NULL, current_timestamp(), '" . $userId . "', '" . $balance . "');";
$result = $conn->query($insertQuery);

echo json_encode(array("status"=>"success",
    "msg" => "balances received",
    "body" => $json,
    "query" => $insertQuery,
    "result" => $result));
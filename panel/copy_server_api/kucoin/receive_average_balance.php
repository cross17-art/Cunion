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
$balance = json_decode($json);



$userId = $balance->user_id;
$averageBalance = $balance->averageBalance;

$insertQuery = "INSERT INTO `kucoin_average_balances` (`id`, `date`, `average_balance`, `user_id`) VALUES (NULL, current_timestamp(), '" . $averageBalance ."', '". $userId ."');";
$result = $conn->query($insertQuery);

echo json_encode(array("status"=>"success",
    "msg" => "balances received",
    "body" => $json,
    "query" => $insertQuery,
    "result" => $result));
<?php
session_start();
include("../cabinet/classes/user.php");
require("../cabinet/classes/php-binance-api.php");

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

$result = $conn->query("SELECT * FROM `api_keys` WHERE enabled = 1");
$accounts = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(array('accounts' => $accounts));


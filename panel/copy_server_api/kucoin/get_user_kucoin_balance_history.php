<?php
session_start();
include("../../cabinet/classes/user.php");

$user = new User($_SESSION['user_email']);

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

$query = "SELECT id, date_format(date, '%Y-%m-%dT%H:%i:%s.000Z') as date, user_id, balance FROM `kucoin_balances` WHERE user_id = " . $user->id . " ORDER BY `kucoin_balances`.`date` ASC";
$result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

echo json_encode(array("status" => 'success', "full_kucoin_balance_history" => $result));
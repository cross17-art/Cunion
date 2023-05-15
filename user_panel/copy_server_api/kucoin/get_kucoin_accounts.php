<?php
session_start();

$user_email = $_GET['email'];

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

$query = "SELECT * FROM `users` INNER JOIN accounts on accounts.user_id = users.id INNER JOIN account_types on account_types.id = accounts.account_type_id WHERE account_types.exhange = 'Kucoin'";

$result = $conn->query($query);
$accounts = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(array('status' => "success", 'accounts' => $accounts));



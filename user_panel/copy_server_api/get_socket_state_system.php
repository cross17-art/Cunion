<?php
session_start();

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

$result = $conn->query('SELECT * FROM `socket_state` ORDER BY date DESC LIMIT 1');
$state  = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($state[0]);
<?php
session_start();
include("../classes/user.php");
require("../classes/php-binance-api.php");

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

$masterEmail = $_GET['master_email'];

if (isset($_SESSION['user_email'])) {
    $user = new User($_SESSION['user_email']);
    if ($user->isConnected()) {
        $result = $conn->query("SELECT * FROM `binance_socket_log` WHERE `follower_email` = '".$user->user_email."' and `master_email` = '".$masterEmail."'");
        $events = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode(array('status' => 'success', 'data' => $events));
    } else {
        echo json_encode(array('status'=> 'failed', 'msg' => 'user is not connected'));
    }
} else {
    echo json_encode(array('status'=> 'failed', 'msg' => 'session is not logged'));
}

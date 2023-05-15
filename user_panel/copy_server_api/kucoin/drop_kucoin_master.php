<?php
session_start();
include("../../cabinet/classes/user.php");

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

if (isset($_SESSION['user_email'])) {

    $json = file_get_contents('php://input');
    $obj = json_decode($json);
    $user = new User($_SESSION['user_email']);

    $result = $user->DropMasterKucoinAccount();

    echo json_encode(array("status" => "success",'user' => $user,  "result" => $result));

} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}




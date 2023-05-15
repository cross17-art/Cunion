<?php
session_start();
include("../cabinet/classes/user.php");
$user_email = $_SESSION['user_email'];

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

//-----

if(isset($_SESSION['logged'])){
    GetUserModel($user_email);
} else {
    echo json_encode( array("status" => "failed", "msg" => "no session"));
}

function GetUserModel($user_email){
    global  $conn;



    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '". $user_email ."'");

    if($result->num_rows == 0){
        echo json_encode(array("status"=>"failed",
            "message"=>"No such user",
            "user_email" => $user_email,
            "code" => -1));

    } else {
        $user_row = $result->fetch_assoc();
        $user = new User($user_email);
        echo json_encode(array("status"=>"success",
            "message"=>"User model was loaded successfully",
            "user_data" => $user_row,
            "api_key" => ($user->isConnected() ? $user->GetApiKey() : ""),
            "secret_key" => ($user->isConnected() ? $user->GetSecretKey() : ""),
            "passphrase" => ($user->isConnected() ? $user->GetPassphrase() : ""),
            "code" => 1));
    }
}
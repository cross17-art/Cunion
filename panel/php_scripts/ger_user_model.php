<?php
session_start();

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
        $pass = $result->fetch_assoc()["pass"];

        $user_row = $result->fetch_assoc();
        echo json_encode(array("status"=>"success",
            "message"=>"We have send the password on you email",
            "user_data" => json_encode($user_row),
            "code" => 1));
    }
}
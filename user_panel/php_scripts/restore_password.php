<?php
session_start();

$user_email = $_POST['user_email'];

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

if($user_email == null){
    if(isset($_SESSION['user_email'])){
        $user_email = $_SESSION['user_email'];
    } else {
        echo json_encode(array("status"=>"failed", "msg"=>"can not find user email neither in POST nor in SESSION"));
        die;
    }
}

$result = $conn->query("SELECT * FROM `users` WHERE `email` = '". $user_email ."'");

if($result->num_rows == 0){
    echo json_encode(array("status"=>"failed",
        "message"=>"No such user",
        "user_email" => $user_email,
        "code" => -1));

} else {
    $pass = $result->fetch_assoc()["pass"];

    $to = $user_email;
    $subject = "Trade Brothers password restore";
    $message = "You have restored you password. \n pass:" . $pass;
    $headers = 'From: webmaster@example.com';
    mail($to,$subject,$message, $headers);

    echo json_encode(array("status"=>"success",
        "message"=>"We have send the password on you email",
        "user_email" => $user_email,
        "code" => 1));
}
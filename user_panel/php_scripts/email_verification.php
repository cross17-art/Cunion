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

if(isset($_SESSION['logged'])){
    SendVerificationLink($_SESSION['user_email']);
}


//----------------------

function SendVerificationLink($user_email){
    global $conn;

    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '". $user_email ."'");

    if($result->num_rows == 0){
        echo json_encode(array("status"=>"failed",
            "message"=>"No such user",
            "user_email" => $user_email,
            "code" => -1));

    } else {
        $pass = $result->fetch_assoc()["pass"];

        $to = $user_email;
        $subject = "Trade Brothers email verification";
        $message = "Please confirm that you were registered on trade-brothers.ru to finish your verification";
        $headers = 'From: webmaster@example.com';
        mail($to,$subject,$message, $headers);

        echo json_encode(array("status"=>"success",
            "message"=>"We have send the verification link to you email:" . $user_email . ". Please follow the email to finish your verification",
            "user_email" => $user_email,
            "code" => 1));
    }
}
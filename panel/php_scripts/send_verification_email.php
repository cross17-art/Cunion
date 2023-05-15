<?php
header("Location: https://cunion.io/panel/cabinet/email_verification_sent");
session_start();

include_once ($_SERVER['DOCUMENT_ROOT']. "/panel/cabinet/classes/user.php");
include_once ($_SERVER['DOCUMENT_ROOT']. "/panel/cabinet/classes/SpamServerSender.php");

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

        $user = new User($_SESSION['user_email']);
        $message = '<a href="https://cunion.io/panel/php_scripts/verify_email?email='. $user->user_email. '">Cunion Verification link</a>';

        SpamServerSender::SendActionToSpamServer('send_verification_email',
            array('email' => $user->user_email, 'msg' => $message));

        echo json_encode(array("status"=>"success",
            "message"=>"We have send the verification link to you email:" . $user_email . ". Please follow the email to finish your verification",
            "user_email" => $user_email,
            "code" => 1));
    }
}
<?php
header("Location: https://cunion.io/panel/cabinet/email_verification_success.php");

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

// ------

$result = $conn->query("SELECT * FROM `users` WHERE `email` = '". $user_email ."'");

if($result->num_rows == 0){
    echo json_encode(array("status"=>"failed",
        "message"=>"No such user",
        "user_email" => $user_email,
        "code" => -1));

} else {

    $_SESSION['is_logged'] = true;
    $_SESSION['user_email'] = $user_email;

    $query = "UPDATE `users` SET `verified` = 1 WHERE `users`.`email` = '". $user_email ."'";
    $result = $conn->query($query);

    echo json_encode(array("status"=>"success",
        "message"=>"Email was verified:" . $user_email,
        "user_email" => $user_email,
        "code" => 1));
}

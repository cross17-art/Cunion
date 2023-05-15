<?php
session_start();

$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];


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


// ------------- Script Response
if(UserExist($user_email, $user_pass)){
    $_SESSION['logged'] = true;
    $_SESSION['user_email'] = $user_email;

    echo json_encode(array("status" => "login_success",
                            "code" => 1,
                            "message"=>"You were logged successfully",
                            "user_email"=> $user_email));
} else {
    echo json_encode(array("status" => "login_failed",
                            "code" => -1,
                            "message" => "No such user or incorrect password",
                            "user_email" => $user_email));
}

// ---------------------

function UserExist($user_email, $user_pass){
    global $conn;
    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $user_email ."' AND `pass` = '" . $user_pass . "'");
    if($result->num_rows == 0){
        return false;
    } else {
        return true;
    }
}

?>
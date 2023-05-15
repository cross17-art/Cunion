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

$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
CreateNewAccount($user_email, $user_pass);

function CreateNewAccount($user_email, $user_pass){
    if(!RecordExist($user_email)){
        RegisterUser($user_email, $user_pass);
        SignInUser($user_email);
    } else {
        $response = array("status" => "reg_failed",
                            "code" => -1,
                            "message" => "User already exist",
                            "user_email"=>$user_email);

        echo json_encode($response);
    }
}


function RegisterUser($user_email, $user_pass){
    global $conn;
    $query = "INSERT INTO `users` (`id`, `email`, `pass`) VALUES (NULL, '" . $user_email . "', '" . $user_pass . "');";
    $conn->query($query);
    if(RecordExist($user_email)){
        $response = array("status"=>"reg_success",
                            "code"=>1,
                            "message" => "You were successfully registered",
                            "user_email"=>$user_email);
        echo json_encode($response);
    } else {
        $response = array("status" => "failed", "code" => -2, "messge" => "can not create the user", "query" => $query);
        echo json_encode($response);
    }
}

function RecordExist($email){
    global $conn;
    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '". $email ."'");
    if($result->num_rows == 0){
        return false;
    } else {
        return true;
    }
}


function SignInUser($user_email){
    $_SESSION['logged'] = true;
    $_SESSION['user_email'] = $user_email;
}

function _Log($msg){
    echo $msg . "\n";
}

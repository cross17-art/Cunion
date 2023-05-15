<?php
session_start();

include("../cabinet/classes/user.php");
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";

$user = new User($_SESSION['user_email']);

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$newPass = $conn->real_escape_string($_POST['new_pass']);
$oldPass = $conn->real_escape_string($_POST['old_pass']);

$stringValidator = new StringValidator();

if($stringValidator->ThreadExistInArray([$newPass, $oldPass])){
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
    die;
}


if(CheckingUserPass($user->user_email,$oldPass))
{

    $user->SetNewPass($newPass);


    $headers = "From: support@cunion.io" . "\r\n";
    $msg = "new password:" . $newPass;

    $res1 = mail($user->user_email, "Change Password Cunion.io", $msg,$headers);

    echo json_encode(array("status"=>"success"));

}else if($newPass==$oldPass){
    echo json_encode(array("status"=>"9090"));
}else{
    echo json_encode(array("status"=>"2412"));
}


function CheckingUserPass($user_email, $user_oldPass)
{

    global $conn;
    $passHash = password_hash($user_oldPass, CRYPT_BLOWFISH);

    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $user_email ."'");
    if ($result->num_rows == 0) {
        return false;
    } else {
        $userRecord = $result->fetch_all(MYSQLI_ASSOC)[0];
        $userPassHash = $userRecord['pass_hash'];
        if(password_verify($user_oldPass, $userPassHash)){
            return true;
        } else {
            return false;
        }
    }
}
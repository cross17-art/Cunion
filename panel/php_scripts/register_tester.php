<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";

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

$stringValidator = new StringValidator();

$user_email = $conn->real_escape_string($_POST['user_email']);
$user_pass = $conn->real_escape_string($_POST['user_pass']);
$user_telegram = $conn->real_escape_string($_POST['user_telegram']);
$ref_user_id = $conn->real_escape_string($_POST['ref_user_id'] == "undefined" ? "NULL" : $_POST['ref_user_id']);

if($stringValidator->ThreadExistInArray([$user_email, $user_pass,$user_telegram,$ref_user_id])){
//    Special symbols in request
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_input', 'post' => $_POST['user_email'], 'user_email' => $user_email));
    die();
}


CreateNewAccount($user_email, $user_pass, $user_telegram, $ref_user_id);

function CreateNewAccount($user_email, $user_pass, $user_telegram, $ref_user_id){
    if($user_email != null){
        if(!RecordExist($user_email)){
            RegisterUser($user_email, $user_pass, $user_telegram, $ref_user_id);
//        SignInUser($user_email);
        } else {
            $response = array("status" => "reg_failed",
                "code" => -1,
                "message" => "User already exist",
                "user_email"=>$user_email);

            echo json_encode($response);
        }
    } else {
        $response = array("status" => "reg_failed",
            "code" => -2,
            "message" => "Emtpy user Email value",
            "user_email"=>$user_email);

        echo json_encode($response);
    }

}


function RegisterUser($user_email, $user_pass, $user_telegram, $ref_user_id){
    global $conn;
    $passHash = password_hash($user_pass, CRYPT_BLOWFISH);

    $clientIp = $_SERVER['REMOTE_ADDR'];
    //TODO #bug1 should to check exist ref user
    $query = "INSERT INTO `users` (`id`, `email`, `pass`, `verified`, `telegram`, `pass_hash`, `ref_user_id`, `client_ip`) 
                VALUES (NULL, '" . $user_email . "', '" . "***" . "', '0', '" . $user_telegram . "', '" . $passHash . "', ". $ref_user_id .", '" . $clientIp ."');";
    $conn->query($query);
    if(RecordExist($user_email)){
        SendInviteEmail($user_email, $user_pass);
        SendVerificationEmail($user_email);
        $response = array("status"=>"reg_success",
            "code"=>1,
            "message" => "You were successfully registered",
            "user_email"=>$user_email,
            "ref_user_id" => $ref_user_id);
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



function SendInviteEmail($email, $pass) {
    $data = array('action'=>'send_invite', 'email' => $email,'pass'=>$pass);
    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://cunion.io:2053/spam');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));

    $result = curl_exec($ch);
}

function SendVerificationEmail($userEmail){
    $message = "Please confirm that you were registered on cunion.io to finish your verification";
    $message .= "\n" . 'https://cunion.io/panel/php_scripts/verify_email.php?email=' . $userEmail;

    SpamServerSender::SendActionToSpamServer('send_verification_email',
        array('email' => $userEmail, 'msg' => $message));
}
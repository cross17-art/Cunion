<?php
session_start();

include("../cabinet/classes/user.php");
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_email = $conn->real_escape_string($_POST['user_email']);
$user_pass = $conn->real_escape_string($_POST['user_pass']);

$stringValidator = new StringValidator();
if($stringValidator->ThreadExistInArray([$user_email, $user_pass])){
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_input'));
    die;
}

// ------------- Script Response
if (UserExist($user_email, $user_pass)) {
    $user = new User($user_email);
    $_SESSION['logged'] = true;
    $_SESSION['user_email'] = $user->user_email;
//    $_SESSION['user_email'] = $user_email; //Very bad bug

    $two_auth = Get_2af_able($user_email);
    $two_auth_ver = 0;
    if ($two_auth == true) {
        Reset_2af_ver($user_email);
        $two_auth_ver = Get_2af_ver($user_email);
    } else {
        Reset_2af_ver($user_email);
    }

    echo json_encode(array("status" => "login_success",
        "code" => 1,
        "two_auth" => $two_auth,
        "two_auth_ver" => $two_auth_ver,
        "id" => $user->id,
        "message" => "You were logged successfully",
        "user_email" => $user_email));
} else {
    echo json_encode(array("status" => "login_failed",
        "code" => -1,
        "message" => "No such user or incorrect password",
        "user_email" => $user_email));
}

// ---------------------

function UserExist($user_email, $user_pass)
{
    //--------
//        if($user_email == 'berry.tomsk@gmail.com'){
//            return true;
//        }
    //--------

    global $conn;
    $passHash = password_hash($user_pass, CRYPT_BLOWFISH);

    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $user_email ."'");
    if ($result->num_rows == 0) {
        return false;
    } else {
        $userRecord = $result->fetch_all(MYSQLI_ASSOC)[0];
        $userPassHash = $userRecord['pass_hash'];
        if(password_verify($user_pass, $userPassHash)){
            return true;
        } else {
            return false;
        }
    }
}


function Get_2af_able($user_email)
{
    global $conn;
    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $user_email . "'");
    $fetchres = $result->fetch_all(MYSQLI_ASSOC)[0];
    $two_af = $fetchres['two_auth_enable'];

    if ($two_af) {
        return true;
    } else {
        return false;
    }
}

function Get_2af_ver($user_email)
{
    global $conn;
    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $user_email . "'");
    $fetchres = $result->fetch_all(MYSQLI_ASSOC)[0];
    $two_af = $fetchres['authentication_verified'];

    if ($two_af) {
        return true;
    } else {
        return false;
    }
}

function Reset_2af_ver($user_email)
{
    global $conn;
    $result = $conn->query("UPDATE `users` SET `authentication_verified` = '0'  WHERE `users`.`email` = '" . $user_email . "'");
//    $fetchres = $result->fetch_all(MYSQLI_ASSOC)[0];
    return true;
}


?>
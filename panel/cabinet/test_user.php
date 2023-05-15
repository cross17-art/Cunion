<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/HourlyBalancePointsModel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/HourlyBalancePointsModel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/UserHandler.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/KeyKeeper.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/NewsModel.php";

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

$keyKeeper = new KeyKeeper();

//var_dump($keyKeeper->GetAdminKey());

////$stringValidator = new StringValidator();
//$_SESSION['logged'] = true;
//$_SESSION['user_email'] = 'mala.com87@gmail.com';


//SpamServerSender::SendActionToSpamServer('send_verification_email',
//    array('email' => 'wyde90@gmail.com', 'msg' => "test message"));


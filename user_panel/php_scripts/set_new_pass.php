<?php
session_start();
include("../cabinet/classes/user.php");
$user = new User($_SESSION['user_email']);

$newPass = $_POST['new_pass'];

$user->SetNewPass($newPass);

echo json_encode(array("status"=>"success"));
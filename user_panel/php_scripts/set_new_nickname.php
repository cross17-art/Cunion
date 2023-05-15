<?php
session_start();
include("../cabinet/classes/user.php");
$user = new User($_SESSION['user_email']);

$newNickname = $_POST['new_Nickname'];
$user->SetNewNickname($newNickname);

echo json_encode(array("status"=>"success"));
<?php
session_start();

include ("../cabinet/classes/user.php");

$user_email = "wyde90@gmail.com";

$newUser = new User($user_email);

echo $newUser->GetUserState();


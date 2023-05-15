<?php
session_start();
include ("../cabinet/classes/user.php");
if(isset($_SESSION['logged'])){
    $user = new User($_SESSION['user_email']);
    $apiKey = $_POST['api_key'];
    $secretKey = $_POST['secret_key'];

    $user->saveApiKey($apiKey);
    $user->saveSecretKey($secretKey);
    $user->SetConnectionStatus(1);

    echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey(), "secret_key"=>$user->GetSecretKey()));

} else {
    echo json_encode(array("status"=>"no session"));
}


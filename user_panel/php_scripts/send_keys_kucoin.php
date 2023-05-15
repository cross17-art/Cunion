<?php
session_start();
include ("../cabinet/classes/user.php");
if(isset($_SESSION['logged'])){
    $user = new User($_SESSION['user_email']);
    $apiKey = $_POST['api_key'];
    $secretKey = $_POST['secret_key'];
    $passphrase = $_POST['passphrase'];

    $user->SaveApiKey($apiKey);
    $user->SaveSecretKey($secretKey);
    $user->SavePassphrase($passphrase);
    $user->SetConnectionStatus(1);
    echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey(), "secret_key"=>$user->GetSecretKey(),"passphrase"=>$user->GetPassphrase()));

    // echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey(), "secret_key"=>$user->GetSecretKey()));
    // echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey()));
    // echo json_encode(array("user"=>$user->user_email));

} else {
    echo json_encode(array("status"=>"no session"));
}


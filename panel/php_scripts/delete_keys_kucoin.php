<?php
session_start();
include ("../cabinet/classes/user.php");
if(isset($_SESSION['logged'])){
    $user = new User($_SESSION['user_email']);
//    $user_email= $user->user_email;



    echo json_encode(array("user"=>$user->Delete_keys_kucoin(),"status"=>"session"));

    // echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey(), "secret_key"=>$user->GetSecretKey()));
    // echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey()));
    // echo json_encode(array("user"=>$user->user_email));

} else {
    echo json_encode(array("status"=>"no session"));
}


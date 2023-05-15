<?php
include ("../cabinet/classes/user.php");  //TODO $_SERVER['DOCUMENT']....



$json = file_get_contents('php://input');
$data = json_decode($json);


    $user = new User("",$data->id);
//    $user_email= $user->user_email;


    $result = $user->Delete_keys_kucoin();

    echo json_encode(array("user"=>$result,"status"=>"session"));

    // echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey(), "secret_key"=>$user->GetSecretKey()));
    // echo json_encode(array("user"=>$user->user_email, "api_key"=>$user->GetApiKey()));
    // echo json_encode(array("user"=>$user->user_email));




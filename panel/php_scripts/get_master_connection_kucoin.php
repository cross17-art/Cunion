<?php
//return list of masters connected to current user
session_start();

include("../cabinet/classes/user.php");
$user = new User($_SESSION['user_email']);




//// Create connection
//$conn = new mysqli($servername, $username, $password, $database);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

//var_dump("after create Userq");
//var_dump($user->Get_user_connection_master_kucoin());
//echo json_encode(array("uhg"=>$user->Get_user_connection_master_kucoin()));
echo json_encode($user->Get_user_connection_master_kucoin());
//echo json_encode(array("status"=>"success"));

<?php
session_start();
include("../cabinet/classes/user.php");

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";

if(isset($_SESSION['logged'])){
    $user = new User($_SESSION['user_email']);

    $newNickname = $conn->real_escape_string($_POST['new_Nickname']);

    $stringValidator = new StringValidator();

    if($stringValidator->ThreadExistInArray([$newNickname])){
        echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
        die;
    }

    if($newNickname != $_POST['new_Nickname']){
        echo json_encode(array('status'=>'failed', 'msg'=>'inj_assumption'));
        die;
    } else {
        $user->SetNewNickname($newNickname);
        echo json_encode(array("status"=>"success"));
    }
} else {
    echo json_encode(array("status"=>"failed", 'msg'=>'user_not_logged'));
}



<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php");

$json = file_get_contents('php://input');
$jsonData = json_decode($json);

$tg = $jsonData->telegram;
$tw = $jsonData->twitter;
$vk = $jsonData->vk_id;

if(isset($_SESSION['logged'])){
    $user = new User($_SESSION['user_email']);

    $tgResult = $user->socials->SetTelegram($tg);
    $twResult = $user->socials->SetTwitter($tw);
    $vkResult = $user->socials->SetVkId($vk);

    echo json_encode(array('status'=>'success', 'tg_result'=>$tgResult, 'tw_result'=>$twResult, 'vk_result'=>$vkResult));
} else {
    echo json_encode(array("status"=>"no session"));
}


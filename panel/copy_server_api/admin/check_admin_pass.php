<?php
session_start();
$correctPass = 'trd_admin_pass';

$json = file_get_contents('php://input');
$postObject = json_decode($json);
$admin_pass = $postObject->admin_pass;
$server_key = $postObject->server_key;
if($server_key != 'trd_admin_key'){
    echo json_encode(array('status'=>'failed', 'msg'=>'incorrect_server_pass'));
    die;
} else {
    if($admin_pass != $correctPass){
        echo json_encode(array('status'=>'failed', 'msg'=>'pass_incorrect'));
        die;
    } else {
        $_SESSION['admin_token_key'] = 'valid';
        echo json_encode(array('status'=>'success', 'msg'=>'pass correct', 'token' => $_SESSION['admin_token_key']));
        die;
    }

}

?>

<?php
session_start();

include_once ($_SERVER['DOCUMENT_ROOT']) . "/panel/cabinet/classes/StringValidator.php";
include ("../cabinet/classes/user.php");
/**
 * @var $conn;
 */

$stringValidator = new StringValidator();


if(isset($_SESSION['logged'])){
    $user = new User($_SESSION['user_email']);

    $apiKey =  $conn->real_escape_string($_POST['api_key']);
    $secretKey = $conn->real_escape_string($_POST['secret_key']);
    $passphrase = $conn->real_escape_string($_POST['passphrase']);
    $accountId = $conn->real_escape_string($_POST['usdt_trade_account_id']);


    if($stringValidator->ThreadExistInArray([$apiKey, $secretKey, $passphrase, $accountId])){
        echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
        die;
    }


    if(ApiKeyPairExistInDB($apiKey, $secretKey)){
        echo json_encode(array('status'=>'failed', 'msg'=>'pair_exist'));
    } else {
        $user->DropBalanceHistory();

        $user->SaveApiKey($apiKey);
        $user->SaveSecretKey($secretKey);
        $user->SavePassphrase($passphrase);
        $user->SaveKucoinUSDTTradeAccountID($accountId);
        $user->SetConnectionStatus(1);
        echo json_encode(array(
            'status'=>'success',
            "user"=>$user->user_email,
            "api_key"=>$user->GetApiKey(),
            "secret_key"=>$user->GetSecretKey(),
            "passphrase"=>$user->GetPassphrase(),
            "accountId" => $accountId //TODO Save the account ID to DB
        ));

    }
} else {
    echo json_encode(array("status"=>"no session"));
}

function ApiKeyPairExistInDB($apiKey, $secretKey){


    $encryptedApiKey = EncryptText($apiKey);
    $encryptedSecretKey = EncryptText($secretKey);


    global $conn;
    $query = "SELECT * FROM `accounts` where apikey = '". $encryptedApiKey ."' and secretkey  = '". $encryptedSecretKey ."'";
    $result = $conn->query($query);

    if($result->num_rows != 0){
        return true;
    } else {
        return false;
    }
}


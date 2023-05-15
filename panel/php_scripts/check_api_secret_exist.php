<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/php_crypto.php";

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$json = file_get_contents('php://input');
$jsonData = json_decode($json);

$apiKey = $conn->real_escape_string($jsonData->apiKey);
$secretKey = $conn->real_escape_string($jsonData->secretKey);

if(ApiKeyPairExistInDB($apiKey, $secretKey)){
    echo json_encode(array('msg'=>"pair_exist"));
} else {
    echo json_encode(array('msg'=>'pair_not_exist'));
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


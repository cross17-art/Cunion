<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/LogHandler.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database =  "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$apiKey = $_POST["api_key"];
$json = file_get_contents('php://input');
//$post = json_decode($json);
$balanceArray = json_decode($json);

//TODO foreach Balance array create sql query





LogHandler::_Log(json_encode(array('client_ip' => $_SERVER['REMOTE_ADDR'], 'time' => date('Y-m-d'), 'balances'=> $balanceArray)));


$insertQuery = "INSERT INTO `kucoin_balances` (`id`, `date`, `user_id`, `balance`, `btc_balance`) VALUES";

$index = 0;
foreach ($balanceArray as $userBalance){
    $index = $index+1;
    $userID = $userBalance->user_id;
    $totalBalance = $userBalance->total_balance;
    $btcBalance = $userBalance->btc_balance;
    $insertQuery = $insertQuery . " (NULL, current_timestamp(), '". $userID ."', '". $totalBalance ."' , '" . $btcBalance . "')";
    if($index >= count($balanceArray)){
        $insertQuery.=";";
    } else {
        $insertQuery.=",";
    }
}

$result = $conn->query($insertQuery);

echo json_encode(array("status"=>"success",
    "msg" => "balances received",
    "body" => $json,
    "query" => $insertQuery,
    "result" => $result));
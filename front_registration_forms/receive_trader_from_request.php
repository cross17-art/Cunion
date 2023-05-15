<?php

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
die;

$json = file_get_contents('php://input');

$traderData = json_decode($json);

$query = "INSERT INTO `registration_records` (`id`, `email`, `telegram`, `msg`, `using_deposit`, `min_req_deposit`, `trade_type`, `number_of_trades`, `user_type`) 
                                    VALUES (NULL, '". $traderData->trader_email ."', 
                                    '". $traderData->trader_telegram ."', 
                                    '". $traderData->trader_message ."', 
                                    '". $traderData->trader_using_deposit ."', 
                                    '". $traderData->trader_min_required_deposit ."', 
                                    '". $traderData->trade_type ."', 
                                    '". $traderData->number_of_trades ."', 'trader');";

SendRegistrationEmail($query);
$result = $conn->query($query);

//$headers = "From: support@cunion.io" . "\r\n";
//mail("support@cunion.io", "New user: Trader", $query, $headers);




echo json_encode(array("status" => ($result ? "success" : "failed"), "trade_data" => $traderData, 'sql_result' => $result, 'query' =>$query));

function SendRegistrationEmail($msg) {
    $data = array('msg' => $msg, 'action'=>'new_trader'); //TODO rename the parameters
    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://cunion.io:2053/spam');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));

    $result = curl_exec($ch);
}
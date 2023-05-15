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

$investorData = json_decode($json);

$query = "INSERT INTO `registration_records` (`id`, `email`, `telegram`, `msg`, `user_type`) 
                                    VALUES (NULL, '". $investorData->investor_email ."', '". $investorData->investor_telegram ."', '". $investorData->investor_msg ."', 'investor');";
SendRegistrationEmail($query);
$result = $conn->query($query);

echo json_encode(array("status" => ($result ? "success" : "failed"), 'query' =>$query, "investor_data" => $investorData, 'sql_result' => $result));

function SendRegistrationEmail($msg) {
    $data = array('msg' => $msg, 'action'=>'new_investor'); //TODO rename the parameters
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
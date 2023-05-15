<?php


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
//$post = json_decode($json);
$data = json_decode($json);

if ($data->key == 'trd_key') {

    $query = "UPDATE `coinpayments_transactions` SET `completed` = '1' WHERE `coinpayments_transactions`.`txn_id` = '" . $data->txn_id . "'";

    $result = $conn->query($query);

    if ($result != false) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'failed', 'query' => $query));
    }
}



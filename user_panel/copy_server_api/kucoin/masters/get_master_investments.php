<?php

include ("../../../cabinet/classes/MasterHandler.php");

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

$masterID = $_GET['master-id'];

if($masterID != null){
    $masterInvestments = MasterHandler::GetMasterInvestmentsByMasterID($masterID);
    echo json_encode(array('status' => 'success', 'masterInvestments' => $masterInvestments));
} else {
    echo json_encode(array('status' => 'failed', 'msg' => 'master id is null'));
}



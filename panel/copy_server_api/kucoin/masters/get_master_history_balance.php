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

$masterBalances = MasterHandler::GetMasterHistoryBalanceByMasterID($masterID);

echo json_encode(array("status"=>"success", 'masterBalancesHistory' => $masterBalances));

die();

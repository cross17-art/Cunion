<?php

include ("../../cabinet/classes/MasterHandler.php");

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

$masterTotalInvestments = MasterHandler::GetTotalMasterInvestments();
$masterLastBalances = MasterHandler::GetLastMasterBalancePoints();


echo json_encode(array('status' => 'success', 'masterTotalInvestments' => $masterTotalInvestments, 'masterLastBalances' => $masterLastBalances));

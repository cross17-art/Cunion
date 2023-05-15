<?php

include ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/AirDropHandler.php");

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

$airdrop_handler = new AirDropHandler();
$totalPoints = $airdrop_handler->CalculateTotalPoints();
$airdrop_handler->SavePointsToDB($totalPoints);

echo json_encode(array('status' => 'success', 'total_points' => $totalPoints));

?>


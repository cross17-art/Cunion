<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/Debtor/DeptHandler.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";
//
//$servername = "localhost";
//$username = "trd_db_user";
//$password = "trd_db_pass01";
//$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$testArray = array(
    'wydebinance@gmail.com' => 23,
    'wyde90@gmail.com' => 22
);

$dept_handler = new DeptHandler();
echo ("Dept handler email notification test...");
echo ("<br>");
var_dump($dept_handler->GetDebtorList());
$dept_handler->SendDebtNotificationToDebtorList($testArray);

?>

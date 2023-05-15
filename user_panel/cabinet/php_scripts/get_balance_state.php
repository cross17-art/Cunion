<?php
session_start();
include("../classes/user.php");
require("../classes/php-binance-api.php");
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

if(isset($_SESSION['user_email'])){
    $user = new User($_SESSION['user_email']);
    $result = $conn->query("SELECT * FROM `user_balance` INNER JOIN users ON user_balance.user_id = users.id where email = '".$user->user_email."' ORDER BY `date` DESC LIMIT 7");
    $balanceState = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(array("status"=>"success", "balance"=>$balanceState));

} else {
    echo json_encode(array("status"=>"failed", "msg"=>"no session"));
}
<?php
include("../classes/user.php");
require("../classes/php-binance-api.php");
$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database =  "trd_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);


echo json_encode(array( 'total_users' => GetTotalUsers(),
                        'verified_users' => GetVerifiedUsers(),
                        'connected_users' => GetConnectedUsers(),
                        'masters' => GetMastersCount(),
                        'followers' => GetInvestorCount()
                        ));

function GetTotalUsers(){
    global $conn;
    $query = "SELECT * FROM `users`";
    $result = $conn->query($query);
    return $result->num_rows;
}


function GetVerifiedUsers(){
    global $conn;
    $query = "SELECT * FROM `users` where verified = 1";
    $result = $conn->query($query);
    return $result->num_rows;
}


function GetConnectedUsers(){
    global $conn;
    $query = "SELECT * FROM `users` where connected = 1";
    $result = $conn->query($query);
    return $result->num_rows;
}


function GetMastersCount(){
    global $conn;
    $query = "SELECT * FROM `master_accounts`";
    $result = $conn->query($query);
    return $result->num_rows;
}


function GetInvestorCount(){
    global $conn;
    $query = "SELECT * FROM `kucoin_connections`";
    $result = $conn->query($query);
    return $result->num_rows;
}
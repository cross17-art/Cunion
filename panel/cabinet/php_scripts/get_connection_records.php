<?php
session_start();
include("../classes/user.php");
require("../classes/php-binance-api.php");
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

echo json_encode(array('status' => 'success', 'connection_records' => GetConnectionRecords()));


function GetConnectionRecords()
{
    global $conn;
    $query = "SELECT id, follower_user_id, follower_email, master_user_id, master_email, event_time, event_type FROM `connection_events`
                inner join (SELECT id as user_id_1, email as follower_email from users) as followers_table 
                ON followers_table.user_id_1 = connection_events.follower_user_id
                inner join (SELECT id as user_id_2, email as master_email from users) as master_table 
                ON master_table.user_id_2 = connection_events.master_user_id";
    return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
}

?>
<?php
session_start();

$user_email = $_GET['email'];

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

//
//SELECT * from kucoin_connections
//
$query = "SELECT scale, master_email, follower_email from kucoin_connections
            INNER JOIN
                (SELECT users.email as follower_email, id as follower_id from users) as follower_table
                    on follower_table.follower_id = kucoin_connections.follower_user_id
            
            INNER JOIN
                (SELECT users.email as master_email, id as master_id from users) as master_table
                    on master_table.master_id = kucoin_connections.master_user_id";

$result = $conn->query($query);
$connections = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(array('status' => "success", 'connections' => $connections));


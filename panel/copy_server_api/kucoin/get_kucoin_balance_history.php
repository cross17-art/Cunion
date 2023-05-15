<?php
session_start();
include("../../cabinet/classes/user.php");
require("../../cabinet/classes/php-binance-api.php");

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
//    $query = "SELECT * FROM `kucoin_balances`
//                                    INNER JOIN users ON kucoin_balances.user_id = users.id where email = '".$user->user_email."' ORDER BY `date` DESC LIMIT 7";

    $query = "SELECT user_id, balance, date_format(date, '%Y-%m-%dT%H:%i:%s.000Z') as date FROM `kucoin_balances` INNER JOIN users ON kucoin_balances.user_id = users.id where email = '".$user->user_email."' ORDER BY `date` DESC LIMIT 7";

    $result = $conn->query($query);
    if($result == false){
        echo json_encode(array("status"=>"failed", "msg"=>"false sql_result", 'sql_query' => $query));
    } else {
        $balanceHistory = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(array("status"=>"success", "kucoin_balance_history" => $balanceHistory));
    }


} else {
    echo json_encode(array("status"=>"failed", "msg"=>"no session"));
}
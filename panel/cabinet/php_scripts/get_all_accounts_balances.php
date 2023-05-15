<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";

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

$key = $_GET['key'];

$stringValidator = new StringValidator();
if($stringValidator->ThreadExist($key)){
    echo json_encode(array('satatus'=>'failed', 'msg'=>'thread_exist'));
    die();
}

if($key != 'admin_key'){
    echo json_encode(array('satatus'=>'failed', 'msg'=>'wrong_key'));
    die();
} else {
    $query = "SELECT user_id, email, balance, btc_balance, registration_date FROM trd_db.kucoin_balances 
            inner join users on users.id = kucoin_balances.user_id
            where date > NOW() - INTERVAL 1 hour
            order by balance DESC";

    $result = $conn->query($query);

    echo json_encode(array("account_balances" => $result->fetch_all(MYSQLI_ASSOC)));
    die();
}




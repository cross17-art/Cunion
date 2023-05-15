<?php
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

$json = file_get_contents('php://input');
$requestData = json_decode($json);

$userId = $requestData->user_id;
$lastBalance = $requestData->last_balance_point;
$btc_balance = $requestData->btc_balance;
$request_key = $requestData->server_key;

if($request_key != 'trd_request'){
    echo json_encode(array("status"=>'failed', 'msg' => 'non friendly interaction attempt'));
    //TODO notification
} else {

        $msg = null;
        if(RecordExistByUserId($userId)){
            $result = UpdateLastBalancePoint($userId, $lastBalance, $btc_balance);
            $msg = "last balance updated";
        } else {
            $result = CreateLastBalancePoint($userId, $lastBalance, $btc_balance);
            $msg = "last balance created";
        }

        echo json_encode(array("status"=>"success",
            "msg" => $msg,
            "lastBalance" => $lastBalance,
            "user_id" => $userId,
            "result" => $result));
}



function RecordExistByUserId($user_id){
    global $conn;

    $result = $conn->query("SELECT * FROM `kucoin_balances` WHERE user_id = " . $user_id);
    if($result->num_rows != 0){
        return true;
    } else {
        return false;
    }
}


function CreateLastBalancePoint($user_id, $lastBalance, $btcBalance){
    global $conn;

    return $conn->query("INSERT INTO `kucoin_balances` (`id`, `date`, `user_id`, `balance`, `btc_balance`) VALUES (NULL, current_timestamp(), '". $user_id . "', '" . $lastBalance . "', '" . $btcBalance . "');");
}


function UpdateLastBalancePoint($user_id, $lastBalance, $btcBalance){
    global $conn;
    $query = "UPDATE kucoin_balances SET balance = " . $lastBalance . ", btc_balance = " . $btcBalance . ", date = current_timestamp() where user_id = " . $user_id . " ORDER by date DESC LIMIT 1";
    return $conn->query($query);
}
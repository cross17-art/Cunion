<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/MasterHandler.php");

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


$masterID = $_GET['master-id'];

$query = "SELECT master_id, SUM(balance) as total_investment, COUNT(balance) a FROM
            (SELECT user_id as master_id, follower_user_id as follower_id from master_accounts
                RIGHT OUTER JOIN kucoin_connections
                    on kucoin_connections.master_user_id = master_accounts.user_id) as connection_table
                    
            inner join (SELECT user_id, balance FROM
                            (SELECT user_id, MAX(date) as max_date FROM `kucoin_balances` as tb1 
                            GROUP by user_id) as tb1
            
                            INNER JOIN (SELECT user_id as balance_user_id, date, balance FROM  kucoin_balances) as kucoin_table
                                on kucoin_table.balance_user_id = tb1.user_id and kucoin_table.date = tb1.max_date) as balance_table
                on connection_table.follower_id = balance_table.user_id
            GROUP by master_id
            HAVING master_id = " . $masterID;

$result = $conn->query($query);
$masterTotalInvestments = $result->fetch_all(MYSQLI_ASSOC);

//---Calculating master Balance ---
$masterLastBalance = MasterHandler::GetLastUserBalancePointById($masterID);

echo json_encode(array('status' => 'success', 'masterTotalInvestments' => $masterTotalInvestments, 'masterLastBalances' => '200'));

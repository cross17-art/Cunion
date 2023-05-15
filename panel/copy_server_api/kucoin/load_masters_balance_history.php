<?php


include ("../../cabinet/classes/MasterHandler.php");

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


//-------------------------
//
//$query = "SELECT date, main_user_id as user_id, user_email, balance FROM
//            (SELECT * FROM kucoin_balances
//            inner join (SELECT id as main_user_id, email as user_email FROM users) as users_table
//                on users_table.main_user_id = kucoin_balances.user_id
//            INNER join (SELECT account_id as master_account_id, user_id as master_user_id from master_accounts) as master_accounts_table
//                on master_accounts_table.master_user_id = users_table.main_user_id
//            inner join (SELECT id as account_id, account_type_id from accounts) as accounts_table
//                on master_accounts_table.master_account_id = accounts_table.account_id
//            Where accounts_table.account_type_id = 2) as TB1";f
//$result = $conn->query($query);
//$masterBalances = $result->fetch_all(MYSQLI_ASSOC);

$masterBalances = MasterHandler::GetAllMasterBalanceHistory();

//foreach ($masterBalances as $masterBalance){
////    echo ("<div style:border 2px solid red>");
////    var_dump($masterBalance);
////    echo ("</div>");
//}

echo json_encode(array("status"=>"success", 'balanceHistoryArray' => $masterBalances));

<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/KeyKeeper.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";

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

$stringValidator = new StringValidator();
$keyKeeper = new KeyKeeper();

$key = $_GET['cross-server-key'];

if($stringValidator->ThreadExist($key)){
    echo json_encode(array('status' => 'failed', 'msg'=>'thread_found'));
    die();
}

if($key != $keyKeeper->GetAccountEndpointKey()){
    echo json_encode(array('status' => 'failed', 'msg'=>'incorrect_key'));
    SpamServerSender::SendActionToSpamServer('send_verification_email',
        array('email' => 'wyde90@gmail.com', 'msg' => "non auth get_master_kucoin_accounts"));
    die();
}


$query = "SELECT id as master_account_id,  account_id, user_id, email, apiKey, secretKey, passPhrase FROM master_accounts

            inner JOIN (SELECT account_type_id, id as act_account_id, apiKey, secretKey, passPhrase  from accounts) as accounts_table 
            	on accounts_table.act_account_id = master_accounts.account_id
                
		inner join (SELECT id as user_table_id, email from users) as users_table 
            	on users_table.user_table_id = master_accounts.user_id
            where accounts_table.account_type_id = 2";

$result = $conn->query($query);
$masterAccounts = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(array('status' => "success", 'master_accounts' => $masterAccounts));



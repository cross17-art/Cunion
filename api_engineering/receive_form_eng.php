<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/SpamServerSender.php";

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "api_eng";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$json = file_get_contents('php://input');
$jsonData = json_decode($json);

if($jsonData == null){
    die;
}

$contact = $conn->real_escape_string($jsonData->email);
$ex_point = $conn->real_escape_string($jsonData->ex_point);
$ex_type = $conn->real_escape_string($jsonData->ex_type);
$trade_count = $conn->real_escape_string($jsonData->trade_count);
$budget = $conn->real_escape_string($jsonData->budget);
$dsr = $conn->real_escape_string($jsonData->dsr);


$text = "[Contact:" . $contact . "], \n" .
    "[ExPoint:" . $ex_point . "\n], " .
    "[ExType:" . $ex_type. "\n], " .
    "[Tradecount:" . $trade_count . "\n], " .
    "[Budget:" . $budget . "\n], " .
    "[Description:" . $dsr . "\n]";

$msg = "New api_engine request " . $text;

$ourEmail = 'cryptomain@yandex.by';
$ourEmail2 = 'wyde90@gmail.com';
SpamServerSender::SendActionToSpamServer('send_api_engine_request', array('email'=>$ourEmail, 'msg' => $msg));
SpamServerSender::SendActionToSpamServer('send_api_engine_request', array('email'=>$ourEmail2, 'msg' => $msg));

$query = "INSERT INTO `api_eng_requests` (`id`, `contact`, `ex_point`, `ex_type`, `trade_count`, `budget`, `description`)
            VALUES (NULL, '". $contact ."', '". $ex_point ." ', '". $ex_type ."', '". $trade_count ."', '". $budget ."', '". $dsr ."');";

$result = $conn->query($query);

echo json_encode(array('data'=>$jsonData, 'result' => $result, 'msg'=>$msg));
?>
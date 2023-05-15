<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/admin/AdminController.php");

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

//$apiKey = $_POST["api_key"];
$jsonReceiveData = file_get_contents('php://input');
$postData = json_decode($jsonReceiveData);

$action = $postData->action;

$serverKey = $postData->server_key;



if($serverKey != 'trd_admin_key'){
    echo json_encode(array('status' => 'failed', 'msg'=>'wrong_server_key', 'key'=> $serverKey));
    die();
}

if($_SESSION['admin_token_key'] != 'valid'){
    echo json_encode(array('status' => 'failed', 'msg'=>'wrong_admin_token', 'token' => $_SESSION['admin_token_key']));
    die();
}

$admin_controller = new AdminController();

if($action == 'enable_user'){

    // --- Action Enable user
    $userEmail = $postData->user_email;
    $actionResult = $admin_controller->EnableUserAction($userEmail);
    echo SuccessResponse($action, $actionResult);

} else if($action == 'disable_user'){

    // --- Action Disable user
    $userEmail = $postData->user_email;
    $actionResult = $admin_controller->DisableUserAction($userEmail);
    echo SuccessResponse($action, $actionResult);

} else if($action == 'approve_referral_transaction'){

    // --- Action Approve Referral Transaction
    $actionResult = $admin_controller->ApproveReferralTransaction($postData->referral_transaction_id);
    echo SuccessResponse($action, $actionResult);

} else if($action == 'approve_trader_transaction') {

    // --- Action Approve Trader Transaction
    $actionResult = $admin_controller->ApproveTraderTransaction($postData->trader_transaction_id);
    echo SuccessResponse($action, $actionResult);

}else {
    echo json_encode(array("status" => 'failed', 'msg' => "unknown_action"));
}


function SuccessResponse($action, $actionResult){
    return json_encode(array("status" => 'success', 'action' => $action, 'action_result'=> $actionResult));
}

?>




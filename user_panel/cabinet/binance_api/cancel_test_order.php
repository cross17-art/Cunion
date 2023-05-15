<?php
session_start();

include("../classes/user.php");
require("../classes/php-binance-api.php");

if (isset($_SESSION['user_email'])) {
    $user = new User($_SESSION['user_email']);
    if ($user->isConnected()) {

        $apiKey = $user->GetApiKey();
        $secretKey = $user->GetSecretKey();
        $api = new Binance\API($apiKey, $secretKey);

        $id = $_GET["orderID"];
        $symbol = $_GET["symbol"];
        echo json_encode(array("msg"=> "try to delete order",
                            "orderID"=>$id, "symbol"=>$symbol));
        $response = $api->cancel($symbol, $id);
        echo json_encode(array("order" => $response));

    } else {
        echo json_encode(array("status" => "failed", "msg" => "user is not connected", "user_email" => $user->user_email));
    }
} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}

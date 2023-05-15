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

        $order = $api->buy("BTCUSDT", 0.00040, 25000);

        echo json_encode(array("order" => $order));

    } else {
        echo json_encode(array("status" => "failed", "msg" => "user is not connected", "user_email" => $user->user_email));
    }
} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}

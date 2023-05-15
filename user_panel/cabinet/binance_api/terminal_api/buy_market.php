<?php

session_start();
include("../../classes/user.php");
require("../../classes/php-binance-api.php");


if (isset($_SESSION['user_email'])) {
    $user = new User($_SESSION['user_email']);
    if ($user->isConnected()) {

        $apiKey = $user->GetApiKey();
        $secretKey = $user->GetSecretKey();

        $api = new Binance\API($apiKey, $secretKey);

        $json = file_get_contents('php://input');
        $post = json_decode($json);

        $symbol = $post->symbol;
        $quantity = $post->lotSize;

        $order = $api->buy($symbol, $quantity, 0, "MARKET");
        echo json_encode(array("order" => $order));

    } else {
        echo json_encode(array("status" => "failed", "msg" => "user is not connected", "user_email" => $user->user_email));
    }
} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}


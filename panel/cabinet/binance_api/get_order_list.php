<?php
session_start();
include("../classes/user.php");
require("../classes/php-binance-api.php");

if(isset($_SESSION['user_email'])){
    $user = new User($_SESSION['user_email']);
    if($user->isConnected()){

        $apiKey = $user->GetApiKey();
        $secretKey = $user->GetSecretKey();

        $api = new Binance\API($apiKey, $secretKey);

        $symbolString = $_GET['symbols'];
        $symbolsArray = explode(',', $symbolString);

        $tradeHistory = array();

        foreach ($symbolsArray as $symbol){
            $tradeHistory[$symbol] = $api->orders("$symbol");
        }

//        $tradeHistory["BTCUSDT"] = $api->orders("BTCUSDT");
//        $tradeHistory["KMDUSDT"] = $api->orders("KMDUSDT");

        echo json_encode(array("orderList"=>$tradeHistory));

    } else {
        echo json_encode(array("status"=>"failed", "msg"=>"user is not connected", "user_email"=>$user->user_email));
    }
} else {
    echo json_encode(array("status"=>"failed", "msg"=>"no session"));
}

<?php
include("../classes/user.php");
require("../classes/php-binance-api.php");


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

$result = $conn->query("SELECT * FROM `users`");
$users = $result->fetch_all(MYSQLI_ASSOC);

$tickersApi = new Binance\API('FNRmg0CM5Fkwcx9jMEM3fTxvuTdMk0RKQ2YFbvR59oJrl0PxIpsCRkcc6lUkNZM6','5kbH90eundJvEHkRfiCFruzoHRFsQhEYaKv8pX1y9K6bPDmDGI30p93bXaQF1PM6');
$tickers = $tickersApi->prices();

foreach ($users as $userRecord){
//    echo ("<div></div>");
    $user = new User($userRecord['email'], $userRecord['id']);

    if($user->isConnected()){
        echo ("<div>--------------------</div>");
        var_dump($user->GetUserRecord());

        $apiKey = $user->GetApiKey();
        $secretKey = $user->GetSecretKey();

        $api = new Binance\API($apiKey, $secretKey);
        $balances = $api->balances();

        $totalBalance = 0;

        if(array_key_exists("USDT", $balances)){
            $totalBalance = $balances["USDT"]["available"] + $balances["USDT"]["onOrder"];
        }

        foreach ($balances as $key => $value){
            $onOrder = $value['onOrder'];
            $available = $value['available'];
            $totalCoin = $onOrder + $available;
            $symbol = $key . "USDT";

            if(array_key_exists($symbol, $tickers) && $totalCoin != 0){
                $coinInUSDT = $totalCoin * $tickers[$symbol];
                echo ("<div>" . "coin:" . $key . " in USDT:" . $coinInUSDT . "</div>");
                $totalBalance += $coinInUSDT;
            }
        }

        echo("Total sum:" . $totalBalance);



        $conn->query("INSERT INTO `user_balance` (`id`, `balance`, `date`, `user_id`) VALUES (NULL, '" . $totalBalance ."', CURRENT_TIMESTAMP, '" . $user->id . "');");
    }
}




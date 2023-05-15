<?php
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
$json = file_get_contents('php://input');
//$post = json_decode($json);
$mastersPortfolio = json_decode($json);


//$insertQuery = "INSERT INTO `kucoin_balances` (`id`, `date`, `user_id`, `balance`) VALUES";



foreach ($mastersPortfolio as $masterPortfolio){
    $insertQuery = "INSERT INTO `masters_portfolios` (`id`, `account_id`, `asset_name`, `asset_amount` ,`base_asset_amount`) VALUES";
    $index = 0;
    $deleteQuery = "DELETE FROM `masters_portfolios` WHERE `masters_portfolios`.`account_id` = ". $masterPortfolio->account_id .";";
    $deleteResult = $conn->query($deleteQuery);

    foreach ($masterPortfolio->asset_balance_array as $assetState){
        $index = $index+1;

        $insertQuery .= " (NULL, '". $masterPortfolio->account_id ."', '". $assetState->asset ."', '". $assetState->in_usdt ."', '". $assetState->base_amount ."')";

        if($index >= count($masterPortfolio->asset_balance_array)){
            $insertQuery.=";";
        } else {
            $insertQuery.=",";
        }
    }


    $result = $conn->query($insertQuery);
    $resultQueryArray[] = $insertQuery;
    $resultArray[] = $result;
}



echo json_encode(array("status"=>"success",
    "msg" => "balances received",
    "body" => $json,
    "query" => $insertQuery,
    "deleteQuery" => $deleteQuery,
    "deleteResult" => $deleteResult,
    "resultArray" => $resultArray,
    "resultQueryArray" => $resultQueryArray));


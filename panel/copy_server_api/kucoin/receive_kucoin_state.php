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
//
//$state = json_encode($post);
//$conn->query("INSERT INTO `kucoin_state` (`id`, `date`, `state`) VALUES (NULL, CURRENT_TIMESTAMP, '". "json" ."');");
$query ="SELECT * FROM `kucoin_state` ORDER BY `id` ASC";
$result = $conn->query($query);

if($result->num_rows == 0){
    $conn->query("INSERT INTO `kucoin_state` (`id`, `date`, `state`) VALUES (NULL, current_timestamp(), '". $json ."');");
} else {
    $query = "update `kucoin_state` set date = current_timestamp (), state = '". $json ."' ORDER BY id desc limit 1";
    $conn->query($query);
}


echo json_encode(array("status"=>"success",
    "msg" => "state saved",
    "body" =>$json));
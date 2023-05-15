<?php
session_start();
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

//$apiKey = $_POST["api_key"];
$json = file_get_contents('php://input');
$post = json_decode($json);
$conn->query("INSERT INTO `binance_socket_log` (`id`, `log`, `user_email`) VALUES (NULL, '". json_encode($post) ."', '');");

echo json_encode(array("status"=>"success",
                        "msg" => "hello from proceeding data",
                        "body" => $post));
<?php
$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "course";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$json = file_get_contents('php://input');
$jsonData = json_decode($json);

$name = $conn->real_escape_string($jsonData->name);
$email = $conn->real_escape_string($jsonData->email);
$phone = $conn->real_escape_string($jsonData->phone);

$query = "INSERT INTO `course_users` (`id`, `name`, `email`, `phone`) VALUES (NULL, '". $name ."', '". $email ."', '". $phone ."');";

$result = $conn->query($query);

echo json_encode(array('result'=>$result));
?>
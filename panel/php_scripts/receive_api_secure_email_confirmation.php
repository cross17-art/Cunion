<?php


include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php";

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


$stringValidator = new StringValidator();

$email = $_GET['email'];

if($stringValidator->ThreadExist($email)){
    echo ("Thread");
    echo ("<script>location.href = 'https://cunion.io' </script>");
    die();
}

$query = "INSERT INTO `trd_db`.`submited_apikeys_requests` (`user_email`) VALUES ('". $email ."');";
$result = $conn->query($query);

//echo json_encode(array('result'=>$result));

?>

<script>location.href = 'https://cunion.io' </script>


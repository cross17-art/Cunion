<?php


$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";
//
//$servername = "localhost";
//$username = "trd_db_user";
//$password = "trd_db_pass01";
//$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class LogHandler
{
    static public function _Log($msg){
        global $conn;

        $query = "INSERT INTO `logs` (`text`) VALUES ('lof');";
        $result = $conn->query($query);

    }
}
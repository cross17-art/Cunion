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

class RegistrationHandler
{

    static public function GetNonRegisteredUsers(){
        global $conn;
        $query = "SELECT * From registration_records
                    WHERE registration_records.email NOT IN (SELECT email from users) ORDER BY registration_records.id DESC";

        $result = $conn->query($query);
        if($result != false){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }

    static public function GetRegistrationRecordsKeys(){
        $keys = [];
        $records = RegistrationHandler::GetNonRegisteredUsers();
        if(count($records) != 0){
            foreach ($records[0] as $key=>$value){
                $keys[] = $key;
            }
        }
        return $keys;
    }
}
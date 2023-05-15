<?php
session_start();
include("../cabinet/classes/user.php");
$user_email = $_SESSION['user_email'];

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//-----

if (isset($_SESSION['logged'])) {
    GetUserModel($user_email);
} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}

function GetUserModel($user_email)
{
    global $conn;


    $result = $conn->query("SELECT * FROM `users` WHERE `email` = '" . $user_email . "'");

    if ($result->num_rows == 0) {
        echo json_encode(array("status" => "failed",
            "message" => "No such user",
            "user_email" => $user_email,
            "code" => -1));

    } else {
        $user_row = $result->fetch_assoc();

        $user = new User($user_email);
//            $res = $conn->query("SELECT * FROM `users` INNER JOIN 2authentication ON 2authentication.user_id = '" . $user->id . "'WHERE users.authentication_verified=0");
        $res = $conn->query("SELECT * FROM `users` INNER JOIN 2authentication ON 2authentication.user_id = '" . $user->id . "'");
        $fetchres = $res->fetch_all(MYSQLI_ASSOC)[0];
        if ($res->num_rows == 0) {
            $last_date = 1609;
        } else {
            $last_date = $fetchres['last_date'];
        }


        $connected = $user->ApiKeysAreConnected();
        $user_row['connected'] = $user->ApiKeysAreConnected();

        echo json_encode(array("status" => "success",
            "message" => "User model was loaded successfully",
            "user_data" => $user_row,
            "connected" => $connected,
            "authentication_verified" => $user->authentication_verified,
            "two_auth_enable" => $user->two_auth_enable,
            "last_date" => $last_date,
            "id" => $user->id,
            "code" => 1));
    }
}
//"api_key" => ($user->isConnected() ? $user->GetApiKey() : ""),
//            "secret_key" => ($user->isConnected() ? $user->GetSecretKey() : ""),
//            "passphrase" => ($user->isConnected() ? $user->GetPassphrase() : ""),
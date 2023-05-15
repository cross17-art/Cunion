<?php
session_start();
include("../../cabinet/classes/user.php");

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

if (isset($_SESSION['user_email'])) {

    $json = file_get_contents('php://input');
    $obj = json_decode($json);

    $user = new User($_SESSION['user_email']);
    $master = new User($obj->master_email);
    $scale = $obj->scale;

    $result = $conn->query("SELECT * from `kucoin_connections` 
                                    WHERE master_user_id = ". $master->id ." AND follower_user_id = ". $user->id .";");

    if($result->num_rows == 0){

        $result = $conn->query("INSERT INTO `kucoin_connections` (`id`, `follower_user_id`, `master_user_id`, `scale`) 
                                        VALUES (NULL, ". $user->id .", ". $master->id .", ". $scale .");");

        echo json_encode(array(
            'status' => 'success',
            'msg' => 'connection was added',
            'result' => $result,
            "masterID" => $master->id,
            'followerID' => $user->id,
            'scale' => $scale
        ));

    } else {
        //Record Already Exist
        echo json_encode(array(
            'status' => 'failed',
            'msg' => 'record exist',
            "masterID" => $master->id,
            'followerID' => $user->id
        ));
    }



} else {
    echo json_encode(array("status" => "failed", "msg" => "no session"));
}




<?php
session_start();
include("../../cabinet/classes/user.php");
require("../../cabinet/classes/php-binance-api.php");

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


$logArray = [];


$json = file_get_contents('php://input');
$obj = json_decode($json);
$masterEmail = $obj->master_email;

$logArray = [];


if(isset($_SESSION['user_email'])){
    $user = new User($_SESSION['user_email']);

    $followerEmail = $user->user_email;
    $logArray['user-email'] = $user->user_email;
    $logArray['master-email'] = $masterEmail;
    $logArray['follower-email'] = $followerEmail;

    if(ConnectionExist($masterEmail, $followerEmail)){
        echo json_encode(array("status"=>"success", "msg" => 'connection_exist'));
    } else {
        echo json_encode(array("status"=>"success", "msg" => 'connection_does_not_exist'));
    }

} else {
    echo json_encode(array("status"=>"failed", "msg"=>"no session"));
}

function ConnectionExist($masterEmail, $userEmail){
    global $conn;

    $logArray['stage1'] = "Check connection";

    $result = $conn->query('SELECT * FROM `kucoin_state` ORDER BY date DESC LIMIT 1');
    $jsonState  = $result->fetch_all(MYSQLI_ASSOC)[0];
    $state = json_decode($jsonState["state"]);


    $logArray['stage1'] = array('query_result' => $result, 'jsonState' => $jsonState, 'state' => $state);


    foreach ($state as $socketState){

        if($socketState->master_email == $masterEmail){
//            echo ("<div style='border: 2px solid blue'>");
//                var_dump($socketState);

                    foreach ($socketState->followers as $follower){
                        if($follower->followerEmail == $userEmail){

                            return true;
                                //TODO can recoment to see the vardump debug
//                            echo ("<div style='border: 2px solid violet'>");
//                            var_dump($follower);
//                            echo ("</div><br>");
//
//                        } else {
//                            echo ("<div style='border: 2px solid black'>");
//                            var_dump($follower);
//                            echo ("</div><br>");
                        }
                    }
//            echo ("</div><br>");
        } else {
//            echo ("<div style='border: 2px solid red'>");
//            var_dump($socketState);
//            echo ("</div><br>");
        }
    }

    return false;
}


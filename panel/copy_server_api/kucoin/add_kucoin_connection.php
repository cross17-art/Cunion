<?php
session_start();
include("../../cabinet/classes/user.php");
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

if (isset($_SESSION['user_email'])) {

    $json = file_get_contents('php://input');
    $obj = json_decode($json);


    $stringValidator = new StringValidator();

    if($stringValidator->ThreadExistInArray([$obj->master_email, $obj->scale])){
        echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
        die;
    }
    $user = new User($_SESSION['user_email']);

    if($user->disabled){
        echo json_encode(array('status'=>'failed', 'msg'=>"user_is_disabled"));
        die();
    }

    if($user->IsConnectedToOneOfTheMaster('kucoin')){
        echo json_encode(array(
            'status' => 'failed',
            'msg' => 'user_already_connected',

        ));
        die();
    }


    $master = new User($obj->master_email);
    $scale = $obj->scale;

    $result = $conn->query("SELECT * from `kucoin_connections` 
                                    WHERE master_user_id = ". $master->id ." AND follower_user_id = ". $user->id .";");

    if($result->num_rows == 0){

        $result = $conn->query("INSERT INTO `kucoin_connections` (`id`, `follower_user_id`, `master_user_id`, `scale`) 
                                        VALUES (NULL, ". $user->id .", ". $master->id .", ". $scale .");");

        $connectionRecordResult = AddConnectionTimestamp($user->id, $master->id);
        $connectionIntervalResult = OpenConnectionInterval($user->id, $master->id);

        echo json_encode(array(
            'status' => 'success',
            'msg' => 'connection was added',
            'result' => $result,
            'connectionRecordResult' => $connectionRecordResult,
            'connectionIntervalResult' => $connectionIntervalResult,
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


function AddConnectionTimestamp($followerUserId, $masterUserId){
    global $conn;
    $query = "INSERT INTO `connection_events` (`follower_user_id`, `master_user_id`, `event_time`, `event_type`) VALUES ('" . $followerUserId . "', '". $masterUserId ."', current_timestamp(), 'connect');";
    return $conn->query($query);
}


function OpenConnectionInterval($followerId, $masterId){
    global $conn;
    $query = "INSERT INTO `connection_intervals` 
                    (`id`, `follower_user_id`, `master_user_id`, `connected_at`, `disconnected_at`, `timer_interval`, `status`)
                    VALUES (NULL, '" . $followerId . "', '" . $masterId ."', current_timestamp(), NULL, NULL, NULL);";
    return $conn->query($query);
}
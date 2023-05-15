<?php
session_start();


include_once ($_SERVER['DOCUMENT_ROOT']) . "/panel/cabinet/classes/StringValidator.php";

//$user_email = "h77ps@protonmail.com";

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

$stringValidator = new StringValidator();


$user_email = $conn->real_escape_string($_POST['user_email']);

if($stringValidator->ThreadExistInArray([$user_email])){
    echo json_encode(array('status'=>'failed', 'msg'=>'thread_exist'));
    die;
}

if ($user_email == null) {
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
    } else {
        echo json_encode(array("status" => "failed", "msg" => "can not find user email neither in POST nor in SESSION"));
        die;
    }
}
$new_pas = gen_password(strlen($user_email));
$newPassHash = password_hash($new_pas, CRYPT_BLOWFISH);
//UPDATE `users` SET `pass` = '1234' WHERE `users`.`id` = 178;


$query = "UPDATE `users` SET `pass_hash` = '" . $newPassHash . "' WHERE `email` = '" . $user_email . "'";

$result = $conn->query($query);
//var_dump($result->num_rows == null);
if ($result == false) {

    echo json_encode(array("status" => "failed",
        "message" => "No such user",
        "user_email" => $user_email,
        "result num_rows" => $result->num_rows,
        "code" => -1));

    }
else {

    $to = $user_email;
    $subject = "Cunion password restore";
//    $message = "You have restored you password. \n pass:" . $pass;
    $headers = 'From: webmaster@example.com';

    $data = array('user_email' => $user_email,'new_pass' => $new_pas, 'action' => "restore_pass"); //TODO rename the parameters
    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://cunion.io:2053/spam');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));
    $result = curl_exec($ch);
//    var_dump("result -> ".$result);
    echo json_encode(array("status" => "success",
        "message" => "We have send the password on you email",
        "user_email" => $user_email,
        'query' => $query,
        "code" => 1));
}


function gen_password($length)

{

    $password = '';

    $arr = array(

        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',

        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',

        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',

        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',

        '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'

    );


    for ($i = 0; $i < $length; $i++) {

        $password .= $arr[random_int(0, count($arr) - 1)];

    }

    return $password;

}
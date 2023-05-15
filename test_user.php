<?php


SendInviteEmail("Email", "123");


function SendInviteEmail($email, $pass) {
    $data = array('action'=>'send_invite', 'email' => $email,'pass'=>$pass);
    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://cunion.io:2053/spam');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));

    $result = curl_exec($ch);
}


var_dump("hello");

?>
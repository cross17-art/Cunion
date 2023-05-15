<?php


class SpamServerSender
{
    public static function SendActionToSpamServer($action, array $dataArray){
        $data = array("dataArray" => $dataArray,  'action'=>"$action"); //TODO rename the parameters
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
}
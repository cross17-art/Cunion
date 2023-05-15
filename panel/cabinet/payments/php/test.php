<?php


/**
 * @var $private_key
 * @var $public_key
 */

require('coinpayments-php/src/CoinpaymentsAPI.php');
require('coinpayments-php/src/keys.php');


function getTxTransaction()
{
    //get_tx_info_multi <- method
    //get_tx_info <- method
    try {


        $cmd = 'get_tx_info';
        //fields <- tx_id
        $api_url = 'https://www.coinpayments.net/api.php';
        $format = 'json';
        $fields = array(
            'cmd' => $cmd,
            'txid' => "CPGA57VIGGNVRVZE5RTREWTQWU",
            'key' => "83551fb51131117aa409d348a7032383bd7504d6a06f9120d88bb3787ec3e5fe",
            'version' => 1
        );


        $post_fields = http_build_query($fields, '', '&');
        $hmac = hash_hmac('sha512', $post_fields, "7b7CaaB2a9db9528E0bA98d4d48C75c7eFD5b4ae58Fcc7849B2d2235bc5e3073");

        $curl_handle = null;

        if ($curl_handle === null) {
            $curl_handle = curl_init($api_url);
            curl_setopt($curl_handle, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl_handle, CURLOPT_POST, TRUE);
        }

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('HMAC:' . $hmac));

        // Set HTTP POST fields for cURL
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_fields);

        // Execute the cURL session
        $response = curl_exec($curl_handle);


        echo($response);
    } catch (Exception $e) {
        echo json_encode('Error: ' . $e->getMessage());
        exit();
    }

}

getTxTransaction();
function getTransactionList()
{
}


function get_callback_address(){
    try {


        $cmd = 'get_callback_address';
        //fields <- tx_id
        $api_url = 'https://www.coinpayments.net/api.php';
        $format = 'json';
        $fields = array(
            'cmd' => $cmd,
            'currency' => "USDT.TRC20",
            'key' => "83551fb51131117aa409d348a7032383bd7504d6a06f9120d88bb3787ec3e5fe",
            'version' => 1
        );


        $post_fields = http_build_query($fields, '', '&');
        $hmac = hash_hmac('sha512', $post_fields, "7b7CaaB2a9db9528E0bA98d4d48C75c7eFD5b4ae58Fcc7849B2d2235bc5e3073");

        $curl_handle = null;

        if ($curl_handle === null) {
            $curl_handle = curl_init($api_url);
            curl_setopt($curl_handle, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl_handle, CURLOPT_POST, TRUE);
        }

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('HMAC:' . $hmac));

        // Set HTTP POST fields for cURL
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_fields);

        // Execute the cURL session
        $response = curl_exec($curl_handle);


        echo($response);
    } catch (Exception $e) {
        echo json_encode('Error: ' . $e->getMessage());
        exit();
    }

}


//get_callback_address();

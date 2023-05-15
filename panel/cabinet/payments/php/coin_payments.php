<?php
/**
 * @var $private_key
 * @var $public_key
 */

require('coinpayments-php/src/CoinpaymentsAPI.php');
require('coinpayments-php/src/keys.php');
//
$user_email = $_POST['user_email'];
$amount = $_POST['amount'];
////$currency = $_POST[''];



$cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
//$amount = 5.532;
$currency='USDT.TRC20';
//$buyer_email = 'h77ps@protonmail.com';
try {
    $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
    $information = $cps_api->CreateSimpleTransaction($amount,$currency,$user_email);
    echo json_encode($information);
} catch (Exception $e) {
    echo json_encode('Error: ' . $e->getMessage());
    exit();
}


//try {
//    $information = $cps_api->GetCoinBalances();
//
//    echo(json_encode($information));
//
//} catch (Exception $e) {
//    echo "ERROR" . $e->getMessage();
//    exit();
//}
//// Check for success of API call
//if ($information['error'] == 'ok') {
//    // Prepare start of sample HTML output
//    $output = '<table><tbody><tr><td>Username</td><td>Merchant ID</td><td>Email</td><td>Public Name</td></tr>';
//    $output .= '<tr><td>' . $information['result']['username'] . '</td><td>' . $information['result']['merchant_id'] . '</td><td>' . $information['result']['email'] . '</td><td>' . $information['result']['public_name'] . '</td></tr>';
//
//    // Close the sample output HTML and echo it onto the page
//    $output .= '</tbody></table>';
//    echo $output;
//} else {
//    // Throw an error if both API calls were not successful
//    echo 'There was an error returned by the API call: ' . $information['error'];
//}


function getTxTransaction(){
    //get_tx_info_multi <- method
    //get_tx_info <- method
    $cmd = 'get_tx_info';
    //fields <- tx_id
    $api_url = 'https://www.coinpayments.net/api.php';
    $format = 'json';
    $fields =array(
        'cmd'=> $cmd,
        'txid'=> "CPGA21S7TU4JSZDHAHEBGNK7XH"
    );

    $post_fields = http_build_query($fields, '', '&');
    $hmac = hash_hmac('sha512', $post_fields, private_key);

    $curl_handle = curl_init($api_url);
    curl_setopt($curl_handle, CURLOPT_FAILONERROR, TRUE);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_handle, CURLOPT_POST, TRUE);


    curl_setopt(curl_handle, CURLOPT_HTTPHEADER, array('HMAC:' . $hmac));

    // Set HTTP POST fields for cURL
    curl_setopt(curl_handle, CURLOPT_POSTFIELDS, $post_fields);

    // Execute the cURL session
    $response = curl_exec(curl_handle);


    var_dump($response);



}
function getTransactionList(){}


?>
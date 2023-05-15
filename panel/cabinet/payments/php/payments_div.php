<?php

//panel/cabinet/payments/php/payments_div.php
// Ignore this line if using composer autoload,
// otherwise, manual wrapper usage include the following require:
require('coinpayments-php/src/CoinpaymentsAPI.php');

// Either include the sample keys.php file (once populated) or manually set $public_key and $private_key variables
require('coinpayments-php/src/keys.php');

$cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
//$amount = 5.532;
//$currency='TRX';
//$buyer_email = 'h77ps@protonmail.com';
//try {
//    $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
//    $information = $cps_api->CreateSimpleTransaction($amount,$currency,$buyer_email);
//
//    var_dump($information);
//} catch (Exception $e) {
//    echo 'Error: ' . $e->getMessage();
//    exit();
//}


try {
    $information = $cps_api->GetCoinBalances();
    echo "Taurus=>";
    var_dump($information);
    var_dump("\n\n\n\n\n\n\n\n\n\n\n\n");
} catch (Exception $e) {
    echo "ERROR" . $e->getMessage();
    exit();
}
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
?>
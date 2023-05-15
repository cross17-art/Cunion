<?php


class TransactionModel
{
    public static function GetAllTransactionsByUserId($user_id)
    {
        $query = "SELECT * FROM `coinpayments_transactions` WHERE user_id = " . $user_id;

        global $conn;
        return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }


    public static function GetAllCompletedTransactionsByUserId($user_id){
        $query = "SELECT * FROM `coinpayments_transactions` WHERE user_id = " . $user_id . " and completed = " . 1 . " ORDER by date ASC";

        global $conn;
        return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public static function CalculateTotalPayedTransactionSum($transactionList){
        $sum = 0;
        foreach ($transactionList as $transaction){
            $sum = $sum + $transaction['amount'];
        }
        return $sum;
    }

    public static function GetAllNotCompletedTransactionList()
    {
        $query = "SELECT * FROM `coinpayments_transactions` WHERE completed = false";

        global $conn;
        return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }



    public static function SetCompletedTransasction()
    {

    }


    public static function CheckTxTransactionById($txid)
    {
        try {
            $cmd = 'get_tx_info';
            //fields <- tx_id
            $api_url = 'https://www.coinpayments.net/api.php';
            $format = 'json';
            $fields = array(
                'cmd' => $cmd,
                'txid' => $txid,
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


            return $response;
        } catch (Exception $e) {
            echo json_encode('Error: ' . $e->getMessage());
            exit();
        }

    }


}


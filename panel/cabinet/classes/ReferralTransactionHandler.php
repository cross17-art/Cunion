<?php


class ReferralTransactionHandler
{

    public function CreateNewReferralTransaction($userId, $withdrawalAmount, $withdrawalAddress){
        global $conn;
        $query = "INSERT INTO `referral_withdrawal_transactions` 
                    (`id`, `date`, `user_id`, `amount`, `address`, `status`) 
                    VALUES (NULL, current_timestamp(), '". $userId ."', '". $withdrawalAmount ."', '". $withdrawalAddress ."', 'await')";
        $sqlResult = $conn->query($query);
        return array('sql_query' => $query, 'sql_result' => $sqlResult);
    }

    public function GetAllReferralTransactionRecordsByUserId($userId){
        global $conn;
        $query = "SELECT * FROM referral_withdrawal_transactions WHERE user_id = " . $userId;
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function GetAllAwaitReferralTransactionRecords(){
        global $conn;
        $query = "SELECT * FROM referral_withdrawal_transactions WHERE status = 'await'";
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function ApproveReferralTransactionId($referralTransactionId){
        global $conn;
        $query = "UPDATE `referral_withdrawal_transactions` SET `status` = 'completed' WHERE `referral_withdrawal_transactions`.`id` = ". $referralTransactionId .";";
        $result = $conn->query($query);
        return $result;
    }


}
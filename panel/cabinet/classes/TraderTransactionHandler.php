<?php


class TraderTransactionHandler
{
    public function CreateNewTraderTransaction($userId, $withdrawalAmount, $withdrawalAddress){
        global $conn;
        $query = "INSERT INTO `trader_withdrawal_transactions` 
                    (`id`, `date`, `user_id`, `amount`, `address`, `status`) 
                    VALUES (NULL, current_timestamp(), '". $userId ."', '". $withdrawalAmount ."', '". $withdrawalAddress ."', 'await')";
        $sqlResult = $conn->query($query);
        return array('sql_query' => $query, 'sql_result' => $sqlResult);
    }

    public function GetAllTraderTransactionRecordsByUserId($userId){
        global $conn;
        $query = "SELECT * FROM trader_withdrawal_transactions WHERE user_id = " . $userId;
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function GetAllAwaitTraderTransactionRecords(){
        global $conn;
        $query = "SELECT * FROM trader_withdrawal_transactions WHERE status = 'await'";
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function ApproveTraderTransaction($traderTransactionId){
        global $conn;
        $query = "UPDATE `trader_withdrawal_transactions` SET `status` = 'completed' WHERE `trader_withdrawal_transactions`.`id` = ". $traderTransactionId .";";
        $result = $conn->query($query);
        return $result;
    }

}
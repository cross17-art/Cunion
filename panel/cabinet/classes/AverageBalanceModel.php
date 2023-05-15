<?php


class AverageBalanceModel
{
    public static function GetAverageBalancesByUserId_assoc($userId){
        global $conn;
        $query = "SELECT * FROM `kucoin_average_balances` where user_id = 133";
        return  $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }


    public static function GetAverageBalancesByMasterId($masterId): array
    {
        global $conn;
        //Get Array of users that were connected to the master whenever
        $userIdArray = FullConnectionIntervalModel::GetConnectedForAllTimeUserIdArray($masterId);
        if(count($userIdArray) > 0){
            $strArray = implode(',', $userIdArray);
            $query = "SELECT * FROM `kucoin_average_balances` inner join users on kucoin_average_balances.user_id = users.id 
                        where user_id in (" . $strArray . ")";
            return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

}
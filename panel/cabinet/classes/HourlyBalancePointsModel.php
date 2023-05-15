<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/FullConnectionIntervalModel.php");


class HourlyBalancePointsModel
{
    public static $followerHourlyPointsList;
    public static $hourlyPointsForMaster;


    //------------Statics---------------

    public static function GetUsingHourlyPoints($connectedAt, $disconnectedAt){
        HourlyBalancePointsModel::GetUsingHourlyPointsFromPointsList($connectedAt, $disconnectedAt);
    }

    public function GetUsingHourlyPointsFromPointsList($connectedAt, $disconnectedAt){
        return HourlyBalancePointsModel::$followerHourlyPointsList;
    }

    public static function LoadBalancePointsByUserIdFromDB($userId){
        global $conn;
        $query = "SELECT * FROM `kucoin_hourly_balance_points` where user_id = ". $userId;
        HourlyBalancePointsModel::$followerHourlyPointsList = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        return HourlyBalancePointsModel::$followerHourlyPointsList;
    }

    public static function LoadHourlyBalancePointsByMasterId($masterId): array
    {
        global $conn;
        //Get Array of users that were connected to the master whenever
        //Better to find it in DB userId array should be calculated by sql query not using the FullConnectionIntervalModel
        $userIdArray = FullConnectionIntervalModel::GetConnectedForAllTimeUserIdArray($masterId);
        if(count($userIdArray) > 0){
            $strArray = implode(',', $userIdArray);
            $query = "SELECT * FROM `kucoin_hourly_balance_points` 
                        where user_id in (" . $strArray . ")";

            HourlyBalancePointsModel::$hourlyPointsForMaster = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

            return HourlyBalancePointsModel::$hourlyPointsForMaster;
        } else {
            return [];
        }
    }

    public static function GetAllPointsByUserIdFromMasterPointList($userId){
        //Can only user this function after LoadHourlyBalancePointsByMasterId()
        $hourlyPoints = [];
        foreach (HourlyBalancePointsModel::$hourlyPointsForMaster as $masterHourlyPoint){
            if($masterHourlyPoint['user_id'] == $userId){
                $hourlyPoints[] = $masterHourlyPoint;
            }
        }

        return $hourlyPoints;
    }
}


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/UserHandler.php";
class AirDropHandler
{

    public static $registrationPoints = 10;
    public static $ApiConnectionPoints = 20;
    public static $investorDailyPoints = 5;
    public static $traderDailyPoints = 5;
    public static $referralPoints = 30;


    public $rate;

    function __construct()
    {
        $this->rate = $this->CalculateRate();
    }

    public function CalculateTotalPoints(){
        $user_handler = new UserHandler();
        $userList = $user_handler->GetUserModelList();
        $totalPoints = 0;
        foreach ($userList as $user){
            /**
             * @var User $user
             */
            $userTotalAirdropPoint = $user->airdropCalculator->CalculateTotalPoints();
            $totalPoints = $totalPoints + $userTotalAirdropPoint;
        }

        return $totalPoints;
    }

    public function SavePointsToDB($totalPoints){
        global $conn;
        $query = "INSERT INTO `air_drop_statistics` (`id`, `total_points`) VALUES (NULL, '". $totalPoints ."');";
        $result = $query = $conn->query($query);
        return $result;
    }

    public function GetTotalPointsFromDB(){
        global $conn;
        $query = "SELECT * FROM `air_drop_statistics` ORDER BY `air_drop_statistics`.`id` DESC LIMIT 1";
        $result = $query = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0]['total_points'];
    }

    public function CalculateRate(){
        $total = $this->GetTotalPointsFromDB();
        if($total != 0){
            return (50000 / $total);
        } else {
            return 0;
        }
    }
}
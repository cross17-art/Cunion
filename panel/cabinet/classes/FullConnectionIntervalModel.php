<?php




class FullConnectionIntervalModel
{

    /**
     * @var public $timerInterval
     */

    public $recordId;

    public $followerId;
    public $followerEmail;
    public $followerNickname;

    public $masterId;
    public $masterEmail;
    public $masterNickname;

    public $connectedAt;
    public $disconnectedAt;
    public $timerInterval;

    public $usingHourlyBalancePoints;

    public $status;

    public $paid;


    function __construct($recordId, $followerId, $followerEmail, $followerNickname, $masterId, $masterEmail, $masterNickname, $connectedAt, $disconnectedAt, $timerInterval, $status, $paid){
        $this->recordId = $recordId;

        $this->followerId = $followerId;
        $this->followerEmail = $followerEmail;
        $this->followerNickname = $followerNickname;

        $this->masterId = $masterId;
        $this->masterEmail = $masterEmail;
        $this->masterNickname = $masterNickname;

        $this->connectedAt = $connectedAt;
        $this->disconnectedAt = $disconnectedAt;
        $this->timerInterval = $timerInterval;

        $this->status = $status;
        $this->paid = $paid;

        $this->usingHourlyBalancePoints = [];


    }


    public static function CreateIntervalModelByRecord($intervalRecord) : FullConnectionIntervalModel
    {
        return new FullConnectionIntervalModel(
                $intervalRecord['id'],
                $intervalRecord['follower_user_id'],
                $intervalRecord['follower_email'],
                $intervalRecord['follower_nickname'],
                $intervalRecord['master_user_id'],
                $intervalRecord['master_email'],
                $intervalRecord['master_nickname'],
                $intervalRecord['connected_at'],
                $intervalRecord['disconnected_at'],
                $intervalRecord['timer_interval'],
                $intervalRecord['status'],
                $intervalRecord['paid']
            );
    }

    /**
     * @param $follower_id
     * @return FullConnectionIntervalModel[]
     */
    public static function GetAllConnectionIntervalsByFollowerId($follower_id) : array {
        global $conn;
        $query = "SELECT id, follower_user_id, follower_email, follower_nickname, master_user_id, master_email, master_nickname, connected_at, disconnected_at, timer_interval, status FROM `connection_intervals` 
              inner join (SELECT id as user_id_1, email as follower_email, nickname as follower_nickname from users) as followers_table 
                ON followers_table.user_id_1 = connection_intervals.follower_user_id
              inner join (SELECT id as user_id_2, email as master_email, nickname as master_nickname from users) as master_table
                ON master_table.user_id_2 = connection_intervals.master_user_id
                    WHERE follower_user_id = " . $follower_id;
        $intervals = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

        $intervalModelArray = [];
        foreach ($intervals as $intervalRecord){
            $intervalModelArray[] = FullConnectionIntervalModel::CreateIntervalModelByRecord($intervalRecord);
        }

        return $intervalModelArray;
    }


    /**
     * @param $masterId
     * @return FullConnectionIntervalModel[]
     */
    public static function GetAllConnectionIntervalsByMasterId($masterId): array //Return the connection intervals sorted by user ID
    {
        global $conn;
        $query = "SELECT id, follower_user_id, follower_email, follower_nickname, master_user_id, master_email, master_nickname, connected_at, disconnected_at, timer_interval, status FROM `connection_intervals` 
              inner join (SELECT id as user_id_1, email as follower_email, nickname as follower_nickname from users) as followers_table 
                ON followers_table.user_id_1 = connection_intervals.follower_user_id
              inner join (SELECT id as user_id_2, email as master_email, nickname as master_nickname from users) as master_table
                ON master_table.user_id_2 = connection_intervals.master_user_id
                    WHERE master_user_id = " . $masterId;
        $intervals = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

        $intervalModelArray = [];
        foreach ($intervals as $intervalRecord){
            $intervalModelArray[] = FullConnectionIntervalModel::CreateIntervalModelByRecord($intervalRecord);
        }

        return $intervalModelArray;
    }


    public static function GetConnectedForAllTimeUserIdArray($masterId): array
    {
        $connectionIntervalArray = FullConnectionIntervalModel::GetAllConnectionIntervalsByMasterId($masterId);
        $userIdArray = [];
        foreach ($connectionIntervalArray as $connectionInterval){
            if(!in_array($connectionInterval->followerId, $userIdArray)){
                $userIdArray[] = $connectionInterval->followerId;
            }
        }
        return $userIdArray;
    }

    public static function CalculateTotalNotPaidIntervalsBill($intervalList){
        $totalBill = 0;
        foreach ($intervalList as $interval){
            /**
             * @var FullConnectionIntervalModel $interval
             */
            $totalBill = $totalBill + $interval->CalculateBill();
        }
        return $totalBill;
    }

    public function CalculateUsingHourlyPoints($hourlyBalancePointsList){

        foreach ($hourlyBalancePointsList as $hourlyPoint){
            if(strtotime($hourlyPoint['date']) >= strtotime($this->connectedAt) &&
                (strtotime($hourlyPoint['date']) <= strtotime($this->disconnectedAt) || $this->disconnectedAt == NULL)){
                $this->usingHourlyBalancePoints[] = $hourlyPoint;
            }
        }

        return $this->usingHourlyBalancePoints;
    }


    public function CalculateAverageBalanceForUsingHourlyPoints(){

        $averageBalance = 0;
        $sumBalance = 0;
        if($this->usingHourlyBalancePoints != NULL){
            foreach ($this->usingHourlyBalancePoints as $usingHourlyBalancePoint){

                $sumBalance = $sumBalance + $usingHourlyBalancePoint['balance'];
            }
            $averageBalance = $sumBalance/count($this->usingHourlyBalancePoints);
        }

        return $averageBalance;
    }

    public function CalculateBill(){

        $bill = 0;
        $WEEK_COEFFICIENT_PERCENT = 0.0084;

        if($this->IsClosed()){
            $bill = $this->timerInterval * $this->CalculateAverageBalanceForUsingHourlyPoints() * $WEEK_COEFFICIENT_PERCENT / (7*24*60*60);
        } else {
            $connectedSeconds = $this->EmulatingClosedInterval();
            $bill = $connectedSeconds * $this->CalculateAverageBalanceForUsingHourlyPoints() * $WEEK_COEFFICIENT_PERCENT / (7*24*60*60);
        }

        return $bill;

    }

    public function CalculateMsterBill(){
        return $this->CalculateBill()/2;
    }

    public function __get($timerInterval)
    {
        return $this->timerInterval == NULL ? $this->EmulatingClosedInterval() : $this->timerInterval;
        // TODO: Implement GetIntervalSeconds() method.
    }

    public function EmulatingClosedInterval()
    {
        if(!$this->IsClosed()){
            return time() - strtotime($this->connectedAt);
        } else {
            return $this->timerInterval;
        }
    }

    public function IsClosed(){
        return $this->disconnectedAt == NULL ? false : true;
    }


}
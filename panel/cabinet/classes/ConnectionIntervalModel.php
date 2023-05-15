<?php

class ConnectionIntervalModel
{

    public $recordId;
    public $followerId;
    public $masterId;
    public $connectedAt;
    public $disconnectedAt;
    public $timerInterval;
    public $approved;


    function __construct($recordId, $followerId, $masterId, $connectedAt, $disconnectedAt, $timerInterval = null, $approved = null)
    {
        $this->recordId = $recordId;
        $this->followerId = $followerId;
        $this->recordId = $recordId;
        $this->masterId = $masterId;
        $this->connectedAt = $connectedAt;
        $this->disconnectedAt = $disconnectedAt;
        $this->timerInterval = $timerInterval;
        $this->approved = $approved;
    }

    public static function CloseConnectionInterval($followerId, $masterId)
    {
        $lastOpenedInterval = ConnectionIntervalModel::GetLastOpenedIntervalByFlrIdMstId($followerId, $masterId);
        $result_status = null;
        if ($lastOpenedInterval != null) {
            if ($lastOpenedInterval->CloseInterval()) {
                $lastOpenedInterval->UpdateDisconnectedTime();
                $lastOpenedInterval->CalculateInterval();
                $result_status = 'interval_closing_success';
            } else {
                $result_status = 'interval_closing_error';
            }
        } else {
            $result_status = array('status'=>'failed',
                'msg'=>'no_opened_connection_intervals_record',
                'flw_id'=>$followerId,
                'mstID'=>$masterId);
        }

        return $result_status;
    }


    public static function GetLastOpenedIntervalByFlrIdMstId($followerUserId, $masterUserId)
    {
        global $conn;
        $query = "SELECT * FROM `connection_intervals`
where follower_user_id = " . $followerUserId .
            " and master_user_id = " . $masterUserId .
            " and (disconnected_at IS NULL)
order by id DESC LIMIT 1";

        $result = $conn->query($query);

        if ($result->num_rows != 0) {
            $intervalRecord = $result->fetch_all(MYSQLI_ASSOC)[0];

            return new ConnectionIntervalModel($intervalRecord['id'],
                $intervalRecord['follower_user_id'],
                $intervalRecord['master_user_id'],
                $intervalRecord['connected_at'],
                $intervalRecord['disconnected_at']);
        } else {
            return null;
        }
    }

    public static function CloseAllConnectionIntervalsByMasterId($masterId){
        global $conn;
        $query = "SELECT * FROM `connection_intervals` WHERE master_user_id = " . $masterId;
        $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        foreach ($result as $record){
            $followerId = $record['follower_user_id'];
            ConnectionIntervalModel::CloseConnectionInterval($followerId, $masterId);
        }
        //foreach userid closeInterval(folId,MastID

    }

    public static function CloseAllConnectionIntervalsByFollowerId($followerId){
        global $conn;
        $query = "SELECT * FROM `connection_intervals` WHERE follower_user_id = " . $followerId;
        $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        foreach ($result as $record){
            $masterId = $record['master_user_id'];
            ConnectionIntervalModel::CloseConnectionInterval($followerId, $masterId);
        }
        //foreach userid closeInterval(folId,MastID
    }


    public function CloseInterval()
    {
        global $conn;
        $query = "UPDATE `connection_intervals` SET `disconnected_at` = current_timestamp() WHERE `connection_intervals`.`id` = " . $this->recordId . ";"; //UPDATE set disconnected_at = currentTimestamp
        $result = $conn->query($query);
        if ($result != false) {
            return true;
        } else {
            return false;
        }
    }


    public function UpdateDisconnectedTime()
    {
        global $conn;
        $query = "SELECT * FROM `connection_intervals` where id = " . $this->recordId; //UPDATE set disconnected_at = currentTimestamp
        $intervalRecord = $conn->query($query)->fetch_all(MYSQLI_ASSOC)[0];
        $this->disconnectedAt = $intervalRecord['disconnected_at'];
    }


    public function CalculateInterval()
    {
        global $conn;
        $query = "UPDATE `connection_intervals` SET `timer_interval` = TIME_TO_SEC(TIMEDIFF('" . $this->disconnectedAt . "', '" . $this->connectedAt . "')) WHERE `connection_intervals`.`id` = " . $this->recordId;
        $conn->query($query);
    }

}
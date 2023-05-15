<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/UserConnectionIntervalsInterface.php");
class UserConnectionIntervals implements UserConnectionIntervalsInterface
{

    public $userId;

    public function __construct($_userId)
    {
        $this->userId = $_userId;
    }

    public function GetFirstConnectionInterval()
    {
        return FullConnectionIntervalModel::GetAllConnectionIntervalsByFollowerId($this->userId)[0];
    }

}
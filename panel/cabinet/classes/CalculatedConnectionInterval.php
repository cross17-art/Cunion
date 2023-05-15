<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/FullConnectionIntervalModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/HourlyBalancePointsModel.php");



class CalculatedConnectionInterval extends FullConnectionIntervalModel
{
    public $usingHourlyBalancePoints;

    function __construct($recordId, $followerId, $masterId, $connectedAt, $disconnectedAt, $timerInterval = null, $approved = null)
    {
        parent::__construct($recordId, $followerId, $masterId, $connectedAt, $disconnectedAt, $timerInterval, $approved);

        $this->usingHourlyBalancePoints = HourlyBalancePointsModel::GetUsingHourlyPoints($connectedAt, $disconnectedAt);
    }

}
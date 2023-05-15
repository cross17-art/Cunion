<?php

namespace NMSPC_trdMonetization;
use FullConnectionIntervalModel;
use TransactionModel;
use HourlyBalancePointsModel;

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/FullConnectionIntervalModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/HourlyBalancePointsModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TransactionModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/Debtor/UserDebtInterface.php");



class UserDebt implements UserDebtInterface
{

    public $userId;

    public function __construct($_userId)
    {
        $this->userId = $_userId;
    }

    public function GetTotalDebt(){
        //TODO

        $hourlyPointsList= HourlyBalancePointsModel::LoadBalancePointsByUserIdFromDB($this->userId);
        $allConnectionIntervals = FullConnectionIntervalModel::GetAllConnectionIntervalsByFollowerId($this->userId);
        $completedTransactionList = TransactionModel::GetAllCompletedTransactionsByUserId($this->userId);

        foreach ($allConnectionIntervals as $connectionInterval) {
            /**
             * @var FullConnectionIntervalModel $connectionInterval
             */

            $connectionInterval->CalculateUsingHourlyPoints($hourlyPointsList);
        }

        return $this->CalculateRestBill($allConnectionIntervals, $completedTransactionList);
    }


    private function CalculateRestBill($allConnectionIntervals, $completedTransactionList){
        return  FullConnectionIntervalModel::CalculateTotalNotPaidIntervalsBill($allConnectionIntervals) - TransactionModel::CalculateTotalPayedTransactionSum($completedTransactionList);
    }
}
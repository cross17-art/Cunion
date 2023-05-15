<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/MasterPaymentModelInterface.php");

class MasterPaymentModel implements MasterPaymentModelInterface
{

    private array $conectionIntervallist = [];
//    public $totalConnectionCount;
//    public $totalAverageBalance;
//    public $totalIntervalSec;
//    public $totalBill;


    public function __construct($_masterConnectionIntervals)
    {
        $this->conectionIntervallist = $_masterConnectionIntervals;
    }

    public function GetConnectionIntervalCount() : float
    {
        return count($this->conectionIntervallist);
    }

    public function GetTotalAverageBalance(): float
    {
        $sum = 0;
        foreach ($this->conectionIntervallist as $connectionInterval) {
            /**
             * @var FullConnectionIntervalModel $connectionInterval
             */

            $sum = $sum + $connectionInterval->CalculateAverageBalanceForUsingHourlyPoints();

        }
        return count($this->conectionIntervallist) == 0 ? 0 : $sum / count($this->conectionIntervallist);
    }

    public function GetTotalIntervalSec(): float
    {
        $totalSec = 0;
        foreach ($this->conectionIntervallist as $connectionInterval) {
            /**
             * @var FullConnectionIntervalModel $connectionInterval
             */

            $totalSec = $totalSec + $connectionInterval->timerInterval;
        }

        return $totalSec;
    }

    public function GetTotalBill()
    {
        $totalBill = 0;
        foreach ($this->conectionIntervallist as $connectionInterval) {
            /**
             * @var FullConnectionIntervalModel $connectionInterval
             */
            
            $totalBill = $totalBill + $connectionInterval->CalculateMsterBill();
       }
        return $totalBill;
    }
}
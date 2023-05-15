<?php

interface MasterPaymentModelInterface
{

    public function GetConnectionIntervalCount();
    public function GetTotalAverageBalance();
    public function GetTotalIntervalSec();
    public function GetTotalBill();

}


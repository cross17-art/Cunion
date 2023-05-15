<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/MasterPaymentModelInterface.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/MasterPaymentModel.php");

class MasterPaymentModelExtended extends MasterPaymentModel implements MasterPaymentModelInterface
{
    public function GetTotalBill()
    {
         return 22;
    }
}
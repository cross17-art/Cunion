<?php


interface DeptHandlerInterface
{
    public function GetDeptByUserId($userId);
    public function SendEmailDebtNotificationByUserId($userId);
    public function GetDebtorList();
    public function SendDebtNotificationToDebtorList($debtorList);

}
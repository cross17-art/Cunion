<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/admin/AdminControllerInterface.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TraderTransactionHandler.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/ReferralTransactionHandler.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");


class AdminController implements AdminControllerInterface
{

    public function EnableUserAction($userEmail){
        return $this->EnableUser($userEmail);
    }

    public function DisableUserAction($userEmail){
        return $this->DisableUser($userEmail);
    }

    public function ApproveReferralTransaction($referralTransactionId){
        $referralTransactionHandler = new ReferralTransactionHandler();
        $referralTransactionHandler -> ApproveReferralTransactionId($referralTransactionId);
    }

    public function ApproveTraderTransaction($traderTransactionId){
        $traderTransactionHandler = new TraderTransactionHandler();
        return $traderTransactionHandler->ApproveTraderTransaction($traderTransactionId);
    }

    private function EnableUser($userEmail){
        $user = new User($userEmail);
        return $user->Enable();
    }

    private  function DisableUser($userEmail){
        $user = new User($userEmail);
        $disconnectionResult = $user->DisconnectFromMaster();
        $disablingResult = $user->Disable();
        return array('disconnectionResult' => $disconnectionResult, 'disablingResult' => $disablingResult);
    }
}
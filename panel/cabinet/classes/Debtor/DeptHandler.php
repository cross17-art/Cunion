<?php


include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/user.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/SpamServerSender.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/Debtor/DeptHandlerInterface.php");

class DeptHandler implements DeptHandlerInterface
{

    public function GetDeptByUserId($userId)
    {
        // TODO: Implement GetDeptByUserId() method.
    }

    public function SendEmailDebtNotificationByUserId($userId)
    {
        // TODO: Implement SendEmailDebtNotificationByUserId() method.
    }

    public function NotifyTheDebtors(){
        $debtorList = $this->GetDebtorList();
        $this->SendDebtNotificationToDebtorList($debtorList);
    }

    public function SendDebtNotificationToDebtorList($debtorList){
        $result = SpamServerSender::SendActionToSpamServer('send_debtor_emails', array("debtorList" => $debtorList));
    }

    public function GetDebtorList(){
        global $conn;

        $debtorList = [];
        $query = "SELECT * FROM `users` ORDER BY `id` DESC";
        $userList = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        foreach ($userList as $userRecord){
            /**
             * @var User user;
             */

            $user = new User($userRecord['email']);
            if($user->IsDebtor()){
                $debtorList[$user->user_email] = $user->debt->GetTotalDebt();
            }
        }

        return $debtorList;
    }
}




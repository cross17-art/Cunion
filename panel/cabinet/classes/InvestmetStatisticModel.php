<?php


include ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/MasterHandler.php");

class InvestmetStatisticModel
{

    public function GetInvestmentStatistic()
    {
        return array('total_investments' => $this->GetTotalConnectedUsersInvestments() + $this->GetTotalMasterFunds(),
            'total_users_funds' => $this->GetTotalUsersFunds());
    }


    public function GetTotalConnectedUsersInvestments()
    {
        $totalInvestments = 0;
        foreach (MasterHandler::GetTotalMasterInvestments() as $masterInvestment){
            $totalInvestments = $totalInvestments + $masterInvestment['total_investment'];
        }
        return $totalInvestments;
    }

    public function GetTotalMasterFunds()
    {

        $totalMasterFunds = 0;
        foreach (MasterHandler::GetTotalMasterFunds() as $masterFund){
            $totalMasterFunds = $totalMasterFunds + $masterFund['balance'];
        }

        return $totalMasterFunds;
    }

    public function GetTotalUsersFunds()
    {
        $totalUserFunds = 0;
        foreach ($this->GetAllLastBalancesForAllUsers() as $userBalance){
            $totalUserFunds = $totalUserFunds + $userBalance['balance'];
        }
        return $totalUserFunds;
    }

    private function GetAllLastBalancesForAllUsers(){
        $query = "SELECT user_id, balance FROM 
                        (SELECT user_id, MAX(date) as max_date FROM `kucoin_balances` as tb1 GROUP by user_id) as tb1 
                            INNER JOIN (SELECT user_id as balance_user_id, date, balance FROM kucoin_balances) as kucoin_table 
                                on kucoin_table.balance_user_id = tb1.user_id and kucoin_table.date = tb1.max_date";

        global $conn;

        return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
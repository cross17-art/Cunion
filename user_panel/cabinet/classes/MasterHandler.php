<?php


class MasterHandler
{

    static function GetAllKucoinMasters(){
        global $conn;
        $result = $conn->query("SELECT user_id, email, telegram, nickname, avatar, is_master, account_type_id, need_balance, roi, rate from accounts 
                                inner join (select * from users) as tb1 on tb1.id = accounts.user_id 
                                inner join (SELECT user_id as master_user_id, need_balance, roi, rate from master_accounts) as masters_table on masters_table.master_user_id = user_id 
                                WHERE account_type_id = 2");

        $allKucoinMasters = $result->fetch_all(MYSQLI_ASSOC);

        return $allKucoinMasters;
    }


    static function GetKucoinMasterByMasterID($masterId){
        global $conn;
        $result = $conn->query("SELECT user_id, email, telegram, nickname, avatar, is_master, account_type_id, need_balance, roi, rate, using_deposit, trade_type, base_asset  from accounts 
                                inner join (select * from users) as tb1 on tb1.id = accounts.user_id 
                                inner join (SELECT user_id as master_user_id, need_balance, roi, rate, using_deposit, trade_type, base_asset from master_accounts) as masters_table on masters_table.master_user_id = user_id 
                                WHERE account_type_id = 2 AND user_id = " .$masterId);
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }


    static function GetMasterInvestmentsByMasterID($masterID){
        global $conn;
        $query = "SELECT master_id, SUM(balance) as total_investment, COUNT(balance) as followers_count FROM
            (SELECT user_id as master_id, follower_user_id as follower_id from master_accounts
                RIGHT OUTER JOIN kucoin_connections
                    on kucoin_connections.master_user_id = master_accounts.user_id) as connection_table
                    
            inner join (SELECT user_id, balance FROM
                            (SELECT user_id, MAX(date) as max_date FROM `kucoin_balances` as tb1 
                            GROUP by user_id) as tb1
            
                            INNER JOIN (SELECT user_id as balance_user_id, date, balance FROM  kucoin_balances) as kucoin_table
                                on kucoin_table.balance_user_id = tb1.user_id and kucoin_table.date = tb1.max_date) as balance_table
                on connection_table.follower_id = balance_table.user_id
            GROUP by master_id
            HAVING master_id = " . $masterID;

        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0];

    }


    static function GetTotalMasterInvestments(){
        global $conn;
        $query = "SELECT master_id, SUM(balance) as total_investment, COUNT(balance) as followers_count FROM
            (SELECT user_id as master_id, follower_user_id as follower_id from master_accounts
                RIGHT OUTER JOIN kucoin_connections
                    on kucoin_connections.master_user_id = master_accounts.user_id) as connection_table
                    
            inner join (SELECT user_id, balance FROM
                            (SELECT user_id, MAX(date) as max_date FROM `kucoin_balances` as tb1 
                            GROUP by user_id) as tb1
            
                            INNER JOIN (SELECT user_id as balance_user_id, date, balance FROM  kucoin_balances) as kucoin_table
                                on kucoin_table.balance_user_id = tb1.user_id and kucoin_table.date = tb1.max_date) as balance_table
                on connection_table.follower_id = balance_table.user_id
            GROUP by master_id";


        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);

    }


    static function GetMasterHistoryBalanceByMasterID($masterID){
        global $conn;
        $query = "SELECT date, main_user_id as user_id, user_email, balance FROM
            (SELECT * FROM kucoin_balances 
            inner join (SELECT id as main_user_id, email as user_email FROM users) as users_table 
                on users_table.main_user_id = kucoin_balances.user_id
            INNER join (SELECT account_id as master_account_id, user_id as master_user_id from master_accounts) as master_accounts_table 
                on master_accounts_table.master_user_id = users_table.main_user_id
            inner join (SELECT id as account_id, account_type_id from accounts) as accounts_table
                on master_accounts_table.master_account_id = accounts_table.account_id 
            Where accounts_table.account_type_id = 2) as TB1
            WHERE user_id = ". $masterID .";";
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }


    }

    static function GetAllMasterBalanceHistory(){
        global $conn;
        $query = "SELECT date, main_user_id as user_id, user_email, balance FROM
            (SELECT * FROM kucoin_balances 
            inner join (SELECT id as main_user_id, email as user_email FROM users) as users_table 
                on users_table.main_user_id = kucoin_balances.user_id
            INNER join (SELECT account_id as master_account_id, user_id as master_user_id from master_accounts) as master_accounts_table 
                on master_accounts_table.master_user_id = users_table.main_user_id
            inner join (SELECT id as account_id, account_type_id from accounts) as accounts_table
                on master_accounts_table.master_account_id = accounts_table.account_id 
            Where accounts_table.account_type_id = 2) as TB1";
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    static function GetAllKucoinMastersPortfolio() {

        global $conn;

        $query = "SELECT users.id as user_id , email, account_id, asset_name, asset_amount FROM `masters_portfolios` 
            inner join accounts on accounts.id = masters_portfolios.account_id
            inner join users on accounts.user_id = users.id;";

        $result = $conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    static function GetKucoinMasterPortfolio($masterID) {

        global $conn;

        $query = "SELECT users.id as user_id , email, account_id, asset_name, asset_amount, base_asset_amount FROM `masters_portfolios` 
            inner join accounts on accounts.id = masters_portfolios.account_id
            inner join users on accounts.user_id = users.id
            WHERE user_id = " . $masterID;

        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


}


<?php


class MasterAccount {
    public $type; //kucoin, binance, ftx....
    public $id;
    public $deposit;
    public $roi;
    public $creationDate;
    public $age;



    public function __construct($_type,$_id, $_deposit, $_roi, $creation_date = 0){
        $this->type = $_type;
        $this->id = $_id;
        $this->deposit = $_deposit;
        $this->roi = $_roi;
        $this->creationDate = $creation_date;
        $dif = time() - strtotime($this->creationDate);
        $days = $dif/60/60/24;
        $this->age = intval($days);

    }

    public function GetPositiveAirDropDays (){
        global $conn;
        $positiveDailyBalance = 200;
        //TODO
        $query =  "SELECT * FROM `kucoin_balances` where user_id = ". $this->user->id ." and 
                                                         balance > ". $positiveDailyBalance ."  LIMIT " . $this->age;
        $result = $conn->query($query);
        return $result->num_rows;
    }
}
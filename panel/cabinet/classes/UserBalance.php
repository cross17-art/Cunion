<?php


class UserBalance
{

    private $user;

    public function __construct(&$_user){
        $this->user = $_user;
    }

    public function GetLasKucointBalancePoint(){
        global $conn;

        $query = "SELECT * FROM `kucoin_balances` where user_id = ". $this->user->id ." ORDER BY date DESC LIMIT 1";
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC)[0]['balance'];
        } else {
            return -1;
        }
    }
}
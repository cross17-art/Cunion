<?php


class AirDropPointsBucket
{

    public function GetTotalBecomeMasterMultipliersByUserId($userId){
        $allMultiplierRecords = $this->GetAllMultiplierRecordsByUserID_Reason($userId, "be_a_trader");

        $totalMultipliers = 0;

        foreach($allMultiplierRecords as $multiplierRecord){
            $totalMultipliers = $totalMultipliers + $multiplierRecord['multiplier'];
        }

        return $totalMultipliers;
    }

    public function AddBecomeMasterPointsForUser($userId, $multipliersAmount){
        $this->AddAirdropPoints($userId, $multipliersAmount, 'be_a_trader');
    }

    private function AddAirdropPoints($userId, $points, $reason){
        global $conn;
        $query = "INSERT INTO `air_drop_bucket` (`id`, `date`, `user_id`, `multiplier`, `reason`) VALUES (NULL, current_timestamp(), '". $userId ."', '". $points ."', '". $reason ."');";
        $result = $conn->query($query);
        return $result;

    }

    private function GetAllMultiplierRecordsByUserID_Reason($userId, $reason){
        global $conn;
        $query = "SELECT * FROM air_drop_bucket where user_id = ". $userId ." and reason = '". $reason ."'";
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }


}
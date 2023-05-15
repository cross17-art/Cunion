<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/StringValidator.php");

class UserSocialHandler
{

    /**
     * @var User $user
     */

    private $user;

    public function __construct(&$_user)
    {
        $this->user = $_user;
    }


    public function GetTelegram(){
        return $this->GetSocial('telegram');
    }

    public function GetTwitter(){
        return $this->GetSocial('twitter');

    }

    public function GetVKId(){
        return $this->GetSocial('vk_id');
    }

    public function SetTelegram($telegram){
        return $this->SetSocial('telegram', $telegram);
    }

    public function SetTwitter($twitter){
        return $this->SetSocial('twitter', $twitter);
    }

    public function SetVkId($vkId){
        return $this->SetSocial('vk_id', $vkId);
    }

    private function GetSocial($socialTitle){
        global $conn;
        $query = "SELECT `". $socialTitle ."` FROM `users` where id = ". $this->user->id ."";
        $result = $conn->query($query);
        if($result->num_rows != 0){
            return $result->fetch_all(MYSQLI_ASSOC)[0][$socialTitle];
        } else {
            return null;
        }
    }

    private function SetSocial($socialRecordTitle, $socialValue){
        global $conn;
        $preparedSqlValue = $conn->real_escape_string($socialValue);
        $stringValidator = new StringValidator();
        if($stringValidator->ThreadExist($socialValue)){
            return array('status'=>'failed', 'msg'=>'thread_found', 'social_title'=>$socialRecordTitle, 'social_id'=>$preparedSqlValue);
        } else {
            if($this->SocialRecordIsUnicOrNull($socialRecordTitle, $preparedSqlValue)){
                $query = "UPDATE `users` SET `". $socialRecordTitle ."` = '". $preparedSqlValue ."' WHERE `users`.`id` = ". $this->user->id .";";
                $result = $conn->query($query);
                return array('status'=>'success', 'result'=>$result, 'social_title'=>$socialRecordTitle, 'social_id'=>$preparedSqlValue);
            } else {
                return array('status'=>'failed', 'msg'=>'record_exist_in_other_user', 'social_title'=>$socialRecordTitle, 'social_id'=>$preparedSqlValue);
            }
        }
    }

    public function SocialRecordIsUnicOrNull($socialTitle, $socialID){
        global $conn;
        $preparedSocialId = $conn->real_escape_string($socialID);
        $query = "SELECT * FROM `users` WHERE `". $socialTitle ."` = '". $preparedSocialId ."' and id <> ". $this->user->id .";";
        $result = $conn->query($query);
        if($result->num_rows == 0 || $socialID == NULL){
            //No record exist with same SocialId
            return true;
        } else {
            //Some record exist with the same record Id in other User.
            return false;
        }
    }

    public function TelegramIsSubscribed(){
        return true;
    }

    public function TwitterIsSubscribed(){
        return true;
    }

    public function VKIsSubscribed(){
        return true;
    }

    public function CalculateAmountOfSettedSocials(){
        $totalSocialAmount = 0;
        if($this->GetTelegram() != null){
            $totalSocialAmount++;
        }
        if($this->GetTwitter() != null){
            $totalSocialAmount++;
        }
        if($this->GetVKId() != null){
            $totalSocialAmount++;
        }

        return $totalSocialAmount;
    }
}
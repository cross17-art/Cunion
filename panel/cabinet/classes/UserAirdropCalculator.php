<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/UserAirdropCalculatorInterface.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TimeHandler.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/AirDropPointsBucket.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/AirDropHandler.php";

class UserAirdropCalculator implements UserAirdropCalculatorInterface
{
    /**
     * @var User $user
     */

    private $user;

    public function __construct(&$_user)
    {
        $this->user = $_user;
    }

    public function GetCTUPoints(){
        $airdrop_handler = new AirDropHandler();
        return $this->CalculateTotalPoints() * $airdrop_handler->CalculateRate();
    }

    public function CalculateRegistrationPoints()
    {
        if($this->RegistrationCondition()){
            return AirDropHandler::$registrationPoints;
        } else {
            return 0;
        }
    }

    public function CalculateVerificationPoints()
    {
        return 0;
        // TODO: Implement CalculateVerificationPoints() method.
    }

    public function CalculateApiKeysConnectionPoints()
    {
        if ($this->ApiKeysConnectedCondition()) {
            return AirDropHandler::$ApiConnectionPoints;
        } else {
            return 0;
        }
    }

    public function CalculateReferralPoints()
    {
        return $this->CalculateReferralPointsMultiplier() * AirDropHandler::$referralPoints;
    }

    public function CalculateConnectionToTraderPoints()
    {
        return $this->CalculateConnectToTraderPointsMultiplier() * AirDropHandler::$investorDailyPoints;
    }

    public function CalculateMasterPoints()
    {
        if($this->BecomeTraderCondition()){
            return $this->CalculateBecomeMasterPointsMultiplier() * AirDropHandler::$traderDailyPoints;
        }
        return 0;
    }

    public function CalculateTotalPoints()
    {
        return $this->CalculateRegistrationPoints() +
            $this->CalculateVerificationPoints() +
            $this->CalculateApiKeysConnectionPoints() +
            $this->CalculateConnectionToTraderPoints() +
            $this->CalculateMasterPoints() +
            $this->CalculateReferralPoints();
    }

    //------------------------------
    //-------- Multipliers ---------
    //------------------------------

    public function CalculateConnectToTraderPointsMultiplier(){

        $hourlyPointsList= HourlyBalancePointsModel::LoadBalancePointsByUserIdFromDB($this->user->id);
        $allConnectionIntervals = FullConnectionIntervalModel::GetAllConnectionIntervalsByFollowerId($this->user->id);
        $totalPoints = 0;
        $totalDaysMultiplier = 0;
        foreach ($allConnectionIntervals as $connectionInterval){
            /**
             * @var FullConnectionIntervalModel $connectionInterval;
             */
            $connectionInterval->CalculateUsingHourlyPoints($hourlyPointsList);
            if($connectionInterval->timerInterval > 86400 &&
                $connectionInterval->CalculateAverageBalanceForUsingHourlyPoints()>100){
                $totalDaysMultiplier = $totalDaysMultiplier + TimeHandler::GetDaysFromSeconds($connectionInterval->timerInterval);
            }
        }

        return $totalDaysMultiplier;
    }

    //-------- Become Master Points Multipliers ---------


    public function CalculateCurrentMasterPointsMultiplier(){
        if($this->user->kucoinMasterAccount != NULL){
            return $this->user->kucoinMasterAccount->GetPositiveAirDropDays();
        } else {
            return 0;
        }
    }

    public function CalculatePastMasterPointsMultiplier(){
        $airDropBitbucketHandler = new AirDropPointsBucket();
        return $airDropBitbucketHandler->GetTotalBecomeMasterMultipliersByUserId($this->user->id);
    }

    public function CalculateBecomeMasterPointsMultiplier(){

        return $this->CalculateCurrentMasterPointsMultiplier() + $this->CalculatePastMasterPointsMultiplier();
    }

    //------------- Referral Multiplier ------------
    public function CalculateReferralPointsMultiplier(){
        return $this->CalculateApiConnectedReferrals();
    }

    //------------------------------
    //-------- Conditions ----------
    //------------------------------

    public function RegistrationCondition()
    {
        if($this->user->isVerified() && $this->user->socials->CalculateAmountOfSettedSocials() >= 2){
            return true;
        } else {
            return false;
        }
    }

    public function ApiKeysConnectedCondition()
    {
        if (isset($this->user)) {
            if ($this->user->ApiKeysAreConnected()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function ConnectToTraderCondition()
    {
        if($this->AppropriateConnectionIntervalExist()){
            return true;
        } else {
            return false;
        }
    }

    public function BecomeTraderCondition(){
        if($this->CalculateBecomeMasterPointsMultiplier() > 0){
            return true;
        }
        return false;
    }

    public function ReferralCondition()
    {
        if($this->CalculateReferralPointsMultiplier() > 0){
            return true;
        } else {
            return false;
        }
    }


    //----- Private Methods -----------

    private function CalculateApiConnectedReferrals(){
        $userList = $this->user->GetReferralUserList();
        $connectedReferralsCount = 0;
        foreach ($userList as $referralUser) {
            /**
             * @var User $referralUser
             */

            if($referralUser->ApiKeysAreConnected()){
                $connectedReferralsCount++;
            }
        }
        return $connectedReferralsCount;
    }

    private function AppropriateConnectionIntervalExist()
    {
        /*
         *The appropriate connection interval is the interval where the time connected in more than 1 day (86400 sec
         *And the average balance is more than 100$
         */
        $hourlyPointsList= HourlyBalancePointsModel::LoadBalancePointsByUserIdFromDB($this->user->id);
        $allConnectionIntervals = FullConnectionIntervalModel::GetAllConnectionIntervalsByFollowerId($this->user->id);
        foreach ($allConnectionIntervals as $connectionInterval){
            /**
             * @var FullConnectionIntervalModel $connectionInterval;
             */
            $connectionInterval->CalculateUsingHourlyPoints($hourlyPointsList);
            if($connectionInterval->timerInterval > 86400 &&
                $connectionInterval->CalculateAverageBalanceForUsingHourlyPoints()>100){
                return true;
            }
        }
        return false;
    }

}
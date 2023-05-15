<?php


interface UserAirdropCalculatorInterface
{
    public function CalculateRegistrationPoints();
    public function CalculateVerificationPoints();
    public function CalculateApiKeysConnectionPoints();
    public function CalculateConnectionToTraderPoints();
    public function CalculateMasterPoints();
    public function CalculateReferralPoints();
    public function CalculateTotalPoints();
}
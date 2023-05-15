<?php


class TimeHandler
{
    public static function SecondsToFormatInterval($seconds): string
    {

        if($seconds != NULL){
            $dtF = new DateTime('@0');
            $dtT = new DateTime("@$seconds");
            return $dtF->diff($dtT)->format('%a days %hh %im %ss');
        } else {
            return "...";
        }

    }

    public static function GetDaysFromSeconds($seconds)
    {
        return intdiv($seconds, 86400);
    }
}
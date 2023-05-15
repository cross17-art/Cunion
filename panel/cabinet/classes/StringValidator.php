<?php


/**
 * @var $conn;
 * Class StringValidator
 */

class StringValidator
{

    public $specSymbolArray;
    public $threadStrings = [];

    public function __construct()
    {
        $excludeSymbol = '$#(){}<>?\'"/\\=*%`';
        $this->specSymbolArray = str_split($excludeSymbol, 1);
    }

    public function InjectionExist($string)
    {
        global $conn;
        if($conn->real_escape_string($string) != $string){
            return true;
        } else {
            return false;
        }
    }

    public function TagsExist($string){
        if(strip_tags($string) != $string){
            return true;
        } else {
            return false;
        }
    }

    public function ThreadSymbolExist($string){
        foreach ($this->specSymbolArray as $threadSymbol){
            if(strpos($string, $threadSymbol) !== false){
                return true;
            }
        }
        return false;
    }

    public function ThreadExist($string){
        if($this->InjectionExist($string) ||
            $this->TagsExist($string) ||
            $this->ThreadSymbolExist($string)){
            return true;
        } else {
            return false;
        }
    }

    public function ThreadExistInArray($arrayOfStrings){
        foreach ($arrayOfStrings as $string){
            if($this->ThreadExist($string)){
                $this->threadStrings[] = $string;
                return true;
            }
        }
        return false;
    }


    public function ShowAllThreadSymbols(){
        foreach ($this->specSymbolArray as $threadSymbol){
            echo ($threadSymbol);
        }
    }

}

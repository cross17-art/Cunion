<?php
//use TransactionModel;
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TransactionModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/UserTransactionsInterface.php");

class UserTransactions implements UserTransactionsInterface
{

    public $userId;

    public function __construct($_userId)
    {
        $this->userId = $_userId;
    }


    public function GetLastTransaction()
    {
        $completedTransactionList = TransactionModel::GetAllCompletedTransactionsByUserId($this->userId);
        return $completedTransactionList[count($completedTransactionList)-1];
    }

    public function GetAllCompletedTransactions(){
        return TransactionModel::GetAllCompletedTransactionsByUserId($this->userId);
    }

    public function GetTotalCompletedTransactionsSum(){
        $completedTransactionList = TransactionModel::GetAllCompletedTransactionsByUserId($this->userId);
        $totalSum = 0;
        foreach ($completedTransactionList as $completedTransaction){
            $totalSum = $totalSum + $completedTransaction['amount'];
        }
        return $totalSum;
    }
}
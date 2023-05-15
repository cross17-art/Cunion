<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TransactionModel.php");

$txn_id = $_GET['txn_id'];

echo TransactionModel::CheckTxTransactionById($txn_id);


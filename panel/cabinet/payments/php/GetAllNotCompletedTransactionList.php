<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TransactionModel.php");


$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

$conn = new mysqli($servername, $username, $password, $database);

echo json_encode(TransactionModel::GetAllNotCompletedTransactionList());

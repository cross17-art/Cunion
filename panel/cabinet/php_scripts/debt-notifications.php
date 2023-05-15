<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/Debtor/DeptHandler.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

//mark api key required
echo ("sending the notifications");
$dept_handler = new DeptHandler();

echo ("<br>");
var_dump($dept_handler->GetDebtorList());
echo ("<br>");
$dept_handler->NotifyTheDebtors();

?>
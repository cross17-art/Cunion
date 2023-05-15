<?php


session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";
//
//$servername = "localhost";
//$username = "trd_db_user";
//$password = "trd_db_pass01";
//$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SESSION['logged'] && $_SESSION['user_email'] == 'Wyde90@gmail.com') {
    echo("hi user");
    $lastBalanceArray = GetBalanceForLast7Days();
    $averageBalances = CalculateAverageBalances($lastBalanceArray);
    SaveAverageBalancesToDB($averageBalances);
} else {
    echo("incorrect user");
}

function GetBalanceForLast7Days()
{
    global $conn;
    $query = "SELECT * FROM `kucoin_balances`  WHERE date >= DATE(NOW() - INTERVAL 7 DAY)";
    $result = $conn->query($query);
    if ($result->num_rows != 0) {
        $balanceRecords = $result->fetch_all(MYSQLI_ASSOC);
    }

    $lastBalances = [];

    foreach ($balanceRecords as $balanceRecord) {
        $user_id = $balanceRecord['user_id'];
        $balance = $balanceRecord['balance'];
        $lastBalances[$user_id][] = $balance;
    }

    return $lastBalances;
}

function CalculateAverageBalances($balanceArrays)
{
    $averageBalances = [];
    foreach ($balanceArrays as $key => $value) {
        $userId = $key;
        $lastBalanceArray = $value;
        $sumBalance = 0;
        $length = 0;
        echo($userId . ':');
        var_dump($lastBalanceArray);
        echo('<div style="border: 2px solid red"></div>');

        foreach ($lastBalanceArray as $balance) {
            $length += 1;
            $sumBalance += $balance;
        }
        $averageBalances[$userId] = $sumBalance / $length;
    }

    var_dump($averageBalances);
    return $averageBalances;
}


function SaveAverageBalancesToDB($averageBalances)
{
    foreach ($averageBalances as $key => $value) {
        $userId = $key;
        $averageBalance = $value;
        PasteBalanceRecordToDB($userId, $averageBalance);
    }
}

function PasteBalanceRecordToDB($userId, $averageBalance)
{
    global $conn;
    $query = "INSERT INTO `kucoin_average_balances` (`id`, `date`, `average_balance`, `user_id`) VALUES (NULL, current_timestamp(), " . $averageBalance . ", " . $userId . ");";
    var_dump($query);
    $conn->query($query);
}
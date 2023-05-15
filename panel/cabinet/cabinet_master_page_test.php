<?php
session_start();


if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}


include("classes/user.php");
include("classes/MasterHandler.php");

$user = new User($_SESSION['user_email']);


$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!is_numeric($_GET['master-id']) == true){
    echo ("Non correct master ID");
    die;
}

$master = MasterHandler::GetKucoinMasterByMasterID_test($_GET['master-id']); //TODO sql injection danger
$masterId = $master['user_id'];
$masterEmail = $master["email"];
$rate = $master['rate'];
$usingDeposit = $master['using_deposit'];
$minDeposit = $master['need_balance'];
$tradeType = $master['trade_type'];
$baseAsset = $master['base_asset'];
$dsr = $master['short_description'];
$dif = time() - strtotime($master['master_account_date_creation']);
$days = $dif / 60 / 60 / 24;
$user->GetConnections('kucoin');
$connection = $user->GetConnectionByMasterID('kucoin', $masterId);
var_dump($master);
$masterPortfolio = MasterHandler::GetKucoinMasterPortfolio($masterId);
//Calculate percentages
$totalBalanceInUSDT = 0;
foreach ($masterPortfolio as $asset) {
    $totalBalanceInUSDT = $totalBalanceInUSDT + $asset["asset_amount"];
}


$allColors = ["#3f80ea", "#d9534f", "#4bbf73", "#ec9c13", "#d9534f"];
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
?>

<html lang="en">
<?php include("header.php") ?>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

</html>
<style>
    .trade-amount {
        width: 80%;
        float: left;
        padding: 10px 13px 10px 0px;
    }

    .bot-enable-toggle {
        margin-left: 7px;
    }
</style>

<script src="js/verification_script.js"></script>


<script>
    SetScaleBlockLang = (eng) => {
        if (eng === "eng") {
            document.querySelector("[scale-info][lng=eng]").style.display = "block"
            document.querySelector("[scale-info][lng=rus]").style.display = "none"
        }
        if (eng === "rus") {
            document.querySelector("[scale-info][lng=eng]").style.display = "none"
            document.querySelector("[scale-info][lng=rus]").style.display = "block"
        }

    }
</script>

<script src="js/date_handler.js"></script>
<script src="js/bot_control.js"></script>
<script src="js/master_page/load_master_investments.js"></script>
<script src="js/master_page/load_master_balance_history.js"></script>
<script src="js/master_page/load_master_transfers.js"></script>
<script src="js/master_page/load_master_orders_history.js"></script>
<script src="js/master_page/icon_displayer.js"></script>


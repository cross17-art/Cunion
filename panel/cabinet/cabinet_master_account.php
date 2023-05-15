<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] ."/panel/cabinet/classes/user.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/panel/cabinet/classes/MasterHandler.php";
include_once $_SERVER['DOCUMENT_ROOT']. "/panel/cabinet/classes/TraderTransactionHandler.php";

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

if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

$coinIcon = '<i class="align-middle me-2 fas fa-fw fa-coins"></i>';
?>


<?php
$masterId = $user->id;
$masterEmail = $user->user_email;
$master = MasterHandler::GetKucoinMasterByMasterID($masterId);
$masterPortfolio = MasterHandler::GetKucoinMasterPortfolio($masterId);
$totalBalanceInUSDT = 0;
foreach ($masterPortfolio as $asset) {
    $totalBalanceInUSDT = $totalBalanceInUSDT + $asset["asset_amount"];
}
$allColors = ["#3f80ea", "#d9534f", "#4bbf73", "#ec9c13", "#d9534f"];

$traderTransactionHandler = new TraderTransactionHandler();
$transactionList = $traderTransactionHandler->GetAllTraderTransactionRecordsByUserId($user->id);

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
<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="master_account_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?= $user->kucoinMasterAccount == null ? "Become Trader Account" : "You are the Trader already" ?></h5>
                            <?php if ($user->kucoinMasterAccount !== null) { ?>

                                <?php include $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/cabinet_master_account_parts/young_master_notification.php"?>
                                <button type="button" class="btn btn-danger my-1" data-bs-toggle="modal" data-bs-target="#defaultModalDanger">
                                    Stop being Trader
                                </button>
                                <div class="modal fade" id="defaultModalDanger" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove treader account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <p class="mb-0">Please note: All you balance history and the order history will be removed when you remove your trader account</p>
                                                <p>Your Positive AirDrop Days: <span class="badge badge-soft-info" style="font-size: 15px"> <?= $user->kucoinMasterAccount->GetPositiveAirDropDays() ?> </span>
                                                    You earn:<span class="badge badge-soft-info" style="font-size: 15px">+<?=  $user->airdropCalculator->CalculateCurrentMasterPointsMultiplier() . $coinIcon ?></span> CTU coins </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="stop_master" class="btn btn-danger"
                                                        style="display: block;"
                                                        onclick="StopMaster(<?= $user->id ?>)">
                                                    <i class="fas fa-times"></i> Remove Trader Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                        <?php if ($user->kucoinMasterAccount == null) { ?>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Please input your strategy specifications</h5>
                                            <?php
                                                if($user->GetAccountID('kucoin') != null){
                                                    echo '<h5 class="card-title mb-0"><span class="badge badge-soft-info" style="margin-top: 5px;">Your account is connected to Kucoin</span></h5>';
                                                } else {
                                                    echo '<h5 class="card-title mb-0" style="margin-top: 15px;margin-bottom: 15px !important;"><span class="badge-soft-danger" style="margin-top: 25px !important;">Your account is not connected. Please connect the api Keys First</span></h5>';
                                                    $connectionIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle"> <circle cx="18" cy="5" r="3"></circle> <circle cx="6" cy="12" r="3"></circle> <circle cx="18" cy="19" r="3"></circle> <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line> <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>';
                                                    echo '<a href="https://cunion.io/panel/cabinet/cabinet_accounts">
                                                            <button class="btn btn-warning" ya-goal="goal-modal-connect-keys-button">'. $connectionIcon .' Connect Keys</button>
                                                         </a>';
                                                }
                                            ?>


                                        </div>

                                        <?php
                                            if($user->GetAccountID('kucoin') != null){
                                                include ("cabinet_master_account_parts/master_account_form.php");
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Trader Portfolio <?= ToolTip::DrawToolTip('Портфель активов трейдера') ?></h5>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($user->kucoinMasterAccount !== null) {
                                include("master_page_partial_views/master_portfolio_table.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Trader Order History <?= ToolTip::DrawToolTip('История торговых операций трейдера') ?></h5>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($user->kucoinMasterAccount !== null) {
                                include("master_page_partial_views/master_order_history.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("footer.php") ?>
    </div>
</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<!---->
</body>
</html>



<style>
    i.fa-question-circle.trd_tooltip {
        font-size: 15px;
        color:#a9acb3;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if(document.querySelector('#submit_master_specifications') != null){
            document.querySelector('#submit_master_specifications').addEventListener('click', function (event) {
                event.preventDefault();
                console.log("Master specifications submitted");
                SubmitMasterSpecification()
            })
        }
    })
</script>


<script src="js/verification_script.js"></script>
<script src="js/submit_master_script.js?<?= filemtime('js/submit_master_script.js') ?>"></script>
<script src="js/master_page/load_master_orders_history.js?<?= filemtime("js/master_page/load_master_orders_history.js") ?>"></script>
<script src="js/master_page/icon_displayer.js"></script>
<script src="js/date_handler.js"></script>
<script src="cabinet_master_account_parts/js/trader_withdrawal_handler.js"></script>
<script src="js/notification_handler.js"></script>



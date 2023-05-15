<?php


include ("classes/MasterHandler.php");

include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/MasterHandler.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/InvestmentsStatisticModel.php");

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

$allKucoinMasters = MasterHandler::GetAllKucoinMasters();
$serviceInvestmentStatisticModel = new InvestmentsStatisticModel();
$serviceInvestments = $serviceInvestmentStatisticModel->GetInvestmentStatistic();


?>

<link href="css/master_info.css?<?= filemtime('css/master_info.css') ?>" rel="stylesheet" />

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
    <div class="main" page="main_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <?php include ("cabinet_main_parts/instruction_notification.php") ?>
                <?php include ("cabinet_main_parts/service_statistics.php")?>
                <?php include ("cabinet_main_parts/masters_table.php") ?>

            </div>
        </main>

        <?php include ("footer.php") ?>
    </div>

</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<?php include('cabinet_main_parts/connection_keys_modal.php') ?>

<!--master popup-->

<div master-popup style="display:none;">
    <div popup-container class="bg-light border">
        <div popup-bars-chart>
               <canvas id="popup-bars-canvas" class="zoom-125"> </canvas>
        </div>
        <div popup-additional-block>
            <div popup-pie-chart>
                <canvas id="popup-pie-canvas" class="zoom-125"> </canvas>
            </div>
            <div popup-action-block>
<!--                <button style="margin: auto" class="btn btn-outline-success">Action 1</button>-->
<!--                <button style="margin: auto" class="btn btn-outline-info">Action 2</button>-->

            </div>
        </div>
    </div>
</div>





<style>
    [master-popup]{
        /*border: 2px solid red;*/
        width: 735px;
        height: 260px;
        display: block;
        position: absolute;
        transition: opacity 1s;
        opacity: 0;
        background-image: linear-gradient(to right,#46bdf4 0%,#2b56f5 100%);
        padding: 2px;
        border-radius: 10px;
    }

    [popup-container]{
        /*border: 2px solid red;*/
        width: 731px;
        height: 256px;
        display: block;
        position: absolute;
        border-radius: 10px;
    }

    [popup-bars-chart]{
        /*border: 2px solid blue;*/
        display: block;
        float: left;
        width: 66%;
        height: 100%;
        padding-top: 25px;
        padding-bottom: 10px;
        padding-left: 10px;
    }

    [popup-pie-chart]{
        /*border: 2px solid blue;*/
        display: block;
        width: 100%;
        float: left;
        height: 66%;
    }

    [popup-additional-block]{
        /*border: 2px solid red;*/
        width: 33%;
        display: block;
        float: left;
    }

    [popup-action-block]{
        /*border: 2px solid yellow;*/
        display: flex;
        padding: 20px;
    }

</style>

<style>
    .trd_roi_stat {
        width: 250px;
        margin: auto;
        margin-bottom: 10px;
        font-size: 13px;
    }

    .trd_roi_stat_block {
        display: block;
        float: left;
        margin-right: -60px;

    }

    .table_roi_icon {
        margin-right: 5px;
        float: left;
    }

    .arrow-slow {

    }

    .roi_period {
        font-size: 12px;
        margin-left: -15px;
        margin-top: 0px;
        margin: auto;
    }

    [down-arrow]{
        transform: scale(1.3) !important;
        color: #898e99

    }

    @media screen and (min-width: 768px) {
        [master-template-tr]{
            height: 145px;
        }
    }

    [indicator].profitable {
        color: #4bbf73;
    }

    [indicator].marginal {
        color: #d9534fc7;
    }

    [roi-indicator-template_BTC] > [indicator].profitable {
        color: #f0ad4e;
    }

    [roi-indicator-template_BTC] > [indicator].marginal {
        color: #d9534fc7;
    }

    [indicator].profitable > [indicator-upper-arrow]{
        display: block;
    }

    [indicator].profitable > [indicator-down-arrow]{
        display: none;
    }

    [indicator].marginal > [indicator-upper-arrow]{
        display: none;
    }

    [indicator].marginal > [indicator-down-arrow]{
        display: block;
    }

    .trader-characteristics{
        margin-top: 10px;
    }

    .badge-icon{
        width: 15px;
        height: 12px;
        margin-right: 2px !important;
        margin-left: 2px;
    }

</style>

<script>
    let master_TR_Element = document.querySelector("tr[master-template-tr][master-id='" + masterId + "']");
</script>

<!---->
</body>
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

    i.fa-question-circle.trd_tooltip {
        font-size: 15px;
        color: #a9acb3;
    }

</style>

<script src="js/date_handler.js"></script>
<script src="js/verification_script.js"></script>
<script src="js/load_service_kucoin_statistic.js"></script>
<script src="js/bot_control.js"></script>
<script src="js/submit_master_script.js"></script>
<script src="js/master_page/load_master_transfers.js?<?= filemtime('js/master_page/load_master_transfers.js') ?>"></script>
<script src="js/master_page/RoiBarCalculator.js?<?= filemtime("js/master_page/RoiBarCalculator.js") ?>"></script>
<script src="js/roi_indicator.js?"<?= filemtime('js/master_page/roi_indicator.js') ?>></script>
<script src="js/ROI_ratio_calculator.js?"<?= filemtime('js/ROI_ratio_calculator.js') ?>></script>
<script src="js/load_masters_balance_history.js?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/js/load_masters_balance_history.js") ?>"></script>
<script src="js/Master.js?<?= filemtime('js/Master.js') ?>"></script>
<script src="js/chart_gradient.js?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/js/chart_gradient.js") ?>"></script>
<script src="js/load_masters_portfolio.js?<?= filemtime('js/load_masters_portfolio.js') ?>"></script>
<script src="js/load_master_invest_actives.js"></script>
<script src="js/master_popup.js?<?= filemtime('js/master_popup.js') ?>"></script>
<script src="js/ticker_socket_connection.js?<?= filemtime('js/ticker_socket_connection.js') ?>"></script>
<script src="js/master_table_sort.js"></script>
<script src="js/cabinet_main_js.js"></script>
<script src="../../front_js/cookie_handler.js"></script>
<script src="js/language.js"></script>


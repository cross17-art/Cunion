<?php

include("classes/user.php");
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
</style>

<script src="js/date_handler.js"></script>
<script src="js/verification_script.js"></script>
<script src="js/load_service_kucoin_statistic.js"></script>
<script src="js/bot_control.js"></script>
<script src="js/submit_master_script.js"></script>
<script src="js/master_page/load_master_transfers.js"></script>
<script src="js/load_masters_balance_history_v2.js"></script>
<script src="js/load_masters_portfolio_v2.js"></script>
<script src="js/load_master_invest_actives.js"></script>
<script src="js/master_popup.js"></script>
<script src="js/master_table_sort.js"></script>







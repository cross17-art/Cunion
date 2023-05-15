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

if (!is_numeric($_GET['master-id']) == true) {
    echo("Non correct master ID");
    die;
}

$master = MasterHandler::GetKucoinMasterByMasterID($_GET['master-id']); //TODO sql injection danger

if ($master == null) {
    include('master_page_partial_views/no_master_page.php');
    die();
}

$upArrow = '<svg style="color: #4bbf73" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up align-middle me-2 badge-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>';
$downArrow = '<svg style="color: #d9534f" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down align-middle me-2 badge-icon"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>';

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
$tradeDirection = $master['trade_direction'];
$tradeType = $master['trade_type'];

$user->GetConnections('kucoin');
$connection = $user->GetConnectionByMasterID('kucoin', $masterId);

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
<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="master_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-6 col-xl-4 col-xxl-3">
                        <div class="card mb-3 trade-dsr-block">
                            <div class="card-header">
                                <div class="row">
                                    <div followers statistic style="display: none; font-size: 1.3em">
                                        <span style="font-size: 12px"> Age(days): <?= intval($days) ?> </span>
                                        <div class="trd_tooltip" style="float: right">
                                            <i class="align-middle me-2 fas fa-fw fa-users" style="width: 25px;"></i>
                                            <span users_count class="align-middle">0</span> <span
                                                    class="trd_tooltiptext"
                                                    style="font-size: 0.7em">Total investors</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <?php if ($user->IsConnectedToMaster("kucoin", $masterId)) { ?>
                                            <div class="input-group mb-3"
                                                 style="margin: 0 auto 0 auto !important; width: max-content;">
                                                <span class="badge bg-info"
                                                      style="height:30px; width: 100px; font-size: 0.8rem; padding-top: 10px;">Connected</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center trd-main-info-block">
                                <h5 class="card-title mb-0" style="margin-bottom:10px !important; color: #3266bb; font-size: 18px"><?= $master['nickname'] ?></h5>

                                <div>
                                <?php
                                    if($master['telegram'] != null){
                                        include("master_page_partial_views/master_message_button.php");
                                    }
                                ?>
                                </div>

                                <div rating style="margin-top: 5px; margin-bottom: 5px; display: none" >
                                    <?= $rate . "  " ?><?php
                                    $intRate = intval($rate);
                                    $rest = $rate - $intRate;
                                    for ($i = 0; $i < $intRate; $i++) {
                                        echo('<i class="align-middle me-2 fas fa-fw fa-star"></i>');
                                    }
                                    if ($rest != 0) {
                                        echo('<i class="align-middle me-2 fas fa-fw fa-star-half-alt"></i>');
                                    }
                                    if ($rate == 0) {
                                        echo('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star align-middle me-2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>');
                                    }
                                    ?>
                                </div>

                                <img src="source/master_icons/crypto_man.png" alt="Stacie Hall"
                                     class="img-fluid rounded-circle mb-2" width="128" height="128">

                                <div style="padding-bottom: 10px"></div>


                                <div investments statistic style="display: none">
                                    <div>
                                        <div class="input-group mb-3 trd_tooltip"
                                             style="display: block; width: fit-content; margin-top: 20px; margin: auto ">
                                                <span total_investment class="input-group-text"
                                                      style="font-size: 16px;"> 0 USDT </span> <span
                                                    class="trd_tooltiptext">Total Investments</span>
                                        </div>
                                    </div>
                                </div>

                                <div exchange-point class="trd_tooltip" style="margin-bottom: 10px">
                                    <img src="https://assets.staticimg.com/cms/media/1lB3PkckFDyfxz6VudCEACBeRRBi6sQQ7DDjz0yWM.svg">
                                    <!--                                    <span class="trd_tooltiptext">Using exchange point</span>-->
                                    <?php
                                    $baseAssetIcon = "https://assets-currency.kucoin.com/60c34ba0db892b0006d7b0ec_USDT.png";
                                    if ($baseAsset == "USDT") {
                                        $baseAssetIcon = "https://assets-currency.kucoin.com/60c34ba0db892b0006d7b0ec_USDT.png";
                                    }
                                    if ($baseAsset == "BTC") {
                                        $baseAssetIcon = "https://assets-currency.kucoin.com/60bf8a90db892b0006d73786_BTC.png";
                                    }
                                    ?>


                                    <img style="margin-left: 5px;width: 20px;" class="coin_icon" src="<?= $baseAssetIcon ?>">
                                </div>

                                <div>

                                    <?php
                                    include("master_page_partial_views/connection_button.php");
                                    $connectionButton = new ConnectionButton($user, $masterId, $masterEmail);
                                    $connectionButton->RenderModalLayout();
                                    ?>

                                </div>

                                <style>
                                    .connect-to-master-button {
                                        width: 250px;
                                        font-size: 15px;
                                    }
                                </style>
                            </div>

                            <div class="trader-characteristics" style="display: none">
                                <span class="badge badge-soft-info trd_tooltip" style="">Minimum Deposit: <?= $minDeposit ?> USDT<span class="trd_tooltiptext">Minimum required deposit for success tradeing</span></span>
                            </div>

                            <div class="trader-characteristics" style="display: none">
                                <span class="badge badge-soft-info trd_tooltip" spot-label>spot<span class="trd_tooltiptext">Тип рынка</span></span>

                                <?php

                                $tradeTypeTooltip = "";
                                if ($tradeType == "bot") {
                                    $tradeTypeTooltip = "Стратегия под автоматическим управлением бота";
                                } else if ($tradeType == "manual") {
                                    $tradeTypeTooltip = "Ручная торговля";
                                }
                                $badge_class_TradeType = "badge-soft-warning";

                                $badge_class_TradeDirection = "";
                                $direction_value = "";
                                $directionTooltip = "";
                                if ($tradeDirection == "long") {
                                    $badge_class_TradeDirection = "badge-soft-success";
                                    $direction_value = $tradeDirection . $upArrow;
                                } else if ($tradeDirection == "short") {
                                    $badge_class_TradeDirection = "badge-soft-danger";
                                    $direction_value = $tradeDirection . $downArrow;
                                } else if ($tradeDirection == "S/L") {
                                    $badge_class_TradeDirection = "badge-soft-info";
                                    $direction_value = $downArrow . $tradeDirection . $upArrow;
                                    $directionTooltip = "Смешаный тип. Как на Лонг, так и на Шорт";
                                }
                                ?>


                                <span class="badge trd_tooltip <?= $badge_class_TradeType ?>" trade-type="<?= $tradeType ?>"><?= $tradeType ?>
                                    <span class="trd_tooltiptext"><?= $tradeTypeTooltip ?></span>
                                </span>

                                <span class="badge trd_tooltip <?= $badge_class_TradeDirection ?>" trade-direction="<?= $tradeDirection ?>"><?= $direction_value ?>
                                    <?php if ($tradeDirection != 'short' && $tradeDirection != 'long') { ?>
                                        <span class="trd_tooltiptext">
                                            <?= $directionTooltip ?>
                                        </span>
                                    <?php } ?>
                                </span>
                            </div>

                            <hr class="my-0">

                            <?php include ("master_page_partial_views/statistic_card.php") ?>

                            <hr class="my-0">
                            <div class="card-body">
                                <div trede-info>
                                    <div class="row" style="margin-left: -5px; margin-right: 3px">
                                        <div class="text-center card bg-light border" style="height: 200px; overflow: overlay">
                                            <span>Description:</span>
                                            <span><?= $dsr ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr class="my-0">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title mb-0 text-mobile" style="display: inline-block;">Trader Transfers</h5>
                                    <button type="button" class="btn btn-primary my-1" style="display: inline-block; float: right; margin-top: -10px !important; margin-left: 20px !important;" data-bs-toggle="modal" data-bs-target="#transfersModel">
                                        Show All Transfers
                                    </button>
                                    <div class="modal fade show" id="transfersModel" tabindex="-1" aria-modal="true" role="dialog">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">All transfers</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body m-3">
                                                    <table class="table table-striped table-sm"
                                                           style="font-size: 12px; text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th class="text-center">Asseet</th>
                                                            <th class="text-center">Amount</th>
                                                            <th class="text-center">Funds</th>
                                                            <th class="text-center">BTC Funds</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody full-transfer-table-body>
                                                        <tr full-transfer-template style="display: none">
                                                            <td transfer-date>21.23.12</td>
                                                            <td transfer-asset-name class="text-center">XMR</td>
                                                            <td transfer-asset-amount class="text-center">-10</td>
                                                            <td transfer-funds class="text-center">-100</td>
                                                            <td transfer-btc-funds class="text-center">-100</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div trede-info>
                                    <div class="row" style="padding: 10px">
                                        <table class="table table-striped table-sm"
                                               style="font-size: 12px; text-align: center">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th class="text-center">Asseet</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Funds</th>
                                            </tr>
                                            </thead>
                                            <tbody transfer-table-body>
                                            <tr transfer-template style="display: none">
                                                <td transfer-date>21.23.12</td>
                                                <td transfer-asset-name class="text-center">XMR</td>
                                                <td transfer-asset-amount class="text-center">-10</td>
                                                <td transfer-funds class="text-center">-100</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <style>
                                .trd_stat {
                                    margin-right: 7px;
                                    margin-left: 7px;
                                    width: 45% !important;
                                }
                            </style>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-8 col-xxl-9">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Trader ROI</h5>
                                <h6 class="card-subtitle text-muted">Here you can see the Traders ROI</h6>
                            </div>
                            <div class="card-body inner-chart" style="height: 440px">
                                <div class="chart-container " style="position: relative; height:300px; width:80%">
                                    <canvas id="chartjs-line-roi" class="chartjs-render-monitor zoom-125"
                                            style="display: block;"></canvas>
                                    <div class="custom-chart-dates" style="width: 125%">
                                        <span balance-roi-line-date-1 style="float: left"></span>
                                        <span balance-roi-line-date-2 style="float: right"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Roi per last 30 days</h5>
                            </div>
                            <div class="card-body inner-chart d-flex w-100" style="height: 300px">
                                <div class="chart-container " style="position: relative; height: 180px; width:80%">
                                    <canvas id="roi_bars_chart" class="zoom-125"></canvas>
                                    <div class="custom-chart-dates" style="width: 125%">
                                        <span roi-bars-date-1 style="float: left"></span>
                                        <span roi-bars-date-2 style="float: right"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Trader Balance</h5>
                                <h6 class="card-subtitle text-muted">Here you can see the history of the trader
                                    balance</h6>
                            </div>
                            <div class="card-body inner-chart" style="height: 440px">
                                <div class="chart-container " style="position: relative; height:300px; width:80%">
                                    <canvas id="chartjs-line" class="chartjs-render-monitor zoom-125"
                                            style="display: block;"></canvas>
                                    <div class="custom-chart-dates" style="width: 125%">
                                        <span balance-line-date-1 style="float: left"></span>
                                        <span balance-line-date-2 style="float: right"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Portfolio</h5>

                    </div>

                    <?php include("master_page_partial_views/master_portfolio_table.php"); ?>

                </div>
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Order History</h5>
                        <span>Last 20 orders</span>
                        <button type="button" style="float:right" class="btn btn-primary my-1"
                                data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
                            View All History
                        </button>

                        <div class="modal fade" id="defaultModalPrimary" tabindex="-1" style="display: none;"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Trades Order History </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>

                                    <?php include("master_page_partial_views/master_order_history.php"); ?>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include("master_page_partial_views/public_master_order_history.php"); ?>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>

<?php include('cabinet_main_parts/connection_keys_modal.php') ?>


<style>
    @media screen and (min-width: 768px) {
        .trd_modal_content {
            width: 800px;
        }

        .trd_iframe {
            width: 560px;
            height: 315px;
        }
    }

    @media screen and (max-width: 768px) {
        .trd_iframe {
            width: 280px;
            height: 200px;

        }
    }
</style>

<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
<!--<script>-->

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

<script src="js/verification_script.js"></script>

<style>
    [total_investment] {
        color: #4bbf73;
        background-color: #4bbf732d;
    }


    .mini-statistics-table {
        font-size: 14px;
    }

    .mini-statistics-table > * > * > th {
        padding: 10px 5px 10px 5px;
        font-weight: 100;
        font-size: .825rem;
    }

    .mini-statistics-table > tbody > tr > td {
        padding: 10px 2px 10px 2px;

    }

    .mini-statistics-table > tbody > tr > td > span {
        padding-top: 5px;
    }

    .roi-chart-date-tooltip {
        position: absolute;
        font-size: 13px;
        width: 125%;
        bottom: -80px;
        text-align: center;
    }


    .trader-characteristics{
        display: block !important;
        margin-top: 5px;
        margin-bottom: 5px;
        text-align: center;
    }

    .badge-icon{
        width: 15px;
        height: 15px;
        margin-right: 2px !important;
        margin-left: 2px;
    }

    .trader-characteristics > .badge{
        font-size: 15px;
        padding: 8px;
        margin: 5px;
    }


    .hudge-badge{
        font-size: 12px;
    }

    @media screen and (max-width: 768px) {
        .mini-statistics-table > tbody > tr > td {
            font-size: 10px !important;
        }

        .hudge-badge{

        }

        .chart-container{
            height: 150px !important;
        }

        .inner-chart{
            height: 220px !important;
        }

        .custom-chart-dates{
            position: relative;
            top: -15px;
        }

        .roi-chart-date-tooltip {
            bottom: -45px;0
        }

        .trd-main-info-block{
            height: 400px;
        }

        .text-mobile {
            font-size: 12px;
        }

    }

    @media screen and (min-width: 768px){
        .trade-dsr-block{
            height: 1422px;
        }

        .trd-main-info-block{
            height: 340px;
        }
    }
</style>


<script src="js/date_handler.js"></script>
<script src="js/bot_control.js"></script>
<script src="js/roi_indicator.js?<?= filemtime('js/roi_indicator.js') ?>"></script>
<script src="js/master_page/load_master_investments.js?<?= filemtime("js/master_page/load_master_investments.js") ?>"></script>
<script src="js/chart_gradient.js?<?= filemtime($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/js/chart_gradient.js") ?>"></script>
<script src="js/master_page/RoiBarCalculator.js?<?= filemtime("js/master_page/RoiBarCalculator.js") ?>"></script>
<script src="js/ROI_ratio_calculator.js?<?= filemtime("js/ROI_ratio_calculator.js") ?>"></script>
<script src="js/master_page/load_master_balance_history.js?<?= filemtime("js/master_page/load_master_balance_history.js") ?>"></script>
<script src="js/master_page/load_master_transfers.js?<?= filemtime("js/master_page/load_master_transfers.js") ?>"></script>
<script src="js/master_page/load_master_orders_history.js?<?= filemtime("js/master_page/load_master_orders_history.js") ?>"></script>
<script src="js/master_page/master_statistic_model.js?<?= filemtime("js/master_page/master_statistic_model.js") ?>"></script>
<script src="js/master_page/icon_displayer.js"></script>
<script src="js/language.js"></script>
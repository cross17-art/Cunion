<?php
session_start();


if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/client/cabinet/sign_in_form.php"</script>
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

$master = MasterHandler::GetKucoinMasterByMasterID($_GET['master-id']);
$masterId = $master['user_id'];
$masterEmail = $master["email"];
$rate = $master['rate'];
$usingDeposit = $master['using_deposit'];
$minDeposit = $master['need_balance'];
$tradeType = $master['trade_type'];
$baseAsset = $master['base_asset'];

$user->GetConnections('kucoin');
$connection = $user->GetConnectionByMasterID('kucoin', $masterId);

$masterPortfolio = MasterHandler::GetKucoinMasterPortfolio($masterId);

//Calculate percentages
$totalBalanceInUSDT = 0;
foreach ($masterPortfolio as $asset) {
    $totalBalanceInUSDT = $totalBalanceInUSDT + $asset["asset_amount"];
}


$allColors = ["#3f80ea", "#d9534f", "#4bbf73", "#ec9c13", "#d9534f"];
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

                <h1 class="h3 mb-3">
                    Trader </h1>

                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="">
                                        <?php if($user->IsConnectedToMaster("kucoin", $masterId)){ ?>
                                            <div class="input-group mb-3" style="margin: 0 auto 0 auto !important; width: max-content;">
                                                <span class="badge bg-info" style="width: 100px; font-size: 0.8rem; padding-top: 10px;">Connected</span> <span class="input-group-text" style="">X <?= $connection['scale'] ?> </span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img src="source/master_icons/crypto_man.png" alt="Stacie Hall" class="img-fluid rounded-circle mb-2" width="128" height="128">
                                <h5 class="card-title mb-0"><?= $master['nickname'] ?></h5>
                                <div class="text-muted mb-2">Kucoin Master Trader</div>
                                <div>

                                    <?php
                                    if ($user->isConnected()) {
                                        if (!$user->IsConnectedToMaster('kucoin', $masterId)) {
                                            ?>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="padding: 6px" data-bs-target="#subscribe_modal_<?= $masterId ?>">
                                                Subscribe
                                            </button>
                                            <div class="modal fade" id="subscribe_modal_<?= $masterId ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Subscribe to Master</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div subscription_info_window class="modal-body m-3">
                                                            <p class="mb-0">You are going to subscribe the master. From this moment on, your assets go under the control of the selected master. Please confirm
                                                                <br> Scale coefficient - a system for recalculating the size of the trading lot of the trader you connected to.
                                                                <br> In case of 100% copying of trade orders by lot size - indicate the scale factor "1" <br> Example 1 <br> The trader's trading strategy has a working deposit of 1000 USDT
                                                                <br> When a trader opens an order in the amount of 100 USDT - your lot will depend on the coefficient you specified <br> Coefficient 0.5 - your lot size is 50 USDT
                                                                <br> Coefficient 0.6 - your lot size is 60 USDT <br> Coefficient 0.7 - your lot size is 70 USDT <br> Coefficient 0.8 - your lot size is 80 USDT
                                                                <br> Coefficient 0.9 - your lot size is 90 USDT <br> Coefficient 1 - your lot size is 100 USDT
                                                                <br> Note: different trading strategies provide for averaging positions and a large number of open positions at the same time, it is recommended to indicate 100% copying of the trading lot size - Scale coefficient "1" and to adhere to the trading balance specified in the trader's strategy for the most effective repeat accuracy.
                                                                <br>
                                                            </p>
                                                            <div class="input-group mb-3" style="width: 165px; margin-top:15px">
                                                                <span class="input-group-text">X</span><?= $connection['scale'] ?>
                                                                <input scale_coefficient type="text" class="form-control" placeholder="scale coefficient" value="<?= $connection['scale'] ?>">
                                                            </div>
                                                        </div>
                                                        <div subscription_await_window class="modal-body m-3" style="display: none">
                                                            <p class="mb-0">The system will now connect you to the master. Please wait it will not take than <span connection_timer> 10 </span> seconds
                                                            <div class="spinner-grow text-success me-2" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button close_subscribe type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="EnableBot('<?= $masterEmail ?>')">Confirm subscription</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" style="padding: 7px" data-bs-target="#unsubsribe_modal_<?= $masterId ?>">
                                                Unsubscribe
                                            </button>
                                            <div class="modal fade" id="unsubsribe_modal_<?= $masterId ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Unsubscribe Master</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div unsubscription_info_window class="modal-body m-3">
                                                            <p class="mb-0">Are you sure you want to unsubscribe the master</p>
                                                        </div>
                                                        <div unsubscription_await_window class="modal-body m-3" style="display: none">
                                                            <p class="mb-0">The system will now disconnect you from the master. Please wait it will not take than <span disconnection_timer> 10 </span> seconds
                                                            <div class="spinner-grow text-warning me-2" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button close_unsubscribe type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-outline-secondary" onclick="DisableBot('<?= $masterEmail ?>')">Unsubscribe</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else { ?>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" style="padding: 7px" data-bs-target="#need_connect">
                                            Subscribe
                                        </button>
                                        <div class="modal fade" id="need_connect" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><span class="badge badge-soft-warning" style="font-size: 1em">You need to connect your account via api keys first <span class="btn btn-warning" onclick='location.href = "https://cunion.io/client/cabinet/cabinet_accounts.php"'> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                                                <circle cx="18" cy="5" r="3"></circle>
                                                                                <circle cx="6" cy="12" r="3"></circle>
                                                                                <circle cx="18" cy="19" r="3"></circle>
                                                                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                                            </svg> Connect Keys</span> </span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <a class="btn btn-primary" href="https://telegram.me/<?= $master['telegram'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                        </svg>
                                        Message</a>
                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="card-body">

                                <div stats class="col-md-6">
                                    <svg statistics_loader xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader align-middle me-2">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg>

                                    <div followers statistic style="display: none; font-size: 1.3em">
                                        <div class="trd_tooltip">
                                            <i class="align-middle me-2 fas fa-fw fa-users" style="width: 25px;"></i> <span users_count class="align-middle">0</span> <span class="trd_tooltiptext" style="font-size: 0.7em">Total investors</span>
                                        </div>
                                    </div>

                                    <div rating style="margin-top: 10px" ;>
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


                                    <div investments statistic style="display: none">
                                        <div>
                                            <div class="input-group mb-3 trd_tooltip" style="display: block; width: fit-content; margin-top: 20px; ">
                                                <span total_investment class="input-group-text" style="font-size: 16px;"> 0 USDT </span> <span class="trd_tooltiptext">Total Investments</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div exchange-point class="trd_tooltip">
                                        <img src="https://assets.staticimg.com/cms/media/1lB3PkckFDyfxz6VudCEACBeRRBi6sQQ7DDjz0yWM.svg"> <span class="trd_tooltiptext">Using exchange point</span>
                                    </div>

                                    <style>
                                        [total_investment] {
                                            color: #4bbf73;
                                            background-color: #4bbf732d;
                                        }

                                        /* Tooltip container */
                                        .trd_tooltip {
                                            position: relative;
                                            display: inline-block;
                                        }

                                        /* Tooltip text */
                                        .trd_tooltip .trd_tooltiptext {
                                            visibility: hidden;
                                            width: 120px;
                                            background-color: black;
                                            color: #fff;
                                            text-align: center;
                                            padding: 5px 0;
                                            border-radius: 6px;

                                            /* Position the tooltip text - see examples below! */
                                            position: absolute;
                                            z-index: 1;
                                        }

                                        /* Show the tooltip text when you mouse over the tooltip container */
                                        .trd_tooltip:hover .trd_tooltiptext {
                                            visibility: visible;
                                        }

                                    </style>

                                    <script>
                                        var deg = 10;
                                        var statatisticsLoaderTimer;

                                        statatisticsLoaderTimer = setInterval(() => {
                                            deg += 1;
                                            document.querySelector('[statistics_loader]').style.transform = "rotate(" + deg + "deg)"
                                        }, 5)
                                    </script>

                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="card-body">
                                <div trede-info>
                                    <div class="row">
                                        <div class="col-md-6 text-center card bg-light border trd_stat"><span>Using Deposit:</span><span><?= $usingDeposit ?> USDT</span></div>
                                        <div class="col-md-6 text-center card bg-light border trd_stat"><span>Minimum Deposit:</span><span><?= $minDeposit ?> USDT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-center card bg-light border trd_stat"><span>Trade Type:</span><span><?= $tradeType ?></span></div>
                                        <div class="col-md-6 text-center card bg-light border trd_stat"><span>Base Asset:</span><span><?= $baseAsset ?></span></div>
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
                            <hr class="my-0">
                            <div class="card-body">
                                <h5 class="h6 card-title">About</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-sm me-1">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                        Lives in <a href="#">San Francisco, SA</a></li>

                                    <li class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase feather-sm me-1">
                                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                        </svg>
                                        Works at <a href="#">GitHub</a></li>
                                    <li class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin feather-sm me-1">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        From <a href="#">Boston</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-xl-9">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Trader Balance</h5>
                                <h6 class="card-subtitle text-muted">Here you can see the history of the trader balance</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chartjs-line" style="display: block; height: 300px; width: 1297px;" width="1167" height="269" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Roi per day</h5>
                            </div>
                            <div class="card-body d-flex w-100">
                                <div class="align-self-center chart chart-lg">
                                    <canvas id="chartjs-dashboard-bar"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Languages</h5>
                            </div>


                            <table class="table table-striped my-0">
                                <thead>
                                <tr>
                                    <th style="width: 170px">Coin</th>
                                    <th class="text-end">Amount</th>
                                    <th class="text-end">in USDT</th>
                                    <th class="d-none d-xl-table-cell" style="width: 67% !important;">% of balance</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $index = 4;
                                foreach ($masterPortfolio as $asset) {
                                    $assetPercent = round($asset['asset_amount'] / $totalBalanceInUSDT * 100, 1);
                                    $index++;
                                    $colorIndex = bcmod($index, count($allColors));
                                    $barColor = $allColors[$colorIndex];
                                    ?>
                                    <tr>
                                        <td coin-name="<?= $asset["asset_name"] ?>">
                                            <img style="margin-left: 5px;width: 25px;" class="coin_icon" src="">
                                            <?= $asset["asset_name"] ?>
                                        </td>
                                        <td><?= $asset["base_asset_amount"] ?></td>
                                        <td class="text-end"><?= $asset["asset_amount"] ?></td>
                                        <td class="d-none d-xl-table-cell">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" percent="<?= $assetPercent ?>" style="width: <?= $assetPercent ?>%; background-color: <?= $barColor ?> !important; margin-right: 5px" aria-valuenow="<?= $assetPercent ?>" aria-valuemin="0" aria-valuemax="100"><?= $assetPercent >= 3 ? $assetPercent . "%" : "" ?></div> <?= $assetPercent < 3 ? "  " . $assetPercent . "%" : "" ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
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


<script>


</script>


<script src="js/bot_control.js"></script>
<script src="js/master_page/load_master_investments.js"></script>
<script src="js/master_page/load_master_balance_history.js"></script>
<script src="js/master_page/icon_displayer.js"></script>


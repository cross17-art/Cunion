<?php
session_start();

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
$user = new User($_SESSION['user_email']);
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}


?>

<script src="../cabinet/js/login.js"></script>
<script src="js/verification_script.js"></script>

<html lang="en">
<?php include("header.php") ?>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="cabinet_token">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Token CTU

                </h1>
                <div class="row trd_tokenomik_row">
                    <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                        <div class="card illustration flex-fill">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-2">Total Supply <?= ToolTip::DrawToolTip('Общее предложение') ?></h3>
                                        <p class="mb-2"><span class="badge badge-soft-info" style="font-size: 15px">2,500,000</span>
                                        </p>
                                    </div>
                                    <div class="d-inline-block ms-3">
                                        <div class="stat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-target align-middle me-2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <circle cx="12" cy="12" r="6"></circle>
                                                <circle cx="12" cy="12" r="2"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-2">Symbol <?= ToolTip::DrawToolTip('Символ/Название токена') ?></h3>
                                        <p class="mb-2"><span class="badge badge-soft-info"
                                                              style="font-size: 15px">CTU</span></p>
                                    </div>
                                    <div class="d-inline-block ms-3">
                                        <div class="stat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-disc align-middle me-2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-2">Address <?= ToolTip::DrawToolTip('Адрес смартконтракта') ?></h3>
                                        <p class="mb-2"><span class="badge badge-soft-info"
                                                              style="font-size: 15px">TBA</span></p>
                                    </div>
                                    <div class="d-inline-block ms-3">
                                        <div class="stat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-hash align-middle me-2">
                                                <line x1="4" y1="9" x2="20" y2="9"></line>
                                                <line x1="4" y1="15" x2="20" y2="15"></line>
                                                <line x1="10" y1="3" x2="8" y2="21"></line>
                                                <line x1="16" y1="3" x2="14" y2="21"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-2">Chain <?= ToolTip::DrawToolTip('Сеть размещения токена') ?></h3>
                                        <p class="mb-2"><span class="badge badge-soft-info"
                                                              style="font-size: 15px">TBA</span></p>
                                    </div>
                                    <div class="d-inline-block ms-3">
                                        <div class="stat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-link align-middle me-2">
                                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                Description -->
                <div class="row trd_tokenomik_row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Info <?= ToolTip::DrawToolTip('Информация о использовании и применении токена') ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="align-self-center w-100" style=" margin:auto">

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <span class="badge-soft-info trd_info_text" style="font-size: 15px"><p>Redemption of 10% of profits once a quarter to add to staking<br>10% discount on service fees using the CTU</p></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Tokenomin Pie-->
                <div class="row trd_tokenomik_row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    Tokenomics
                                    <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip">
                                        <span class="trd_tooltiptext">Информация и этапы распределим токена в сети</span>
                                    </i>
                                </h5>

                            </div>
                            <div class="card-body">
                                <div class="align-self-center w-100" style=" margin:auto">
                                    <div class="py-3">
                                        <div class="chart chart-xs mobile_pie"
                                             style="max-width: 700px; max-height: 700px; min-height: 250px; zoom: 125%">
                                            <canvas id="tokenomik_chart"></canvas>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table mb-0 scale_on_mobile_80"
                                                   style="max-width: 600px; margin:auto">
                                                <thead>
                                                <tr>
                                                    <th class="text-center trd_tokenomik_head">Purpose</th>
                                                    <th class="text-center trd_tokenomik_head">Volume</th>
                                                    <th class="text-center trd_tokenomik_head">%</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr pie-index="0" highlight-bg-color="#d9534f33">
                                                    <td><i class="fas fa-square-full text-danger"></i> Airdrop</td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>50,000
                                                    </td>
                                                    <td class="text-center text-success">2%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="2"
                                                                 style="width: 2%; background-color: #d9534f !important; margin-right: 0px"
                                                                 aria-valuenow="2" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="1" highlight-bg-color="#4bbf7333">
                                                    <td><i class="fas fa-square-full text-success"></i> 1 ROUND</td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>150,000
                                                    </td>
                                                    <td class="text-center text-success">6%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="6"
                                                                 style="width: 6%; background-color: #4bbf73 !important; margin-right: 0px"
                                                                 aria-valuenow="6" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="2" highlight-bg-color="#3b82ec33">
                                                    <td><i class="fas fa-square-full text-primary"></i> 2 ROUND</td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>300,000
                                                    </td>
                                                    <td class="text-center text-success">12%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="12"
                                                                 style="width: 12%; background-color: #3b82ec !important; margin-right: 0px"
                                                                 aria-valuenow="12" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="3" highlight-bg-color="#f0ad4e33">
                                                    <td><i class="fas fa-square-full text-warning"></i> 3 ROUND</td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>450,000
                                                    </td>
                                                    <td class="text-center text-success">18%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="18"
                                                                 style="width: 18%; background-color: #f0ad4e !important; margin-right: 0px"
                                                                 aria-valuenow="18" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="4" highlight-bg-color="#6f42c133">
                                                    <td><i class="fas fa-square-full" style="color:#6f42c1"></i>
                                                        LIQUIDITY
                                                    </td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>500,000
                                                    </td>
                                                    <td class="text-center text-success">20%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="20"
                                                                 style="width: 20%; background-color: #6f42c1 !important; margin-right: 0px"
                                                                 aria-valuenow="20" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="5" highlight-bg-color="#1f9bcf33">
                                                    <td><i class="fas fa-square-full text-info"></i> Marketing</td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>175,000
                                                    </td>
                                                    <td class="text-center text-success">7%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="7"
                                                                 style="width: 7%; background-color: #1f9bcf !important; margin-right: 0px"
                                                                 aria-valuenow="7" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="6" highlight-bg-color="#20c99733">
                                                    <td><i class="fas fa-square-full" style="color: #20c997"></i> REWARD
                                                    </td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>750,000
                                                    </td>
                                                    <td class="text-center text-success">30%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="30"
                                                                 style="width: 30%; background-color: #20c997 !important; margin-right: 0px"
                                                                 aria-valuenow="30" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr pie-index="7" highlight-bg-color="#d4d6d933">
                                                    <td><i class="fas fa-square-full" style="color: #d4d6d9"></i>
                                                        RESERVE
                                                    </td>
                                                    <td class="text-center"><span
                                                                class="badge badge-soft-info trd_token_badge">CTU</span>125,000
                                                    </td>
                                                    <td class="text-center text-success">5%
                                                        <div class="progress trd_token_progress_bar">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 percent="5"
                                                                 style="width: 5%; background-color: #d4d6d9 !important; margin-right: 0px"
                                                                 aria-valuenow="5" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <style>
                                                    [highlight-bg-color] {
                                                        transition: background-color 0.37s;
                                                    }
                                                </style>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- #Price Raise-->
                <div class="row trd_tokenomik_row">
                    <div class="col-12">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title">PRICE
                                    <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip">
                                        <span class="trd_tooltiptext">Цена токена на каждом этапе</span>
                                    </i></h5>
                                <!--                                            <h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6>-->
                            </div>
                            <div class="card-body">
                                <div class="chart" style="max-width: 1200px; max-height: 300px; zoom: 125%;">
                                    <canvas id="price-bar"></canvas>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table mb-0 scale_on_mobile_80"
                                               style="max-width: 1200px; margin:auto">
                                            <thead>
                                            <tr>
                                                <th class="text-center trd_tokenomik_head">Round</th>
                                                <th class="text-center trd_tokenomik_head">Token</th>
                                                <th class="text-center trd_tokenomik_head">Price</th>
                                                <th class="text-center trd_tokenomik_head">Volume</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr price-bar-index="0" highlight-bg-color="#d9534f33"
                                                class="font_size_on_mobile">
                                                <td><i class="fas fa-square-full" style="color:#d9534f"></i> Airdrop
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info font_size_on_mobile"
                                                          style="font-size: 15px">50,000 CTU</span>
                                                </td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                            </tr>
                                            <tr price-bar-index="1" highlight-bg-color="#4bbf7333"
                                                class="font_size_on_mobile">
                                                <td><i class="fas fa-square-full text-success"></i> 1 ROUND</td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info font_size_on_mobile"
                                                          style="font-size: 15px">150,000 CTU</span>
                                                </td>
                                                <td class="text-center text-success"><span>$0.4</span>
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="40"
                                                             style="width: 40%; background-color: #4bbf73 !important; margin-right: 0px"
                                                             aria-valuenow="40" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-success font_size_on_mobile"
                                                            style="font-size: 15px">$60,000</span></td>
                                            </tr>
                                            <tr price-bar-index="2" highlight-bg-color="#3B82EC33"
                                                class="font_size_on_mobile">
                                                <td><i class="fas fa-square-full text-primary"></i> 2 ROUND</td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info font_size_on_mobile"
                                                            style="font-size: 15px">300,000 CTU</span>
                                                </td>
                                                <td class="text-center text-success">$0.6
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="60"
                                                             style="width: 60%; background-color: #3b82ec !important; margin-right: 0px"
                                                             aria-valuenow="60" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-success font_size_on_mobile"
                                                            style="font-size: 15px">$180,000</span>
                                                </td>
                                            </tr>
                                            <tr price-bar-index="3" highlight-bg-color="#F0AD4E33"
                                                class="font_size_on_mobile">
                                                <td><i class="fas fa-square-full text-warning"></i> 3 ROUND</td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info trd_token_badge font_size_on_mobile"
                                                            style="font-size: 15px">450,000 CTU</span>
                                                </td>
                                                <td class="text-center text-success">$0.8
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="80"
                                                             style="width: 80%; background-color: #f0ad4e !important; margin-right: 0px"
                                                             aria-valuenow="80" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-success font_size_on_mobile"
                                                            style="font-size: 15px">$360,000</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table mb-0 scale_on_mobile_80"
                                               style="max-width: 1200px; margin:auto; margin-top: 20px">
                                            <thead>
                                            <tr>
                                                <th class="text-center trd_tokenomik_head"></th>
                                                <th class="text-center trd_tokenomik_head"></th>
                                                <th class="text-center trd_tokenomik_head"></th>
                                                <th class="text-center trd_tokenomik_head"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr price-bar-index="4" highlight-bg-color="#6f42c133"
                                                class="font_size_on_mobile">
                                                <td><i class="fas fa-square-full" style="color:#6f42c1"></i>
                                                    LISTING dex add liquidity
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info  font_size_on_mobile"
                                                            style="font-size: 15px">500,000 CTU</span> - <span
                                                            class="badge badge-soft-success font_size_on_mobile"
                                                            style="font-size: 15px">$500,000</span>
                                                </td>
                                                <td colspan="2" class="text-center text-success">start token price: $1,00

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #UNLOCk-->
                <div class="row trd_tokenomik_row">
                    <div class="col-12">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title">UNLOCK <i
                                            class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip">
                                        <span class="trd_tooltiptext">Время и период разблокировки токена</span>
                                    </i></h5>
                                <!--                                            <h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6>-->
                            </div>
                            <div class="card-body">

                                <div class="card">
                                    <div class="card-body">
                                        <table class="table mb-0 scale_on_mobile_80"
                                               style="max-width: 1200px; margin:auto">
                                            <thead>
                                            <tr>
                                                <th class="text-center trd_tokenomik_head">Round</th>
                                                <th class="text-center trd_tokenomik_head">1st Quater 25%</th>
                                                <th class="text-center trd_tokenomik_head">2nd Quater 25%</th>
                                                <th class="text-center trd_tokenomik_head">3rd Quater 25%</th>
                                                <th class="text-center trd_tokenomik_head">4th Quater 25%</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr highlight-bg-color="#d9534f33">
                                                <td class="text-center"><i class="fas fa-square-full"
                                                                           style="color:#d9534f"></i>
                                                    Airdrop
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>50,000
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="100"
                                                             style="width: 100%; background-color: #d9534f !important; margin-right: 0px"
                                                             aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"> -</td>
                                                <td class="text-center"> -</td>
                                                <td class="text-center"> -</td>
                                            </tr>
                                            <tr highlight-bg-color="#4bbf7333">
                                                <td class="text-center"><i class="fas fa-square-full text-success"></i>
                                                    1 ROUND
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>37,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="25"
                                                             style="width: 25%; background-color: #4bbf73 !important; margin-right: 0px"
                                                             aria-valuenow="25" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>37,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="50"
                                                             style="width: 50%; background-color: #4bbf73 !important; margin-right: 0px"
                                                             aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>37,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="75"
                                                             style="width: 75%; background-color: #4bbf73 !important; margin-right: 0px"
                                                             aria-valuenow="75" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>37,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="100"
                                                             style="width: 100%; background-color: #4bbf73 !important; margin-right: 0px"
                                                             aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr highlight-bg-color="#3b82ec33">
                                                <td class="text-center"><i class="fas fa-square-full text-primary"></i>
                                                    2 ROUND
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>75,000
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="25%"
                                                             style="width: 25%; background-color: #3b82ec !important; margin-right: 0px"
                                                             aria-valuenow="25" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>75,000
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="50"
                                                             style="width: 50%; background-color: #3b82ec !important; margin-right: 0px"
                                                             aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>75,000
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="75"
                                                             style="width: 75%; background-color: #3b82ec !important; margin-right: 0px"
                                                             aria-valuenow="75" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>75,000
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="100"
                                                             style="width: 100%; background-color: #3b82ec !important; margin-right: 0px"
                                                             aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr highlight-bg-color="#f0ad4e33">
                                                <td class="text-center"><i class="fas fa-square-full text-warning"></i>
                                                    3 ROUND
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>112,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="25"
                                                             style="width: 25%; background-color: #f0ad4e !important; margin-right: 0px"
                                                             aria-valuenow="25" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>112,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="50"
                                                             style="width: 50%; background-color: #f0ad4e !important; margin-right: 0px"
                                                             aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>112,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="75"
                                                             style="width: 75%; background-color: #f0ad4e !important; margin-right: 0px"
                                                             aria-valuenow="75" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-soft-info trd_token_badge">CTU</span>112,500
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="100"
                                                             style="width: 100%; background-color: #f0ad4e !important; margin-right: 0px"
                                                             aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr highlight-bg-color="#1f9bcf17">
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info trd_token_badge">Total</span></td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info trd_token_badge">CTU</span><span
                                                            class="badge badge-soft-info trd_token_badge">275,000</span>
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info trd_token_badge">CTU</span><span
                                                            class="badge badge-soft-info trd_token_badge">225,000</span>
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info trd_token_badge">CTU</span><span
                                                            class="badge badge-soft-info trd_token_badge">225,000</span>
                                                </td>
                                                <td class="text-center"><span
                                                            class="badge badge-soft-info trd_token_badge">CTU</span><span
                                                            class="badge badge-soft-info trd_token_badge">225,000</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row trd_tokenomik_row">
                    <div class="col-12">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title">
                                    LIQUIDITY TEAM UNLOCK
                                    <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip">
                                        <span class="trd_tooltiptext">Этап разблокировки и часть в процентах получения от общих токенов </span>
                                    </i>
                                </h5>
                                <!--                                            <h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6>-->
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table mb-0 scale_on_mobile_80 font_size_on_mobile_10"
                                               style="max-width: 600px; margin:auto">
                                            <thead>
                                            <tr>
                                                <th class="text-center trd_tokenomik_wide_head"></th>
                                                <th class="text-center trd_tokenomik_wide_head">1st Quater</th>
                                                <th class="text-center trd_tokenomik_wide_head">2nd Quater</th>
                                                <th class="text-center trd_tokenomik_wide_head">3rd Quater</th>
                                                <th class="text-center trd_tokenomik_wide_head">4th Quater</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr highlight-bg-color="#6f42c133">
                                                <td class="text-center"><i class="fas fa-square-full"
                                                                           style="color:#6F42C1FF "></i>
                                                    LIQUIDITY
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-success">25%</span>
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="25"
                                                             style="width: 25%; background-color: #6F42C1FF !important; margin-right: 0px"
                                                             aria-valuenow="25" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-success">25%</span>
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="50"
                                                             style="width: 50%; background-color: #6F42C1FF !important; margin-right: 0px"
                                                             aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-success">25%</span>
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="75"
                                                             style="width: 75%; background-color: #6F42C1FF !important; margin-right: 0px"
                                                             aria-valuenow="75" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-success">25%</span>
                                                    <div class="progress trd_token_progress_bar">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                             percent="100"
                                                             style="width: 100%; background-color: #6F42C1FF !important; margin-right: 0px"
                                                             aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("footer.php") ?>

    </div>
</div>

<style>


    .trd_info_text {
        font-size: 15px;
        padding: 5px;
        display: block;
    }

    .trd_tokenomik_head {
        min-width: 140px;
    }

    .trd_tokenomik_wide_head {
        min-width: 160px;
    }

    .trd_token_badge {
        position: relative;
        top: -2px;
        margin-right: 5px;
    }

    .trd_token_progress_bar {
        float: right;
        width: 100px;
        position: relative;
        top: 2px;
    }

    .trd_tokenomik_row {
        max-width: 1200px;
        margin: auto;
    }

    .hide_col {
        display: none;
    }


    @media screen and (max-width: 768px) {
        .small-text-mobile {
            font-size: 10px;
        }

        .scale_on_mobile_80 {
            /*zoom: 80%;*/
            font-size: 10px;
        }

        table.scale_on_mobile_80>tbody>tr>td{
            padding: 12px 5px 12px 5px;
        }

        table.scale_on_mobile_80>thead>tr>th{
            padding: 12px 5px 12px 5px;
        }

        .trd_tokenomik_head {
            min-width: 20px;
        }

        .trd_tokenomik_wide_head {
            min-width: 20px;
        }

        .trd_token_progress_bar {
            float: right;
            width: 40px;
            position: relative;
            top: 2px;
            max-height: 10px;
            /*margin-left: 3px;*/
        }

        .font_size_on_mobile_10 {
            font-size: 10px !important;
        }

        
        .mobile_pie {
            min-height: 150px !important;
        }

        .font_size_on_mobile_12 {
            font-size: 12px !important;
        }

        .font_size_on_mobile{
            font-size: 10px !important;
        }

        .trd_token_badge {
            position: relative;
            top: -2px;
            margin-right: 2px;
            font-size: 8px !important;
        }
    }


    @media screen and (min-width: 768px) {
        .min-width-300-wide-screen {
            min-width: 300px;
        }
    }

</style>


<script src="js/app.js"></script>
<script src="js/notification_handler.js"></script>


<script>
    function GetChartFontSize() {
        if (screen.width < 768) {
            return 8;
        } else {
            return 12;
        }
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>
<script src="js/token_page_js/functions.js"></script>
<script src="js/token_page_js/tokenomik_pie.js"></script>
<script src="js/token_page_js/price_bar.js"></script>
<script src="js/token_page_js/raise_bar.js"></script>
<!--<script src="js/token_page_js/unlock_bar.js"></script>-->
</body>
</html>


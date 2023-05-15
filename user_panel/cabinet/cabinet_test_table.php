<?php
session_start();
include("classes/user.php");
$user = new User($_SESSION['user_email']);
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
    <div class="main">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">
                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3>Dashboard</h3>
                    </div>

                    <div class="col-auto ms-auto text-end mt-n1">

                        <div class="dropdown me-2 d-inline-block">
                            <a class="btn btn-light bg-white shadow-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-middle mt-n1">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                Today </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Settings</h6>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>

                        <button class="btn btn-primary shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter align-middle">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                        </button>
                        <button class="btn btn-primary shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <polyline points="1 20 1 14 7 14"></polyline>
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-xxl d-flex">
                        <div class="card flex-fill">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div id="finish_verification_message_box" class="flex-grow-1">
                                        <h3 class="mb-2">Finish your registration</h3>
                                        <p class="mb-2">You should verify you email
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail align-middle me-2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6" style="width: 25px;height: 25px;"></polyline>
                                            </svg>
                                            and conect your wallet via
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                            </svg>
                                            Api Key and Secrec key of your binance
                                        </p>
                                    </div>

                                    <div id="success_verification_message_box" style="display: none" class="flex-grow-1">
                                        <h3 class="mb-2">Gut</h3>
                                        <p class="mb-2">You finish
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail align-middle me-2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6" style="width: 25px;height: 25px;"></polyline>
                                            </svg>
                                            and conect your wallet via
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                            </svg>
                                            Api Key and Secrec key of your binance
                                        </p>

                                    </div>


                                    <div class="d-inline-block ms-3" style="margin-top: 20px;">
                                        <div class="verified-alert-icon" style="margin: 5px 5px 20px 10px;/* width: 25px; *//* height: 26px; */">
                                            <div class="spinner-border spinner-border-sm text-danger me-2 verification_spinner" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                            <button id="not_verified_icon_button" class="btn btn-danger" style="height: 30px;width: 40px; display: none" onclick="SendVerificationEmail()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail align-middle me-2">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6" style="width: 25px;height: 25px;"></polyline>
                                                </svg>
                                            </button>

                                            <button id="verified_icon_button" class="btn btn-success" onclick="ShowVerifiedMessage()" style="height: 30px;width: 40px;  display: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail align-middle me-2">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6" style="width: 25px;height: 25px;"></polyline>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="connected-alert-icon" style="margin: 0 10px 0 10px">
                                            <div class="spinner-border spinner-border-sm text-warning me-2 verification_spinner" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <button id="not_connected_icon_button" class="btn btn-warning" onclick="ShowConnectionMiniForm()" style="width: 40px;height: 30px; display: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                    <circle cx="18" cy="5" r="3"></circle>
                                                    <circle cx="6" cy="12" r="3"></circle>
                                                    <circle cx="18" cy="19" r="3"></circle>
                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                </svg>
                                            </button>
                                            <button id="connected_icon_button" class="btn btn-success" onclick="ShowConnectionMiniForm()" style=" width: 40px; height: 30px;  display: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                    <circle cx="18" cy="5" r="3"></circle>
                                                    <circle cx="6" cy="12" r="3"></circle>
                                                    <circle cx="18" cy="19" r="3"></circle>
                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xxl d-flex" style="padding: 20px;">
                        <div class="card flex-fill" style="border: 2px solid #545968;">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start interactive-window">
                                    <div id="api_form" style="width: 100%; display: none">
                                        <div class="left-api-form-block" style="block; width: 50%; float:left">
                                            <form id="connection_form" style="margin-bottom: 0px;width: 100%;float: left;">
                                                <input type="text" class="form-control" placeholder="Api Key" name="api_key" style="margin-bottom: 5px;height: 23px;font-size: 10px;">
                                                <input type="text" class="form-control" placeholder="Secret Key" name="secret_key" style="margin-bottom: 5px;height: 23px;font-size: 10px;">
                                                <div>
                                                    <div id="api_form_spinner" style="display: none" class="spinner-border spinner-border-sm text-warning me-2" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <button id="api_key_submit" type="submit" class="btn btn-warning" onclick="SendKeys()" style="font-size: 9px;display: block;margin-left: auto; display: none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                            <circle cx="18" cy="5" r="3"></circle>
                                                            <circle cx="6" cy="12" r="3"></circle>
                                                            <circle cx="18" cy="19" r="3"></circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                        </svg>
                                                        Connect
                                                    </button>
                                                    <button id="api_key_rebind" type="submit" class="btn btn-warning" onclick="SendKeys()" style="font-size: 9px;display: block;margin-left: auto; display: none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                                                            <circle cx="18" cy="5" r="3"></circle>
                                                            <circle cx="6" cy="12" r="3"></circle>
                                                            <circle cx="18" cy="19" r="3"></circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                        </svg>
                                                        Rebind
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="validation-balance-spinner" style="margin-left: 30px" class="spinner-border text-info me-2" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <div style="display: none; margin-left: 20px" class="validation-balance-block">
                                            <div class="input-group">
                                                <span class="input-group-text">available USDT</span>
                                                <span id="available_usdt_balance" class="input-group-text text-success">1231231231231</span>
                                                <span class="input-group-text">In orders</span>
                                                <span id="in_orders_usdt_balance" class="input-group-text text-success">1231231231231</span>
                                            </div>
                                            <div class="control-panel" style="padding-top: 10px;}">
                                                <div class="input-group mb-3 trade-amount">
                                            <span id="trade_amount_icon" class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle me-2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                            </span>
                                                    <input type="text" class="form-control" name="trade_amount" placeholder="USDT trade amount">
                                                </div>
                                                <div class="ios-toggle bot-enable-toggle">
                                                    <input type="checkbox" id="ios-toggle"/> <label for="ios-toggle"/>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <div id="message_box" class="flex-grow-1">
                                        <div style="display: none" class="spinner-border text-success me-2 verification-email-spinner" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <p id="verification_message_sent" style="display: none" class="mb-2" style="margin-top: 20px;">
                                            We have send you the verification link to the wyde90@gmail email. Please follow that linc to finish your verification </p>
                                        <p id="message_already_verified" style="display: none" class="mb-2" style="margin-top: 20px;">
                                            You were already verified by email:<br>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail align-middle me-2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6" style="width: 25px;height: 25px;"></polyline>
                                            </svg>
                                            <?= $user->user_email ?>
                                            <br>...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 d-flex">
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
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Sales / Revenue</h5>
                            </div>
                            <div class="card-body d-flex w-100">
                                <div class="align-self-center chart chart-lg">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div id="balance-spinner" class="spinner-border text-info me-2" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <canvas id="chartjs-dashboard-bar" style="display: none; height: 350px; width: 515px;" width="823" height="559" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4 d-none d-xl-flex">
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
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Weekly sales</h5>
                            </div>
                            <div class="card-body d-flex">
                                <div class="align-self-center w-100">
                                    <div class="py-3">
                                        <div class="chart chart-xs">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="chartjs-line" width="361" height="239" style="display: block; height: 150px; width: 226px;" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <table id="balance_hitory_table" class="table mb-0" style="display: none">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th class="text-end">Balance</th>
                                            <th class="text-end">ROI</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr balance-history-tr-template style="display:none">
                                            <td date><i class="fas fa-square-full text-primary"></i> Direct</td>
                                            <td balance class="text-end">$ 2602</td>
                                            <td roi class="text-end text-success">+43%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="card-actions float-end">
                            <div class="dropdown show">
                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                    <i class="align-middle" data-feather="more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">Latest Projects</h5>
                    </div>
                    <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Start Date</th>
                            <th class="d-none d-xl-table-cell">End Date</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Assignee</th>
                            <th>Name2</th>
                            <th class="d-none d-xl-table-cell">H1</th>
                            <th class="d-none d-xl-table-cell">h2</th>
                            <th>Status2</th>
                            <th class="d-none d-md-table-cell">h3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2018</td>
                            <td class="d-none d-xl-table-cell">31/06/2018</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Carl Jenkins</td>
                        </tr>

                        </tbody>
                    </table>
            </div>

        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Terms of Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            © 2021 - <a href="index.html" class="text-muted">AppStack</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>

<!--<script>-->
<!--    document.addEventListener("DOMContentLoaded", function () {-->
<!--        $("#datetimepicker-dashboard").datetimepicker({-->
<!--            inline: true,-->
<!--            sideBySide: false,-->
<!--            format: "L"-->
<!--        });-->
<!--    });-->
<!--</script>-->

<script>

</script>


<div class="settings js-settings">
    <div class="settings-toggle">
        <div class="settings-toggle-option settings-toggle-option-text js-settings-toggle" title="Theme Builder">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders align-middle">
                <line x1="4" y1="21" x2="4" y2="14"></line>
                <line x1="4" y1="10" x2="4" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12" y2="3"></line>
                <line x1="20" y1="21" x2="20" y2="16"></line>
                <line x1="20" y1="12" x2="20" y2="3"></line>
                <line x1="1" y1="14" x2="7" y2="14"></line>
                <line x1="9" y1="8" x2="15" y2="8"></line>
                <line x1="17" y1="16" x2="23" y2="16"></line>
            </svg>
            Builder
        </div>
        <a class="settings-toggle-option" title="Documentation" href="docs-introduction.html" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open align-middle">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
            </svg>
        </a>
    </div>

    <div class="settings-panel">
        <div class="settings-content">
            <div class="settings-title d-flex align-items-center">
                <button type="button" class="btn-close float-right js-settings-toggle" aria-label="Close"></button>

                <h4 class="mb-0 ms-2 d-inline-block">Theme Builder</h4>
            </div>

            <div class="settings-body">

                <div class="alert alert-primary" role="alert">
                    <div class="alert-message">
                        <strong>Hey there!</strong> Set your own customized style below. Choose the ones that best fits your needs.
                    </div>
                </div>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Color scheme</span>
                    <span class="d-block text-muted mb-2">The perfect color mode for your app.</span>

                    <div class="row g-0 text-center mx-n1 mb-2">
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="default">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-default"></div>
                                </div>
                            </label> Default
                        </div>
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="colored">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-colored"></div>
                                </div>
                            </label> Colored
                        </div>
                    </div>
                    <div class="row g-0 text-center mx-n1">
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="dark">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-dark"></div>
                                </div>
                            </label> Dark
                        </div>
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="light">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-light"></div>
                                </div>
                            </label> Light
                        </div>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Sidebar position</span>
                    <span class="d-block text-muted mb-2">Toggle the position of the sidebar.</span>

                    <div>
                        <label> <input class="settings-button-label" type="radio" name="sidebarPosition" value="left">
                            <div class="settings-button">
                                Left
                            </div>
                        </label> <label>
                            <input class="settings-button-label" type="radio" name="sidebarPosition" value="right">
                            <div class="settings-button">
                                Right
                            </div>
                        </label>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Sidebar behavior</span>
                    <span class="d-block text-muted mb-2">Change the behavior of the sidebar.</span>

                    <div>
                        <label> <input class="settings-button-label" type="radio" name="sidebarBehavior" value="sticky">
                            <div class="settings-button">
                                Sticky
                            </div>
                        </label> <label>
                            <input class="settings-button-label" type="radio" name="sidebarBehavior" value="fixed">
                            <div class="settings-button">
                                Fixed
                            </div>
                        </label> <label>
                            <input class="settings-button-label" type="radio" name="sidebarBehavior" value="compact">
                            <div class="settings-button">
                                Compact
                            </div>
                        </label>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Layout</span>
                    <span class="d-block text-muted mb-2">Toggle container layout system.</span>

                    <div>
                        <label> <input class="settings-button-label" type="radio" name="layout" value="fluid">
                            <div class="settings-button">
                                Fluid
                            </div>
                        </label> <label> <input class="settings-button-label" type="radio" name="layout" value="boxed">
                            <div class="settings-button">
                                Boxed
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <div class="settings-footer">
                <div class="d-grid">
                    <a class="btn btn-primary btn-lg btn-block" href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/" target="_blank">Purchase</a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>


<style>
    .ios-toggle {
        padding-top: 15px;
        box-sizing: border-box;
        display: inline-block;
        font-size: 7px;
        width: 5.3em;
    }

    .ios-toggle input,
    .ios-toggle input:active {
        border: 0;
        height: 0;
        opacity: 0;
        outline: none;
        position: absolute;
        left: -5000px;
        width: 0;
    }

    .ios-toggle label {
        background: #d9534f;
        border: 0.2em solid #d9534f;
        border-radius: 1.6em;
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 3.2em;
        padding: 1em;
        position: relative;
        transition: 0.3s ease-out;
        width: 100%;
    }

    .ios-toggle label::before {
        background: #ffffff;
        border-radius: 1.4em;
        box-shadow: 0 0.3em 0.3em rgba(0, 0, 0, 0.2), 0 0 0 0.1em #ddd;
        content: "";
        display: block;
        height: 2.8em;
        left: 0;
        position: absolute;
        right: auto;
        text-indent: 4em;
        top: 0;
        transition: 0.25s ease-in-out;
        width: 2.8em;
        z-index: 2;
    }

    .ios-toggle label::after {
        background: #f8f8f8;
        border-radius: 1.4em;
        content: "";
        display: block;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        transition: 0.25s ease-in-out;
        width: 2.8em;
        z-index: 1;
    }

    .ios-toggle input:active + label::before {
        width: 3.2em;
    }

    .ios-toggle input:checked + label {
        border-color: #13bf11;
        box-shadow: inset 0 0 0 2em #13bf11;
    }

    .ios-toggle input:checked + label::after {
        background-color: #13bf11;
        right: 1.4em;
        width: 100%;
    }

    .ios-toggle input:checked + label::before {
        box-shadow: 0 0 0 0.1em transparent, 0 0.3em 0.3em rgba(0, 0, 0, 0.3);
        left: calc(100% - 2.8em);
    }

    .ios-toggle input:checked:active + label::before {
        left: calc(100% - 3.2em);
    }

</style>

<script src="js/balance.js"></script>
<script src="js/verification_script.js"></script>
<script src="js/bot_control.js"></script>

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

<script src="js/balance_graph.js"></script>

<script>

</script>

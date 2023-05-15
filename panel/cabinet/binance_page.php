<?php
session_start();
include("classes/user.php");
$user = new User($_SESSION['user_email']);
if($user->two_auth_enable==1 && $user->authentication_verified==0 ){
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
<body data-theme="dark"
      data-layout="fluid"
      data-sidebar-position="left"
      data-sidebar-behavior="sticky"
      class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12 col-sm-6 col-xxl d-flex">
                        <div class="card flex-fill">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div id="finish_verification_message_box"
                                         class="flex-grow-1"
                                         style="display: block;">
                                        <h3 class="mb-2">
                                            Please
                                            connect
                                            you
                                            binance
                                            account.</h3>
                                        <p class="mb-2">
                                            You
                                            should
                                            connect
                                            your
                                            binance
                                            account
                                            via
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="24"
                                                 height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-share-2 align-middle">
                                                <circle cx="18"
                                                        cy="5"
                                                        r="3"></circle>
                                                <circle cx="6"
                                                        cy="12"
                                                        r="3"></circle>
                                                <circle cx="18"
                                                        cy="19"
                                                        r="3"></circle>
                                                <line x1="8.59"
                                                      y1="13.51"
                                                      x2="15.42"
                                                      y2="17.49"></line>
                                                <line x1="15.41"
                                                      y1="6.51"
                                                      x2="8.59"
                                                      y2="10.49"></line>
                                            </svg>
                                            Api
                                            Key
                                            and
                                            Secret
                                            key.
                                            You
                                            can
                                            find
                                            them
                                            in
                                            your
                                            binance
                                            account.
                                        </p>
                                    </div>
                                    <div id="success_verification_message_box"
                                         style="display: none"
                                         class="flex-grow-1">
                                        <h3 class="mb-2">
                                            Great! </h3>
                                        <p class="mb-2">
                                            You
                                            have
                                            successfully
                                            connected
                                            your
                                            binance
                                            account!
                                            You
                                            can
                                            always
                                            rebind
                                            the
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="24"
                                                 height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-share-2 align-middle">
                                                <circle cx="18"
                                                        cy="5"
                                                        r="3"></circle>
                                                <circle cx="6"
                                                        cy="12"
                                                        r="3"></circle>
                                                <circle cx="18"
                                                        cy="19"
                                                        r="3"></circle>
                                                <line x1="8.59"
                                                      y1="13.51"
                                                      x2="15.42"
                                                      y2="17.49"></line>
                                                <line x1="15.41"
                                                      y1="6.51"
                                                      x2="8.59"
                                                      y2="10.49"></line>
                                            </svg>
                                            Api
                                            Key
                                            and
                                            Secret
                                            using
                                            the
                                            form
                                            below.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-xxl d-flex"
                         style="padding: 20px;">
                        <div class="card flex-fill"
                             style="border: 2px solid #545968;">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start interactive-window">
                                    <div id="api_form"
                                         style="width: 100%;">
                                        <form id="connection_form"
                                              style="margin-bottom: 0px; width: 75%;">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Api Key"
                                                   name="api_key"
                                                   style="margin-bottom: 15px;height: 30px;font-size: 15px;">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Secret Key"
                                                   name="secret_key"
                                                   style="margin-bottom: 10px;height: 30px;font-size: 15px;">
                                            <div>
                                                <div id="api_form_spinner"
                                                     style="display: none"
                                                     class="spinner-border spinner-border-sm text-warning me-2"
                                                     role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                <button id="api_key_submit"
                                                        type="submit"
                                                        class="btn btn-warning"
                                                        onclick="SendKeys()"
                                                        style="font-size: 15px;margin-left: auto;display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2 align-middle">
                                                        <circle cx="18"
                                                                cy="5"
                                                                r="3"></circle>
                                                        <circle cx="6"
                                                                cy="12"
                                                                r="3"></circle>
                                                        <circle cx="18"
                                                                cy="19"
                                                                r="3"></circle>
                                                        <line x1="8.59"
                                                              y1="13.51"
                                                              x2="15.42"
                                                              y2="17.49"></line>
                                                        <line x1="15.41"
                                                              y1="6.51"
                                                              x2="8.59"
                                                              y2="10.49"></line>
                                                    </svg>
                                                    Connect
                                                </button>
                                                <button id="api_key_rebind"
                                                        type="submit"
                                                        class="btn btn-warning"
                                                        onclick="SendKeys()"
                                                        style="font-size: 15px;display: block;margin-left: auto;display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2 align-middle">
                                                        <circle cx="18"
                                                                cy="5"
                                                                r="3"></circle>
                                                        <circle cx="6"
                                                                cy="12"
                                                                r="3"></circle>
                                                        <circle cx="18"
                                                                cy="19"
                                                                r="3"></circle>
                                                        <line x1="8.59"
                                                              y1="13.51"
                                                              x2="15.42"
                                                              y2="17.49"></line>
                                                        <line x1="15.41"
                                                              y1="6.51"
                                                              x2="8.59"
                                                              y2="10.49"></line>
                                                    </svg>
                                                    Rebind
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="message_box"
                                         class="flex-grow-1">
                                        <div style="display: none"
                                             class="spinner-border text-success me-2 verification-email-spinner"
                                             role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <p id="verification_message_sent"
                                           style="display: none"
                                           class="mb-2">
                                            We
                                            have
                                            send
                                            you
                                            the
                                            verification
                                            link
                                            to
                                            the
                                            wyde90@gmail
                                            email.
                                            Please
                                            follow
                                            that
                                            linc
                                            to
                                            finish
                                            your
                                            verification
                                        </p>
                                        <p id="message_already_verified"
                                           style="display: none"
                                           class="mb-2">
                                            You
                                            were
                                            already
                                            verified
                                            by
                                            email:<br>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="24"
                                                 height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-mail align-middle me-2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline
                                                        points="22,6 12,13 2,6"
                                                        style="width: 25px;height: 25px;"></polyline>
                                            </svg>
                                            Wyde90@gmail.com
                                            <br>...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-xxl d-flex"
                         style="padding: 20px;">
                        <div class="card flex-fill"
                             style="border: 2px solid #545968;">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start interactive-window">
                                    <div id="terminal">
                                        <form id="terminal_form"
                                              style="margin-bottom: 0px; float: left; width: 30%">
                                            <div class="terminal-input-form"
                                                 style="float:left; margin-right: 10px; margin-top:10px; width: 144px">
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="0.005"
                                                       value = "0.005"
                                                       name="lot_size"
                                                       style="margin-bottom: 15px;height: 30px;font-size: 15px;" >

                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="ETHUSDT"
                                                       value="ETHUSDT"
                                                       name="symbol"
                                                       style="margin-bottom: 10px;height: 30px;font-size: 15px;">
                                            </div>
                                            <div class="terminal-buttons"
                                                 style="margin-left: 20px; float: left">
                                                <button id="buy_button"
                                                        type="submit"
                                                        class="btn btn-success terminal-button"
                                                        onclick="Buy()"
                                                        style="font-size: 15px; display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2 align-middle">
                                                        <circle cx="18"
                                                                cy="5"
                                                                r="3"></circle>
                                                        <circle cx="6"
                                                                cy="12"
                                                                r="3"></circle>
                                                        <circle cx="18"
                                                                cy="19"
                                                                r="3"></circle>
                                                        <line x1="8.59"
                                                              y1="13.51"
                                                              x2="15.42"
                                                              y2="17.49"></line>
                                                        <line x1="15.41"
                                                              y1="6.51"
                                                              x2="8.59"
                                                              y2="10.49"></line>
                                                    </svg>
                                                    Buy
                                                </button>
                                                <button id="sell_button"
                                                        type="submit"
                                                        class="btn btn-danger terminal-button"
                                                        onclick="Sell()"
                                                        style="font-size: 15px;display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-share-2 align-middle">
                                                        <circle cx="18"
                                                                cy="5"
                                                                r="3"></circle>
                                                        <circle cx="6"
                                                                cy="12"
                                                                r="3"></circle>
                                                        <circle cx="18"
                                                                cy="19"
                                                                r="3"></circle>
                                                        <line x1="8.59"
                                                              y1="13.51"
                                                              x2="15.42"
                                                              y2="17.49"></line>
                                                        <line x1="15.41"
                                                              y1="6.51"
                                                              x2="8.59"
                                                              y2="10.49"></line>
                                                    </svg>
                                                    Sell
                                                </button>
                                                <style>
                                                    .terminal-button {
                                                        margin-top: 10px;
                                                        width: 120px;
                                                    }
                                                </style>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-xxl d-flex"
                         style="padding: 20px;">
                        <div class="card flex-fill"
                             style="border: 2px solid #545968;">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start interactive-window">
                                    <div id="terminal"
                                         style="width: 100%;">
                                        <div class="terminal-info-panel"
                                             style="float: left">
                                            <button id="show_orders"
                                                    type="submit"
                                                    class="btn btn-warning terminal-button"
                                                    onclick="ShowAllOrders()"
                                                    style="font-size: 15px; display: block;">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     class="feather feather-share-2 align-middle">
                                                    <circle cx="18"
                                                            cy="5"
                                                            r="3"></circle>
                                                    <circle cx="6"
                                                            cy="12"
                                                            r="3"></circle>
                                                    <circle cx="18"
                                                            cy="19"
                                                            r="3"></circle>
                                                    <line x1="8.59"
                                                          y1="13.51"
                                                          x2="15.42"
                                                          y2="17.49"></line>
                                                    <line x1="15.41"
                                                          y1="6.51"
                                                          x2="8.59"
                                                          y2="10.49"></line>
                                                </svg>
                                                Show
                                                All
                                                Orders
                                            </button>
                                            <button id="show_deals"
                                                    type="submit"
                                                    class="btn btn-warning terminal-button"
                                                    onclick="ShowAllDeals()"
                                                    style="font-size: 15px;display: block;">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     class="feather feather-share-2 align-middle">
                                                    <circle cx="18"
                                                            cy="5"
                                                            r="3"></circle>
                                                    <circle cx="6"
                                                            cy="12"
                                                            r="3"></circle>
                                                    <circle cx="18"
                                                            cy="19"
                                                            r="3"></circle>
                                                    <line x1="8.59"
                                                          y1="13.51"
                                                          x2="15.42"
                                                          y2="17.49"></line>
                                                    <line x1="15.41"
                                                          y1="6.51"
                                                          x2="8.59"
                                                          y2="10.49"></line>
                                                </svg>
                                                Show
                                                All
                                                Deals
                                            </button>
                                            <div terminal-msg-window>
                                                Terminal
                                                message...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted"
                                   href="#">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted"
                                   href="#">Help
                                    Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted"
                                   href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted"
                                   href="#">Terms
                                    of
                                    Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            ©
                            2021
                            -
                            <a href="index.html"
                               class="text-muted">AppStack</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer"
     aria-atomic="true"
     aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Last year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .325,
                    categoryPercentage: .5
                }, {
                    label: "This year",
                    backgroundColor: window.theme["primary-light"],
                    borderColor: window.theme["primary-light"],
                    hoverBackgroundColor: window.theme["primary-light"],
                    hoverBorderColor: window.theme["primary-light"],
                    data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                    barPercentage: .325,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                cornerRadius: 15,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        },
                        stacked: true,
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        },
                        stacked: true,
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#datetimepicker-dashboard").datetimepicker({
            inline: true,
            sideBySide: false,
            format: "L"
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Direct", "Affiliate", "E-mail", "Other"],
                datasets: [{
                    data: [2602, 1253, 541, 1465],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger,
                        "#E8EAED"
                    ],
                    borderWidth: 5,
                    borderColor: window.theme.white
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                cutoutPercentage: 70,
                legend: {
                    display: false
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#datatables-dashboard-projects").DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false
        });
    });
</script>
<div class="settings js-settings">
    <div class="settings-toggle">
        <div class="settings-toggle-option settings-toggle-option-text js-settings-toggle"
             title="Theme Builder">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24"
                 height="24"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 class="feather feather-sliders align-middle">
                <line x1="4"
                      y1="21"
                      x2="4"
                      y2="14"></line>
                <line x1="4"
                      y1="10"
                      x2="4"
                      y2="3"></line>
                <line x1="12"
                      y1="21"
                      x2="12"
                      y2="12"></line>
                <line x1="12"
                      y1="8"
                      x2="12"
                      y2="3"></line>
                <line x1="20"
                      y1="21"
                      x2="20"
                      y2="16"></line>
                <line x1="20"
                      y1="12"
                      x2="20"
                      y2="3"></line>
                <line x1="1"
                      y1="14"
                      x2="7"
                      y2="14"></line>
                <line x1="9"
                      y1="8"
                      x2="15"
                      y2="8"></line>
                <line x1="17"
                      y1="16"
                      x2="23"
                      y2="16"></line>
            </svg>
            Builder
        </div>
        <a class="settings-toggle-option"
           title="Documentation"
           href="docs-introduction.html"
           target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24"
                 height="24"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 class="feather feather-book-open align-middle">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
            </svg>
        </a>
    </div>
    <div class="settings-panel">
        <div class="settings-content">
            <div class="settings-title d-flex align-items-center">
                <button type="button"
                        class="btn-close float-right js-settings-toggle"
                        aria-label="Close"></button>
                <h4 class="mb-0 ms-2 d-inline-block">
                    Theme
                    Builder</h4>
            </div>
            <div class="settings-body">
                <div class="alert alert-primary"
                     role="alert">
                    <div class="alert-message">
                        <strong>Hey
                            there!</strong>
                        Set
                        your
                        own
                        customized
                        style
                        below.
                        Choose
                        the
                        ones
                        that
                        best
                        fits
                        your
                        needs.
                    </div>
                </div>
                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Color scheme</span>
                    <span class="d-block text-muted mb-2">The perfect color mode for your app.</span>
                    <div class="row g-0 text-center mx-n1 mb-2">
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label"
                                       type="radio"
                                       name="theme"
                                       value="default">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-default"></div>
                                </div>
                            </label>
                            Default
                        </div>
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label"
                                       type="radio"
                                       name="theme"
                                       value="colored">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-colored"></div>
                                </div>
                            </label>
                            Colored
                        </div>
                    </div>
                    <div class="row g-0 text-center mx-n1">
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label"
                                       type="radio"
                                       name="theme"
                                       value="dark">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-dark"></div>
                                </div>
                            </label>
                            Dark
                        </div>
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label"
                                       type="radio"
                                       name="theme"
                                       value="light">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-light"></div>
                                </div>
                            </label>
                            Light
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Sidebar position</span>
                    <span class="d-block text-muted mb-2">Toggle the position of the sidebar.</span>
                    <div>
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="sidebarPosition"
                                   value="left">
                            <div class="settings-button">
                                Left
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="sidebarPosition"
                                   value="right">
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
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="sidebarBehavior"
                                   value="sticky">
                            <div class="settings-button">
                                Sticky
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="sidebarBehavior"
                                   value="fixed">
                            <div class="settings-button">
                                Fixed
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="sidebarBehavior"
                                   value="compact">
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
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="layout"
                                   value="fluid">
                            <div class="settings-button">
                                Fluid
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label"
                                   type="radio"
                                   name="layout"
                                   value="boxed">
                            <div class="settings-button">
                                Boxed
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="settings-footer">
                <div class="d-grid">
                    <a class="btn btn-primary btn-lg btn-block"
                       href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/"
                       target="_blank">Purchase</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="js/terminal.js"></script>
<script src="js/balance.js"></script>
<script src="js/verification_script.js"></script>

<?php
session_start();
include("classes/user.php");
$user = new User($_SESSION['user_email']);

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database =  "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT user_id, email, is_master, account_type_id, need_balance, roi, from accounts 
                                inner join (select * from users) as tb1 on tb1.id = accounts.user_id 
                                inner join (SELECT user_id as master_user_id, need_balance, roi from master_accounts) as masters_table on masters_table.master_user_id = user_id 
                                WHERE account_type_id = 2 and is_master = 1");

$allKucoinMasters = $result->fetch_all(MYSQLI_ASSOC)

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
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Kucoin Trader</h5>
                            <h6 class="card-subtitle text-muted">Here user can select which master to connect</h6>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Master Email</th>
                                <th>Weekly ROI%</th>
                                <th class="d-none d-md-table-cell">minimum deposit</th>
                                <th class="d-none d-md-table-cell">min lot</th>
                                <th>Lot Size Scale</th>
                                <th>Enable/Disable</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($allKucoinMasters as $kucoinMaster){

                                $masterId = $kucoinMaster["user_id"];
                                $masterEmail = $kucoinMaster["email"];
                                $roi = $kucoinMaster["roi"];
                                $min_dep = $kucoinMaster["need_balance"];

                                $user->GetConnections('kucoin');
                                $connection = $user->GetConnectionByMasterID('kucoin', $masterId);
                                ?>
                                <tr master-template-tr>
                                    <td><?= $masterEmail ?></td>
                                    <td><?= $roi ?>%</td>
                                    <td class="d-none d-md-table-cell"><?= $min_dep ?> USDT</td>

                                    <?php
                                    if($kucoinMaster['user_id'] != $user->id){
                                        ?>

                                        <td>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">X</span>
                                                <input scale_coefficient type="text" class="form-control" placeholder="scale coefficient"
                                                    value="<?= $connection['scale'] ?>">
                                            </div>
                                        </td>

                                        <td class="table-action">
                                            <div class="form-check form-switch">
                                                <input master_email="<?= $masterEmail ?>" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  <?= $user->IsConnectedToMaster('kucoin', $masterId) ? "checked" : "" ?>>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                                <?php

                            } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title"><?= $user->kucoinMasterAccount == null ? "Become Master Account" : "You are the master already"?></h5>
                            <h6 class="card-subtitle text-muted">Please input the specifications </h6>
                        </div>

                        <div class="card-body">
                            <form class="row row-cols-md-auto align-items-center">

                                <div class="col-12">
                                    <label class="sr-only" for="req_deposit">Require Deposit</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-text">Require Deposit $</div>
                                        <input type="text" class="form-control" id="req_deposit" placeholder="Deposit"
                                            <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <label class="sr-only" for="roi_percent">Weekly Roi %</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-text">Weekly Roi %</div>
                                        <input type="text" class="form-control" id="roi_percent" placeholder="ROI %"
                                            <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->roi : "" ?>>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button id="submit_master_specificatins" type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>

                            </form>
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
<script src="js/verification_script.js"></script>
<script src="js/bot_control.js"></script>


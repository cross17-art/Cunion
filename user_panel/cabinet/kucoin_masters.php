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
$result = $conn->query("SELECT user_id, email, telegram, is_master, account_type_id, need_balance, roi from accounts 
                                inner join (select * from users) as tb1 on tb1.id = accounts.user_id 
                                inner join (SELECT user_id as master_user_id, need_balance, roi from master_accounts) as masters_table on masters_table.master_user_id = user_id 
                                WHERE account_type_id = 2");

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
                            <h5 class="card-title">Kucoin Masters</h5>
                            <h6 class="card-subtitle text-muted">Here user can select which master to connect</h6>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Master Email</th>
                                <th>Telegram</th>
                                <th>Declared Monthly ROI%</th>
                                <th class="d-none d-md-table-cell">Deposit</th>
                                <th>Lot Size Scale</th>
                                <th>Enable/Disable</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($allKucoinMasters as $kucoinMaster){

                                    $masterId = $kucoinMaster["user_id"];
                                    $masterEmail = $kucoinMaster["email"];
                                    $telegram = $kucoinMaster["telegram"];
                                    $roi = $kucoinMaster["roi"];
                                    $min_dep = $kucoinMaster["need_balance"];

                                    $user->GetConnections('kucoin');
                                    $connection = $user->GetConnectionByMasterID('kucoin', $masterId);
                             ?>
                                <tr master-template-tr>
                                    <td><?= $masterEmail ?></td>
                                    <td><?= $telegram ?></td>
                                    <td><?= $roi ?>%</td>
                                    <td class="d-none d-md-table-cell"><?= $min_dep ?> USDT</td>
                                    <?php
                                        if($kucoinMaster['user_id'] != $user->id){
                                    ?>

                                    <td style="width: 200px">
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
                                        } else {
                                        ?>

                                        <td class="table-action">
                                            <button id="stop_master" class="btn btn-danger" onclick="StopMaster(<?= $masterId ?>)"><i class="fas fa-times"></i> Stop being master</button>
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
                                        <div class="input-group-text">Deposit $</div>
                                        <input type="text" class="form-control" id="req_deposit" placeholder="Deposit"
                                            <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="sr-only" for="roi_percent">Declared Monthly ROI%</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-text">Monthly ROI%</div>
                                        <input type="text" class="form-control" id="roi_percent" placeholder="ROI %"
                                            <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->roi : "" ?>>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <label class="sr-only" for="telegram">telegram</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-text">Telegram</div>
                                        <input type="text" class="form-control" id="telegram" placeholder="telegram"
                                            <?= $user->telegram != null ? "value=" . $user->telegram : "" ?>>
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
        
    </div>
</div>

<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
</body>
</html>


<script src="js/verification_script.js"></script>
<script src="js/bot_control.js"></script>
<script src="js/submit_master_script.js"></script>

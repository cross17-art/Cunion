<?php
session_start();
include("classes/user.php");
include ("classes/MasterHandler.php");

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
                            <h5 class="card-title"><?= $user->kucoinMasterAccount == null ? "Become Master Account" : "You are the master already" ?></h5>
                            <?php if($user->kucoinMasterAccount !== null){ ?>
                                <button id="stop_master" class="btn btn-danger" style="display: block; padding: 10px; margin-top: 10px; margin-bottom: 20px" onclick="StopMaster(<?= $user->id ?>)">
                                    <i class="fas fa-times"></i> Stop being master
                                </button>
                            <?php }  ?>

                        </div>

                        <?php if($user->kucoinMasterAccount == null) { ?>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Please input your strategy specifications</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="input-group mb-3">
                                                <div class="input-group-text">Telegram</div>
                                                <input type="text" class="form-control" id="telegram" placeholder="Telegram"
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-text">Using Deposit</div>
                                                <input type="text" class="form-control" id="using_deposit" placeholder="Using Deposit"
                                                    <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-text">Minimum Required Deposit</div>
                                                <input type="text" class="form-control" id="req_deposit" placeholder="Minimum Required Deposit USDT"
                                                    <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-text">Trade type</div>
                                                <select id="trade_type" class="form-select flex-grow-1">
                                                    <option value="manual">Manual</option>
                                                    <option value="bot">Bot</option>
                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-text">Average number of trades per day</div>
                                                <input type="text" class="form-control" id="average_trades" placeholder="Average number of trades per day"
                                                    <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-text">Base Asset</div>
                                                <input type="text" class="form-control" id="base_asset" placeholder="Base Asset"
                                                    <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <button id="submit_master_specifications" type="submit" class="btn btn-primary mb-2">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>


                    </div>
                </div>

            </div>
        </main>
    </div>
</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<script>
    let master_TR_Element = document.querySelector("tr[master-template-tr][master-id='" + masterId + "']");
</script>

<!---->
</body>
</html>

<script src="js/verification_script.js"></script>
<script src="js/submit_master_script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#submit_master_specifications').addEventListener('click', function (event) {
            event.preventDefault();

            console.log("Master specifications submitted");

            SubmitMasterSpecification()
        })
    })
</script>








<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] ."/panel/cabinet/classes/user.php";
include_once $_SERVER['DOCUMENT_ROOT'] ."/panel/cabinet/classes/MasterHandler.php";
include_once $_SERVER['DOCUMENT_ROOT']. "/panel/cabinet/classes/TraderTransactionHandler.php";

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

if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

$coinIcon = '<i class="align-middle me-2 fas fa-fw fa-coins"></i>';
?>


<?php
$masterId = $user->id;
$masterEmail = $user->user_email;
$master = MasterHandler::GetKucoinMasterByMasterID($masterId);
$traderTransactionHandler = new TraderTransactionHandler();
$transactionList = $traderTransactionHandler->GetAllTraderTransactionRecordsByUserId($user->id);
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
    <div class="main" page="trader_payments">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Paying Info</h5>
                            <button type="button" class="btn btn-primary my-1" style="float: right" data-bs-toggle="modal" data-bs-target="#traderlWithdrawalModal">
                                Proceed Withdrawal
                            </button>
                            <div class="modal fade" id="traderlWithdrawalModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Referral Withdrawal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-3">
                                            <p class="mb-0">
                                                Please input the withdrawal amount and the wallet address
                                                <input type="text" class="form-control m-2" name="trader_withdrawal_amount" placeholder="USDT withdrawal amount">
                                                <input type="text" class="form-control m-2" name="trader_withdrawal_address" placeholder="TRC20 Address">
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="trader_withdrawal_handler.ProceedTraderWithdrawal()">Proceed Withdrawal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered mobile-table">
                                <thead>
                                <th class="text-center">Transaction Id</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Status</th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($transactionList as $traderTransaction){
                                    ?>

                                    <tr>
                                        <td class="text-center"><?= $traderTransaction['id'] ?></td>
                                        <td class="text-center"><?= $traderTransaction['date'] ?></td>
                                        <td class="text-center"><span style="color:#4bbf73 ">$<?= $traderTransaction['amount'] ?></span></td>
                                        <td class="text-center"><?= $traderTransaction['address'] ?></td>
                                        <td class="text-center"><?= $traderTransaction['status'] == 'await' ? '<span class="badge badge-soft-warning">await</span>' :
                                                '<span class="badge badge-soft-success">completed</span>'?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>

                            <?php
                            include("master_page_partial_views/master_paying_info.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("footer.php") ?>
    </div>
</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<!---->
</body>
</html>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        if(document.querySelector('#submit_master_specifications') != null){
            document.querySelector('#submit_master_specifications').addEventListener('click', function (event) {
                event.preventDefault();
                console.log("Master specifications submitted");
                SubmitMasterSpecification()
            })
        }
    })
</script>


<script src="js/verification_script.js"></script>
<script src="js/date_handler.js"></script>
<script src="cabinet_master_account_parts/js/trader_withdrawal_handler.js?<?=filemtime('cabinet_master_account_parts/js/trader_withdrawal_handler.js')?>"></script>
<script src="js/notification_handler.js"></script>

<?php

?>



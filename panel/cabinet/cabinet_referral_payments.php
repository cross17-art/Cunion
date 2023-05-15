<?php
session_start();

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
include_once ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
$user = new User($_SESSION['user_email']);
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

include_once ($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/ReferralTransactionHandler.php");
$referralCoefficient = 0.05;
$referralTransactionHandler = new ReferralTransactionHandler();
$transactionList = $referralTransactionHandler->GetAllReferralTransactionRecordsByUserId($user->id);
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
    <div class="main" page="referral_payments">
        <?php include("cabinet_header.php"); ?>

        <main class="content">

            <div class="container-fluid p-0">

                <h1 class="h3 mb-3">Referral</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Your Referrals</h5>
                            </div>
                            <div class="card-body">

                                <p>
                                <h5>Total Referrals: <span style="font-size: 15px"><?= count($user->GetReferralUserList()) ?> users</span></h5>
                                <h5>Total Referral Earnings: <span style="color:#4BBF73; font-size: 15px">$<?= $user->CalculateReferralEarning() ?></span></h5>
                                <button type="button" class="btn btn-primary my-1 wide-screen-float-right"  data-bs-toggle="modal" data-bs-target="#referralWithdrawalModal">
                                    Proceed Withdrawal
                                </button>
                                <div class="modal fade" id="referralWithdrawalModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Referral Withdrawal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <p class="mb-0">
                                                    Please input the withdrawal amount and the wallet address
                                                    <input type="text" class="form-control m-2" name="ref_withdrawal_amount" placeholder="USDT withdrawal amount">
                                                    <input type="text" class="form-control m-2" name="ref_withdrawal_address" placeholder="TRC20 Address">
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="referral_withdrawal_handler.ProceedReferralWithdrawal()">Proceed Withdrawal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Your Referral Withdrawal Requests</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered mobile-table small-text-mobile">
                                    <thead>
                                    <th class="text-center">Transaction Id</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Status</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($transactionList as $referralTransaction){
                                        ?>

                                        <tr>
                                            <td class="text-center"><?= $referralTransaction['id'] ?></td>
                                            <td class="text-center"><?= $referralTransaction['date'] ?></td>
                                            <td class="text-center"><span style="color:#4bbf73 ">$<?= $referralTransaction['amount'] ?></span></td>
                                            <td class="text-center"><?= $referralTransaction['address'] ?></td>
                                            <td class="text-center"><?= $referralTransaction['status'] == 'await' ? '<span class="badge badge-soft-warning">await</span>' :
                                                    '<span class="badge badge-soft-success">completed</span>'?></td>
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

            </div>
        </main>
        <?php include("footer.php") ?>
    </div>
</div>

<style>

    @media screen and (max-width: 768px) {
        .small-text-mobile{
            font-size: 10px;
        }

        .mobile-table{
            zoom: 75%;
        }
    }

    @media screen and (min-width: 768px) {
        .wide-screen-float-right{
            float: right;
        }
    }

</style>

<script src="js/app.js"></script>
<script src="js/referral_withdrawal_handler.js?<?= filemtime('js/referral_withdrawal_handler.js') ?>"></script>
<script src="js/notification_handler.js"></script>
</body>
</html>


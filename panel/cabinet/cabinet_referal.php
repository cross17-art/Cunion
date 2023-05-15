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
    <div class="main" page="cabinet_referal">
        <?php include("cabinet_header.php"); ?>

        <main class="content">

            <div class="container-fluid p-0">

                <h1 class="h3 mb-3">Referral</h1>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Your Referral Link</h5>

                            </div>
                            <div class="card-body">
                                <span ref_link class="badge badge-soft-info" style="font-size: 15px">
                                    <?= 'https://cunion.io/?ref=' . $user->id ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Your Referals</h5>
                            </div>
                            <div class="card-body">

                                <p>
                                <h5>Total Referrals: <span style="font-size: 15px"><?= count($user->GetReferralUserList()) ?> users</span></h5>
                                <h5>Total Referral Earnings: <span style="color:#4BBF73; font-size: 15px">$<?= $user->CalculateReferralEarning() ?></span></h5>

                                </p>
                                <br>
                                <p>Referral Users Transactions</p>
                                <table class="table table-striped table-sm small-text-mobile">
                                    <thead>
                                    <th class='text-center'>Id</th>
                                    <th class='text-center'>Nickname</th>
                                    <th class='text-center'>Transaction Date</th>
                                    <th class='text-center'>Referral earnings</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $referrals = $user->GetReferralUserList();
                                    foreach ($referrals as $refUser){

                                        /**
                                         * @var User $refUser
                                         */

                                        $transactionList = $refUser->transactions->GetAllCompletedTransactions();
                                        foreach ($transactionList as $transactionRecord){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $refUser->id ?></td>
                                            <td class="text-center"><?= $refUser->nickname ?></td>
                                            <td class="text-center"><?= $transactionRecord['date'] ?></td>
                                            <td class="text-center"><span style="color:#4bbf73">$<?= $transactionRecord['amount'] * $referralCoefficient ?></span></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <br>
                                <p>Total Earning by User</p>
                                <table class="table table-striped table-sm small-text-mobile">
                                    <thead>
                                    <th class='text-center'>Id</th>
                                    <th class='text-center'>Nickname</th>
                                    <th class='text-center'>Transaction</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $referrals = $user->GetReferralUserList();
                                    foreach ($referrals as $refUser){
                                        /**
                                         * @var User $refUser
                                         */
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $refUser->id ?></td>
                                            <td class="text-center"><?= $refUser->nickname == "" ? "no_nickname" : $refUser->nickname?></td>
                                            <td>Total Earnings: <span style="color:#4bbf73">$<?= $refUser->transactions->GetTotalCompletedTransactionsSum() * $referralCoefficient ?></span></td>

                                        </tr>
                                    <?php

                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
//                                    include ("cabinet_referral_parts/ref_table_v1.php")
                                ?>
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
<script src="js/referral_withdrawal_handler.js"></script>
<script src="js/notification_handler.js"></script>
</body>
</html>


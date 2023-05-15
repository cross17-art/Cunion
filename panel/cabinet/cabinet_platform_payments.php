<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/FullConnectionIntervalModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/HourlyBalancePointsModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TransactionModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TimeHandler.php");

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

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

<?php
$hourlyPointsList= HourlyBalancePointsModel::LoadBalancePointsByUserIdFromDB($user->id);
$allConnectionIntervals = FullConnectionIntervalModel::GetAllConnectionIntervalsByFollowerId($user->id);
$transactionList = TransactionModel::GetAllTransactionsByUserId($user->id);
$completedTransactionList = TransactionModel::GetAllCompletedTransactionsByUserId($user->id);
?>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="platform_payments">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">
                <div class="card py-2 py-md-3">
                    <div class="card-header">
                        Paying info
                    </div>
                    <div class="card-body py-2 py-md-3">
                        <?php include ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/cabinet_paying_info_parts/payment_notification_modal.php"); ?>
                    </div>
                    <div class="card-body py-2 py-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border py-2 py-md-3">
                                    <div class="card-header">
                                        Connectoin Intervals
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-sm mobile-table">
                                            <thead>
                                            <th class="text-center">Trader</th>
                                            <th class="text-center d-none d-xl-table-cell">Connected At</th>
                                            <th class="text-center d-none d-xl-table-cell">Disconnected At</th>
                                            <th class="text-center">Interval Sec</th>
                                            <th class="text-center d-none d-md-table-cell">Average Balance</th>
                                            <th class="text-center">Bill</th>
                                            <th class="text-center d-none d-xl-table-cell">Paid</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($allConnectionIntervals as $connectionInterval) {
                                                /**
                                                 * @var FullConnectionIntervalModel $connectionInterval
                                                 */

                                                $connectionInterval->CalculateUsingHourlyPoints($hourlyPointsList);
                                                ?>
                                                <tr class="text-center">
                                                    <td><?= $connectionInterval->masterNickname ?> </td>
                                                    <td class="text-center d-none d-xl-table-cell"><?= $connectionInterval->connectedAt ?> </td>
                                                    <td class="text-center d-none d-xl-table-cell"><?= $connectionInterval->disconnectedAt ?> </td>
                                                    <td><?= TimeHandler::SecondsToFormatInterval($connectionInterval->timerInterval) ?> </td>
                                                    <td class="trd_tooltip text-center d-none d-md-table-cell"  style="position: relative; color: #43a46b">
                                                        <?=  '$' . number_format($connectionInterval->CalculateAverageBalanceForUsingHourlyPoints(), 2) ?>
                                                        <?php
                                                        if(count($connectionInterval->usingHourlyBalancePoints) != 0){
                                                            include ("cabinet_paying_info_parts/using_hourly_points_tooltip.php");
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="position: relative; color: #43a46b"><span style="color: #43a46b"> <?= "$" . number_format($connectionInterval->CalculateBill(),4)  ?> </span>  </td>
                                                    <td class="text-center d-none d-xl-table-cell"> <?= $connectionInterval->paid == true ? "..." : "..." ?></td>
                                                </tr>

                                                <?php
                                            }
                                            ?>
                                            <tr class="text-center">
                                                <td></td>
                                                <td class="text-center d-none d-xl-table-cell"></td>
                                                <td class="text-center d-none d-xl-table-cell"></td>
                                                <td></td>
                                                <td colspan="3">
                                                    <span>Total Bill:</span>
                                                    <?php $restBill =  FullConnectionIntervalModel::CalculateTotalNotPaidIntervalsBill($allConnectionIntervals) - TransactionModel::CalculateTotalPayedTransactionSum($completedTransactionList)?>
                                                    <span style="color: #43a46b" total-bill="<?= $restBill ?>" ><?= "$" . number_format($restBill, 4) ?></span>
                                                    <button type="button" class="btn btn-primary my-1" style="padding-left: 10px; width: 75px" data-bs-toggle="modal" data-bs-target="#paymentWindow">
                                                        Pay
                                                    </button>
                                                    <div class="modal fade" id="paymentWindow" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Payment</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body m-3" >
                                                                    <p class="mb-0" >
                                                                        Total Bill is <?= number_format($restBill, 0) ?> USDT
                                                                    </p>
                                                                    <div transactoin-data-block style="display: none">
                                                                        <div>TRC20 Address:<span class="txn_data" style="color:#3f80ea" address></span></div>
                                                                        <div>USDT amount:<span class="txn_data" style="x" amount></span></div>
                                                                        <div><span class="txn_data" status_url style="color:#3f80ea"></span></div>
                                                                        <canvas id="qr"></canvas>
                                                                        <img qr_code_url>
                                                                        <div>txn_id:<span class="txn_data" txn_id></span></div>

                                                                        <style>
                                                                            .txn_data{
                                                                                color:#3f80ea;
                                                                                padding-bottom: 5px;
                                                                            }

                                                                            [transactoin-data-block] > div{
                                                                                padding-bottom: 5px;
                                                                                padding-top: 5px;
                                                                            }
                                                                        </style>

                                                                    </div>
                                                                    <p>
                                                                    <div id="payment_spinner"  style="display: none" class="spinner-grow text-info me-2" role="status">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>
                                                                    </p>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" onclick="Create_total_bill_transaction()">Proceed Payment</button>
                                                                </div>
                                                            </div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border py-2 py-md-3">
                                    <div class="card-header">
                                        Connectoin Intervals
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-sm mobile-table">
                                            <thead>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center d-none d-xl-table-cell">Address</th>
                                            <th class="text-center d-none d-xl-table-cell">TXN_ID</th>
                                            <th class="text-center d-none d-md-table-cell">Status Url</th>
                                            <th class="text-center">Status</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($transactionList as $transaction){
                                                ?>

                                                <tr class="text-center">
                                                    <td> <?= $transaction['date'] ?> </td>
                                                    <td><span style="color: #43a46b"> $<?= $transaction['amount'] ?></span></td>
                                                    <td class="text-center d-none d-xl-table-cell"> <?= $transaction['address'] ?> </td>
                                                    <td class="text-center d-none d-xl-table-cell"> <?= $transaction['txn_id'] ?> </td>
                                                    <td class="text-center d-none d-md-table-cell"> <a href="<?= $transaction['status_url'] ?>"> status url </a></td>
                                                    <td> <?= $transaction['completed'] == true ? '<span class="badge bg-success">Completed</span>' : "await" ?> </td>
                                                </tr>

                                                <?php
                                            }
                                            ?>

                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td class="text-center d-none d-xl-table-cell"></td>
                                                <td class="text-center d-none d-xl-table-cell"></td>
                                                <td class="text-center d-none d-md-table-cell"></td>
                                                <td>Total Payed: <span style="color:#43a46b ">$<?= TransactionModel::CalculateTotalPayedTransactionSum($completedTransactionList) ?></span></td>
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




<script src="js/app.js"></script>
<script src="js/node_modules/qrcode/build/qrcode.min.js"></script>

</body>
</html>


<?php
/**
 * @var $masterId
 */

include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/FullConnectionIntervalModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/MasterPaymentModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/MasterPaymentModelExtended.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/HourlyBalancePointsModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/AverageBalanceModel.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/TimeHandler.php");

HourlyBalancePointsModel::LoadHourlyBalancePointsByMasterId($masterId);
$masterConnectionIntervalsList = FullConnectionIntervalModel::GetAllConnectionIntervalsByMasterId($masterId);

$masterPaymentTotalModel = new MasterPaymentModel($masterConnectionIntervalsList);
//$masterPaymentTotalModel = new MasterPaymentModelExtended($masterConnectionIntervalsList);


?>
<div class="card py-2 py-md-3">
    <div class="card-body py-2 py-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card border py-2 py-md-3">
                    <div class="card-header">
                        <button class="btn btn-primary" style="padding-left: 10px;" onclick="SwitchDetails()">View
                            Details
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="master_paying_details" class="table table-striped table-sm mobile-table" style="display: none">
                            <thead>
                            <th class="text-center">Follower</th>
                            <th class="text-center">Connected At</th>
                            <th class="text-center">Disconnected At</th>
                            <th class="text-center">Interval Sec</th>
                            <th class="text-center">AverageBalance</th>
                            <th class="text-center">Bill</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($masterConnectionIntervalsList as $connectionInterval) {

                                /**
                                 * @var FullConnectionIntervalModel $connectionInterval
                                 */
                                $usingHourlyPointsForUserId = HourlyBalancePointsModel::GetAllPointsByUserIdFromMasterPointList($connectionInterval->followerId);
                                $connectionInterval->CalculateUsingHourlyPoints($usingHourlyPointsForUserId);
                                ?>
                                <tr class="text-center">
                                    <td><?= $connectionInterval->followerNickname . "[" . $connectionInterval->followerId . "]" ?> </td>
                                    <td><?= $connectionInterval->connectedAt ?> </td>
                                    <td><?= $connectionInterval->disconnectedAt == NULL ? "still connected" : $connectionInterval->disconnectedAt ?> </td>
                                    <td><?= TimeHandler::SecondsToFormatInterval($connectionInterval->timerInterval) ?> </td>
                                    <td class="trd_tooltip" style="position: relative; color: #43a46b">
                                        <?= '$' . number_format($connectionInterval->CalculateAverageBalanceForUsingHourlyPoints(), 4) ?>
                                        <?php
                                        if (count($connectionInterval->usingHourlyBalancePoints) != 0) {
                                            include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/cabinet_paying_info_parts/using_hourly_points_tooltip.php");
                                        }
                                        ?>
                                    </td>
                                    <td style="position: relative; color: #43a46b">  <?= "$" . number_format($connectionInterval->CalculateBill(), 4) ?></td>
                                </tr>

                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                        <table class="table table-striped table-sm">
                            <thead>
                            <th class="text-center">Total Intervals Count</th>
                            <th class="text-center">Total timer</th>
                            <th class="text-center">Total Average Balance</th>
                            <th class="text-center">Total Bill</th>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td><?= $masterPaymentTotalModel->GetConnectionIntervalCount() ?></td>
                                <td><?= TimeHandler::SecondsToFormatInterval($masterPaymentTotalModel->GetTotalIntervalSec()) ?></td>
                                <td><span style="color: #43a46b">$<?= number_format($masterPaymentTotalModel->GetTotalAverageBalance(),4) ?><span></span></td>
                                <td>
                                    <span style="color: #43a46b">$<?= number_format($masterPaymentTotalModel->GetTotalBill(),4) ?></span>
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

<style>
    table {
        font-size: 12px;
    }
</style>


<script>
    function SwitchDetails() {
        let detailsElement = document.querySelector('#master_paying_details')
        if (detailsElement.style.display !== '') {
            detailsElement.style.display = "";
        } else {
            detailsElement.style.display = "none";
        }
    }
</script>
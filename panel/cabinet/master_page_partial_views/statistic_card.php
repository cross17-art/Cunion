<?php

/**
 *  @var $baseAsset;
 */


$badgeClass = "";
if($baseAsset == "USDT"){
    $badgeClass = 'badge-soft-success';
} else if($baseAsset == "BTC"){
    $badgeClass = 'badge-soft-warning';
}

?>

<div class="card-body" style="font-size: 14px; height: 180px; padding-top: 20px">
    <table class="table table-bordered mobile-table mini-statistics-table">
        <thead>
        <th class="text-center">Total Profit</th>
        <th class="text-center">Total Roi</th>
        </thead>
        <tbody>
        <tr>
            <td class="text-center"><span class="hudge-badge" total_profit></span></td>
            <td class="text-center"><span class="hudge-badge" total_roi></span></td>
        </tr>
        </tbody>
    </table>

    <table class="table table-bordered mobile-table mini-statistics-table">
        <thead>
        <th class="text-center">Start Deposit</th>
        <th class="text-center">Total Transfer</th>
        <th class="text-center">Total Deposit</th>
        <th class="text-center">Current Balance</th>
        </thead>
        <tbody>
        <tr>
            <td class="text-center">
                <span class="badge <?= $badgeClass ?>"  start_deposit></span>
            </td>
            <td class="text-center">
                <span class="badge badge-soft-info"  total_transfer></span>
            </td>
            <td class="text-center">
                <span class="badge <?= $badgeClass ?>"  total_deposit></span>
            </td>
            <td class="text-center">
                <span class="badge <?= $badgeClass ?>"  current_balance></span>
            </td>
        </tr>
        </tbody>
    </table>
</div>

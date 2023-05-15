<table class="table table-striped my-0 mobile-table">
    <thead>
    <tr>
        <th class="text-center" style="width: 170px">Coin</th>
<!--        class="text-end"-->
        <th class="text-center">Amount</th>
        <th class="text-center">in USDT</th>
        <th class="d-none d-xl-table-cell" style="width: 67% !important;">% of balance</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $index = 4;
    foreach ($masterPortfolio as $asset) {
        if($totalBalanceInUSDT != 0){
            $assetPercent = round($asset['asset_amount'] / $totalBalanceInUSDT * 100, 1);
        } else {
            $assetPercent = 0;
        }


        $index++;
        $colorIndex = bcmod($index, count($allColors));
        $barColor = $allColors[$colorIndex];
        ?>
        <tr>
            <td coin-name="<?= $asset["asset_name"] ?>" class="text-center">
                <img style="margin-left: 5px;width: 25px;" class="coin_icon" src="">
                <?= $asset["asset_name"] ?>
            </td>
            <td class="text-center"><?= $asset["base_asset_amount"] ?></td>
            <td class="text-center"><?= $asset["asset_amount"] ?></td>
            <td class="d-none d-xl-table-cell">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar"
                         percent="<?= $assetPercent ?>"
                         style="width: <?= $assetPercent ?>%; background-color: <?= $barColor ?> !important; margin-right: 5px"
                         aria-valuenow="<?= $assetPercent ?>" aria-valuemin="0"
                         aria-valuemax="100"><?= $assetPercent >= 3 ? $assetPercent . "%" : "" ?></div> <?= $assetPercent < 3 ? "  " . $assetPercent . "%" : "" ?>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
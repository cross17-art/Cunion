

<tr master-template-tr master-id="<?= $masterId ?>" style="<?= $user->IsConnectedToMaster('kucoin', $masterId) ? " background-color: #1f9bcf1c; border: 2px solid #1f9bcf; " : " " ?> <?= $kucoinMaster['user_id'] == $user->id ? " background-color: #47ae6d30" : "" ?>">
    <hr style="display: none" master-table-hr>
    <!--                                        <td>--><? //= $masterEmail ?><!--</td>-->
    <td profile>
        <a href="https://cunion.io/client/cabinet/cabinet_master_page.php?master-id=<?= $masterId ?>"><?= $nickname ?></a>
        <?php if ($user->IsConnectedToMaster('kucoin', $masterId)) { ?>
            <div><span class="badge bg-info" style="padding: 5px; margin-top: 5px">Connected</span></div>
        <?php } ?>

    </td>

    <td portfolio>
        <canvas style="width: 120px; height: 70px; display: block; margin: auto" id="chartjs-bars-<?= $masterEmail ?>" chart="master_portfolio" master-id="<?= $masterId ?>"></canvas>
    </td>

    <td balance>
        <canvas style="margin: auto" id="chartjs-line-<?= $masterEmail ?>" chart="master_balance" master-id="<?= $masterId ?>"></canvas>
    </td>

    <td roi>
        <div>
            <div roi-per-day class="trd_roi_stat trd_tooltip">
                <span class="trd_tooltiptext">Roi Per Day</span>
                <svg upper-daily-arrow style="transform: scale(1.5); display: none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up align-middle me-2 trd_roi_stat_block table_roi_icon">
                    <polyline arrow_x2 points="17 11 12 6 7 11"></polyline>
                    <polyline arrow_x1 points="17 18 12 13 7 18"></polyline>
                </svg>
                <svg down-daily-arrow style="transform: scale(1.5); display: none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down align-middle me-2 trd_roi_stat_block table_roi_icon">
                    <polyline arrow_x2  points="7 13 12 18 17 13"></polyline>
                    <polyline arrow_x1 points="7 6 12 11 17 6"></polyline>
                </svg>
                <div daily-profit style="width: 140px" class="trd_roi_stat_block">

                </div>
                <div style="display: inherit"> per day</div>
            </div>
        </div>

        <div>
            <div roi-per-week class="trd_roi_stat trd_tooltip">
                <span class="trd_tooltiptext">Roi Per Week</span>
                <svg upper-weekly-arrow style="transform: scale(1.5); display: none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up align-middle me-2 trd_roi_stat_block table_roi_icon">
                    <polyline arrow_x2 points="17 11 12 6 7 11"></polyline>
                    <polyline arrow_x1 points="17 18 12 13 7 18"></polyline>
                </svg>
                <svg down-weekly-arrow style="transform: scale(1.5); display: none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down align-middle me-2 trd_roi_stat_block table_roi_icon">
                    <polyline arrow_x2  points="7 13 12 18 17 13"></polyline>
                    <polyline arrow_x1 points="7 6 12 11 17 6"></polyline>
                </svg>
                <div weekly-profit style="width: 140px" class="trd_roi_stat_block">

                </div>
                <div style="display: inherit"> per 7 days</div>
            </div>
        </div>


        <style>
            .trd_roi_stat {
                width: 200px;
                margin: auto;
                margin-bottom: 10px;
            }

            .trd_roi_stat_block {
                display: block;
                float: left;
            }

            .table_roi_icon {
                margin-right: 5px;
            }

            .arrow-slow {

            }

        </style>
    </td>

    <td statistic>
        <div class="trd_tooltip">
            <i class="align-middle me-2 fas fa-fw fa-users" style="width: 25px;"></i> <span users_count class="align-middle">0</span> <span class="trd_tooltiptext" style="font-size: 0.7em">Total investors</span>
        </div>

        <div style="margin-top: 10px">
            <div class="trd_tooltip">
                <?= $rate . "  " ?><?php
                $intRate = intval($rate);
                $rest = $rate - $intRate;
                for ($i = 0; $i < $intRate; $i++) {
                    echo('<i class="align-middle me-2 fas fa-fw fa-star"></i>');
                }
                if ($rest != 0) {
                    echo('<i class="align-middle me-2 fas fa-fw fa-star-half-alt"></i>');
                }
                if ($rate == 0) {
                    echo('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star align-middle me-2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>');
                }
                ?>
                <span class="trd_tooltiptext" style="font-size: 0.7em">Rating</span>
            </div>
        </div>

        <div>
            <div class="input-group mb-3 trd_tooltip" style="margin: auto; display: block; width: fit-content; margin-top: 20px; ">
                <span total_investment class="input-group-text" style="font-size: 16px;"> 0 USDT </span> <span class="trd_tooltiptext" style="font-size: 0.7em">Total Investments</span>
            </div>
        </div>


    </td>
</tr>
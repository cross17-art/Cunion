<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/ConnectionButton.php";

/**
 * @var $masterId
 * @var User $user
 * @var $nickname
 * @var $baseAsset
 * @var $days
 * @var $kucoinMaster
 * @var $tradeDirection
 * @var $masterEmail
 * @var $tradeType
 */

$upArrow = '<svg style="color: #4bbf73" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up align-middle me-2 badge-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>';
$downArrow = '<svg style="color: #d9534f" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down align-middle me-2 badge-icon"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>';
$infoIcon = '<svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle align-middle me-2 master-info-icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>';


$connectionButton = new ConnectionButton($user, $masterId, $masterEmail);
$connectionButton->RenderModalLayout();

?>

<tr master-template-tr master-id="<?= $masterId ?>"
    class="<?= $rowRoleClass = $user->IsConnectedToMaster('kucoin', $masterId) ? "connected-to-current-master" : "" ?> <?= $kucoinMaster['user_id'] == $user->id ? "is-master" : ""  ?>"
    style="<?= $user->IsConnectedToMaster('kucoin', $masterId) ? " background-color: #1f9bcf1c; border: 2px solid #1f9bcf; " : " " ?> <?= $kucoinMaster['user_id'] == $user->id ? " background-color: #47ae6d30" : "" ?>">
    <hr style="display: none" master-table-hr>
    <!--                                        <td>--><? //= $masterEmail ?><!--</td>-->
    <td profile>
        <a href="https://cunion.io/panel/cabinet/cabinet_master_page?master-id=<?= $masterId ?>"><?= $nickname ?></a>
        <?php if ($user->IsConnectedToMaster('kucoin', $masterId)) { ?>
            <div><span class="badge bg-info" style="padding: 5px; margin-top: 5px">Connected</span></div>
        <?php } ?>
        <div style="margin-top: 10px">
            <img src="https://assets.staticimg.com/cms/media/1lB3PkckFDyfxz6VudCEACBeRRBi6sQQ7DDjz0yWM.svg"
                 style="width: 70px;;">


            <?php
            $baseAssetIcon = "https://assets-currency.kucoin.com/60c34ba0db892b0006d7b0ec_USDT.png";
            if ($baseAsset == "USDT") {
                $baseAssetIcon = "https://assets-currency.kucoin.com/60c34ba0db892b0006d7b0ec_USDT.png";
            }
            if ($baseAsset == "BTC") {
                $baseAssetIcon = "https://assets-currency.kucoin.com/60bf8a90db892b0006d73786_BTC.png";
            }
            ?>


            <img style="margin-left: 5px;width: 20px;" class="coin_icon" src="<?= $baseAssetIcon ?>">

        </div>
        <div style="margin-top: 14px;"><span style="font-size: 13px"> Age(days): <?= intval($days) ?> </span></div>
    </td>
    <td portfolio>
        <canvas style="width: 100px; height: 55px; display: block; zoom: 125%; margin: auto"
                id="chartjs-bars-<?= $masterId ?>" chart="master_portfolio" master-id="<?= $masterId ?>"></canvas>
        <div class="trader-characteristics">


            <span class="badge badge-soft-info trd_tooltip" spot-label>
                spot
                <span class="trd_tooltiptext">Тип рынка</span>
            </span>

            <?php
            $tradeTypeTooltip = "";
            if ($tradeType == "bot") {
                $tradeTypeTooltip = "Стратегия под автоматическим управлением бота";
            } else if ($tradeType == "manual") {
                $tradeTypeTooltip = "Ручная торговля";
            }
            $badge_class_TradeType = "badge-soft-warning";

            $badge_class_TradeDirection = "";
            $direction_value = "";
            $directionTooltip = "";
            if ($tradeDirection == "long") {
                $badge_class_TradeDirection = "badge-soft-success";
                $direction_value = $tradeDirection . $upArrow;
            } else if ($tradeDirection == "short") {
                $badge_class_TradeDirection = "badge-soft-danger";
                $direction_value = $tradeDirection . $downArrow;
            } else if ($tradeDirection == "S/L") {
                $badge_class_TradeDirection = "badge-soft-info";
                $direction_value = $downArrow . $tradeDirection . $upArrow;
                $directionTooltip = "Смешаный тип. Как на Лонг, так и на Шорт";
            }
            ?>


            <span class="badge trd_tooltip <?= $badge_class_TradeType ?>" trade-type="<?= $tradeType ?>"><?= $tradeType ?>
                <span class="trd_tooltiptext">
                    <?= $tradeTypeTooltip ?>
                </span>
            </span>
            <span class="badge trd_tooltip <?= $badge_class_TradeDirection ?>" trade-direction="<?= $tradeDirection ?>"><?= $direction_value ?>
                <?php if($tradeDirection != 'short' && $tradeDirection != 'long') {?>
                <span class="trd_tooltiptext">
                    <?= $directionTooltip ?>
                </span>
                <?php } ?>
            </span>
        </div>
    </td>
    <td balance style="position: relative; padding: 0px">
        <canvas style="margin: auto; width: 250px; height: 95px; zoom: 125%" id="chartjs-line-<?= $masterId ?>"
                chart="master_balance" usdt-balance master-id="<?= $masterId ?>"></canvas>
        <canvas style="margin: auto; width: 250px; height: 95px; zoom: 125%; display: none; opacity: 0; transform: scale(0.2)"
                id="chartjs-line-<?= $masterId . "_btc" ?>" chart="master_balance" btc-balance></canvas>

        <style>
            [chart=master_balance] {
                transition: opacity 0.37s, transform 0.37s;
            }
        </style>
    </td>


    <td roi>
        <div roi-indicator-template style="display: none">
            <div indicator class="trd_roi_stat trd_tooltip">
                <span indicator-tooltip class="trd_tooltiptext"></span>
                <svg indicator-upper-arrow style="transform: scale(1.5);" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-chevrons-up align-middle me-2 table_roi_icon">
                    <polyline arrow_x2 points="17 11 12 6 7 11"></polyline>
                    <polyline arrow_x1 points="17 18 12 13 7 18"></polyline>
                </svg>
                <svg indicator-down-arrow style="transform: scale(1.5);" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-chevrons-down align-middle me-2 table_roi_icon">
                    <polyline arrow_x2 points="7 13 12 18 17 13"></polyline>
                    <polyline arrow_x1 points="7 6 12 11 17 6"></polyline>
                </svg>
                <div indicator-profit style="width: 160px" class="trd_roi_stat_block"></div>
                <div indicator-title style="display: inherit" class="roi_period"></div>
            </div>
        </div>


        <div roi-indicator-template_BTC style="display: none">
            <div indicator class="trd_roi_stat trd_tooltip">
                <span indicator-tooltip class="trd_tooltiptext"></span>
                <svg indicator-upper-arrow style="transform: scale(1.5);" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-chevrons-up align-middle me-2 table_roi_icon">
                    <polyline arrow_x2 points="17 11 12 6 7 11"></polyline>
                    <polyline arrow_x1 points="17 18 12 13 7 18"></polyline>
                </svg>
                <svg indicator-down-arrow style="transform: scale(1.5);" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-chevrons-down align-middle me-2 table_roi_icon">
                    <polyline arrow_x2 points="7 13 12 18 17 13"></polyline>
                    <polyline arrow_x1 points="7 6 12 11 17 6"></polyline>
                </svg>
                <div indicator-profit style="width: 160px" class="trd_roi_stat_block"></div>
                <div indicator-title style="display: inherit" class="roi_period"></div>
            </div>
        </div>
    </td>
    <td statistic>
        <div class="trd_tooltip">
            <i class="align-middle me-2 fas fa-fw fa-users" style="width: 25px;"></i>
            <span users_count class="align-middle">0</span>
            <span class="trd_tooltiptext" style="font-size: 0.7em">Total investors</span>
        </div>
        <div style="margin-top: 10px; display: none">
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
            <div class="input-group mb-3 trd_tooltip"
                 style="margin: auto; display: block; width: fit-content; margin-top: 20px; width: 160px">
                <span total_investment class="input-group-text"
                      style="font-size: 16px; border-radius: 3px"> 0 USDT </span>
                <span class="trd_tooltiptext" style="font-size: 0.7em">Total USDT Investments under control of the Trader</span>
            </div>
        </div>
    </td>
    <td button_connection>

        <?php
        include("./master_page_partial_views/connection_button.php");
        ?>
        <?php if($masterId != $user->id) {?>
            <a href="https://cunion.io/panel/cabinet/cabinet_master_page?master-id=<?= $masterId ?>"><button class="btn btn-info" style="width: 45px" ya-goal="goal-master-info-button"><?= $infoIcon ?></button></a>
        <?php }?>
    </td>
    <td style="position: relative;  width: 0px; padding: 0;">

        <?php include ("master_info_block.php")?>

    </td>
</tr>

<style>

    .master-info-icon{

    }
</style>
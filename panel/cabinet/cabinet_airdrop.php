<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/AirDropHandler.php";

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


$airdrop_handler = new AirDropHandler();
//$totalAirDropPoints = $airdrop_handler->CalculateTotalPoints();

$checkedIcon = '<svg style="color: #4bbf73" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle me-2-on-wide"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
$crossIcon = '<svg style="color: #d9534f" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle align-middle me-2-on-wide"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
$coinIcon = ' <i class="align-middle me-2 fas fa-fw fa-coins" style="color:#a9acb3 !important; "></i>';

$telegramIcon = '<i class="align-middle me-2 fab fa-fw fa-telegram"></i>';
$twitterIcon = '<i class="align-middle me-2 fab fa-fw fa-twitter"></i>';
$vkIcon = '<i class="align-middle me-2 fab fa-fw fa-vk"></i>';

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
    <div class="main" page="cabinet_airdrop">
        <?php include("cabinet_header.php"); ?>

        <main class="content">

            <div class="container-fluid p-0">

                <h1 class="h3 mb-3">
                    <span class="badge badge-soft-danger air-drop-badge" style="font-size: 18px">
                        Airdrop
                    </span>
                    <span class="text-success mobile-rate-header">
                        Current rate: 1 point
                        ≈ <span class="badge badge-soft-info" style="position:relative; bottom: 2px">CTU</span><span style="color: #1f9bcf"> <?= number_format($airdrop_handler->CalculateRate(), 2) ?></span>
                        ≈ $<?= number_format($airdrop_handler->CalculateRate(), 2) ?>
                    </span>
                </h1>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Your social contacts <?= ToolTip::DrawToolTip('Ваши контакты') ?> </h5>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3 social-input">
                                    <span class="input-group-text trd-social-icon  <?= $user->socials->GetTelegram() != null ? "trd-social-input-enabled" : "" ?>">
                                        <a href="https://t.me/cunion" style="color: inherit; text-decoration: none" class="trd_tooltip">
                                            <?= $telegramIcon ?>
                                            <span class="trd_tooltiptext">..</span>
                                        </a>
                                    </span>
                                    <input type="text" class="form-control"
                                           value="<?= $user->socials->GetTelegram() == null ? "" :  $user->socials->GetTelegram()?>"
                                           name="telegram"
                                           placeholder="Input your telegram">
                                </div>
                                <div class="input-group mb-3 social-input">
                                    <span class="input-group-text trd-social-icon  <?= $user->socials->GetTwitter() != null ? "trd-social-input-enabled" : "" ?>">
                                        <a href="https://twitter.com/cunionofficial" style="color: inherit; text-decoration: none" class="trd_tooltip">
                                            <?= $twitterIcon ?>
                                            <span class="trd_tooltiptext">...</span>
                                        </a>
                                    </span>
                                    <input type="text" class="form-control"
                                           value="<?= $user->socials->GetTwitter() == null ? "" :  $user->socials->GetTwitter()?>"
                                           name="twitter"
                                           placeholder="Input your Twitter">
                                </div>
                                <div class="input-group mb-3 social-input">
                                    <span class="input-group-text  <?= $user->socials->GetVKId() != null ? "trd-social-input-enabled" : "" ?>">
                                        <a href="https://vk.com/cunion" style="color: inherit; text-decoration: none" class="trd_tooltip">
                                            <?= $vkIcon ?>
                                            <span class="trd_tooltiptext">...</span>

                                        </a>
                                    </span>
                                    <input type="text" class="form-control"
                                           value="<?= $user->socials->GetVKId() == null ? "" :  $user->socials->GetVKId()?>"
                                           name="vk_id"
                                           placeholder="Input your VkId">
                                </div>

                                <button class="btn btn-primary" ya-goal="goal-submit-socials" onclick="SubmitSocials()" >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Air Drop Participation <?= ToolTip::DrawToolTip('Таблица наград и заданий') ?> </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered small-text-mobile mobile-table">
                                    <p>
                                        The following conditions should met at the time of Airdrop accrual.
                                    </p>
                                    <thead>
                                    <th class="text-center min">
                                        Description <?= ToolTip::DrawToolTip('Описание заданий') ?>
                                    </th>
                                    <th class="text-center trd_tooltip_mobile">
                                        Reward <?= ToolTip::DrawToolTip('Награды', 'hide-on-mobile') ?>
                                          <span class="trd_tooltiptext_mobile">Награды</span>
                                    </th>
                                    <th class="text-center trd_tooltip_mobile">
                                        Status <?= ToolTip::DrawToolTip('Статус задания', 'hide-on-mobile') ?>
                                          <span class="trd_tooltiptext_mobile">Статус задания</span>
                                    </th>
                                    <th class="text-center min-width-lg-150 trd_tooltip_mobile">
                                        Multipliers <?= ToolTip::DrawToolTip('Колличество дней или юзеров которые были учтены при расчете общего кол-ва балов за задание', 'hide-on-mobile') ?>
                                          <span class="trd_tooltiptext_mobile">Колличество дней или юзеров которые были учтены при расчете общего кол-ва балов за задание</span>
                                    </th>
                                    <th class="text-center min-width-lg-200 trd_tooltip_mobile">
                                        Accrued Points <?= ToolTip::DrawToolTip('Получено баллов', 'hide-on-mobile') ?>
                                          <span class="trd_tooltiptext_mobile">Получено баллов</span>

                                    </th>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td class="text-center">
<!--                                            You have completed the registration successfully. Please verify your email and subscribe to our social to get the airdrop Points. Please also input you social links in the form above. You need to set at least 2 of 3 socials to get the airdrop points.-->
                                            Вы успешно завершили регистрацию. Пожалуйста, подтвердите свою электронную почту и подпишитесь на нашу социальную сеть, чтобы получить баллы airdrop. Пожалуйста, также введите ваши социальные ссылки в форму выше. Вам нужно установить как минимум 2 из 3 соцсетей, чтобы получить баллы аирдропа.
                                            <span class="social_block">
                                                <span class="trd-social-icon social-telegram <?= $user->socials->GetTelegram() != null ? "trd-social-icon-enabled" : "trd-social-icon-disabled" ?>"><a href="https://t.me/cunion" style="color: inherit; text-decoration: none"> <?= $telegramIcon ?> </a></span>
                                                <span class="trd-social-icon social-twitter <?= $user->socials->GetTwitter() != null ? "trd-social-icon-enabled" : "trd-social-icon-disabled" ?>"><a href="https://twitter.com/cunionofficial" style="color: inherit; text-decoration: none">  <?= $twitterIcon ?> </a></span>
                                                <span class="trd-social-icon social-vk <?= $user->socials->GetVKId() != null ? "trd-social-icon-enabled" : "trd-social-icon-disabled" ?>"><a href="https://vk.com/cunion" style="color: inherit; text-decoration: none">  <?= $vkIcon ?> </a></span>
                                            </span>
                                        </td>
                                        <td class="text-center">+<?= AirDropHandler::$registrationPoints ?><?= $coinIcon ?>points <br><?= In_CTU_USDT_calc_label(AirDropHandler::$registrationPoints) ?></td>
                                        <td class="text-center" colspan="2"><?= $user->airdropCalculator->RegistrationCondition() ?
                                                $checkedIcon . '<span class="badge badge-soft-success hide-on-mobile">Completed</span>' :
                                                $crossIcon . '<span class="badge badge-soft-danger hide-on-mobile">Not completed</span>'?></td>
                                        <td class="text-center"><span style="color:">+<?= $user->airdropCalculator->CalculateRegistrationPoints() . $coinIcon?><br><?= In_CTU_USDT_calc_label($user->airdropCalculator->CalculateRegistrationPoints()) ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
<!--                                            You should connect your account via Api Keys. You balance should be at least 10 USD to get the airdrop points-->
                                            Вы должны подключить свою учетную запись через API ключи. Ваш баланс должен быть не менее 10 долларов США, чтобы получить баллы аирдропа.
                                        </td>
                                        <td class="text-center">+<?= AirDropHandler::$ApiConnectionPoints ?><?= $coinIcon ?>points <br><?= In_CTU_USDT_calc_label(AirDropHandler::$ApiConnectionPoints) ?></td>
                                        <td class="text-center" colspan="2"><?= $user->airdropCalculator->ApiKeysConnectedCondition() ?
                                                $checkedIcon . '<span class="badge badge-soft-success hide-on-mobile">Completed</span>' :
                                                $crossIcon . '<span class="badge badge-soft-danger hide-on-mobile">Not completed</span>'?></td>
                                        <td class="text-center"><span style="color:">+<?= $user->airdropCalculator->CalculateApiKeysConnectionPoints() . $coinIcon?><br><?= In_CTU_USDT_calc_label($user->airdropCalculator->CalculateApiKeysConnectionPoints()) ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
<!--                                            You should have been connected to one of the trader at least 1 day having the average balance more than $100. You will get points per each day.-->
                                            Вы должны быть подключены к одному из трейдеров не менее 1 дня со средним балансом более $100. Вы будете получать баллы за каждый день активного подключения.
                                        </td>
                                        <td class="text-center">+<?= AirDropHandler::$investorDailyPoints ?><?= $coinIcon ?>points per day  <br><?= In_CTU_USDT_calc_label(AirDropHandler::$investorDailyPoints) ?></td>
                                        <td class="text-center"><?= $user->airdropCalculator->ConnectToTraderCondition() ?
                                                $checkedIcon . '<span class="badge badge-soft-success hide-on-mobile">Completed</span>' :
                                                $crossIcon . '<span class="badge badge-soft-danger hide-on-mobile">Not completed</span>'?></td>
                                        <td class="text-center"><span style="color:"><?= $user->airdropCalculator->CalculateConnectToTraderPointsMultiplier()?>  Days</span></td>
                                        <td class="text-center"><span style="color:">+<?= $user->airdropCalculator->CalculateConnectionToTraderPoints() . $coinIcon?><br><?= In_CTU_USDT_calc_label($user->airdropCalculator->CalculateConnectionToTraderPoints()) ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
<!--                                            You should become an <span class="text-info">*Active Trader</span> having the balance more than $200. You will get points per each day.-->
                                            Вы должны стать <span class="text-info">*«Активным Трейдером»</span>, имея баланс более 200$. При выполнении данного условия баллы будут начисляться ежедневно.
                                        </td>
                                        <td class="text-center">+<?= AirDropHandler::$traderDailyPoints ?><?= $coinIcon ?>points per day  <br><?= In_CTU_USDT_calc_label(AirDropHandler::$traderDailyPoints) ?></td>
                                        <td class="text-center"><?= $user->airdropCalculator->BecomeTraderCondition() ?
                                                $checkedIcon . '<span class="badge badge-soft-success hide-on-mobile">Completed</span>' :
                                                $crossIcon . '<span class="badge badge-soft-danger hide-on-mobile">Not completed</span>'?></td>
                                        <td class="text-center"><span style="color:"><?= $user->airdropCalculator->CalculatePastMasterPointsMultiplier() ?> +
                                                                                                    <?= $user->airdropCalculator->CalculateCurrentMasterPointsMultiplier() ?> Days</span></td>
                                        <td class="text-center"><span style="color:">+<?= $user->airdropCalculator->CalculateMasterPoints() . $coinIcon?><br><?= In_CTU_USDT_calc_label($user->airdropCalculator->CalculateMasterPoints()) ?></span></td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">
<!--                                            You will get points per each referral user that connects the Api Keys.-->
                                            Вы будете получать баллы за каждого <span class="text-info">*активного пользователя-реферала</span>, подключившего ключи API ключи на платформе.
                                        </td>
                                        <td class="text-center">+30<?= $coinIcon ?>points per referral user  <br><?= In_CTU_USDT_calc_label(AirDropHandler::$referralPoints) ?></td>
                                        <td class="text-center"><?= $user->airdropCalculator->ReferralCondition() ?
                                                $checkedIcon . '<span class="badge badge-soft-success hide-on-mobile">Completed</span>' :
                                                $crossIcon . '<span class="badge badge-soft-danger hide-on-mobile">Not completed</span>'?></td>
                                        <td class="text-center"><span style="color:"><?= $user->airdropCalculator->CalculateReferralPointsMultiplier()?> Users</span></td>
                                        <td class="text-center"><span style="color:">+<?= $user->airdropCalculator->CalculateReferralPoints() . $coinIcon?><br><?= In_CTU_USDT_calc_label($user->airdropCalculator->CalculateReferralPoints()) ?></span></td>
                                    </tr>

                                    <tr>

                                        <td class="text-center" colspan="3"><span style="color: #1f9bcf; float: right">Total Airdrops Accrued Points:</span></td>
                                        <td class="text-center" colspan="2">
                                            <span style="color:;">+<?= $user->airdropCalculator->CalculateTotalPoints() . $coinIcon ?></span>
                                            <br>
                                            <?= In_CTU_USDT_calc_label($user->airdropCalculator->CalculateTotalPoints()) ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div><span class="text-info">Активный трейдер</span> - Трейдер торгующий балансом не менее $200</div>
                                <div><span class="text-info">Активный пользователь-реферрал</span> - Пользователь пришедший по вашей реферальной ссылке, который подключил ключи с балансом не менее 10 USD на аккаунте</div>
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

    .trd-social-input-enabled{
        background-color: #366954;
    }

    .air-drop-badge{
        margin: 5px;
    }

    .small-label{
        font-size: 13px;
    }

    .social_block{
        display: block;
    }

    .trd-social-icon{
        font-size: 20px;
    }

    .trd-social-icon-enabled{
        color: #4bbf73;
    }

    .trd-social-icon-enabled.social-telegram{
        color: #29b6f6;
    }

    .trd-social-icon-enabled.social-twitter{
        color: #1d9bf0;
    }

    .trd-social-icon-enabled.social-vk{
        color:#1d9bf0;
    }

    .trd-social-icon-disabled{
        color: #a9acb3;
    }


    .social-input{
        max-width: 300px;
    }

    @media screen and (max-width: 768px) {
        .small-text-mobile{
            font-size: 10px;
        }

        .mobile-rate-header{
            display: block;
            font-size: 15px;
        }

        .mobile-table{
            font-size: 8px;
        }

        .small-label{
            font-size: 8px;
        }

        td{
           padding: 5px 2px 5px 2px !important;
        }


        th{
            padding: 5px 2px 5px 2px !important;
        }

        .hide-on-mobile{
            display: none;
        }

        .trd-social-icon{
            font-size: 15px;
        }
    }


    @media screen and (min-width: 768px) {
        .min-width-300-wide-screen{
            min-width: 300px;
        }

        .min-width-450-wide-screen{
            min-width: 450px;
        }

        .min-width-320-wide-screen{
            min-width: 320px;
        }

        .mobile-rate-header{
            float: right;
            font-size: 17px
        }


        .min-width-lg-150{
            min-width: 150px;
        }

        .min-width-lg-200{
            min-width: 200px;
        }

        .me-2-on-wide{
            margin-right: .5rem !important
        }
    }

</style>

<script src="js/app.js"></script>
<script src="js/notification_handler.js"></script>
<script src="cabinet_airdrop_parts/js/social_inputs.js?"<?= filemtime('cabinet_airdrop_parts/js/social_inputs.js') ?>></script>
</body>
</html>

<style>

</style>


<?php
function In_CTU_USDT_calc_label($airDropPoints){
    global $airdrop_handler;
    $ctuPoints  = $airDropPoints * $airdrop_handler->rate;
    $ctuSpan = "<span class='text-info small-label small-text-mobile-mini'>≈CTU ". number_format($ctuPoints,2) ."</span>";
    $usdSpan = "<span class='text-success small-label small-text-mobile-mini'>$". number_format($ctuPoints,2) ."</span>";
    return $ctuSpan . "<span class='text-success small-label small-text-mobile-mini'>/</span>" . $usdSpan;
}
?>


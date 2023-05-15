<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/ToolTip.php";

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}


include("classes/user.php");
$user = new User($_SESSION['user_email']);
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
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
    <div class="main" page="kucoin_copy_history">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Kucoin Copy History <?= ToolTip::DrawToolTip('История скопированных позиций') ?></h5>
                    </div>

                    <table id="kucoin_copy_history_table" class="table table-striped my-0">
                        <thead>
                        <tr>
                            <th hide1 style="width: 200px;">Date <?= ToolTip::DrawToolTip('Дата Время исполнения сделки') ?></th>
                            <th hide3 >From <?= ToolTip::DrawToolTip('Лицо представляющее торговую стратегию') ?></th>
                            <th style="min-width: 152px;" symbol_row >Pair <?= ToolTip::DrawToolTip('Торговая пара') ?></th>
                            <th hide3>Trader qty <?= ToolTip::DrawToolTip('Объем лота трейдера') ?></th>
                            <th style="width: 100px">Side <?= ToolTip::DrawToolTip('Покупка/Продажа') ?></th>
                            <th hide2>Investor qty <?= ToolTip::DrawToolTip('Объем лота инвестора') ?></th>
                            <th hide2>Funds <?= ToolTip::DrawToolTip('Статус операции и метод исполнения ордера') ?></th>
                            <th hide4 style="display: none">Profit <?= ToolTip::DrawToolTip('') ?></th>
                            <th>Status <?= ToolTip::DrawToolTip('Статус операции и метод исполнения ордера') ?></th>
                            <th hide1>Delay MS <?= ToolTip::DrawToolTip('Время затраченное на копирование операции') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="display: none" kucoin-history-tr-template>
                            <td hide1 date>Date</td>
                            <td hide3 from>From</td>
                            <td><img class="quote-asset"> <img class="base-asset"><span symbol>Symbol</span></td>
                            <td hide3 master qty>qty</td>
                            <td side>side</td>
                            <td hide2 follower_order_size style="max-width: 20px">follower order size</td>
                            <td hide2 deal-funds style="max-width: 20px">deal funds</td>
                            <td hide4 deal-profit style="display: none">--</td>
                            <td status>status</td>
                            <th hide1 delay style="max-width: 90px">Delay</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <script src="js/load_copy_history.js"></script>
        </main>

        <?php include("footer.php") ?>
    </div>
</div>


<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<!--<script>-->


<!--<table id="datatables-dashboard-projects" class="table table-striped my-0" style="display:none">-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>Id</th>-->
<!--        <th class="d-none d-xl-table-cell">Start Date</th>-->
<!--        <th class="d-none d-xl-table-cell">End Date</th>-->
<!--        <th>Status</th>-->
<!--        <th class="d-none d-md-table-cell">Pair</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    <tr tr-example>-->
<!--        <td order-id>Project Apollo</td>-->
<!--        <td start-date class="d-none d-xl-table-cell">01/01/2018</td>-->
<!--        <td end-date class="d-none d-xl-table-cell">31/06/2018</td>-->
<!--        <td status><span class="badge bg-success">Done</span></td>-->
<!--        <td symbol class="d-none d-md-table-cell">Carl Jenkins</td>-->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->


</body>
</html>

<style>
    td {
        max-width: 100px;

    }
    
    /*.quote-asset {*/
    /*    width: 25px;*/
    /*    margin-left: 5px;*/
    /*    margin-top: -10px;*/
    /*}*/

    /*.base-asset {*/
    /*    width: 17px;*/
    /*    margin-left: -10px;*/
    /*    margin-top: 5px;*/
    /*    margin-right: 5px;*/
    /*}*/

</style>

<style>

    @media screen and (max-width: 1700px) {
        [hide1] {
            display: none !important;
        }
    }

    @media screen and (max-width: 1200px) {
        [hide2] {
            display: none !important;
        }
    }

    @media screen and (max-width: 650px) {
        [hide3] {
            display: none !important;
        }
        th[symbol_row] {
            min-width: 92px !important;
        }
    }

    @media screen and (max-width: 395px) {
        [hide4] {
            display: none !important;
        }
    }

    i.fa-question-circle.trd_tooltip {
        font-size: 15px;
        color:#a9acb3;
    }


</style>

<script>
    console.log("starting ...")
</script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     $("#datatables-dashboard-projects").DataTable({
    //     pageLength: 6,
    //     lengthChange: false,
    //     bFilter: false,
    //     autoWidth: false
    // });
    //
    // $("#datatables-dashboard-projects2").DataTable({
    //     pageLength: 6,
    //     lengthChange: false,
    //     bFilter: false,
    //     autoWidth: false
    // });
    // })
    // ;
</script>

<script src="js/master_page/icon_displayer.js"></script>
<script src="js/load_kucoin_copy_history.js"></script>
<script src="js/date_handler.js"></script>



<?php


function DrawToolTip($msg)
{
    echo '<i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip">
                    <span class="trd_tooltiptext">'. $msg .'</span>
          </i>';
}

?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Traders</h5>
                <h6 class="card-subtitle text-muted">Here user can select which trader to connect</h6>
            </div>
            <table master-table class="table" style="text-align: center">
                <thead>
                <tr style="transform: scale(0.9)">
                    <th class="hide-on-mobile hide-on-medium">Trader <?= DrawToolTip("Информация о представителе торговой стратегии, количество подключенных дней, рабочая криптовалютная биржа") ?></th>
                    <th class="hide-on-mobile hide-on-medium">Portfolio <?= DrawToolTip("Текущий портфель и процентное распределение каждого актива от рабочего депозита") ?></th>
                    <th class="hide-on-mobile hide-on-medium" style="width:370px">
                        <span class="btn badge badge-soft-warning" style="font-size: 15px"
                              onclick="DisplayBTCBalances()">BTC</span>
                        <span class="btn badge badge-soft-info" style="font-size: 15px" onclick="DisplayUSDTBalances()">USDT</span>
                        <br>
                        <br>
                        Balance History <?= DrawToolTip("История и отображение роста или падения общего баланса трейдера на графике торговли") ?>
                    </th>
                    <th class="hide-on-mobile hide-on-medium">ROI per $1000/<span
                                style="margin-right: 2px;font-family: 'Poppins';">₿</span>0.1 <?= DrawToolTip("Финансовый коэффициент иллюстрирующий уровень доходности или убытка к номинальному значению - 1000USDT/0.1 BTC") ?>
                    </th>
                    <th class="hide-on-mobile hide-on-medium">Info <?= DrawToolTip("Колличество подключенных инвесторов и общий объем инвестиций") ?></th>
                    <th master-table-role="actions" class="hide-on-mobile hide-on-medium">Action <?= DrawToolTip("Информирующее окно с подтверждением подключения, статус подключения") ?></th>

                </tr>
                </thead>
                <tbody style="text-align: center">
                <?php
                /**
                 * @var array $allKucoinMasters
                 * @var User $user
                 */

                $excludedMasters = [
                    'trd.tester.gleb@gmail.com',
                    'trd.tester.roma90@gmail.com',
                    'trd.tester.tankist@gmail.com',
                    'vitalikabox@protonmail.ch',
                    'Wyde90@gmail.com',
                    'wydebinance@gmail.com',
                    'h77ps.protocol@gmail.com',
                    'h77ps@protonmail.com',
                    'alexandr.mihalkevich@amam.capital',
                    'alexandr.mihalkevich@gmail.com',
                    'trd.tester4@gmail.com'
                ];

                foreach ($allKucoinMasters as $kucoinMaster) {

                    $masterId = $kucoinMaster["user_id"];
                    $masterEmail = $kucoinMaster["email"];
                    $telegram = $kucoinMaster["telegram"];
                    $roi = $kucoinMaster["roi"];
                    $min_dep = $kucoinMaster["need_balance"];
                    $rate = $kucoinMaster["rate"];
                    $nickname = $kucoinMaster['nickname'] == null ? "no_name" : $kucoinMaster['nickname'];
                    $baseAsset = $kucoinMaster['base_asset'];
                    $dif = time() - strtotime($kucoinMaster['master_account_date_creation']);

                    $tradeDirection = $kucoinMaster['trade_direction'];
                    $tradeType = $kucoinMaster['trade_type'];

                    $days = $dif / 60 / 60 / 24;

                    $user->GetConnections('kucoin');
                    $connection = $user->GetConnectionByMasterID('kucoin', $masterId);


                    if ($user->IsAdmin('super')) {
                        require('master_block.php');
                    } else {
                        if (!in_array($masterEmail, $excludedMasters)) {
                            if ($days >= 1) {
                                require('master_block.php');
                            }
                        }
                    }
                    ?>

                    <?php

                } ?>
                </tbody>
            </table>

            <style>


                [total_investment] {
                    color: #4bbf73;
                    background-color: #4bbf732d;
                    font-size: 13px !important;
                    display: block;
                    width: 80%;
                    margin: auto;

                    transition: color 0.37s, opacity 0.37s;
                }

            </style>


        </div>
    </div>

</div>


<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     document.querySelectorAll("[master-template-tr]").forEach((elem) => {
    //         elem.addEventListener("click", () => {
    //             console.log(elem)
    //             let target = event.target;
    //
    //             let masterId = elem.getAttribute("master-id");
    //             console.log(target);
    //             if (event.target.getAttribute("profile") !== null) {
    //                 location.href = "https://cunion.io/panel/cabinet/cabinet_master_page.php?master-id=" + masterId;
    //             } else {
    //                 event.preventDefault();
    //             }
    //
    //         });
    //
    //     })
    // })

</script>

<style>

    .title-badge-title {
        margin: auto;
    }


    [master-template-tr]{
        cursor: pointer;
        background-color: #293042;
        transform: scale(0.9);
        /*transform: perspective(500px) translateZ(-30px);*/
        transition: transform 0.3s, background-color 0.5s;
    }

    [master-template-tr]:hover{
        background-color: #313354;
        transform: scale(0.98);
        /*transform: perspective(500px) translateZ(0px);*/
        transition: transform 0.3s, background-color 0.5s;
    }

    [master-template-tr] .btn.connect-to-master-button{
        transform: perspective(500px) translateZ(0px);
        padding: 5px 5px 5px 5px;
        margin-right: 5px;
        opacity: 0.7;
        transition: padding 0.3s, margin-right 0.3s, transform 0.3s,  opacity 0.3s;
    }

    [master-template-tr]:hover .btn.connect-to-master-button{
        transform: perspective(500px) translateZ(50px);
        padding: 5px 20px 5px 20px;
        opacity: 1;
        box-shadow: 0px 0px 10px #3f80ea;
        transition: padding 0.3s, margin-right 0.3s, transform 0.3s, opacity 0.1s;
    }

    .connected-to-current-master{
        background-color: #1f9bcf1c;
        border: 2px solid #1f9bcf;
        transform: scale(1);
    }

    .is-master{
        background-color: #47ae6d30;
        transform: scale(1)
    }

    .disabled-connection-button {

    }

    @media screen and (min-width: 300px) and (max-width: 769px) {
        [master-template-tr] {
            display: grid;
        }

        table[master-table] > thead > tr {
            display: grid;
        }

        table[master-table] > thead > tr > th {
            width: 100% !important;
        }

        table[master-table] > tbody > tr {
            border: 1px solid #8255fd;
        }

        table[master-table] > tbody > tr > td {
            margin: auto;
            width: 100%;

        }
    }


    /* Main master table table Verstka loyte*/
    @media screen and (min-width: 768px) and (max-width: 1300px) {
        [master-template-tr] {
            display: grid;
        }

        table[master-table] > thead > tr {
            display: grid;
        }

        table[master-table] > thead > tr > th {
            width: 100% !important;
        }

        table[master-table] > tbody > tr {
            border: 1px solid #8255fd;

        }

        table[master-table] > tbody > tr > td {
            margin: auto;
            width: 100%;
            height: 120px;
        }


        table[master-table] > tbody > tr[master-template-tr] {
            height: 440px;
        }

        table[master-table] > tbody > tr > td {
            border: 0;
        }

        table[master-table] > tbody > tr > td[profile] {
            border: 1px solid #545968;
        }


        /*Positions on table*/
        table[master-table] > tbody > tr > td[portfolio] {
            position: relative;
            left: -110px;
            top: 25px;
        }


        table[master-table] > tbody > tr > td[balance] {
            position: relative;
            left: 150px;
            top: -85px;
        }

        table[master-table] > tbody > tr > td[roi] {
            position: relative;
            top: -70px;
            left: -100px;

        }

        table[master-table] > tbody > tr > td[statistic] {
            position: relative;
            top: -190px;
            left: 145px;

        }

        td[button_connection] {
            bottom: 570px;
            position: relative;
            left: 170px;
        }

        [master-table-hr] {
            width: 95%;
            margin: auto;
            color: #545968;
            position: relative;
            top: 150px;
            display: block;

        }
    }


    @media screen and (min-width: 1400px){
        [master-table-role=actions]{
            width: 250px;
        }
    }
</style>

<script>
    function StartArrowsAnimation() {
        document.querySelectorAll('.table_roi_icon').forEach((icon) => {
            let arrow_x1 = icon.querySelector("[arrow_x1]");
            let arrow_x2 = icon.querySelector("[arrow_x2]");

            setInterval(() => {
                setTimeout(() => {
                    arrow_x1.style.display = "block";
                    setTimeout(() => {
                        arrow_x2.style.display = "block";
                        setTimeout(() => {
                            arrow_x2.style.display = "none";
                            arrow_x1.style.display = "none";
                        }, 2000)
                    }, 200)
                }, 200);
            }, 2400)
        })

    }

</script>


<script>
    function DisplayBTCBalances() {
        document.querySelectorAll('[btc-balance]').forEach((btcCanvas) => {
            btcCanvas.style.display = 'block';
            setTimeout(() => {
                btcCanvas.style.opacity = 1;
                btcCanvas.style.transform = 'scale(1)';
            }, 20)

        })


        document.querySelectorAll('[usdt-balance]').forEach((usdtCanvas) => {
            usdtCanvas.style.display = 'none';
            usdtCanvas.style.opacity = 0;
            usdtCanvas.style.transform = 'scale(0)';
        })

        document.querySelectorAll('[total_investment]').forEach((investment) => {
            investment.style.transition = "";
            investment.style.opacity = 0;
            investment.style.transition = "color 0.37s, opacity 0.37s;";
            investment.style.color = '#cc8b37'
            investment.style.backgroundColor = '#cc8b372d'
            investment.style.opacity = 1;
        })

        document.querySelectorAll('[spot-label]').forEach((labels) => {
            labels.classList.remove('badge-soft-info');
            labels.classList.add('badge-soft-warning');
            labels.style.opacity = 0;
            labels.style.opacity = 1;
        })
    }

    function DisplayUSDTBalances() {
        document.querySelectorAll('[btc-balance]').forEach((btcCanvas) => {
            btcCanvas.style.display = 'none';
            btcCanvas.style.opacity = 0;
            btcCanvas.style.transform = 'scale(0)';
        })
        document.querySelectorAll('[usdt-balance]').forEach((usdtCanvas) => {
            usdtCanvas.style.display = 'block';
            setTimeout(() => {
                usdtCanvas.style.opacity = 1;
                usdtCanvas.style.transform = 'scale(1)';
            }, 20)

        })

        document.querySelectorAll('[total_investment]').forEach((investment) => {

            investment.style.transition = "";
            investment.style.opacity = 0;

            investment.style.transition = "color 0.37s, opacity 0.37s;";
            investment.style.color = '#4bbf73'
            investment.style.backgroundColor = '#4bbf732d'
            investment.style.opacity = 1;
        })

        document.querySelectorAll('[spot-label]').forEach((labels) => {
            labels.classList.add('badge-soft-info');
            labels.classList.remove('badge-soft-warning');
            labels.style.opacity = 0;
            labels.style.opacity = 1;
        })
    }
</script>


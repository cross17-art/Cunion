<?php


?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Traders</h5>
                <h6 class="card-subtitle text-muted">Here user can select which master to connect</h6>
            </div>
            <table master-table class="table" style="text-align: center">
                <thead>
                    <tr>
                        <th>Trader</th>
                        <th>Portfolio</th>
                        <th style="width:370px">Balance History</th>
                        <th>ROI%</th>
                        <th>Followers / Rating / Total Investments</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                <?php
                /**
                 * @var array $allKucoinMasters
                 * @var User $user
                 */
                foreach ($allKucoinMasters as $kucoinMaster) {

                    $masterId = $kucoinMaster["user_id"];
                    $masterEmail = $kucoinMaster["email"];
                    $telegram = $kucoinMaster["telegram"];
                    $roi = $kucoinMaster["roi"];
                    $min_dep = $kucoinMaster["need_balance"];
                    $rate = $kucoinMaster["rate"];
                    $nickname = $kucoinMaster['nickname'] == null ? "no_name" : $kucoinMaster['nickname'];

                    $user->GetConnections('kucoin');
                    $connection = $user->GetConnectionByMasterID('kucoin', $masterId);


//                    require ("master_block.php");
                    ?>

                    <?php

                } ?>
                </tbody>
            </table>

            <style>
                [total_investment] {
                    color: #4bbf73;
                    background-color: #4bbf732d;;
                }

                /* Tooltip container */
                .trd_tooltip {
                    position: relative;
                    display: inline-block;
                }

                /* Tooltip text */
                .trd_tooltip .trd_tooltiptext {
                    visibility: hidden;
                    width: 120px;
                    background-color: black;
                    color: #fff;
                    text-align: center;
                    padding: 5px 0;
                    border-radius: 6px;

                    /* Position the tooltip text - see examples below! */
                    position: absolute;
                    z-index: 1;
                }

                /* Show the tooltip text when you mouse over the tooltip container */
                .trd_tooltip:hover .trd_tooltiptext {
                    visibility: visible;
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
    //                 location.href = "https://cunion.io/client/cabinet/cabinet_master_page.php?master-id=" + masterId;
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
    @media screen and (min-width: 300px) and (max-width: 600px)  {
        [master-template-tr]{
            display: grid;
        }

        table[master-table] > thead > tr{
            display: grid;
        }

        table[master-table] > thead > tr > th{
            width: 100% !important;
        }

        table[master-table] > tbody > tr{
            border: 1px solid #8255fd;
        }

        table[master-table] > tbody > tr > td{
            margin:auto;
            width: 100%;

        }
    }

    @media screen and (min-width: 600px) and (max-width: 1400px)  {
        [master-template-tr]{
            display: grid;
        }

        table[master-table] > thead > tr{
            display: grid;
        }

        table[master-table] > thead > tr > th{
            width: 100% !important;
        }

        table[master-table] > tbody > tr{
            border: 1px solid #8255fd;
        }

        table[master-table] > tbody > tr > td{
            margin:auto;
            width: 100%;
        }


        table[master-table] > tbody > tr[master-template-tr]{
            height: 420px;
        }

        table[master-table] > tbody > tr > td{
            border: 0;
        }

        table[master-table] > tbody > tr > td[profile]{
           border: 1px solid #545968;
        }

        table[master-table] > tbody > tr > td[portfolio]{
            position: relative;
            left: -110px;
            top: 25px;
        }


        table[master-table] > tbody > tr > td[balance]{
            position: relative;
            left: 110px;
            top: -95px;
        }

        table[master-table] > tbody > tr > td[roi]{
            position: relative;
            top: -100px;
            left: -100px;

        }

        table[master-table] > tbody > tr > td[statistic]{
            position: relative;
            top: -255px;
            left: 125px;

        }

        [master-table-hr]{
            width: 95%;
            margin: auto;
            color: #545968;
            position: relative;
            top: 150px;
            display: block;

        }
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        document.querySelectorAll('.table_roi_icon').forEach((icon)=>{
            let arrow_x1 = icon.querySelector("[arrow_x1]");
            let arrow_x2 = icon.querySelector("[arrow_x2]");

            setInterval(()=>{
                setTimeout(() => {
                    arrow_x1.style.display = "block";
                    setTimeout(()=>{
                        arrow_x2.style.display = "block";
                        setTimeout(()=>{
                            arrow_x2.style.display = "none";
                            arrow_x1.style.display = "none";
                        },2000)
                    },200)
                }, 200);
            }, 2400)
        })
    })

</script>
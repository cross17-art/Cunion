<?php
/**
 * @var $masterEmail
 *
 */
?>

<table public_master_order_history_table email="<?= $masterEmail ?>"
       class="table mobile-table">
    <thead>
    <tr>
        <th>Date</th>
        <th>Symbol</th>
        <th>Side</th>
        <th>qty</th>
        <th>price</th>
    </tr>
    </thead>
    <tbody class="">
    <tr master_order_history_tr_template style="display: none">
        <td date>date</td>
        <td><img class="quote-asset"> <img class="base-asset"><span symbol>symbol</span></td>
        <td side>side</td>
        <td qty>qty</td>
        <td price>price</td>
    </tr>
    </tbody>

</table>

<style>

    @media screen and (max-width: 500px){
        .mobile-font-size{
            font-size: 13px;
        }
    }
</style>
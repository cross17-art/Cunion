<?php
/**
 * @var FullConnectionIntervalModel $connectionInterval
 */

echo '<span class="trd_tooltiptext">';

if(count($connectionInterval->usingHourlyBalancePoints) !=0 ){
    foreach ($connectionInterval->usingHourlyBalancePoints as $usingPoints){
        ?>
        <span style="color: #1f9bcf"><?= $usingPoints['date']?></span>:
        <span style="color: #43a46b"><?= '$' . $usingPoints['balance']?></span>
        <br>
        <?php
    }
}

echo ('</span>')
?>



<style>

    .trd_tooltip .trd_tooltiptext {
        display: none;
        width: 240px;
        background-color: black;
        color: #fff;
        text-align: center;
        padding: 5px 0;
        border-radius: 6px;
        font-size: 10px;
        /* Position the tooltip text - see examples below! */
        position: absolute;
        z-index: 1;
    }

    /* Show the tooltip text when you mouse over the tooltip container */
    .trd_tooltip:hover .trd_tooltiptext {
        display: block;
        right: 150px;
        bottom: 0px;
    }
</style>



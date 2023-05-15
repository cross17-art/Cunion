<?php
/**
 * @var $master;
 */

$cutoutTgLink = str_replace('@', '', $master['telegram']);

?>



<a class="btn btn-outline-primary" style="margin: 7px" href="https://telegram.me/<?= $cutoutTgLink ?>">
<!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
<!--         stroke-linecap="round" stroke-linejoin="round"-->
<!--         class="feather feather-message-square">-->
<!--        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>-->
<!--    </svg>-->
    <i class="align-middle me-2 fab fa-fw fa-telegram" style="font-size: 15px"></i>
    Contact Trader
</a>
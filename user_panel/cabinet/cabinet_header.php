<?php
/**
 * @var User $user
 */

?>

<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle"> <i class="hamburger align-self-center"></i> </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">


                <div id="validation-balance-spinner" style="margin-left: 30px; display: none" class="spinner-border text-info me-2" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <button id="button_not_connected" class="btn btn-warning" style="display: none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                    </svg>Not connect</button>


                <div style="display: none; margin-left: 20px margin-right: 80px;" class="validation-balance-block">
                    <div class="input-group">
                        <span class="input-group-text header-balance-state-info">Total</span> <span id="available_total_balance" class="input-group-text text-success header-balance-state-info">1231231231231</span>
                        <span class="input-group-text header-balance-state-info">Available USDT</span> <span id="available_usdt_balance" class="input-group-text text-success header-balance-state-info">1231231231231</span>
                        <span class="input-group-text header-balance-state-info">In orders</span> <span id="in_orders_usdt_balance" class="input-group-text text-success header-balance-state-info">1231231231231</span>
                    </div>
                </div>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <span class="text-dark"><?= $user->nickname==null ? $user->user_email : $user->nickname ?></span> </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="cabinet_setting.php">Settings</a>
                    <a class="dropdown-item" href="https://cunion.io/client/php_scripts/log_out.php">Sign out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<style>
    .header-balance-state-info {
        background-color: #293042;
    }
</style>

<script>
    GetPageName = () => {
        let mainElem = document.querySelector(".main");
        let pageName = null;
        if (mainElem !== null) {
            pageName = mainElem.getAttribute('page');
        }
        return pageName;
    }
</script>

<script src="js/get_acc_kucoin.js"></script>
<script src="js/user_model.js"></script>
<script src="js/verification_model_init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>


<script>

    if (user.connected) {
        InitBalance();
    }

</script>
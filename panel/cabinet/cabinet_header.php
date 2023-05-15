<?php
/**
 * @var User $user
 */


include_once $_SERVER['DOCUMENT_ROOT']. "/panel/cabinet/classes/ToolTip.php";

?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(87462581, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/87462581" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->


<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a id="tuggle" class="sidebar-toggle"> <i class="hamburger align-self-center"></i> </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">


                <div id="validation-balance-spinner" style="margin-left: 30px; display: none"
                     class="spinner-border text-info me-2" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <h4 id="h_not_connected" style="display: inline-block; padding-right: 5px;color: white;display: none">
                    ATTENTION! YOUR ACCOUNT HAS BEEN NOT CONNECTED</h4>
                <button id="button_not_connected" class="btn btn-primary" style="display: none" ya-goal="goal-account-not-connected-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-share-2 align-middle">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                    </svg>

                </button>

                <style>
                    #h_not_connected::after {
                        border-bottom: 3px solid #ae423f;
                        content: "  ";
                        display: table-cell;
                        width: 460px;
                        animation-duration: 1s;
                        animation-name: highlight;
                        animation-iteration-count: infinite;
                        opacity: 0.3;
                    }

                    @keyframes highlight {
                        /*from {*/
                        /*    opacity: 0;*/
                        /*}*/
                        /*to {*/
                    ay
                        /*    opacity: 1;*/
                        /*}*/

                    0 %

                    {
                        opacity: 0.3
                    }
                    20
                    %
                    {
                        opacity: 0.7
                    }
                    50
                    %
                    {
                        opacity: 1
                    }
                    80
                    %
                    {
                        opacity: 0.7
                    }
                    100
                    %
                    {
                        opacity: 0.3
                    }
                    }

                </style>


                <div style="display: none; margin-left: 20px margin-right: 80px;" class="validation-balance-block">
                    <div class="input-group">
                        <span class="input-group-text header-balance-state-info"><?= ToolTip::DrawToolTip('Для отображения баланса аккаунта, ваши цифровые активы должны находиться на «торговом аккаунте»') ?> Total (trade account) </span> <span
                                id="available_total_balance"
                                class="input-group-text text-success header-balance-state-info">-</span>
                        <span class="input-group-text header-balance-state-info">Available USDT</span> <span
                                id="available_usdt_balance"
                                class="input-group-text text-success header-balance-state-info">-</span>
                        <span in_orders_usdt_balance class="input-group-text header-balance-state-info">In orders</span>
                        <span
                                id="in_orders_usdt_balance"
                                class="input-group-text text-success header-balance-state-info">-</span>
                    </div>
                </div>


                <div id="hat" style="display: inline-block">
                    <?php if ($user->IsDebtor()) {
                        include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/cabinet_header_parts/payment_notification.php");
                    }
                    ?>

                    <!--nav-link d-sm-inline-block                     dropdown-toggle-->
<!--                    class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"-->
<!--                    aria-expanded="false"id="nickname_hat"-->

                    <a class="dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown"
                       aria-expanded="false" id="nickname_hat1"
                       style="display: inline-block;text-decoration: none;color: white;margin-right: 15px ">
                        <span class="text-dark"><?= $user->nickname == null ? $user->user_email : $user->nickname ?></span>
                    </a>
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" id="nickname_hat"
                       style="display: inline-block">
                        <span class="text-dark"><?= $user->nickname == null ? $user->user_email : $user->nickname ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" id="projects">
                        <a class="dropdown-item" href="cabinet_setting">Settings</a>
                        <a class="dropdown-item" href="https://cunion.io/panel/php_scripts/log_out.php">Sign out</a>
                        <button class="dropdown-item"  style="display: none" onclick="OpenPayments()">Pay</button>
                    </div>
<!--                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--                        <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle me-1" alt="Chris Wood"> <span class="text-dark">Chris Wood</span>-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">-->
<!--                        <a class="dropdown-item" href="pages-profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user align-middle me-1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>-->
<!--                        <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart align-middle me-1"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg> Analytics</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="pages-settings.html">Settings &amp; Privacy</a>-->
<!--                        <a class="dropdown-item" href="#">Help</a>-->
<!--                        <a class="dropdown-item" href="#">Sign out</a>-->
<!--                    </div>-->
                </div>
                <script>
                    // document.querySelector("#nickname_hat").addEventListener('click',()=>{
                    //     document.querySelector("#svg_hat_tuggle").style.display='none';
                    //     document.querySelector("#dropdown_hat_menu").style.display='block';
                    //     console.log("change")
                    // })
                </script>

                <!--looking_looping dropdown-menu dropdown-menu-end -->

                <style>
                    @media screen and (max-width: 610px) {
                        #hat {
                            float: right;
                        }
                    }

                    .dropdown-toggle2 {
                        margin-left: .255em;
                        vertical-align: .255em;
                        content: "";
                        border-top: .3em solid;
                        border-right: .3em solid transparent;
                        border-bottom: 0;
                        border-left: .3em solid transparent
                    }

                    .looking_looping:hover {
                        display: block;
                    }

                    .looking_looping:up {
                        display: none;
                    }
                </style>
            </li>
        </ul>
    </div>
</nav>
<div class="payments_popup_background" style="display:none !important;">
    <div class="payments_popup_block">
        <!--        cross close-->
        <div style="display: block;padding-left: 10px; padding-top: 10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-plus align-middle me-2 cross_payments" style="
             transform: rotate(45deg);">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </div>

        <button class="css-type-payments">
            <svg viewBox="0 0 40 40" width="40px" color="text" xmlns="http://www.w3.org/2000/svg"
                 class="sc-bdnxRM fJdnBK">
                <path d="M36.0112 3.33337L22.1207 13.6277L24.7012 7.56091L36.0112 3.33337Z" fill="#E17726"></path>
                <path d="M4.00261 3.33337L17.7558 13.7238L15.2989 7.56091L4.00261 3.33337Z" fill="#E27625"></path>
                <path d="M31.0149 27.2023L27.3227 32.8573L35.2287 35.0397L37.4797 27.3258L31.0149 27.2023Z"
                      fill="#E27625"></path>
                <path d="M2.53386 27.3258L4.77116 35.0397L12.6772 32.8573L8.9987 27.2023L2.53386 27.3258Z"
                      fill="#E27625"></path>
                <path d="M12.2518 17.6496L10.0419 20.9712L17.8793 21.3281L17.6048 12.8867L12.2518 17.6496Z"
                      fill="#E27625"></path>
                <path d="M27.762 17.6494L22.3129 12.7905L22.1207 21.3279L29.9581 20.9711L27.762 17.6494Z"
                      fill="#E27625"></path>
                <path d="M12.6772 32.8574L17.3989 30.5652L13.336 27.3809L12.6772 32.8574Z" fill="#E27625"></path>
                <path d="M22.6009 30.5652L27.3226 32.8574L26.6637 27.3809L22.6009 30.5652Z" fill="#E27625"></path>
                <path d="M27.3226 32.8575L22.6009 30.5653L22.9715 33.6399L22.9303 34.9301L27.3226 32.8575Z"
                      fill="#D5BFB2"></path>
                <path d="M12.6772 32.8575L17.0694 34.9301L17.042 33.6399L17.3989 30.5653L12.6772 32.8575Z"
                      fill="#D5BFB2"></path>
                <path d="M17.1518 25.3495L13.2262 24.1965L15.9988 22.92L17.1518 25.3495Z" fill="#233447"></path>
                <path d="M22.848 25.3495L24.001 22.92L26.801 24.1965L22.848 25.3495Z" fill="#233447"></path>
                <path d="M12.6773 32.8573L13.3635 27.2023L8.99876 27.3258L12.6773 32.8573Z" fill="#CC6228"></path>
                <path d="M26.6364 27.2023L27.3227 32.8573L31.0149 27.3258L26.6364 27.2023Z" fill="#CC6228"></path>
                <path d="M29.9581 20.9709L22.1207 21.3278L22.8482 25.3495L24.0011 22.92L26.8012 24.1965L29.9581 20.9709Z"
                      fill="#CC6228"></path>
                <path d="M13.2263 24.1965L15.9989 22.92L17.1519 25.3495L17.8793 21.3278L10.0419 20.9709L13.2263 24.1965Z"
                      fill="#CC6228"></path>
                <path d="M10.0419 20.9709L13.3361 27.3809L13.2263 24.1965L10.0419 20.9709Z" fill="#E27525"></path>
                <path d="M26.8011 24.1965L26.6638 27.3809L29.958 20.9709L26.8011 24.1965Z" fill="#E27525"></path>
                <path d="M17.8793 21.3278L17.1519 25.3494L18.0715 30.0985L18.2637 23.8396L17.8793 21.3278Z"
                      fill="#E27525"></path>
                <path d="M22.1205 21.3278L21.7499 23.8258L21.9283 30.0985L22.848 25.3494L22.1205 21.3278Z"
                      fill="#E27525"></path>
                <path d="M22.848 25.3496L21.9284 30.0987L22.601 30.5654L26.6638 27.381L26.8011 24.1967L22.848 25.3496Z"
                      fill="#F5841F"></path>
                <path d="M13.2262 24.1967L13.336 27.381L17.3989 30.5654L18.0714 30.0987L17.1518 25.3496L13.2262 24.1967Z"
                      fill="#F5841F"></path>
                <path d="M22.9303 34.93L22.9715 33.6398L22.6284 33.3378H17.3714L17.042 33.6398L17.0694 34.93L12.6772 32.8574L14.2145 34.1202L17.3302 36.2751H22.6696L25.7853 34.1202L27.3226 32.8574L22.9303 34.93Z"
                      fill="#C0AC9D"></path>
                <path d="M22.601 30.5653L21.9284 30.0986H18.0715L17.3989 30.5653L17.0421 33.6399L17.3715 33.3379H22.6285L22.9716 33.6399L22.601 30.5653Z"
                      fill="#161616"></path>
                <path fill="#EA8D3A" fill-rule="evenodd" d="M13.833 25.238l3.248 3.047v3.048l-3.248-6.095z"
                      clip-rule="evenodd"></path>
                <path d="M36.5875 14.3003L37.7542 8.61779L36.011 3.33337L22.6009 13.2846L27.7618 17.6493L35.0365 19.7768L36.6424 17.8964L35.9424 17.3886L37.0679 16.3728L36.2169 15.7003L37.3287 14.863L36.5875 14.3003Z"
                      fill="#763E1A"></path>
                <path d="M2.24573 8.61779L3.42615 14.3003L2.67123 14.863L3.78302 15.7003L2.93202 16.3728L4.05753 17.3886L3.35752 17.8964L4.96343 19.7768L12.2518 17.6493L17.399 13.2846L4.00263 3.33337L2.24573 8.61779Z"
                      fill="#763E1A"></path>
                <path fill="#EA8E3A" fill-rule="evenodd" d="M21.665 25.333l.478 8.096-1.433-4.143.955-3.953z"
                      clip-rule="evenodd"></path>
                <path fill="#D87C30" fill-rule="evenodd" d="M12.687 31.524l4.394-.096-.764 5.905-3.63-5.81z"
                      clip-rule="evenodd"></path>
                <path d="M35.0365 19.777L27.7619 17.6495L29.958 20.9712L26.6638 27.3811L31.0149 27.3262H37.4797L35.0365 19.777Z"
                      fill="#F5841F"></path>
                <path d="M12.2517 17.6495L4.96332 19.777L2.53386 27.3262H8.99869L13.336 27.3811L10.0419 20.9712L12.2517 17.6495Z"
                      fill="#F5841F"></path>
                <path d="M22.1205 21.3276L22.6009 13.2843L24.701 7.56067H15.2988L17.3988 13.2843L17.8792 21.3276L18.0577 23.8531L18.0714 30.0984H21.9283L21.9421 23.8531L22.1205 21.3276Z"
                      fill="#F5841F"></path>
            </svg>

        </button>


        <button class="css-type-payments" onclick="">
            <img src="source/coinpayments2.png" width="52px">
        </button>

    </div>
</div>

<style>
    .header-balance-state-info {
        background-color: #293042;
    }


    .payments_popup_background {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 3;
    }

    .payments_popup_block {
        width: 25%;
        height: 56%;
        display: block;
        background: #09101e;
        margin-left: 27%;
        margin-top: 10%;
        border-radius: 5%;
    }

    .css-type-payments {
        width: 35%;
        height: 20%;
        background: #09101e;
        border-radius: 5%;
        border: 2px solid #a59e9e;
        margin-left: 10%;
        margin-top: 7%;
    }

    .css-type-payments:hover {
        background: #a59e9e;
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

    OpenPayments = () => {
        document.querySelector(".payments_popup_background").style.display = ""
    }
    ClosePayments = (e) => {
        document.querySelector(".payments_popup_background").style.display = "none"
        console.log(12)
    }

    document.querySelector(".feather.feather-plus.align-middle.me-2.cross_payments").addEventListener('click', (event) => {
        document.querySelector(".payments_popup_background").style.display = "none"
    });
    // document.querySelector(".payments_popup_background").addEventListener('click', (event) => {
    //     document.querySelector(".payments_popup_background").style.display = "none"
    // });


    document.querySelector("#tuggle").addEventListener("click", function () {
        if (document.querySelector("nav#sidebar").className.includes('collapsed')) {
            document.querySelector("nav#sidebar").className = "sidebar"
            console.log("321")
        } else {

            document.querySelector("nav#sidebar").className += ' collapsed';
            console.log("123")
        }
    })
</script>

<script src="js/get_acc_kucoin.js"></script>
<script src="js/user_model.js?"<?= filemtime("js/user_model.js") ?>></script>
<script src="js/verification_model_init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="js/model_balance.js?<?= filemtime('js/model_balance.js') ?>"></script>
<script src="../cabinet/payments/pay.js?<?= filemtime('../cabinet/payments/pay.js') ?>"></script>
<script src="js/trd_metrika.js?"<?= filemtime("js/trd_metrika.js")  ?>></script>


<script>

    if (user.connected) {
        InitBalance();
    }

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(87449612, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/87449612" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->

<script>
    document.addEventListener("DOMContentLoaded", ()=>{
        trd_metrika.Init(87462581);
    })
</script>


<?php

session_start();

/**
 * @var User $user
 */

include("panel/cabinet/classes/user.php");

$user = new User($_SESSION['user_email']);
$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

//
//include("classes/user.php");
//
//$user = new User($_SESSION['user_email']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

include_once($_SERVER['DOCUMENT_ROOT'] . "/front_parts/front_ref_handler.php");
?>

<html lang="en-US" class=" js_active  vc_desktop  vc_transform  vc_transform ">
<head>
    <link rel="stylesheet" href="tilda-css/trd_css.css" type="text/css" media="all">
    <link rel="stylesheet" href="tilda-css/tilda-blocks-2.14.css" type="text/css" media="all">
    <meta charset="utf-8">
    <meta name="yandex-verification" content="bf622ab9fedd80c7" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="http://wpdemo.oceanthemes.net/icos/xmlrpc.php">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;display=swap" type="text/css">
    <!--    <link media="all" href="http://wpdemo.oceanthemes.net/icos/wp-content/cache/autoptimize/14/css/autoptimize_0b6508611497415a597f52f144ec1725.css" rel="stylesheet">-->
    <link media="all" href="front_js/auto_optimizaed.css" rel="stylesheet">
    <title>CopyTrading Unification</title>
    <meta name="robots" content="max-image-preview:large">
    <meta name="title" lang="en" content="Cunion.io - platform is able to integrate as investors and traders">
    <meta name="title" lang="rus" content="Cunion.io - платформа способна объединить как инвесторов так и трейдеров">
    <meta name="description" lang="en"
          content="A convenient and practical solution for repeating successful trades of experienced traders.">
    <meta name="description" lang="rus"
          content="Удобное и практичное решение для повторения успешных сделок опытных трейдеров.">
    <meta name="keywords" lang="en"
          content="copy trading,investment,investments,trader,traders,investor,investors,passive income,digital assets,earnings in cryptocurrency,make money on the Internet">
    <meta name="keywords" lang="rus"
          content="Копи трейдинг , инвестиции , трейдер , инвестор , пассивный доход , инвестирование , цифровые активы , заработок в криптовалюте , заработок в интернете">
    <meta name="robots" content="all">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//s.w.org">
    <link href="https://fonts.gstatic.com" crossorigin="" rel="preconnect">
    <link rel="alternate" type="application/rss+xml" title="Cunion » Feed"
          href="http://wpdemo.oceanthemes.net/icos/feed/">
    <link rel="alternate" type="application/rss+xml" title="Cunion » Comments Feed"
          href="http://wpdemo.oceanthemes.net/icos/comments/feed/">
    <!--    <script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/wp-emoji-release.min.js?ver=5.7.3" type="text/javascript" defer=""></script>-->
    <script src="front_js/min_2.js" type="text/javascript" defer=""></script>
    <link rel="stylesheet" id="icos-fonts-css"
          href="https://fonts.googleapis.com/css?family=Nunito%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i%7CPoppins%3A100%2C100i%2C200%2C200i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%2C900i&amp;subset=latin%2Clatin-ext"
          type="text/css" media="all">
    <link rel="stylesheet" href="tilda-css/tilda-css.css" type="text/css" media="all">
    <link rel="stylesheet" href="tilda-css/tilda-css-2-fonts.css" type="text/css" media="all">
    <!--    <script type="text/javascript" src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/jquery/jquery.min.js?ver=3.5.1" id="jquery-core-js"></script>-->
    <script type="text/javascript" src="front_js/min_1.js" id="jquery-core-js"></script>
    <link rel="https://api.w.org/" href="http://wpdemo.oceanthemes.net/icos/wp-json/">
    <link rel="alternate" type="application/json" href="http://wpdemo.oceanthemes.net/icos/wp-json/wp/v2/pages/439">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://wpdemo.oceanthemes.net/icos/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
          href="http://wpdemo.oceanthemes.net/icos/wp-includes/wlwmanifest.xml">
    <link rel="canonical" href="http://wpdemo.oceanthemes.net/icos/home-token-sales/">
    <link rel="shortlink" href="http://wpdemo.oceanthemes.net/icos/?p=439">
    <link rel="alternate" type="application/json+oembed"
          href="http://wpdemo.oceanthemes.net/icos/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwpdemo.oceanthemes.net%2Ficos%2Fhome-token-sales%2F">
    <link rel="alternate" type="text/xml+oembed"
          href="http://wpdemo.oceanthemes.net/icos/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwpdemo.oceanthemes.net%2Ficos%2Fhome-token-sales%2F&amp;format=xml">
    <meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress.">
    <link rel="icon" href="/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="/img/android-chrome-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <meta name="msapplication-TileImage" content="/img/mstile-150x150.png">
    <link type="image/png" sizes="16x16" rel="icon" href="/img/favicon-16x16.png">
    <link href="fonts/fontawesome-webfont.woff2" rel="stylesheet">
    <link href="fonts/themify.woff" rel="stylesheet">
    <noscript>
        <style> .wpb_animate_when_almost_visible {
                opacity: 1;
            }</style>
    </noscript>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NMQQ4JRSFT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NMQQ4JRSFT');
</script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MXJMKCW');</script>
    <!-- End Google Tag Manager -->

    <script type="text/javascript">!function () {
            var t = document.createElement("script");
            t.type = "text/javascript", t.async = !0, t.src = "https://vk.com/js/api/openapi.js?169", t.onload = function () {
                VK.Retargeting.Init("VK-RTRG-1208681-amnbC"), VK.Retargeting.Hit()
            }, document.head.appendChild(t)
        }();
        console.log("VK Pixel Sended")
    </script>
    <noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1208681-amnbC" style="position:fixed; left:-999px;" alt=""/>
    </noscript>

    <script type="text/javascript">!function () {
            var t = document.createElement("script");
            t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function () {
                VK.Retargeting.Init("VK-RTRG-1350466-1cUG9"), VK.Retargeting.Hit()
            }, document.head.appendChild(t)
        }();</script>
    <noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1350466-1cUG9" style="position:fixed; left:-999px;" alt=""/>
    </noscript>
</head>

<style>
    [lng=eng] {
        display: none;
    }

    [lng=rus] {
        display: block;
    }

    @font-face {
        font-family: 'Cyber-russia-light';
        src: url("./fonts/Conthrax-Font/Conthrax Light.otf");
    }

    .cyber-rus-thin {
        font-family: Cyber-russia-light;
    }


</style>

<body class="page-template page-template-page-templates page-template-template-onepage page-template-page-templatestemplate-onepage-php page page-id-439 wpb-js-composer js-comp-ver-6.6.0 vc_responsive icos-theme-ver-1.0 wordpress-version-5.7.3 &quot; data-spy=&quot;scroll&quot; data-target=&quot;#mainnav&quot; data-offset=&quot;80 no-touch loaded"
      style="zoom:80%;">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXJMKCW" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
    <!-- Header -->
    <header class="site-header is-sticky">

        <style>

            @media screen and (max-width: 500px) {
                header.site-header {
                    position: fixed !important;
                    z-index: 2000 !important;
                    width: 100% !important;
                }
            }

        </style>
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg is-transparent"
             style="height: 130px; background-color: #0b0c22; z-index: 20000"></div>
        <div class="navbar navbar-expand-lg is-transparent" id="mainnav" style="height: 130px; z-index: 20000">
            <nav class="container">
                <h1 class="navbar-brand" style="position: relative;top: -29px !important;width: 260px">
                    <a href="https://cunion.io">

                        <img class="logo" style="height: 120px; position: relative;top: 30px;left: -25px;"
                             src="img/CunionLogo.png" alt="Cunion">
                        <img class="logo-2" style="height: 120px; position: relative;top: 30px;left: -25px;"
                             src="img/CunionLogo.png" alt="Cunion">
                        <img class="logo-mobile" src="img/test/CunionLogoMobile.png" alt="Cunion" style="width: 120px; display: none">
                    </a>
                    </a>
                </h1>
                <button class="navbar-toggler navbar-toggler-mobile" type="button">
                        <span class="navbar-toggler-icon">
                            <span class="ti ti-align-justify"></span>
                        </span>
                </button>
                <div class="navbar-collapse justify-content-end navbar-mobile"
                     style="padding-bottom: 25px; position: sticky; z-index:100">
                    <ul id="menu-onepage-menu" class="navbar-nav" style="width: 100%">
                        <li lng=eng class="menu-item menu-item-object-custom ">
                            <a style="scroll-behavior: smooth" link-to="for_investors" href="#for_investors">for
                                investors</a>
                        </li>
                        <li lng=eng class="menu-item menu-item-object-custom ">
                            <a link-to="for_traders" href="#for_traders">For Traders</a>
                        </li>
                        <li lng=eng class="menu-item menu-item-object-custom ">
                            <a link-to="for_traders" href="#roadmap">Roadmap</a>
                        </li>
                        <li lng=eng class="menu-item menu-item-object-custom ">
                            <a href="https://t.me/cunion" target="_blank">Support</a>
                        </li>
                        <li lng=eng class="menu-item menu-item-object-custom menu-item-object-left">
                            <a link-to="for_traders" class="airdrop_link" href="#airdrop">Airdrop</a>
                        </li>

                        <li lng=rus class="menu-item menu-item-object-custom cyber-rus-thin">
                            <a style="scroll-behavior: smooth" link-to="for_investors"
                               href="#for_investors">Инвестору</a>
                        </li>
                        <li lng=rus class="menu-item menu-item-object-custom cyber-rus-thin">
                            <a link-to="for_traders" href="#for_traders">Трейдеру</a></li>
                        <li lng=rus class="menu-item menu-item-object-custom cyber-rus-thin">
                            <a link-to="for_traders" href="#roadmap">Роадмап</a>
                        </li>
                        <li lng=rus class="cyber-rus-thin menu-item menu-item-object-custom"
                            style="font-family: Cyber-russia-light !important;">
                            <a href="https://t.me/cunion" target="_blank">Поддержка</a></li>

                        <li lng=rus class="menu-item menu-item-object-custom cyber-rus-thin menu-item-object-left">
                            <a link-to="for_traders" class="airdrop_link" href="#airdrop">Airdrop</a>
                        </li>
                    </ul>

                    <!--                    width: 29%;-->
                    <div id="hat_buttons" style="width: 307px;margin: auto">

                        <ul id="hat_ul_Sing" class="navbar-nav navbar-btns" style=" margin-top: 2%;">

                            <?php
                            if (isset($_SESSION['logged'])) {
//                                $user = new User($_SESSION['user_email']);

                                $log;
                                if ($user->nickname == null) {

                                    $split = explode("@", $user->user_email);
                                    $split2 = explode(".", $split[1]);

                                    if(strlen($split2[0])>=11){
                                        $len = 11 - strlen($split2[0]);
                                        $nickname="";
                                        for($i=0;$i<strlen($split2[0])+$len-1;$i++){
                                            $nickname .=$split2[0][$i];
                                        }
                                        $split2[0]=$nickname;
                                    }
                                    $log = $split[0][0] . $split[0][1] . "**@" . $split2[0];
                                } else {
                                    $log = $user->nickname;
                                    $nickname="";
                                    if(strlen($log)>=16){
                                        $len = 17 - strlen($log);
                                        for($i=0;$i<strlen($log)+$len - 6;$i++){

                                            $nickname .=$log[$i];
//                                            echo $log[$i];
                                        }
                                        $nickname .= "***";
                                        $log= $nickname;
//                                        echo $nickname;
                                    }
                                }

                                ?>
                                <div class="nav-item hat-registration-button" style="width:200px !important">
                                    <!--margin-bottom: 10px; padding-left: 0px;width: 60%;-->
                                    <a href="https://cunion.io/panel/cabinet/cabinet"
                                       style="text-align: center; color:white; height: 45px; line-height: 24px !important;font-size:12px;font-family: Cyber-russia-light !important"
                                       class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary rus-thin-cyber-text">
                                        <?= $log ?>
                                    </a>
                                </div>

                                <?php
                            } else {
                                ?>
                                <li id="sing_in_hat" lng="eng" class="nav-item hat-registration-button">
                                    <a class="nav-link btn btn-sm btn-outline menu-link cn_button_primary"
                                       href="https://cunion.io/panel/cabinet/registration_form"
                                       ya-goal="goal-front-hat-registration-button"
                                       style="">Registration</a>
                                </li>
                                <li id="reg_hat" lng="rus" class="nav-item hat-registration-button"
                                    style="display: none; font-family: Cyber-russia-light !important">
                                    <a class="nav-link btn btn-sm btn-outline menu-link cn_button_primary"
                                       ya-goal="goal-front-hat-registration-button"
                                       href="https://cunion.io/panel/cabinet/registration_form">Регистрация</a>
                                </li>
                                <?php
                            }
                            ?>


                            <!--                            <li id="sing_in_hat" lng="eng" class="nav-item hat-registration-button">-->
                            <!--                                <a class="nav-link btn btn-sm btn-outline menu-link cn_button_primary"-->
                            <!--                                   href="https://cunion.io/panel/cabinet/cabinet.php">Registration</a>-->
                            <!--                            </li>-->
                            <!--                            <li id="login" lng="" class="nav-item hat-registration-button" style="display: none;">-->
                            <!--                                asdasdsad-->
                            <!--                            </li>-->
                        </ul>
                        <div style="display: flex">
                            <?php
                            if ($_SESSION['logged']) {
                                ?>
                                <ul id="hat_ul_log" class="navbar-nav navbar-btns" style="width: 63%">
                                    <li lng="eng" class="nav-item hat-login-button" style="width: 100% !important;">
                                        <a class="nav-link btn btn-sm btn-outline menu-link "
                                           href="https://cunion.io/panel/php_scripts/log_out_from_index.php"
                                           onclick="log_out()"
                                           style="padding-left:21px; margin-left: 3px;">LOG
                                            OUT</a>
                                    </li>
                                    <li lng="rus" class="nav-item hat-login-button"
                                        style="display: none;width: 100% !important;">
                                        <a class="nav-link btn btn-sm btn-outline menu-link"
                                           href="https://cunion.io/panel/php_scripts/log_out_from_index.php"
                                           onlick="log_out()"
                                           style="padding-left:24px; margin-left: 3px;font-family: Cyber-russia-light !important">Выход</a>
                                    </li>
                                </ul>

                            <?php } else {
                                ?>
                                <ul id="hat_ul_log" class="navbar-nav navbar-btns" style="width: 70%">
                                    <li lng="eng" class="nav-item hat-login-button" style="width: 100%">
                                        <a class="nav-link btn btn-sm btn-outline menu-link "
                                           style=""
                                           href="https://cunion.io/panel/cabinet/<?= $_SESSION['logged'] == true ? "cabinet" : "sign_in_form" ?>">LOG
                                            IN</a>
                                    </li>
                                    <li lng="rus" class="nav-item hat-login-button" style="display: none;width: 100% ">
                                        <a class="nav-link btn btn-sm btn-outline menu-link"
                                           href="https://cunion.io/panel/cabinet/<?= $_SESSION['logged'] == true ? "cabinet" : "sign_in_form" ?>"
                                           style="font-family: Cyber-russia-light !important">Вход</a>
                                    </li>
                                </ul>
                            <?php } ?>
                            <script>
                                function log_out() {
                                    fetch('https://cunion.io/panel/php_scripts/log_out_from_index.php', {
                                        method: 'GET'
                                    }).then((res) => console.log(res))
                                }
                            </script>
                            <ul id="hat_lang" class="navbar-nav navbar-btns" style="">
                                <li id="rus_hat" lng="eng" class="nav-item">
                                    <a class="nav-link btn btn-sm btn-outline earth menu-link rus-lang-link"
                                       action="set-rus"
                                       style="width:33px;height: 45px; font-size: 0px"
                                       onclick="SetLang('rus')">
                                        <div style="display:none">RUS</div>
                                    </a>
                                </li>
                                <li id="eng_hat" lng="rus" class="nav-item"
                                    style="display: none; margin-right: 0px !important;">
                                    <a class="nav-link btn btn-sm btn-outline earth menu-link eng-lang-link"
                                       action="set-eng"
                                       style="width:33px;height: 45px; font-size: 0px"
                                       onclick="SetLang('eng')">


                                        <div style="display:none">ENG</div>


                                    </a>
                                </li>
                            </ul>

                            <style>
                                .rus-lang-link:after {
                                    position: absolute;
                                    -ms-border-radius: 40px;
                                    border-radius: 40px;
                                    left: 2px;
                                    top: 2px;
                                    content: "";
                                    width: calc(100% - 4px);
                                    height: calc(100% - 4px);
                                    z-index: -1;
                                    opacity: 1;
                                    background: transparent !important;
                                    transition: all .5s ease;
                                    background: url(/img/lng/earth.png) 50% 43% no-repeat !important;
                                    background-size: cover !important;
                                }

                                .eng-lang-link:after {
                                    position: absolute;
                                    -ms-border-radius: 40px;
                                    border-radius: 40px;
                                    left: 2px;
                                    top: 2px;
                                    content: "";
                                    width: calc(100% - 4px);
                                    height: calc(100% - 4px);
                                    z-index: -1;
                                    opacity: 1;
                                    background: transparent !important;
                                    transition: all .5s ease;
                                    background: url(img/lng/earth.png) 50% 43% no-repeat !important;
                                    background-size: cover !important;
                                }
                            </style>

                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->
    </header>
    <!-- End Header -->
    <section
            class="vc_rows wpb_row vc_row-fluid mobile-center banner-curb vc_row-o-equal-height vc_row-o-content-middle vc_row-flex banner d-flex align-items-center">
        <div id="particles-js" class="particles-container particles-js">
            <canvas class="particles-js-canvas-el" width="2114" height="553"
                    style="width: 100%; height: 100%;
                    "></canvas>
        </div>
        <div class="container">
            <div class="banner-content">
                <div class="row">
                    <div data-animate="fadeInUp" data-delay="0.65"
                         class="order-lg-first wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 animated fadeInUp"
                         style="visibility: visible; animation-delay: 0.65s;">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element  vc_custom_1520825700169">
                                    <div class="wpb_wrapper">
                                        <h1 lng="eng" class="main-banner-font" style="margin-bottom: 40px;">Our platform
                                            is able to integrate as investors and traders</h1>
                                        <p lng="eng" class="lead color-secondary mobile-content-text secondary-title"
                                           style="margin-bottom: 30px">Copy trading helps both beginners and experienced
                                            traders</p>
                                        <h1 lng="rus" class="main-banner-font" style="margin-bottom: 40px;">Наша
                                            платформа способна объединить как инвесторов так и трейдеров</h1>
                                        <p lng="rus" class="lead color-secondary mobile-content-text secondary-title"
                                           style="margin-bottom: 30px; font-family: Cyber-russia-light !important;">
                                            Копитрейдинг помогает как начинающим так и опытным трейдерам</p>
                                        <style>

                                        </style>


                                        <ul class="btns">
                                            <li class="banner_button" style="margin-right: 0px">
                                                <a lng=eng button-link-to="trader-form"
                                                   ya-goal="goal-front-trader-button"
                                                   class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button">Trader</a>
                                                <a lng=rus button-link-to="trader-form"
                                                   ya-goal="goal-front-trader-button"
                                                   class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button rus-thin-cyber-text">Трейдер</a>
                                            </li>
                                            <li class="banner_button" style="margin-left: 0px">
                                                <a lng=eng button-link-to="investor-form"
                                                   ya-goal="goal-front-investor-button"
                                                   class=" nav-link btn btn-sm btn-outline menu-link bold-font banner-button">Investor</a>
                                                <a lng=rus button-link-to="investor-form"
                                                   ya-goal="goal-front-investor-button"
                                                   class=" nav-link btn btn-sm btn-outline menu-link bold-font banner-button rus-thin-cyber-text"
                                                   style="padding-left: 21px !important;padding-right:21px !important">Инвестор</a>
                                            </li>
                                            <style>
                                                .bold-font {

                                                    font-size: 19px;
                                                    font-family: 'Xyeta', Arial, sans-serif;
                                                    line-height: 1.55;
                                                    font-weight: 500;
                                                    background-position: center center;
                                                    border-color: transparent;
                                                    border-style: solid;
                                                }


                                                .banner-button {
                                                    padding: 7px 30px !important;
                                                }

                                                .main-banner-font {
                                                    color: #ffffff;
                                                    font-size: 32px;
                                                    font-family: 'Xyeta', Arial, sans-serif;
                                                    line-height: 1.55;
                                                    font-weight: 500;
                                                    background-position: center center;
                                                    border-color: transparent;
                                                    border-style: solid;
                                                }
                                            </style>
                                        </ul>
                                        <div id="registration_button" style="/* width: 400px; */display: block;">
                                            <a lng="rus" href="https://cunion.io/panel/cabinet/registration_form"
                                               class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary rus-thin-cyber-text"
                                               ya-goal="goal-front-main-registration-button"
                                               style="display: block;">Регистрация</a>
                                            <a lng="eng" href="https://cunion.io/panel/cabinet/registration_form"
                                               class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                               ya-goal="goal-front-main-registration-button"
                                               style="display: block;">Registration</a>
                                        </div>

                                        <style>
                                            .rus-thin-cyber-text {
                                                font-family: Cyber-russia-light !important;
                                            }
                                        </style>

                                        <style>
                                            @media screen and (max-width: 997px) {
                                                #hat_buttons {
                                                    /*margin-left: 50px !important;*/
                                                    margin-top: 0px !important;
                                                    width: 228px;
                                                    /*width: 36% !important; ;*/
                                                }

                                                #sing_in_hat[lng=eng] {
                                                    /*margin-left: 122px !important;*/
                                                }

                                                #reg_hat[lng=rus] {
                                                    /*margin-left: 9px !important;*/
                                                }

                                                #hat_ul_log {
                                                    margin-bottom: 0px;
                                                }

                                                #hat_lang {
                                                    margin-bottom: 0px
                                                }

                                                hat_ul_Sing {
                                                    margin-bottom: -7px;
                                                }


                                            }

                                            @media screen and (max-width: 1200px) {
                                                #hat_buttons {
                                                    /*margin-left: 50px !important;*/
                                                    margin-top: 0px !important;
                                                    width: 227px !important;
                                                }

                                                #hat_lang {
                                                    margin-left: 0px;
                                                }

                                            }

                                            @media screen and (max-width: 602px) {
                                                #hat_buttons {
                                                    /*margin-left: 50px !important;*/
                                                    margin-top: 0px !important;
                                                    /*width: 47% !important;*/
                                                }
                                            }

                                            @media screen and (max-width: 440px) {
                                                #hat_buttons {
                                                    /*margin-left: 50px !important;*/
                                                    margin-top: 0px !important;
                                                    /*width: 65% !important;*/
                                                }
                                            }


                                            #hat_buttons {
                                                margin-top: 20px;
                                            }

                                            .hat-login-button {
                                                width: 130px;
                                            }

                                            .hat-registration-button {
                                                width: 220px;
                                                margin-bottom: 14px;
                                            }


                                            .cn_button_primary:after {
                                                background: linear-gradient(to right, #46bdf4 0%, #2b56f5 100%) !important;
                                            }

                                            .cn_button_primary:hover:before {
                                                background: red linear-gradient(to right, #46bdf4 0%, #8255fd 100%) !important;
                                            }

                                            @media screen and (min-width: 360px) and  (max-width: 766px) {
                                                .registratoin-button[lng=rus] {
                                                    width: 343px !important;
                                                    margin: auto;
                                                }

                                                .registratoin-button[lng=eng] {
                                                    width: 322px !important;
                                                    margin: auto;

                                                }

                                                .banner_button {
                                                    width: 160px !important;
                                                }
                                            }


                                            @media screen and (min-width: 766px) and  (max-width: 1000px) {
                                                .registratoin-button[lng=rus] {
                                                    width: 341px !important;
                                                }

                                                .registratoin-button[lng=eng] {
                                                    width: 322px !important;
                                                }


                                            }


                                            @media screen and (min-width: 1000px) {

                                                .registratoin-button[lng=rus] {
                                                    width: 405px;
                                                }

                                                .registratoin-button[lng=eng] {
                                                    width: 405px
                                                }
                                            }

                                            .banner_button {
                                                width: 200px;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-animate="fadeInRight" data-delay=".9"
                         class="order-first wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 animated fadeInRight"
                         style="visibility: visible; animation-delay: 0.9s;">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element  header-image">
                                    <div class="wpb_wrapper">
                                        <p><img src="img/header-image-dark.png" alt="header"><br>
                                            <img class="header-image-icon left-icon" src="img/header-icon-a.png"
                                                 alt="header-icon"><br>
                                            <img class="header-image-icon right-icon" src="img/header-icon-b.png"
                                                 alt="header-icon">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 93px !important; border-radius: 50%; margin-bottom: 83px !important;">

    </div>
    <section id="admin_panel" name="admin_panel" style="padding-bottom: 150px; padding-top:0px; padding-top:570px"
             class="vc_rows wpb_row vc_row-fluid section section-pad section-bg-blend nopb vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
        <div class="container">
            <h2 lng="rus" class="section-title text-center" style="display: block; text-align: center !important;">
                Попробуй демо аккаунт</h2>
            <h2 lng="eng" class="section-title text-center" style="display: none; text-aling:center !important;">Try
                demo account</h2>
            <script src="front_js/active_images.js" type="text/javascript" defer=""></script>

            <div class="cabinet_block" style="display:none;" cabinet_images>
                <a href="https://cunion.io/panel/cabinet/cabinet_public_account.php?r=main" target="_blank"
                   class="cabinet_link "
                   ya-goal="goal-front-demo-account-button">
                    <img class="cabinet_image active-image active-big" src="/img/CabinetImages/masterTable.png"> </a>
                <a href="https://cunion.io/panel/cabinet/cabinet_public_account.php?r=boris" target="_blank"
                   ya-goal="goal-front-demo-account-button"
                   class="cabinet_link ">
                    <img class="cabinet_image active-image" src="/img/CabinetImages/Borisich.png"> </a>
                <a href="https://cunion.io/panel/cabinet/cabinet_public_account.php?r=jerry" target="_blank"
                   ya-goal="goal-front-demo-account-button"
                   class="cabinet_link ">
                    <img class="cabinet_image active-image" src="/img/CabinetImages/Jerry.png"> </a>
            </div>
        </div>
        <style>
            @media screen and (max-width: 768px) {
                .cabinet_block {
                    /*z-index: -100;*/
                }
            }
        </style>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">

    </div>
    <section id="for_investors" name="for_investors"
             style="padding-bottom: 150px; padding-top:0px; padding-top:370px !important"
             class="vc_rows wpb_row vc_row-fluid section section-pad section-bg-blend nopb vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
        <?php
        if (($_SESSION['logged'] == true && $_SESSION['user_email'] == 'Wyde90@gmail.com')) {

            ?>
            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                <div data-animate="fadeInUp" data-delay="0.1"
                     class=" wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                     style="visibility: visible;animation-delay: 0.1s;z-index: 1000;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                <figure style="left: 510px;top: 217px;float: left;position: relative;z-index: 1000;"
                                        class="ex_point wpb_wrapper vc_figure">
                                    <div class="vc_single_image-wrapper   vc_box_border_grey _violet_border _exchange_point">
                                        <a href="https://www.kucoin.com/ucenter/signup?rcode=rJXEXC9&amp;utm_source=friendInvite"
                                           target="_blank">
                                            <img width="350" height="100" src="img/points/kucoin.png"
                                                 class="vc_single_image-img attachment-full _radius" alt=""
                                                 loading="lazy"
                                                 srcset="img/points/kucoin.png, img/points/kucoin.png 300w"
                                                 sizes="(max-width: 350px) 100vw, 350px">
                                        </a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.2"
                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                     style="visibility: visible; animation-delay: 0.2s;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                <figure class="wpb_wrapper vc_figure" style="
    left: -343px;
    top: 151px;
    float: left;
    position: relative;
    z-index: -2;
">
                                    <div class="vc_single_image-wrapper   vc_box_border_grey _violet_border _exchange_point">
                                        <a href="https://accounts.binance.com/ru/register?ref=ZYG21U59" target="_blank">
                                            <img width="350" height="100" src="img/points/binance_point.png"
                                                 class="vc_single_image-img attachment-full _radius" alt=""
                                                 loading="lazy"
                                                 srcset="img/points/binance_point.png 350w, img/points/binance_point.png 300w"
                                                 sizes="(max-width: 350px) 100vw, 350px">
                                        </a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.3"
                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                     style="visibility: visible; animation-delay: 0.3s;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                <figure class="wpb_wrapper vc_figure" style="
    left: -1050px;
    top: 291px;
    float: left;
    position: relative;
">
                                    <div class="vc_single_image-wrapper vc_box_border_grey _violet_border _exchange_point">
                                        <a href="https://ftx.com/#a=54611434" target="_blank">
                                            <img width="350" height="100" src="img/points/ftx_point.png"
                                                 class="vc_single_image-img attachment-full _radius" alt=""
                                                 loading="lazy"
                                                 srcset="img/points/ftx_point.png, img/points/ftx_point.png"
                                                 sizes="(max-width: 350px) 100vw, 350px">
                                        </a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="">
                <button style="position: absolute;left: 867px;top: 280px; border-radius:5px">Subscribe API</button>
            </a>
            <style>
                .ex_point {
                    transform: scale(1.0);
                    transition: transform 1s;
                }


                .ex_point:hover {
                    transform: scale(1.2);
                    transition: transform 1s;
                }
            </style>
            <script>
                console.log("Hello user");
            </script>
            <?php

        }

        ?>


        <div class="container" style="display: ">
            <div telegram-popup-trd="" notice_telegram class="telegram-popup" style="display: none">
                <div telegram-popup-container="">
                    <p lng="eng" style="display:none">If you need support write to our group</p>
                    <p lng="rus" style="display:block">Обращайтесь в поддержку телеграм, если вам нужна помощь</p>
                    <!--                                    <input style="width: 130px;display: block;float: left;margin-top: 13px;" type="email" class="form-control" placeholder="Email@">-->
                    <!--                                        <a style="float: right; margin-top:10px" href="https://cunion.io/panel/cabinet/registration_form.php">-->
                    <!--                                            <button class="btn btn-primary btn-lg">-->
                    <!--                                                <i class="align-middle me-2 fas fa-fw fa-user-cog"></i>-->
                    <!--                                                Registration-->
                    <!--                                                +1<i class="align-middle me-2 fas fa-fw fa-coins"></i>-->
                    <!--                                            </button>-->
                    <!--                                        </a>-->
                </div>
            </div>
            <style>
                .telegram-popup {
                    bottom: 4%;
                    right: 11%;

                    width: 14%;
                    height: 100px;

                    background-image: linear-gradient(to right, #46bdf4 0%, #2b56f5 100%);

                    position: fixed;
                    padding: 3px;
                    z-index: 1000;
                    border-radius: 20px;
                    background-image: linear-gradient(to right, #46bdf4 0%, #2b56f5 100%);
                    text-align: center !important;
                    font-size: 14px;
                }


                [telegram-popup-container] {
                    background-color: black;
                    border-radius: 20px;
                    height: 100%;
                    padding: 10px;
                }


                @media screen and (max-width: 1090px) {
                    .telegram-popup {
                        width: 400px;
                        right: 13%;
                        transform: scale(0.7);
                        font-size: 1.3em;
                        line-height: 1.3;
                        bottom: 22px;
                    }
                }

                @media screen and (max-width: 400px) {
                    .telegram-popup {
                        width: 400px;
                        right: 27px;
                        transform: scale(0.7);
                        font-size: 1.3em;
                        line-height: 1.3;
                        bottom: 22px;
                    }
                }

                [notice_telegram] {
                    animation-duration: 2s;
                    animation-name: telegram-notification;
                    animation-iteration-count: infinite;
                }

                @keyframes telegram-notification {
                    0% {
                        transform: scale(0.9);
                    }

                    50% {
                        transform: scale(1.2);
                    }

                    100% {
                        transform: scale(0.9);
                    }

                }


            </style>
            <script>
                // document.addEventListener("DOMContentLoaded", setTimeout(() => {
                //     document.querySelector("[telegram-popup-trd]").style.display = 'none'
                // }, 7000));


            </script>
            <!--        telegram start-->
            <div support-tg-icon style="border:0px !important;">
                <a href="https://t.me/CUNION_SUPPORT24">
                    <img src="https://img.icons8.com/color/48/000000/telegram-app--v1.png"/>
                    <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"-->
                    <!--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"-->
                    <!--                         class="feather feather-send align-middle me-2"-->
                    <!--                         style=" height: 27px;width: 27px;margin-left: 8px;margin-top: 11px;">-->
                    <!--                        <line x1="22" y1="2" x2="11" y2="13"></line>-->
                    <!--                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>-->
                    <!--                    </svg>-->
                </a>
            </div>
            <style>
                @media screen and (min-width: 766px) {
                    [support-tg-icon] {
                        position: fixed;
                        top: 90%;
                        left: 90%;
                        z-index: 10000;
                        border-radius: 100px;
                        height: 50px;
                        width: 50px;
                        border: 2px solid #3f80ea !important;
                    }
                }

                @media screen and (max-width: 1000px) {
                    [support-tg-icon] {
                        position: fixed;
                        bottom: 46px;
                        left: 83%;
                        z-index: 10000;
                        border-radius: 100px;
                        height: 50px;
                        width: 50px;
                        border: 2px solid #3f80ea !important;
                    }
                }
            </style>
            <!--        telegram end-->
            <div class="row" id="investor-form">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1520830144361">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <div class="heading-animation _animation-center"
                                                     style="position: fixed; left: 293px; top: -115px;">
                                                    <span class="line-1"></span><span class="line-2"></span>
                                                    <span class="line-3"></span><span class="line-4"></span>
                                                    <span class="line-5"></span><span class="line-6"></span>
                                                    <span class="line-7"></span><span class="line-8"></span>
                                                </div>
                                                <div class="page-mini-baner"
                                                     style="background-image: url(img/investors.svg);width: 350px;height: 350px;display: block;/* margin: auto; */position: fixed;/* margin-bottom: -137px; */top: -226px;left: 95px;opacity: 0.7;"></div>
                                                <h2 lng="eng" class="section-title">Main product for investors </h2>
                                                <h2 lng="rus" class="section-title">Основной продукт для
                                                    инвесторов </h2>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element  vc_custom_1520830087529 text-center text-subtitle centered-subtitle">
                                                <div class="wpb_wrapper" style="">
                                                    <p lng="eng">A unique opportunity to generate capital gains by
                                                        bringing together the best of the world of cryptocurrencies and
                                                        investments</p>
                                                    <p lng="rus" style="font-family: 'Rubix'">Уникальная возможность
                                                        сформировать прирост капитала,
                                                        собрав лучшее из мира криптовалют и инвестиций</p>
                                                </div>
                                            </div>
                                            <div id="registration_button"
                                                 style="/* width: 400px; */display: block; margin-bottom: 60px">
                                                <a lng="rus"
                                                   href="https://cunion.io/panel/cabinet/registration_form"
                                                   class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                                   ya-goal="goal-front-investor-registration-button"
                                                   style="display: block; margin: auto; margin-top:20px; ">Регистрация</a>
                                                <a lng="eng"
                                                   href="https://cunion.io/panel/cabinet/registration_form"
                                                   class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                                   ya-goal="goal-front-investor-registration-button"
                                                   style="display: block; margin: auto">Registration</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container xl_container_trd">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0.1"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_right_padding_trd"
                     style="visibility: visible; animation-delay: 0.1s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper left-block">
                                    <h4 lng="eng" class="violet" violet="">Security</h4>
                                    <h4 lng="rus" class="violet" violet="">Безопасность</h4>
                                    <p lng="eng" class="lead _text">The service works without direct access to the
                                        exchange account and funds, you do not need to make transfers to third-party
                                        addresses and wallets. If necessary, a basic opportunity is provided to close a
                                        trading pair without the need to enter a cryptocurrency exchange</p>
                                    <p lng="rus" class="lead _text">Сервис работает без прямого доступа к биржевому
                                        аккаунту и средствам , вам не нужно осуществлять переводы на сторонние адреса и
                                        кошельки. В случае необходимости предоставляется базовая возможность закрытия
                                        торговой пары без необходимости входа на криптовалютную биржу</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.3"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_left_padding_trd"
                     style="visibility: visible; animation-delay: 0.3s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper right-block">
                                    <h4 lng="eng" class="violet">Controlling your risks</h4>
                                    <p lng="eng" class="lead _text">Choose individual parameters and acceptable risk
                                        limits yourself, the possibility of changing the trading strategy and trader is
                                        available at any time</p>
                                    <h4 lng="rus" class="violet" style="margin-top: 0px">Контроль своих рисков</h4>
                                    <p lng="rus" class="lead _text">Выбирайте индивидуальные параметры и допустимые
                                        границы риска самостоятельно , возможность смены торговой стратегии и трейдера
                                        доступна в любимой момент</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 50px">
                <div data-animate="fadeInUp" data-delay="0.1"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_right_padding_trd"
                     style="visibility: visible; animation-delay: 0.1s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper left-block">
                                    <h4 lng="eng" class="violet">Diversification</h4>
                                    <p lng="eng" class="lead _text">Distribute assets between traders with different
                                        strategies.Track your trading history and receive daily portfolio status reports
                                        on all linked exchanges and wallets</p>
                                    <h4 lng="rus" class="violet">Диверсификация</h4>
                                    <p lng="rus" class="lead _text">Распределяйте активы между трейдерами с разными
                                        стратегиями .Отслеживайте свою историю торговых сделок и получайте ежедневные
                                        отчёты о состоянии портфеля на всех привязанных биржах и кошельках</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.3"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_left_padding_trd"
                     style="visibility: visible; animation-delay: 0.3s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper right-block">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper">
                                    <h4 lng="eng" class="violet">Passive income</h4>
                                    <p lng="eng" class="lead _text">Get the income of active crypto trading without
                                        participating in trading by choosing the right trading strategy for you</p>
                                    <h4 lng="rus" class="violet">Пассивный доход</h4>
                                    <p lng="rus" class="lead _text">Получайте доходы активного криптотрейдинга без
                                        участия в торговле выбирая подходящую торговую стратегию для вас</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>

                </style>
            </div>
            <div class="wpb_wrapper" style="display: none">
                <br><br>
                <div role="form" class="wpcf7" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                    </div>
                    <form method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="301">
                            <input type="hidden" name="_wpcf7_version" value="5.4.1">
                            <input type="hidden" name="_wpcf7_locale" value="en_US">
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f301-p439-o1">
                            <input type="hidden" name="_wpcf7_container_post" value="439">
                            <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                        </div>
                        <div class="comment-form text-center">
                            <div class="form-results"></div>
                            <div class="input-field">
                                <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                                                        name="investor-email" value=""
                                                                                        size="40"
                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input-line"
                                                                                        aria-required="true"
                                                                                        aria-invalid="false"></span><label
                                        lng="eng" class="input-title">Email</label><label lng="rus"
                                                                                          class="input-title cyber-rus-thin">Емэйл</label>
                            </div>
                            <div class="input-field">
                                <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                                                        name="investor-telegram"
                                                                                        value="" size="40"
                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input-line"
                                                                                        aria-required="false"
                                                                                        aria-invalid="false"></span><label
                                        lng="eng" class="input-title">Telegram</label><label lng="rus"
                                                                                             class="input-title cyber-rus-thin">Телеграмм</label>
                            </div>
                            <div class="input-field">
                                <span class="wpcf7-form-control-wrap your-message"><textarea name="investor-message"
                                                                                             cols="40" rows="10"
                                                                                             class="wpcf7-form-control wpcf7-textarea input-line txtarea"
                                                                                             aria-invalid="false"></textarea></span><label
                                        lng="eng" class="input-title">Your Message</label><label lng="rus"
                                                                                                 class="input-title cyber-rus-thin">Ваше
                                    сообщение</label>
                            </div>
                            <div lng="eng" class="input-field">
                                <button type="submit" class="btn" onclick="SubmitInvestorForm(event)">Submit</button>
                            </div>
                            <div lng="rus" class="input-field">
                                <button type="submit" class="btn" onclick="SubmitInvestorForm(event)">Отправить</button>
                            </div>
                        </div>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                    <div lng="eng" thank-msg-investor style="display: none"
                         class="thk-msg nav-link btn btn-sm btn-outline menu-link bold-font banner-button">Your
                        application has been sent. Thank you for participating in the alpha testing of the project. At
                        the moment, we are testing the load on the system, so we are registering users gradually. As
                        soon as there are empty seats, we will immediately send you your login details. Join our group
                        in telegram -
                        <a href="https://t.me/cunion" target="_blank">tg-cunion.io</a> Regards, Cunion.io support
                    </div>
                    <div lng="rus" thank-msg-investor style="display: none"
                         class="thk-msg nav-link btn btn-sm btn-outline menu-link bold-font banner-button">Ваша заявка
                        отправлена. Спасибо за участие в альфа тестировании проекта. На данный момент мы тестируем
                        нагрузку на систему поэтому регистрируем пользователей постепенно. Как только появятся свободные
                        места, мы сразу отправим Вам данные для входа в ваш аккаунт. А сейчас Вы можете вступить в нашу
                        группу в телеграмме -
                        <a href="https://t.me/cunion" target="_blank">tg-cunion.io</a> Regards, Cunion.io support С
                        уважением служба поддержки Cunion.io (https://cunion.io/)
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">

    </div>
    <section id="for_traders" name="for_traders" style="padding-top: 265px !important;"
             class="vc_rows wpb_row vc_row-fluid section section-pad section-bg-blend nopb vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
        <div class="container" id="trader-form">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1520830144361">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <div class="heading-animation _animation-center"
                                                     style="position: fixed; top: -180px; left: 300px;">
                                                    <span class="line-1"></span><span class="line-2"></span>
                                                    <span class="line-3"></span><span class="line-4"></span>
                                                    <span class="line-5"></span><span class="line-6"></span>
                                                </div>
                                                <div correct-img class="page-mini-baner"
                                                     style="background-image: url(img/traders.svg);width: 350px;height: 350px;display: block; opacity: 0.7; position: fixed;top: -244px;left: 120px;"></div>
                                                <img bug-img src="img/traders_fin.png" style="visibility: hidden">
                                                <style>
                                                    [bug-img] {
                                                        width: 350px;
                                                        /* height: 500px; */
                                                        top: -213px;
                                                        left: 145px;
                                                        position: fixed;
                                                    }
                                                </style>
                                                <h2 lng="eng" class="section-title">GAIN OF KNOWLEDGE AND ASSETS FOR
                                                    TRADERS</h2>
                                                <h2 lng="rus" class="section-title">Прирост знаний и активов для
                                                    трейдеров</h2>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element  vc_custom_1520830087529 text-center text-subtitle centered-subtitle"
                                                 style="">
                                                <div class="wpb_wrapper">
                                                    <p lng="eng">Our platform will be useful for both novice and
                                                        experienced traders</p>
                                                    <p lng="rus" style="font-family: 'Rubix' ">Наша платформа будет
                                                        полезна как начинающим так и
                                                        опытным трейдерам</p>
                                                </div>
                                            </div>
                                            <div id="registration_button"
                                                 style="/* width: 400px; */display: block; margin-bottom: 60px">
                                                <a lng="rus"
                                                   href="https://cunion.io/panel/cabinet/registration_form"
                                                   class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                                   ya-goal="goal-front-trader-registration-button"
                                                   style="display: block; margin: auto; margin-top:20px; ">Регистрация</a>
                                                <a lng="eng"
                                                   href="https://cunion.io/panel/cabinet/registration_form"
                                                   class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                                   ya-goal="goal-front-trader-registration-button"
                                                   style="display: block; margin: auto">Registration</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container xl_container_trd">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0.1"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_right_padding_trd"
                     style="visibility: visible; animation-delay: 0.1s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper left-block">
                                    <h4 lng="eng" class="violet" violet="">Further only better</h4>
                                    <p lng="eng" class="lead _text">The development of your referral system based on the
                                        success of your trading strategy to attract new subscribers, as one of the
                                        bonuses for passive and additional earnings</p>
                                    <h4 lng="rus" class="violet" violet="">Дальше только лучше</h4>
                                    <p lng="rus" class="lead _text">Развитие вашей реферальной системы на основе
                                        успешности вашей торговой стратегии для привлечения новых подписчиков , как один
                                        из бонусов пассивного и дополнительного заработка</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.3"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_left_padding_trd"
                     style="visibility: visible; animation-delay: 0.3s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper right-block">
                                    <h4 lng="eng" class="violet">Convenience here and now</h4>
                                    <p lng="eng" class="lead _text">A modern tool that allows you to quickly and
                                        conveniently analyze the opening/closing point of a trade directly on the
                                        TradingView chart. A convenient way to plan your income and take control of
                                        risks.</p>
                                    <h4 lng="rus" class="violet">Удобство здесь и сейчас</h4>
                                    <p lng="rus" class="lead _text">Современный инструмент позволяющий быстро и удобно
                                        проанализировать точку открытия/закрытия сделки прямо на графике TradingView.
                                        Удобный способ спланировать свой доход и взять под контроль риски.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 50px">
                <div data-animate="fadeInUp" data-delay="0.1"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_right_padding_trd"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper left-block">
                                    <h4 lng="eng" class="violet">Speed and success</h4>
                                    <p lng="eng" class="lead _text">Time to repeat a transaction is less than one
                                        second, the percentage of successful copies is 99.9%</p>
                                    <h4 lng="rus" class="violet">Скорость и успешность</h4>
                                    <p lng="rus" class="lead _text">Время на повторение сделки меньше одной секунду ,
                                        процент успешных копирований 99,9%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.3"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_left_padding_trd"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper right-block">
                                    <h4 lng="eng" class="violet">Direct contact</h4>
                                    <p lng="eng" class="lead _text">Opportunity to communicate with a person presenting
                                        a trading strategy directly</p>
                                    <h4 lng="rus" class="violet">Прямой контакт</h4>
                                    <p lng="rus" class="lead _text">Возможность общения с лицом представляющим торговую
                                        стратегию напрямую</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row" style="margin-top: 50px">
                <div data-animate="fadeInUp" data-delay="0.1"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_right_padding_trd"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper left-block">
                                    <h4 lng="eng" class="violet">Instant replies</h4>
                                    <p lng="eng" class="lead _text">The fastest possible responses to the review and
                                        publication of your trading strategy</p>
                                    <h4 lng="rus" class="violet">Мгновенные ответы</h4>
                                    <p lng="rus" class="lead _text">Максимально быстрые ответы на рассмотрение и
                                        публикацию вашей торговой стратегии</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInUp" data-delay="0.3"
                     class="order-md-first order-last wpb_column vc_column_container vc_col-sm-6 animated fadeInUp xl_left_padding_trd"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <div class="vc_column-inner _text-block ">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element  vc_custom_1520828093008">
                                <div class="wpb_wrapper right-block">
                                    <h4 lng="eng" class="violet">New knowledge</h4>
                                    <p lng="eng" class="lead _text">By studying the activity and phases of the market,
                                        it will be easier for novice traders to master the basic understanding of
                                        trading</p>
                                    <h4 lng="rus" class="violet">Новые знания</h4>
                                    <p lng="rus" class="lead _text">Изучая активность и фазы рынка начинающим трейдерам
                                        будет проще освоить базовые понимания трейдинга</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    ._text-block {
                        display: block !important;
                    }

                    .violet {
                        color: #8255fd;
                    }

                    ._text {
                        font-family: 'Rubix' !important;
                        font-size: 17px !important;
                        line-height: 1.86;
                        font-weight: 250;
                        -webkit-font-smoothing: antialiased;
                    }
                </style>
            </div>
            <!--form trader form-->
            <div class="wpb_wrapper" style="display: none">
                <div role="form" class="wpcf7" id="wpcf7-f301-p439-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                    </div>
                    <form id="" style="scroll-behavior: smooth; margin-top:35px" method="post" class="wpcf7-form init"
                          novalidate="novalidate" data-status="init">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="301">
                            <input type="hidden" name="_wpcf7_version" value="5.4.1">
                            <input type="hidden" name="_wpcf7_locale" value="en_US">
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f301-p439-o1">
                            <input type="hidden" name="_wpcf7_container_post" value="439">
                            <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                        </div>
                        <div class="comment-form text-center">
                            <div class="form-results"></div>
                            <div class="row">
                                <div class="input-field  med-input">
                                    <span class=""><input type="text" name="trader_email" value="" size="40"
                                                          class="wpcf7-form-control wpcf7-text  input-line"
                                                          aria-required="true" aria-invalid="false"></span>
                                    <label lng="eng" class="input-title">Email</label>
                                    <label lng="rus" class="input-title cyber-rus-thin">Емэйл</label>
                                </div>
                                <div class="input-field  med-input">
                                    <span class=""><input type="text" name="trader_telegram" value="" size="40"
                                                          class="wpcf7-form-control wpcf7-text  input-line"
                                                          aria-required="false" aria-invalid="false"></span>
                                    <label lng="eng" class="input-title">Telegram</label>
                                    <label lng="rus" class="input-title cyber-rus-thin">Телеграмм</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field med-input">
                                    <span class=""><input type="text" name="trader_using_deposit" value="" size="40"
                                                          class="wpcf7-form-control wpcf7-text input-line"
                                                          aria-required="true" aria-invalid="false"></span>
                                    <label lng="eng" class="input-title">Using deposit</label>
                                    <label lng="rus" class="input-title cyber-rus-thin">Используемый депозит</label>
                                </div>
                                <div class="input-field  med-input">
                                    <span class=""><input type="text" name="trader_min_required_deposit" value=""
                                                          size="40" class="wpcf7-form-control wpcf7-text  input-line"
                                                          aria-required="true" aria-invalid="false"></span>
                                    <label lng="eng" class="input-title big-label-text">Minimum required deposit</label>
                                    <label lng="rus" class="input-title big-label-text cyber-rus-thin">Минимальный
                                        депозит для торговли</label>
                                </div>
                            </div>
                            <div class="row">
                                <!--                                <div class="input-field med-input">-->
                                <!--                                    <span class=""><input type="text" name="trade_type" value="" size="40" class="wpcf7-form-control wpcf7-text input-line" aria-required="true" aria-invalid="false"></span>-->
                                <!--                                    <label lng="eng" class="input-title big-label-text">Trading type(bot or manual)</label> <label lng="rus" class="input-title big-label-text cyber-rus-thin">Тип торговли(Бог/Вручную)</label>-->
                                <!--                                </div>-->
                                <div class="input-field  med-input">
                                    <span class=""><input type="text" name="average_deal_count" value="" size="40"
                                                          class="wpcf7-form-control wpcf7-text  input-line"
                                                          aria-required="true" aria-invalid="true"></span>
                                    <label lng="eng" class="input-title big-label-text">Average number of trades per
                                        day</label>
                                    <label lng="rus" class="input-title big-label-text cyber-rus-thin">Среднее кол-во
                                        сделок за день</label>
                                </div>
                                <div trade-type-select lng="eng" class="input-field med-input"
                                     style="border-bottom: 1px solid #46bdf4;">
                                    <span class="">
                                        <select style="font-size: 20px !important;" type="text" name="trade_type"
                                                value=""
                                                class="wpcf7-form-control wpcf7-text input-line trade-type-select"
                                                aria-required="true" aria-invalid="false">
                                            <option style="font-size: 5px" class="trade-type-option"
                                                    value="Bot">Bot</option>
                                            <option class="trade-type-option" value="Manual">Manual</option>
                                        </select>
                                    </span>
                                    <label lng="eng" class="input-title big-label-text">Trading type(bot or
                                        manual)</label>
                                    <label lng="rus" class="input-title big-label-text cyber-rus-thin">Тип
                                        торговли(Бог/Вручную)</label>
                                </div>
                                <div trade-type-select lng="rus" class="input-field med-input"
                                     style="border-bottom: 1px solid #46bdf4;">
                                    <span class="">
                                        <select style="font-size: 20px !important;" type="text" name="trade_type"
                                                value=""
                                                class="wpcf7-form-control wpcf7-text input-line trade-type-select"
                                                aria-required="true" aria-invalid="false">
                                            <option style="font-size: 5px" class="trade-type-option"
                                                    value="Bot">Бот</option>
                                            <option class="trade-type-option" value="Manual">Ручная торговля</option>
                                        </select>
                                    </span>
                                    <label lng="eng" class="input-title big-label-text">Trading type(bot or
                                        manual)</label>
                                    <label lng="rus" class="input-title big-label-text cyber-rus-thin">Тип
                                        торговли(Бог/Вручную)</label>
                                </div>
                            </div>
                            <div class="input-field">
                                <span class=""><textarea name="trader_message" cols="40" rows="10"
                                                         class="wpcf7-form-control wpcf7-textarea input-line txtarea"
                                                         aria-required="true" aria-invalid="false"></textarea></span>
                                <label lng="eng" class="input-title">Short description of the strategy</label>
                                <label lng="rus" class="input-title cyber-rus-thin">Краткое описание стратегии</label>
                            </div>
                            <div lng="eng" class="input-field">
                                <button type="submit" class="btn" onclick="SubmitTraderForm(event)">Submit</button>
                            </div>
                            <div lng="rus" class="input-field">
                                <button type="submit" class="btn" onclick="SubmitTraderForm(event)">Отправить</button>
                            </div>
                            <style>
                                .small-input {
                                    width: 30%;
                                    display: block;
                                    float: left;
                                    margin: auto;
                                }

                                .med-input {
                                    width: 45%;
                                    display: block;
                                    float: left;
                                    margin: auto;
                                }
                            </style>
                        </div>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                    <div lng="eng" thank-msg-trader style="display: none"
                         class="thk-msg nav-link btn btn-sm btn-outline menu-link bold-font banner-button">Your
                        application has been sent. Thank you for participating in the alpha testing of the project. At
                        the moment, we are testing the load on the system, so we are registering users gradually. As
                        soon as there are empty seats, we will immediately send you your login details. Join our group
                        in telegram -
                        <a href="https://t.me/cunion" target="_blank">tg-cunion.io</a> Regards, Cunion.io support
                    </div>
                    <div lng="rus" thank-msg-trader style="display: none"
                         class="thk-msg nav-link btn btn-sm btn-outline menu-link bold-font banner-button">Ваша заявка
                        отправлена. Спасибо за участие в альфа тестировании проекта. На данный момент мы тестируем
                        нагрузку на систему поэтому регистрируем пользователей постепенно. Как только появятся свободные
                        места, мы сразу отправим Вам данные для входа в ваш аккаунт. А сейчас Вы можете вступить в нашу
                        группу в телеграмме -
                        <a href="https://t.me/cunion" target="_blank">tg-cunion.io</a> Regards, Cunion.io support С
                        уважением служба поддержки Cunion.io (https://cunion.io/)
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">

    </div>
    <section id="tokensale" class="vc_rows wpb_row vc_row-fluid section-pad section-bg-alt">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1520830144361">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-8 vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <h2 lng="eng" class="section-title">platform status <span>BETA</span>
                                                </h2>
                                                <h2 lng="rus" class="section-title">статус платформы <span>BETA</span>
                                                </h2>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element  vc_custom_1520838333960 text-center text-subtitle centered-subtitle"
                                                 style="margin-bottom: 100px !important;">
                                                <div class="wpb_wrapper mar">
                                                    <p lng="eng">The service is in beta testing, we will be happy to share our plans and new products.</p>
                                                    <p lng="rus" style="font-family: 'Rubix'; font-size: 21px">Сервис
                                                        находится на стадии бета-тестирования , будем
                                                        рады поделиться своими планами и новинками.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="airdrop"
                                 class="vc_row wpb_row vc_inner vc_row-fluid vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="event-info wpb_column vc_column_container vc_col-sm-12 vc_col-md-6 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper" style="margin-left: 100px">
                                            <div class="row">
                                                <div class="mobile-section-image"
                                                     style="background-image: url(img/system.svg);width: 405px;height: 450px;display: block;margin: auto;/* margin-bottom: -348px; */position: fixed;top: -82px;left: 54px;opacity: 0.5; margin-top: 20px; margin-left: 50px"></div>
                                                <div class="col-sm-6">
                                                    <div class="event-single-info">
                                                        <h6 lng="eng">Tocenomics</h6>
                                                        <h6 lng="rus">Токеномика</h6>
                                                        <!--                                                        <p>Okt 4, 2021 </p>-->
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="event-single-info">
                                                        <h6 lng="eng">Smart contract</h6>
                                                        <h6 lng="rus">Смарт контракт</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="event-single-info">
                                                        <h6 lng="eng">Airdrop</h6>
                                                        <h6 lng="rus">Airdrop</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="event-single-info">
                                                        <h6 lng="eng">ICO</h6>
                                                        <h6 lng="rus">ICO</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.5"
                                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-1 vc_col-lg-5 vc_col-md-6 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.5s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="countdown-box text-center ">
                                                <div class="token-countdown d-flex align-content-stretch"
                                                     style="font-family: 'Xyeta', Arial, sans-serif !important;"
                                                     data-date="2021/03/31">
                                                    <div class="col">
                                                        <span class="countdown-time" timer_month>--</span><span
                                                                class="countdown-text">Month</span>
                                                    </div>
                                                    <div class="col">
                                                        <span class="countdown-time" timer_days>--</span><span
                                                                class="countdown-text">Days</span>
                                                    </div>
                                                    <div class="col">
                                                        <span class="countdown-time" timer_hours>--</span><span
                                                                class="countdown-text">Hours</span>
                                                    </div>
                                                    <div class="col">
                                                        <span class="countdown-time" timer_minutes>--</span><span
                                                                class="countdown-text">Minutes</span>
                                                    </div>
                                                    <div class="col">
                                                        <span class="countdown-time countdown-time-last" timer_seconds>--</span>
                                                        <span class="countdown-text">Seconds</span>
                                                    </div>

                                                    <style>
                                                        .countdown-time {
                                                            font-family: 'Xyeta', Arial, sans-serif !important;
                                                        }
                                                    </style>
                                                </div>
                                                <div class="token-status-bar">
                                                    <div class="token-status-percent" style="width:57%;"></div>
                                                    <span class="token-status-point" style="left:25%;">Alpha</span>
                                                    <span class="token-status-point" style="left:55%;">Beta</span>
                                                    <span class="token-status-point" style="left:80%;">v_1.0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1520830144361 air_drop_mobile_margin_top"
                                 style="margin-top: 200px ">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-8 vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <h2 lng="eng" class="section-title">Airdrop Active
                                                    Stage<span>AIRDROP</span>
                                                </h2>
                                                <h2 lng="rus" class="section-title">Активная Фаза
                                                    Airdrop<span>AIRDROP</span>
                                                </h2>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element  vc_custom_1520838333960 text-center text-subtitle centered-subtitle"
                                                 style="margin-bottom: 100px !important;">
                                                <div class="wpb_wrapper mar">
                                                    <p lng="eng">Complete tasks to earn Airdrop points</p>
                                                    <p lng="rus" style="font-family: 'Rubix'; font-size: 21px">
                                                        Выполняйте задания что-бы заработать Airdrop баллы</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="registration_button"
                                         style="/* width: 400px; */display: block; margin-bottom: 0px; margin-top: -45px">
                                        <a lng="rus" href="https://cunion.io/panel/cabinet/registration_form"
                                           class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                           ya-goal="goal-front-airdrop-registration-button"
                                           style="display: none; margin: 20px auto auto;">Регистрация</a>
                                        <a lng="eng" href="https://cunion.io/panel/cabinet/registration_form"
                                           class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                           ya-goal="goal-front-airdrop-registration-button"
                                           style="display: block; margin: auto">Registration</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">

    </div>
    <section id="intro2"
             class="vc_rows wpb_row vc_row-fluid section section-pad section-bg-blend nopb vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"
             style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1520830144361"
                                 style="padding: 0px !important;">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-8 vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <h2 lng="eng" class="section-title">Three easy steps to connect <span>STEPS</span>
                                                </h2>
                                                <h2 lng="rus" class="section-title" style="display: none;">Три простых
                                                    шага <span>STEPS</span>
                                                </h2>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element  vc_custom_1520838333960 text-center text-subtitle">
                                                <div class="wpb_wrapper mar" style="margin-bottom: 60px">
                                                    <p lng="eng">It only takes a few steps to get started.</p>
                                                    <p lng="rus"
                                                       style="font-family: Rubix; font-size: 21px; display: none;">Для
                                                        того что бы начать , нужно всего лишь несколько шагов ...</p>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="wpb_wrapper" style="margin: auto">
                                            <iframe class="connect_video" style="display: none"
                                                    src="https://www.youtube.com/embed/DqgJKvmFQHk"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>

                                        <style>
                                            .connect_video {
                                                width: 600px;
                                                height: 400px;
                                            }

                                            @media screen and (max-width: 700px) {
                                                .connect_video {
                                                    width: 300px;
                                                    margin: auto;
                                                    height: 250px;
                                                }
                                            }
                                        </style>

                                        <div class="vc_column-inner" style="padding: 30px; margin-top:20px">
                                            <div class="wpb_wrapper _text" style="width: 100%">
                                                <h2 lng="eng" class="lead mobile-instruction">
                                                    <strong>1.</strong> Connecting your exchange account</h2>
                                                <h2 lng="eng" class="lead mobile-instruction">
                                                    <strong>2.</strong>  Determine for yourself the appropriate strategy with acceptable risks</h2>
                                                <h2 lng="eng" class="lead mobile-instruction">
                                                    <strong>3.</strong> Track your balance at any time convenient for you</h2>
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>1.</strong> Подключение вашего биржевого аккаунта</h2>
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>2.</strong> Определите для себя подходящую стратегию с
                                                    допустимыми рисками</h2>
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>3.</strong> Отслеживайте ваш баланс в любое удобное для вас
                                                    время</h2>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
    </section>
    <style>
        @media screen and (max-width: 500px) {
            section[id=intro2] {
                margin-bottom: -100px !important;
                padding-bottom: 0px !important;
            }
        }
    </style>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 30px; border-radius: 50%; margin-bottom: 200px">

    </div>
    <section id="partners" class="vc_rows wpb_row vc_row-fluid section-pad section-bg-alt" style="padding-top: 0px">


        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center ">
                                                <h2 lng="eng" class="section-title">Available exchanges for integration
                                                    <span>PARTNERS</span></h2>
                                                <h2 lng="rus" class="section-title">Доступные биржи для интеграции
                                                    <span>PARTNERS</span></h2>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element  vc_custom_1520830087529 text-center">
                                                <div class="wpb_wrapper text-subtitle">
                                                    <p lng="eng">The number of cryptocurrency exchanges for active copy trading will only increase in the following additions</p>
                                                    <p lng="rus" style="font-family: 'Rubix'; font-size: 21px">
                                                        Количество криптовалютных бирж для активного
                                                        копитрейдинга будет только увеличиваться в следующих
                                                        дополнениях</p>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space" style="height: 50px"><span
                                                        class="vc_empty_space_inner"></span>
                                            </div>
                                            <div class="vc_empty_space  vc_hidden-sm vc_hidden-xs" style="height: 60px">
                                                <span class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div data-animate="fadeInUp" data-delay="0.1"
                                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.1s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <div class="vc_single_image-wrapper   vc_box_border_grey _violet_border _exchange_point">
                                                        <a href="https://www.kucoin.com/ucenter/signup?rcode=rJXEXC9&utm_source=friendInvite"
                                                           target="_blank">
                                                            <img width="350" height="100" src="img/points/kucoin.png"
                                                                 class="vc_single_image-img attachment-full _radius"
                                                                 alt="" loading="lazy"
                                                                 srcset="img/points/kucoin.png, img/points/kucoin.png 300w"
                                                                 sizes="(max-width: 350px) 100vw, 350px">
                                                        </a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <div class="vc_single_image-wrapper   vc_box_border_grey _violet_border _exchange_point">
                                                        <a href="https://accounts.binance.com/ru/register?ref=ZYG21U59"
                                                           target="_blank">
                                                            <img width="350" height="100"
                                                                 src="img/points/binance_point.png"
                                                                 class="vc_single_image-img attachment-full _radius"
                                                                 alt="" loading="lazy"
                                                                 srcset="img/points/binance_point.png 350w, img/points/binance_point.png 300w"
                                                                 sizes="(max-width: 350px) 100vw, 350px">
                                                        </a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.3"
                                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.3s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <div class="vc_single_image-wrapper vc_box_border_grey _violet_border _exchange_point">
                                                        <a href="https://ftx.com/#a=54611434" target="_blank">
                                                            <img width="350" height="100" src="img/points/ftx_point.png"
                                                                 class="vc_single_image-img attachment-full _radius"
                                                                 alt="" loading="lazy"
                                                                 srcset="img/points/ftx_point.png, img/points/ftx_point.png"
                                                                 sizes="(max-width: 350px) 100vw, 350px">
                                                        </a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                ._exchange_point {
                                    max-width: 70% !important;
                                    margin: auto;
                                }

                                ._violet_border {
                                    padding: 3px;
                                    background-image: linear-gradient(to right, #46bdf4 0%, #8255fd 100%);
                                    border-radius: 20px;
                                }

                                ._radius {
                                    border-radius: 20px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">

    </div>
    <section id="roadmap" class="vc_rows wpb_row vc_row-fluid section-pad section-bg section-connect">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1520830144361"
                                 style="margin-bottom: 80px">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper" style="margin-bottom: 50px !important;">
                                                <div class="section-head text-center">

                                                    <h2 class="section-title" lng ="eng">
                                                        OUR ROADMAP <span>ROADMAP</span>
                                                    </h2>

                                                    <h2 class="section-title" lng ="rus">
                                                        НАШ РОАДМАП<span>ROADMAP</span>
                                                    </h2>
                                                </div>


                                            <div class="vc_empty_space" style="height: 50px"><span
                                                        class="vc_empty_space_inner"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="row roadmap-list align-items-end">
                                                <div class="col-lg ">
                                                    <div class="single-roadmap roadmap-sm roadmap-done">
                                                        <h6 lng="eng">Alpha version start</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">START OF THE ALPHA VERSION OF THE COPY TRADING PLATFORM WITH THE POSSIBILITY OF CONNECTING A FOLLOWER TO THE TRADER WITH A PERCENTAGE RATIO OF THE TRADING LOT SIZE BETWEEN THEM
                                                        </div>
                                                        <h6 lng="rus">Старт альфа версии</h6>
                                                        <div lng="rus" popup style="display:none; "
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">Старт
                                                            альфа версии копитрейдинговой платформы с возможностью
                                                            подключения фолловера к мастеру имея процентное соотношение
                                                            размера торгового лота между ними
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg width-0">
                                                    <div class="single-roadmap roadmap-sm roadmap-done roadmap-down">
                                                        <h6 lng="eng">Alpha testing</h6>
                                                        <div lng="eng" popup style="display:none; "
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            TESTING THE LOAD ON THE SYSTEM. ANALYSIS OF THE DATA OBTAINED FOR EVALUATION AND THE POSSIBILITY OF TRANSITION TO THE NEXT PHASE OF DEVELOPMENT AND IMPLEMENTATION OF NEW FUNCTIONS
                                                        </div>
                                                        <h6 lng="rus" style="width: 100px">Альфа тестирование</h6>
                                                        <div lng="rus" popup style="display:none; "
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Тестирование нагрузки на систему , анализ полученных данных
                                                            для оценки и возможности перехода к следующей фазе
                                                            разработки и внедрения новых функций
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg ">
                                                    <div class="single-roadmap roadmap-done  ">
                                                        <h6 lng="eng">Implementation of the main functionality</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            INTRODUCTION AND IMPLEMENTATION OF A TRADING INSTRUMENT, A COMPLETE TRACKING BASE WITH A HISTORY OF ALL TRADING OPERATIONS.  CONNECTING VIA API & SECRET KEY.  TOOLBAR IN THE OFFICE OFFICE AND MUCH MORE.
                                                        </div>
                                                        <h6 lng="rus">Релизация и внедрение основного функционала</h6>
                                                        <div lng="rus" popup style="display:none; "
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Внедрение и реализация торгового инструмента, полноценная
                                                            база отслеживания с историей всех торговых операций.
                                                            Подключение посредством API & Secret Key. Панель
                                                            инструментов в рабочем кабинете и многое другое.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg width-0">
                                                    <div class="single-roadmap roadmap-done roadmap-sm  roadmap-down">
                                                        <h6 lng="eng">Monetization</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            ADDING AND IMPLEMENTING A SUBSCRIPTION PLAN. TRADER'S PROFITABILITY FROM SUCCESSFUL TRANSACTIONS
                                                        </div>
                                                        <h6 lng="rus">Монетизация</h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Добавление и внедрение плана подписки , доходность трейдера
                                                            с успешных сделок
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg ">
                                                    <div class="single-roadmap roadmap-sm roadmap-done">
                                                        <!--                                                        <h6 lng="eng">Adding new cryptocurrency exchanges</h6>-->
                                                        <!--                                                        <div lng="eng" popup style="display:none"-->
                                                        <!--                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">The-->
                                                        <!--                                                            number of cryptocurrency exchanges will only grow, find a-->
                                                        <!--                                                            trading platform that is convenient for you-->
                                                        <!--                                                        </div>-->
                                                        <!--                                                        <h6 lng="rus">Добавление новых криптовалютных бирж </h6>-->
                                                        <!--                                                        <div lng="rus" popup style="display:none"-->
                                                        <!--                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">-->
                                                        <!--                                                            Количество криптовалютных бирж будет только дополняться ,-->
                                                        <!--                                                            найдите удобную для вас торговую площадку-->
                                                        <!--                                                        </div>-->

                                                        <h6 lng="eng">Referal Programm</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Adding a referral system as an opportunity for additional
                                                            passive earnings for platform users
                                                        </div>
                                                        <h6 lng="rus">Реферальная программа</h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Добавление реферальной системы , как возможность
                                                            дополнительного пассивного заработка для пользователей
                                                            платформы
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg ">
                                                    <div class="single-roadmap">
                                                        <h6 lng="eng">Token</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Creation and release of your own platform token. Promotion
                                                            and implementation of a token in order to enter various
                                                            cryptocurrency exchanges
                                                        </div>
                                                        <h6 lng="rus">Токен </h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Создание и выпуск собственного токена платформы. Продвижение
                                                            и реализация токена с целью выхода на различные
                                                            криптовалютные биржи
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg width-0">
                                                    <div class="single-roadmap roadmap-sm  roadmap-down">
                                                        <h6 lng="eng">Airdrop / ICO</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Advertising campaign and product promotion. Carrying out
                                                            Airdrop / ICO stages with implementation and access to
                                                            Launchpad.
                                                        </div>
                                                        <h6 lng="rus">Airdrop / ICO</h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Рекламная кампания и продвижение продукта. Проведение этапов
                                                            Airdrop / ICO с реализацией и выходом на Launchpad.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg ">
                                                    <div class="single-roadmap  ">
                                                        <h6 lng="eng">Listing</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Listing of the copytrading token of the Cunion.io platform
                                                            on partner cryptocurrency exchanges, which is integrated
                                                            into the project monetization system and the possibility
                                                            within the exchange currency of the service.
                                                        </div>
                                                        <h6 lng="rus">Листинг</h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Листинг токена копитрейдинг платформы Cunion.io на
                                                            партнерские криптовалютные биржи, который интегрирован в
                                                            систему монетизации проекта и возможностью внутри обменной
                                                            валюты сервиса.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg ">
                                                    <div class="single-roadmap roadmap-sm ">
                                                        <h6 lng="eng">Trading Terminal</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">The
                                                            trading terminal is a set of tools that allow traders to
                                                            make trade transactions.
                                                        </div>
                                                        <h6 lng="rus">Трейдинг терминал</h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Торговый терминал представляет собой набор инструмента
                                                            позволяющего совершать трейдерам торговые сделки.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg width-0">
                                                    <div class="single-roadmap roadmap-sm roadmap-down">
                                                        <h6 lng="eng">Trading bots</h6>
                                                        <div lng="eng" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Adding various trading bots to the platform, which are
                                                            trading software
                                                        </div>
                                                        <h6 lng="rus">Торговые боты </h6>
                                                        <div lng="rus" popup style="display:none"
                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">
                                                            Добавление на платформу различных торговых ботов , что
                                                            представляют собой программное обеспечение для торговли
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                                <div class="col-lg ">-->
                                                <!--                                                    <div class="single-roadmap last-mobile-roadmap-point">-->
                                                <!--                                                        <h6 lng="eng">Token</h6>-->
                                                <!--                                                        <div lng="eng" popup style="display:none"-->
                                                <!--                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">-->
                                                <!--                                                            Creation and release of your own platform token. Promotion-->
                                                <!--                                                            and implementation of a token in order to enter various-->
                                                <!--                                                            cryptocurrency exchanges-->
                                                <!--                                                        </div>-->
                                                <!--                                                        <h6 lng="rus">Токен </h6>-->
                                                <!--                                                        <div lng="rus" popup style="display:none"-->
                                                <!--                                                             class="thk-msg btn btn-sm btn-outline road-map-popup">-->
                                                <!--                                                            Создание и выпуск собственного токена платформы. Продвижение-->
                                                <!--                                                            и реализация токена с целью выхода на различные-->
                                                <!--                                                            криптовалютные биржи-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!---->
                                                <!--                                                    <style>-->
                                                <!--                                                        @media screen and (max-width: 500px) {-->
                                                <!--                                                            .last-mobile-roadmap-point:after {-->
                                                <!--                                                                background-image: none !important;;-->
                                                <!--                                                            }-->
                                                <!---->
                                                <!--                                                            .last-mobile-roadmap-point:before {-->
                                                <!--                                                                background-image: none !important;-->
                                                <!--                                                            }-->
                                                <!--                                                        }-->
                                                <!--                                                    </style>-->
                                                <!--                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">

    </div>
    <section id="team" class="vc_rows wpb_row vc_row-fluid section-pad no-pb section-bg-alt section-fix">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <h2 class="section-title" lng="eng">
                                                    Powered by a Team <span></span></h2>
                                                <h2 class="section-title" lng="rus">
                                                    Команда <span>
                                                        TEAM</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_inner vc_row-fluid" style="margin-top:120px;">
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-6 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/alexandr.tsOO1.jpg"
                                                         style="width: 250px"
                                                         alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Alexandr Mihalkevich</h5>
                                                    <span class="team-title">CEO</span>
                                                    <ul class="team-social">
                                                        <li>
                                                            <a href="https://www.facebook.com/alexandr.mihalkevich.90"><em
                                                                        class="fa fa-facebook"></em></a></li>
                                                        <li>
                                                            <a href="https://www.linkedin.com/in/alexandr-mihalkevich-0a4755157">
                                                                <em class="fa fa-linkedin"></em></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-6 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/vladimir.SoOBk.jpg"
                                                         style="width: 250px"
                                                         alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Vladimir Kountych</h5>
                                                    <span class="team-title">CTO</span>
                                                    <ul class="team-social">
                                                        <li>
                                                            <a href="https://www.facebook.com/profile.php?id=100010984456674"><em
                                                                        class="fa fa-facebook"></em></a>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.linkedin.com/in/vladimir-kuntysh-1662bbb9"><em
                                                                        class="fa fa-linkedin"></em></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/pavel_vitalik_.i6KCW.jpg"
                                                         style="width: 250px"
                                                         alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Vitaliy Kravchenko</h5>
                                                    <span class="team-title">TechOps Engineer</span>
                                                    <ul class="team-social">
                                                        <li><a href="https://www.facebook.com/kravchenko.vitali/"><em
                                                                        class="fa fa-facebook"></em></a></li>
                                                        <li><a href="https://www.linkedin.com/in/vitalikravchenko/"><em
                                                                        class="fa fa-linkedin"></em></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/ivan.6PFtD.jpg"
                                                         style="width: 250px" alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Ivan Shpilevsky</h5>
                                                    <span class="team-title">FullStack Developer</span>
                                                    <ul class="team-social">
                                                        <li>
                                                            <a href="https://www.linkedin.com/in/ivan-shpilevskiy-19877620a/ "><em
                                                                        class="fa fa-linkedin"></em></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/yana.IAors.jpg"
                                                         style="width: 250px" alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Yana Mkrtichyan</h5>
                                                    <span class="team-title">Quality Assurance Tester</span>
                                                    <ul class="team-social">
                                                        <li><a href="#"><em class="fa fa-facebook"></em></a></li>
                                                        <li><a href="#"><em class="fa fa-linkedin"></em></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element  text-center">
                                                <div class="wpb_wrapper">
                                                    <div class="gaps size-2x"></div>
                                                    <h3 class="sub-heading ucap" lng="eng">Support</h3>
                                                    <h3 class="sub-heading ucap" lng="rus">ПОДДЕРЖКА</h3>

                                                    <div class="gaps size-2x"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/kate_litoshka.qRo70.jpg"
                                                         style="width: 250px" alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Kate</h5>
                                                    <span class="team-title">Sales Managger</span>
                                                    <ul class="team-social">
                                                        <li><a href="#"><em class="fa fa-facebook"></em></a></li>
                                                        <li><a href="#"><em class="fa fa-linkedin"></em></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/lera.j4ZSD.jpg"
                                                         style="width: 250px" alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Lera</h5>
                                                    <span class="team-title">Designer</span>
                                                    <ul class="team-social">
                                                        <li><a href="#"><em class="fa fa-facebook"></em></a></li>
                                                        <li><a href="#"><em class="fa fa-linkedin"></em></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="team-circle text-center">
                                                <div class="">
                                                    <img src="img/Team%20Photos/SmallPhotos/kate_barten.9s6uM.jpg"
                                                         style="width: 250px"
                                                         alt="">
                                                </div>
                                                <div class="team-info">
                                                    <h5 class="team-name">Kate</h5>
                                                    <span class="team-title">Support</span>
                                                    <ul class="team-social">
                                                        <li><a href="#"><em class="fa fa-facebook"></em></a></li>
                                                        <li><a href="#"><em class="fa fa-linkedin"></em></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">
    </div>
    <section id="partners_2" class="vc_rows wpb_row vc_row-fluid section-pad section-bg-alt">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div data-animate="fadeInUp" data-delay="0"
                                     class="wpb_column vc_column_container vc_col-sm-12 animated fadeInUp"
                                     style="visibility: visible;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="section-head text-center">
                                                <h2 lng="eng" class="section-title">PARTNERS <span>PARTNERS</span></h2>
                                                <h2 lng="rus" class="section-title">Партнеры</h2>
                                            </div>

                                            <div class="vc_empty_space" style="height: 50px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="vc_empty_space  vc_hidden-sm vc_hidden-xs" style="height: 60px">
                                                <span class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div data-animate="fadeInUp" data-delay="0.1"
                                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.1s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <img class="partner_img" src="img/parnters/CoinPayments.swg">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.2"
                                     class="wpb_column vc_column_container vc_col-sm-4 animat fadeInUp"
                                     style="visibility: visible; animation-delay: 0.2s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <img class="partner_img" src="img/parnters/DigitalOcean.swg">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-animate="fadeInUp" data-delay="0.3"
                                     class="wpb_column vc_column_container vc_col-sm-4 animated fadeInUp"
                                     style="visibility: visible; animation-delay: 0.3s;">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center   single-partner">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <img class="partner_img" src="img/parnters/kucoin.svg"></img>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">
    </div>
    <section id="faqs" class="vc_rows wpb_row vc_row-fluid section-pad no-pb section-bg-alt">
        <div class="container">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0"
                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                     style="visibility: visible;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="section-head text-center">
                                <h2 style="margin-bottom: 45px" class="section-title">
                                    FAQS <span>FAQS</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <section style="padding-bottom: 150px" class="vc_rows wpb_row vc_row-fluid section-bg-alt">
        <div class="container">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0.5"
                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_tta-container" data-vc-action="collapse">
                                <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-grey vc_tta-style-classic vc_tta-shape-rounded vc_tta-spacing-1  ot-tabs vc_tta-tabs-position-top vc_tta-controls-align-left">
                                    <div class="vc_tta-panels-container">
                                        <div class="vc_tta-panels">
                                            <div class="vc_tta-panel vc_active" id="1520927186706-24e6240e-867e"
                                                 data-vc-content=".vc_tta-panel-body">

                                                <div class="vc_tta-panel-body">
                                                    <div class="accordion text-subtitle" id="accordion-864">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="text-subtitle">
                                                                    <a lng="eng" class="" data-toggle="collapse"
                                                                       data-target="#collapse-730"> What is copy
                                                                        trading?<span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span>
                                                                    </a>
                                                                    <a lng="rus" class=" faq-rus"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-730"> Что такое
                                                                        копитрейдинг?<span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse-730" class="collapse show"
                                                                 data-parent="#accordion-864">
                                                                <div class="card-body _text">
                                                                    <p lng="eng" class="_text _gray">Copy trading is a
                                                                        way of investing where professional exchange
                                                                        traders allow novice investors the ability to
                                                                        mirror the trades that a professional trader
                                                                        makes. This is a great opportunity for novice
                                                                        traders to test themselves and get the necessary
                                                                        skills for future "field" conditions.</p>
                                                                    <p lng="rus" class="_text _gray">Копитрейдинг — это
                                                                        способ инвестирования, где профессиональные
                                                                        биржевые трейдеры позволяют начинающим
                                                                        инвесторам, возможность зеркального копирования
                                                                        сделок, которые делает профессиональный трейдер.
                                                                        Для начинающих трейдеров отличная возможность
                                                                        испытать себя и получить необходимые навыки для
                                                                        "полевых" условий в будущем.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <style>
                                                            .accordion a {
                                                                /*border: 2px solid red;*/
                                                                margin-left: -20px;
                                                            }
                                                        </style>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="text-subtitle">
                                                                    <a lng="eng" class="collapsed"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-731"> How is copy trading
                                                                        different from investing with a financial
                                                                        advisor?<span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                    <a lng="rus"
                                                                       class="collapsed  faq-rus"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-731"> Чем копитрейдинг
                                                                        отличается от инвестирования с финансовым
                                                                        консультантом?<span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse-731" class="collapse "
                                                                 data-parent="#accordion-864">
                                                                <div class="card-body _text">
                                                                    <p lng="eng" class="_text _gray">In the case of copy
                                                                        trading, there is no need to transfer your
                                                                        assets to the account of a financial advisor. In
                                                                        the second case, the funds are transferred to
                                                                        the account of the consultant, and he already
                                                                        trades them on the market.</p>
                                                                    <p lng="rus" class="_text _gray">В случае
                                                                        копитрейдинга нет необходимости перевода ваших
                                                                        активов на счет финансового консультанта. Во
                                                                        втором случае, средства переводятся на счет
                                                                        консультанта, и уже тот торгует ими на
                                                                        рынке.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header ">
                                                                <h5 class="text-subtitle">
                                                                    <a lng="eng" class="collapsed"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-732"> How does the
                                                                        principle and mechanics of copy trading
                                                                        work?<span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                    <a lng="rus"
                                                                       class="collapsed  faq-rus"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-732"> Какой принцип работы
                                                                        и механика копитрейдинга?<span
                                                                                class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse-732" class="collapse "
                                                                 data-parent="#accordion-864">
                                                                <div class="card-body _text">
                                                                    <p lng="eng" class="_text _gray">The platform
                                                                        automatically copies the trades of the trader
                                                                        you connected to in your personal account, using
                                                                        the API & Secret key, selecting the trader whose
                                                                        trading strategy you would like to use on your
                                                                        account.</p>
                                                                    <p lng="rus" class="_text _gray">Платформа в
                                                                        автоматическом режиме копирует сделки трейдера к
                                                                        которому вы произвели подключение в личном
                                                                        кабинете , через API & Secret key выбрав
                                                                        трейдера торговую стратегию которого вы хотели
                                                                        бы использовать на своем аккаунте.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="text-subtitle">
                                                                    <a lng="eng" class="collapsed"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-733"> Is it safe to
                                                                        connect your exchange account?<span
                                                                                class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                    <a lng="rus"
                                                                       class="collapsed  faq-rus"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-733"> Безопасно ли
                                                                        подключать свой биржевой аккаунт ?<span
                                                                                class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse-733" class="collapse "
                                                                 data-parent="#accordion-864">
                                                                <div class="card-body _text">
                                                                    <p lng="eng" class="_text _gray">To connect, you use
                                                                        the restrictions of the API key "Allow reading"
                                                                        and "Enable Spot & Margin Trading". Access is
                                                                        required exclusively for copying trading
                                                                        operations. The inactive option "Enable
                                                                        withdrawal of funds" is a guarantee that the
                                                                        exchange balance is only under your control.
                                                                        Your personal account is always protected by
                                                                        two-factor authentication</p>
                                                                    <p lng="rus" class="_text _gray">Для подключения вы
                                                                        используете ограничения API-ключа “Разрешить
                                                                        чтение” и “Enable Spot & Margin Trading”. Доступ
                                                                        необходим исключительно для копирования торговых
                                                                        операций. Гарантией того, что биржевой баланс
                                                                        находится только под вашим контролем, является
                                                                        неактивная опция «Включить возможность вывода
                                                                        средств». Ваш персональный аккаунт всегда
                                                                        защищен двухфакторной аутентификацией</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <style>
                                                        ._gray {
                                                            color: #a2b4d2;
                                                            font-size: 1.0em;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <section id="gitlab_href" class="vc_rows wpb_row vc_row-fluid section-pad no-pb section-bg-alt"
             style="margin-top: 102px">
        <div class="container">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0"
                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                     style="visibility: visible;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="section-head text-center">
                                <li lng="eng" class="menu-item menu-item-object-custom ">
                                    <h4><a href="https://dev.cunion.info/" target="_blank"> Dive deeper into the world
                                            of copy
                                            trading by clicking on the link</a></h4>
                                </li>

                                <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin"
                                    style="display: none;">
                                    <h4><a href="https://dev.cunion.info/" target="_blank"> Погрузитесь глубже в мир
                                            копитрейдинга перейдя по ссылке</a></h4>
                                </li>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <?php include_once("landing_parts/news/section_news.php") ?>

    <section id="community" class="vc_rows wpb_row vc_row-fluid section-pad no-pb section-bg-alt">
        <div class="container">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0"
                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                     style="visibility: visible;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="section-head text-center">
                                <h2 style="margin-bottom: 45px" class="section-title" lng="eng">
                                    Community
                                </h2>
                                <h2 style="margin-bottom: 45px" class="section-title" lng="rus">
                                    СООБЩЕСТВА
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

    <section id="icon_community" class="vc_rows wpb_row vc_row-fluid section-pad no-pb section-bg-alt">
        <div class="container">
            <div class="row">
                <div data-animate="fadeInUp" data-delay="0"
                     class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                     style="visibility: visible;">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="section-head text-center">
                                <div class="team-circle text-center" style="display: inline-block;margin: 10px">
                                    <div class="team-info">
                                        <ul class="team-social">
                                            <li><a href="https://twitter.com/CunionOfficial"><em icon_community
                                                                                                 class="fa fa-twitter icons_size"
                                                                                                 style=""></em></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-circle text-center" style="display: inline-block;margin: 10px">
                                    <div class="team-info">
                                        <ul class="team-social">
                                            <li><a href="https://t.me/cunion"><em icon_community
                                                                                  class="fa fa-telegram icons_size"
                                                                                  style=""></em></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-circle text-center" style="display: inline-block;margin: 10px">
                                    <div class="team-info">
                                        <ul class="team-social">
                                            <li><a href="https://www.linkedin.com/company/80727882"><em icon_community
                                                                                                        class="fa fa-linkedin icons_size"
                                                                                                        style=""></em></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

    <style>
        .fa-linkedin[icon_community]:before {
            display: block;
        }

        .icons_size {
            display: inline !important;
            font-size: 50px !important;
        }


    </style>


    <footer class="section footer-section section-pad-sm section-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <ul class="social">
                        <!--                        <li><a href="#"><em class="fa fa-facebook"></em></a></li>-->
                    </ul>
                    <span class="copyright-text">
                           (c) CopyTrading Unification 2021
                    </span>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <ul id="menu-onepage-menu" class="navbar-nav" style="font-size: 11px;">
                        <li lng="eng" class="menu-item menu-item-object-custom ">
                            <a style="scroll-behavior: smooth" link-to="for_investors" href="#for_investors">For
                                Investors</a>
                        </li>
                        <li lng="eng" class="menu-item menu-item-object-custom ">
                            <a link-to="for_traders" href="#for_traders">For Traders</a>
                        </li>
                        <li lng="eng" class="menu-item menu-item-object-custom ">
                            <a link-to="for_traders" href="#roadmap">Roadmap</a>
                        </li>
                        <li lng="eng" class="menu-item menu-item-object-custom ">
                            <a href="https://t.me/cunion" target="_blank">Support</a></li>

                        <li lng="eng">
                            <a href="https://docs.google.com/document/d/1tELiyPS4aKfAmhr-nM9Y5vC90KVpArkISk5Mckc6Zsc/edit?usp=sharing">Privacy
                                Policy</a>
                        </li>
                        <!--                        <li lng="eng" class="menu-item menu-item-object-custom ">-->
                        <!--                            <a href="https://twitter.com/CunionOfficial" target="_blank">Twitter</a></li>-->
                        <!---->
                        <!--                        <li lng="eng" class="menu-item menu-item-object-custom ">-->
                        <!--                            <a href="https://www.linkedin.com/company/80727882" target="_blank">LinkedIn-->
                        <!--                            </a></li>-->


                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">
                            <a style="scroll-behavior: smooth" link-to="for_investors"
                               href="#for_investors">Инвестор</a>
                        </li>
                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">
                            <a link-to="for_traders" href="#for_traders">Трейдер</a></li>
                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">
                            <a link-to="for_traders" href="#roadmap">Роадмап</a>
                        </li>
                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">
                            <a href="https://t.me/cunion" target="_blank">Поддержка</a></li>

                        <li lng="rus" style="display: none;">
                            <a href="https://docs.google.com/document/d/1tELiyPS4aKfAmhr-nM9Y5vC90KVpArkISk5Mckc6Zsc/edit?usp=sharing">Политика
                                конфиденциальности</a></li>

                        <!--                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">-->
                        <!--                            <a href="https://twitter.com/CunionOfficial" target="_blank">Твиттер</a></li>-->
                        <!--                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">-->
                        <!--                            <a href="https://www.linkedin.com/company/80727882" target="_blank">Линкедин</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- <a href="#" id="back-to-top"></a> -->
    <!-- Preloader !remove please if you do not want -->
    <div id="preloader" style="display: none;">
        <div id="loader" style="display: none;"></div>
        <div class="loader-section loader-top"></div>
        <div class="loader-section loader-bottom"></div>
    </div>
    <!-- Preloader End -->
</div>
<div class="space-medium" id="icos-demo">
    <a class="demo-close" href="javascript:void(0)">×</a>
</div>
<script>(function () {
        function maybePrefixUrlField() {
            if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                this.value = "http://" + this.value;
            }
        }

        var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
        if (urlFields) {
            for (var j = 0; j < urlFields.length; j++) {
                urlFields[j].addEventListener('blur', maybePrefixUrlField);
            }
        }
    })();</script>
<script type="text/html" id="wpb-modifications"></script>
<script type="text/javascript" id="wp-polyfill-js-after">
    ('fetch' in window) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-fetch.min.js?ver=3.0.0"></scr' + 'ipt>');
    (document.contains) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min.js?ver=3.42.0"></scr' + 'ipt>');
    (window.DOMRect) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min.js?ver=3.42.0"></scr' + 'ipt>');
    (window.URL && window.URL.prototype && window.URLSearchParams) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-url.min.js?ver=3.6.4"></scr' + 'ipt>');
    (window.FormData && window.FormData.prototype.keys) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-formdata.min.js?ver=3.0.12"></scr' + 'ipt>');
    (Element.prototype.matches && Element.prototype.closest) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min.js?ver=2.0.2"></scr' + 'ipt>');
    ('objectFit' in document.documentElement.style) || document.write('<script src="http://wpdemo.oceanthemes.net/icos/wp-includes/js/dist/vendor/wp-polyfill-object-fit.min.js?ver=2.3.4"></scr' + 'ipt>');
</script>
<script type="text/javascript" id="contact-form-7-js-extra">
    /* <![CDATA[ */
    var wpcf7 = {
        "api": {
            "root": "http:\/\/wpdemo.oceanthemes.net\/icos\/wp-json\/",
            "namespace": "contact-form-7\/v1"
        }
    };
    /* ]]> */
</script>
<!--<script defer="" src="http://wpdemo.oceanthemes.net/icos/wp-content/cache/autoptimize/14/js/autoptimize_a3a0c341012a8f498646b80b85fed2f9.js"></script>-->
<script defer="" src="front_js/front_js_2.js"></script>
<script defer="" src="front_js/fron_js.js"></script>
<script defer="" src="front_js/forms_submissions.js"></script>
</body>
</html><!---->
<style>
    body {
        font-family: 'Xyeta', Arial, sans-serif;
    }

    html {
        scroll-behavior: smooth; /* свойство scroll-behavior не наследуется, применяется к прокручиваемым блокам */
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll("a[button-link-to]").forEach((link) => {
            console.log(link)
            let navElementId = link.getAttribute("button-link-to")
            console.log(navElementId)
            let navElement = document.querySelector("#" + navElementId)
            console.log(navElement)
            link.addEventListener('click', function () {
                console.log("nav to:", navElement)
                navElement.scrollIntoView({block: "center", behavior: "smooth"});
            }, false)
        })
    })
</script>

<!--intecom start-->
<script>
    //    window.intercomSettings = {
    //        api_base: "https://api-iam.intercom.io",
    //        app_id: "ngububcu"
    //    };
    //</script>

<script>
    //    // We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/ozw2q0ue'
    //    (function () {
    //        var w = window;
    //        var ic = w.Intercom;
    //        if (typeof ic === "function") {
    //            ic('reattach_activator');
    //            ic('update', w.intercomSettings);
    //        } else {
    //            var d = document;
    //            var i = function () {
    //                i.c(arguments);
    //            };
    //            i.q = [];
    //            i.c = function (args) {
    //                i.q.push(args);
    //            };
    //            w.Intercom = i;
    //            var l = function () {
    //                var s = d.createElement('script');
    //                s.type = 'text/javascript';
    //                s.async = true;
    //                s.src = 'https://widget.intercom.io/widget/ozw2q0ue';
    //                var x = d.getElementsByTagName('script')[0];
    //                x.parentNode.insertBefore(s, x);
    //            };
    //            if (document.readyState === 'complete') {
    //                l();
    //            } else if (w.attachEvent) {
    //                w.attachEvent('onload', l);
    //            } else {
    //                w.addEventListener('load', l, false);
    //            }
    //        }
    //    })();
    //</script>

<style>
</style>
<!--intecom end-->


<!--Media styles (mobile)-->
<style>
    .thk-msg {
        margin-top: 150px;
        opacity: 0;
        transition: opacity 1s;
        white-space: pre-line;
        font-size: 12px;
        line-height: 25px !important;
    }

    .logo-mobile {
        display: none !important;
    }

    .thk-msg.btn.btn-outline:hover:after {
        opacity: 1 !important;
    }


    .road-map-popup {
        font-size: 12px;
        font-family: 'Poppins', Arial, sans-serif;
        line-height: 15px !important;
        width: 300px !important;
        position: fixed;
        width: 235px;
        padding: 16px !important;
        top: 0;
        margin: 0;
    }


    div.single-roadmap.roadmap-lg > [popup] {
        /*border: 2px solid red;*/
    }

    div.single-roadmap > [popup] {
        /*border: 2px solid blue;*/
        position: absolute;
        top: -85px;
        left: 90px;
    }


    div.single-roadmap.roadmap-sm > [popup] {
        /*border: 2px solid blue;*/
        position: absolute;
        top: -85px;
        left: 90px;
    }

    div.single-roadmap.roadmap-sm.roadmap-down > [popup] {
        /*border: 2px solid #0fc81c;*/
        top: 67px;
        position: absolute;
        left: 100px;
    }
    @media only screen and (max-width: 991px) {
        div.single-roadmap.roadmap-sm.roadmap-down > [popup] {
            /*border: 2px solid #0fc81c;*/
            top: -59px !important;
            position: absolute;
        }

    }

        div[lng=rus].road-map-popup {
        font-family: 'Rubix' !important;
    }


    @media screen and (min-width: 1300px) {

        .single-roadmap > h6 {
            position: relative;
            top: -20px;
            transform: translate(0, -100%);
            left: -90px;
            width: 140px;
            text-align: center;
        }

        .single-roadmap.roadmap-down > h6 {
            position: relative;
            top: 30px;
            transform: translate(0px, 0%);
        }
    }
    @media screen and (max-width: 1286px) {
        img.logo {
            height: 70px !important;
            left: 0px !important;
        }
    }

        @media screen and (max-width: 990px) {
        h1.navbar-brand {
            position: relative;
            top: -42px !important;
            left: -23px;
        }

        img.logo {
            height: 40px !important;
        }

        div[alpha-badge] {
            position: relative !important;
            top: 25px !important;
            font-size: 10px !important;
            left: 122px !important;
            width: 53px !important;
        }

        .navbar-toggler-mobile {
            position: relative;
            top: -20px;
        }

        .navbar-mobile {
            position: relative;
            top: 4px;
        }

        .main-banner-font {
            font-size: 21px;
        }

        .navbar-expand-lg {
            height: 87px !important;
        }

        div.banner-content {
            margin-top: 35px;
        }

        .mobile-content-text {
            font-size: 15px !important;
        }

        .heading-animation {
            left: 150px !important;
        }

        .page-mini-baner {
            left: -20px !important;
        }

        .input-title {
            font-size: 9px;
        }

        .input-field {
            font-size: 7px !important;
        }

        .big-label-text {
            margin-top: -10px;
        }

        textarea.input-line {
            height: 76px !important;
        }

        .mobile-instruction {
            font-size: 15px;
        }

        .token-status-bar {
            margin-left: 20px;
            margin-right: 20px;
        }

        .logo-mobile {
            display: block !important;

            width: 120px !important;
            margin-top: 25px;
            top: -10px !important;
        }

        .logo {
            display: none !important;
        }

        .thk-msg {
            font-size: 9px !important;
            line-height: 2.5 !important;
        }

        .btn.btn-sm {
            font-size: 13px;
            line-height: 23px;
        }

    }


    @media screen and (min-width: 650px) and  (max-width: 990px) {
        .logo-mobile {
            margin-top: 45px !important;
            /*height: 60px !important;*/
            width: 150px !important;
            margin-left: 25px !important;
        }
    }

    .mfp-wrap {
        height: 960px !important;
    }


    [lng=rus] {
        font-family: 'Cth', Arial, sans-serif;;
        font-weight: 500;
    }


    .faq-rus {
        font-size: 21px !important;
        font-family: 'Rubix';
    }


    .trade-type-select {

    }

    .trade-type-option {

    }

    .comment-form .input-field.input-focused .input-title {
        top: -23px;
    }

    @media screen and (max-width: 600px) {
        . trade-type-select {
            font-size: 15px;
        }

        .trade-type-option {
            font-size: 9px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 1.2em;
        }

        li.select2-results__option {
            font-size: 10px;
        }

        .comment-form .input-field.input-focused .input-title {
            top: -7px;
        }
    }


    .comment-form .input-field .input-line {
        font-weight: 300;
    }
</style>

<script>
    //----------Lang lng ----------------
    var lng = "rus";
    document.querySelectorAll("[lng=rus]").forEach((elem) => {
        elem.style.display = "none";
    });
    SetLang = (lang) => {
        lng = lang;
        if (lang === "eng") {
            document.querySelectorAll("[lng=rus]").forEach((elem) => {
                elem.style.display = "none";
            })
            document.querySelectorAll("[lng=eng]").forEach((elem) => {
                elem.style.display = "block";
            })
            // document.querySelector("#hat_buttons").style.display = 'contents';
            // document.querySelector("#hat_buttons").style.width = ""
            // document.querySelector("#hat_buttons").style.marginTop = ""
            // document.querySelector("#hat_buttons").style.marginLeft = ""
            // document.querySelector("#hat_ul_Sing").style.marginLeft = "6px";
            // document.querySelector("#hat_ul_Sing").style.marginTop = "";
        }
        if (lang === "rus") {
            document.querySelectorAll("[lng=eng]").forEach((elem) => {
                elem.style.display = "none";
            })

            document.querySelectorAll("[lng=rus]").forEach((elem) => {
                elem.style.display = "block";
            })
        }

        document.querySelectorAll("[popup]").forEach((elem) => {
            elem.style.display = "none";
        })
        document.querySelectorAll("[thank-msg-investor]").forEach((elem) => {
            elem.style.display = "none";
        })
        document.querySelectorAll("[thank-msg-trader]").forEach((elem) => {
            elem.style.display = "none";
        })
    }

    SetLang('rus');

    change_buttons_display = (x) => {
    }


    var x = window.matchMedia("(max-width: 997px)")
    change_buttons_display(x)
    x.addListener(change_buttons_display)
    let allPoints = document.querySelectorAll(".single-roadmap");
    allPoints.forEach((point) => {
        point.addEventListener("mouseover", () => {
            console.log("Hover on point:", point);
            let popUp = point.querySelector("[popup][lng=" + lng + "]");
            popUp.style.display = "block";
            setTimeout(() => {
                popUp.style.opacity = '1';
            }, 50)
        });
    })
    allPoints.forEach((point) => {
        point.addEventListener("mouseleave", () => {
            console.log("Mouseleave from point:", point);
            let popUp = point.querySelector("[popup][lng=" + lng + "]");
            popUp.style.display = "none";
            popUp.style.opacity = "0";
        });
    })


    //-------------- Gradient -----------------
    var timer;
    document.addEventListener("DOMContentLoaded", function () {
        let d1 = 0;
        let d2 = 0;
        let d3 = 0;
        let d4 = 0;

        function InitD() {
            d1 = 100;
            d2 = 200;
            d3 = 250;
            d4 = 700;
        }

        let back = document.querySelector(".particles-js-canvas-el");
        let navBar = document.querySelector("#mainnav");

        InitD();
        let deltaSpeed = 1;
        // timer = setInterval(() => {
        //     d1 -= deltaSpeed;
        //     d2 -= deltaSpeed;
        //     d3 -= deltaSpeed;
        //     d4 -= deltaSpeed;
        //     // console.log("d1:" + d1 +" d2:" + d2 + " d3:" + d3 + " d4:" + d4);
        //     if (d4 < -500) {
        //         console.log("d4<500");
        //         InitD()
        //     }
        //     let backgroundStyle = "linear-gradient(to left, #0b0c22 " + d1 + "%, rgba(129, 84, 252, 0.17) " + d2 + "%, rgba(129, 84, 252, 0.17) " + d3 + "%, #0b0c22 " + d4 + "%)"
        //     // back.style.background = backgroundStyle;
        //     navBar.style.background = backgroundStyle;
        //
        //     delete timer;
        // }, 1);


        //-------- Bugg error Glich Effect ----------

        let correctImg = document.querySelector("[correct-img]")
        let bugImg = document.querySelector("[bug-img]")

        function Bug() {
            correctImg.style.visibility = "hidden";
            bugImg.style.visibility = "visible";
        }

        function Correct() {
            correctImg.style.visibility = "visible";
            bugImg.style.visibility = "hidden";
        }

        setTimeout(function BugError() {
            if (lng == 'rus') {
                console.log("Glich");
                Bug()
                let bug_1_time = 30 + Math.random() + 80;
                let bug_2_time = bug_1_time + Math.random() + 40;
                let bug_3_time = bug_2_time + Math.random() + 70;
                setTimeout(() => {
                    Correct();
                }, bug_1_time)
                setTimeout(() => {
                    Bug();
                }, bug_2_time)
                setTimeout(() => {
                    Correct();
                }, bug_3_time)
            }
            setTimeout(BugError, 2000 + Math.random() * 5000)

        }, 3000);
    })


</script>

<!-- Yandex.Metrika counter Alexander -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(87462220, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/87462220" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->


<style>
    [cabinet_images] {
        display: block;
        /* position: absolute; */
        width: 500px;
        height: 422px;
        margin: auto;
        border-radius: 10px;
        /* border: 1px solid #650ff1; */
        position: relative;
        /*left: 244px;*/
        /*top: -200px;*/

    }

    .active-image:hover {

        transform: scale(1.47) !important;
        transition: transform 0.5s !important;
        z-index: 1000;
        border: 3px solid #650ff1;
    }


    .active-image {
        width: 220px;
        position: absolute;
        display: block;
        transition: transform 2s, left 1s, top 1s;
        border-radius: 10px;
        border: 2px solid #650ff1;
        z-index: 200;

    }

    .active-big {
        width: 330px;
    }


    @media screen and (max-width: 1200px) {
        [cabinet_images] {
            left: -100px !important;
        }
    }

    @media screen and (max-width: 500px) {
        [cabinet_images] {
            left: -160px !important;
            top: -60px;
            transform: scale(0.7);
        }

        .mobile-section-image {
            margin-left: -80px !important;
            margin-top: 30px !important;
        }

    }
</style>

<style>
    .cn_button_primary {

    }

    @media screen and (min-width: 900px) {
        .left-block {
            padding-right: 20px;
        }

        .right-block {
            padding-left: 40px;
        }
    }


    .text-subtitle {
        font-family: 'Rubix';
        font-size: 21px;
    }


    @media screen and (max-width: 1300px) {
        section[id=roadmap] .vc_row {
            margin-bottom: 0px !important;
        }
    }

    section {
        padding-bottom: 0px !important;
        padding-top: 0px !important;
    }


    @media screen and (min-width: 1000px) {
        .menu-item-object-left {
            margin-left: 40px;
        }
    }

    .airdrop_link {
        color: #d9534f !important;
        background-color: rgba(217, 83, 79, .175) !important;
        line-height: 20px !important;
        max-width: 110px;
        min-width: 120px;
        text-align: center;
        border-radius: 130px;
        margin-top: 10px !important;
    }

    .airdrop_link {
        animation-duration: 2s;
        animation-name: highlight-airdrop-icon;
        animation-iteration-count: infinite;
    }

    @keyframes highlight-airdrop-icon {
        0% {
            transform: scale(0.95);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(0.95);
        }
    }

    .airdrop_link:hover {
        background-color: rgba(217, 83, 79, 0.35) !important;
    }


</style>


<style>

    .centered-subtitle {
        margin-top: 45px !important;
        margin-bottom: 50px !important;
    }

    @media screen and (min-width: 500px) {
        [hline] {
            width: 1080px !important;
            margin-bottom: 68px !important;
            margin-top: 150px !important;
        }
    }

    @media screen and (max-width: 500px) {
        [hline] {
            width: 320px !important;
            margin-bottom: 100px !important;
            margin-top: 100px !important;
        }

        ._animation-center {
            position: absolute !important;
            display: block;
            margin: auto;
        }
    }

    .partner_img {
        height: 103px;
    }

    @media screen and (max-width: 768px) {
        .air_drop_mobile_margin_top {
            margin-top: 0px !important;
        }
        ._exchange_point{
            max-width: 40% !important;
        }

        .partner_img {
            margin: auto;
            display: block;
            width: 240px;
            height: auto;
        }
    }


</style>

<script src="front_js/trd_timer.js"></script>
<script src="panel/cabinet/js/trd_metrika.js?"<?= filemtime('panel/cabinet/js/trd_metrika.js') ?>></script>


<script>
    trd_metrika.Init(87462220);
</script>
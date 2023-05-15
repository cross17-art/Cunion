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
           
                                <div class="wpb_wrapper">
                                        <h1 style="margin-bottom: 40px;">404</h1>
                                        <h1 lng="eng" class="main-banner-font" style="margin-bottom: 30px;">Page not found(</h1>
                                        
                                        <h1 lng="rus" class="main-banner-font" style="margin-bottom: 30px;">Страница не найдена(</h1>
                                        

                                        <div id="registration_button" style="/* width: 400px; */display: block;">
                                            <a lng="rus" href="https://cunion.io"
                                               class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary rus-thin-cyber-text"
                                             
                                               style="display: block;">На главную</a>
                                            <a lng="eng" href="https://cunion.io"
                                               class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
                                            
                                               style="display: block;">Home page</a>
                                        </div> <br>
                                            
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
                                                    margin: center;
                                                }

                                                .registratoin-button[lng=eng] {
                                                    width: 322px !important;
                                                    margin: center;

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
        <div class="clearfix"></div>
        
    </section>
  
    <div hline=""
         style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; border-radius: 50%;">

    </div>

    <?php if (($_SESSION['logged'] == true && $_SESSION['user_email'] == 'Wyde90@gmail.com')) {  ?>

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
    top: 50px;
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
            font-size: 20px;
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
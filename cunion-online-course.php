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
    <link rel="stylesheet" href="tilda-css/tilda-blocks-2.14.css" type="text/css" media="all">
    <meta charset="UTF-8">
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ST4GCGF91G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-ST4GCGF91G');
    </script>
    <!-- End Global - Google Analytics -->
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
</head>
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
                            <img class="logo-2" style="height: 120px; position: relative;top: 30px;left: -25px;" src="img/CunionLogo.png" alt="Cunion">
                            <img class="logo-mobile" src="img/CunionLogo.png" alt="Cunion"> </a>
                    </a>
                </h1>
                <button class="navbar-toggler navbar-toggler-mobile" type="button">
                        <span class="navbar-toggler-icon">
                            <span class="ti ti-align-justify"></span>
                        </span>
                </button>
                <div class="navbar-collapse justify-content-end navbar-mobile" style="padding-bottom: 25px; position: sticky; z-index:100">
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
                        <li lng=rus class="menu-item menu-item-object-custom cyber-rus-thin">
                            <a href="https://t.me/cunion" target="_blank">Поддержка</a></li>

                        <li lng=rus class="menu-item menu-item-object-custom cyber-rus-thin menu-item-object-left">
                            <a link-to="for_traders" class="airdrop_link" href="#airdrop">Airdrop</a>
                        </li>
                    </ul>

<!--                    width: 29%;-->
                    <div id="hat_buttons" style="width: 29%; margin-left: 48px;">

                        <ul id="hat_ul_Sing" class="navbar-nav navbar-btns" style=" margin-top: 2%;">

                            <?php
                            if (isset($_SESSION['logged'])) {
//                                $user = new User($_SESSION['user_email']);

                                $log;
                                if ($user->nickname == null) {


                                    $split = explode("@", $user->user_email);
                                    $split2 = explode(".", $split[1]);

//
//
//                                    $split[0][2] = "*";
//                                    $split[0][3] = "*";
                                    $log = $split[0][0] . $split[0][1] . "**@" . $split2[0];
//                                    var_dump($log);

                                } else {
                                    $log = $user->nickname;
                                }


//                                $count = (int)(strlen($split[0]) / 3);
//                                $count2 = $count + $count;
//                                for ($i = 0; $i < (int)(strlen($split[0])); $i++) {
//                                    if ($count <= $i && $count2 >= $i) {
//                                        $split[0][$i] = "*";
//                                    }
//                                }
                                ?>
                                <div class="nav-item hat-registration-button" style="width:200px !important">
                                    <!--margin-bottom: 10px; padding-left: 0px;width: 60%;-->
                                    <a href="https://cunion.io/panel/cabinet/cabinet.php"
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
                                       href="https://cunion.io/panel/cabinet/registration_form.php"
                                       style="">Registration</a>
                                </li>
                                <li id="reg_hat" lng="rus" class="nav-item hat-registration-button"
                                    style="display: none; font-family: Cyber-russia-light !important">
                                    <a class="nav-link btn btn-sm btn-outline menu-link cn_button_primary"
                                       href="https://cunion.io/panel/cabinet/registration_form.php">Регистрация</a>
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
                                           href="https://cunion.io/panel/cabinet/<?= $_SESSION['logged'] == true ? "cabinet.php" : "sign_in_form.php" ?>">LOG
                                            IN</a>
                                    </li>
                                    <li lng="rus" class="nav-item hat-login-button" style="display: none;width: 100% ">
                                        <a class="nav-link btn btn-sm btn-outline menu-link"
                                           href="https://cunion.io/panel/cabinet/<?= $_SESSION['logged'] == true ? "cabinet.php" : "sign_in_form.php" ?>"
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
                                        <h1 lng="eng" class="main-banner-font" style="margin-bottom: 40px;">ONLINE COURSE</h1>
                                        <p lng="eng" class="lead color-secondary mobile-content-text secondary-title"
                                           style="margin-bottom: 30px">"Basics of copytrading. How to make money 24/7"</p>
                                        <h1 lng="rus" class="main-banner-font" style="margin-bottom: 40px;">ОНЛАЙН КУРС</h1>
                                        <p lng="rus" class="lead color-secondary mobile-content-text secondary-title"
                                           style="margin-bottom: 30px; font-family: Cyber-russia-light !important;">
                                            "Основы копитрейдинга. Как зарабатывать 24/7"</p>
                                        <style>

                                        </style>


                                        <ul class="btns">
                                        
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
                                            <a lng="rus" href="https://cunion.io/panel/cabinet/registration_form.php"
                                               class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary rus-thin-cyber-text"
                                               style="display: block;">Зарегистрироваться</a>
                                            <a lng="eng" href="https://cunion.io/panel/cabinet/registration_form.php"
                                               class="nav-link btn btn-sm btn-outline menu-link bold-font banner-button registratoin-button cn_button_primary"
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
                                                    margin-left: 50px !important;
                                                    margin-top: 0px !important;
                                                    width: 36% !important; ;
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
                                                    margin-left: 50px !important;
                                                    margin-top: 0px !important;
                                                    width: 29%;
                                                }

                                                #hat_lang {
                                                    margin-left: 0px;
                                                }

                                            }

                                            @media screen and (max-width: 602px) {
                                                #hat_buttons {
                                                    margin-left: 50px !important;
                                                    margin-top: 0px !important;
                                                    width: 47% !important;
                                                }
                                            }

                                            @media screen and (max-width: 440px) {
                                                #hat_buttons {
                                                    margin-left: 50px !important;
                                                    margin-top: 0px !important;
                                                    width: 65% !important;
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
                                        <p><img src="img/chart.png" alt="header"><br>
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
                                                <h2 lng="rus" class="section-title" style="display: none;">Программа курса <span>STEPS</span>
                                                </h2>
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
                                                    <strong>2.</strong> Determine the Right Risk Trading Strategy for
                                                    You</h2>
                                                <h2 lng="eng" class="lead mobile-instruction">
                                                    <strong>3.</strong> The trading process and balance changes at any
                                                    convenient time</h2>
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>1.</strong> Что такое криптовалюта?</h2>
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>2.</strong> Что такое блокчейн?</h2>
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>3.</strong> Что такое биржа и как завести аккаунт?</h2>

                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>4.</strong> Как вводить и выводить деньги?</h2>
                                                
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>5.</strong> Кто такие трейдеры?</h2>     
                                                    
                                                <h2 lng="rus" class="lead mobile-instruction cyber-rus-thin"
                                                    style="font-family: 'Rubix' !important; font-size:21px">
                                                    <strong>6.</strong> Что такое копитрейдинг и как на нем зарабатывать?</h2>
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
                                                <h2 lng="eng" class="section-title">OUR PARTNERS <span>OUR PARTNERS</span></h2>
                                                <h2 lng="rus" class="section-title">Наши Партнеры</h2>
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
                </div>
            </div>

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
                            <a href="https://docs.google.com/document/d/1tELiyPS4aKfAmhr-nM9Y5vC90KVpArkISk5Mckc6Zsc/edit?usp=sharing">Privacy Policy</a>
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
                            <a href="https://docs.google.com/document/d/1tELiyPS4aKfAmhr-nM9Y5vC90KVpArkISk5Mckc6Zsc/edit?usp=sharing">Политика конфиденциальности</a></li>

                        <!--                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">-->
                        <!--                            <a href="https://twitter.com/CunionOfficial" target="_blank">Твиттер</a></li>-->
                        <!--                        <li lng="rus" class="menu-item menu-item-object-custom cyber-rus-thin" style="display: none;">-->
                        <!--                            <a href="https://www.linkedin.com/company/80727882" target="_blank">Линкедин</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>            

        </div>
        <div class="clearfix"></div>


    </section>
    
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
            height: 60px !important;
            width: 180px !important;
        }
    }

    .mfp-wrap {
        height: 960px !important;
    }


    [lng=rus] {
        font-family: 'Cth', Arial, sans-serif;;
        font-weight: 500;
    }

    .cyber-rus-thin {
        font-family: Cyber-russia-light;
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
<style>
    [lng=eng] {
        display: none;
    }

    [lng=rus] {
        display: block;
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

    SetLang('eng');

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


</script><!-- Yandex.Metrika counter Wyde90 -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(85936571, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        ecommerce: "dataLayer"
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/85936571" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript><!-- /Yandex.Metrika counter -->


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

    .partner_img{
        height: 103px;
    }

    @media screen and (max-width: 768px) {
        .air_drop_mobile_margin_top {
            margin-top: 0px !important;
        }

        .partner_img{
            margin: auto;
            display: block;
            width: 240px;
            height: auto;
        }
    }


</style>

<script src="front_js/trd_timer.js"></script>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>Sign In | Cunion.io</title>

    <link rel="canonical" href="https://appstack.bootlab.io/pages-sign-in.html">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="css/dark.css" rel="stylesheet">
</head>


<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="main d-flex justify-content-center w-100" page="sign_in_form">
    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <p class="lead">
                                <a href="https://cunion.io">
                                    <iframe class="logo-mobile" src="/../img/new_logo/index.html" align="left"
                                            style="  height: 120px;  position: relative;  top: 30px; margin: auto;  margin-left: auto;width: 100%;margin-left: 30%;margin-bottom: 10%"
                                            frameborder="0" scrolling="no"> Ваш браузер не поддерживает плавающие
                                        фреймы!
                                    </iframe>
<!--                                    <img class="logo" style="height: 160px;position: relative;/* left: -25px; */"-->
<!--                                         src="https://cunion.io/img/logo_main.png" alt="Cunion">-->
                                </a>
                            </p>
                        </div>
                        <div class="text-center mt-4">
                            <p class="lead">
                                Sign up to our service
                            </p>
                        </div>
                        <div id="registration_block" class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <?php
                                            include ("cabinet_registration_form_parts/ref_hint.php");
                                        ?>
                                    </div>
                                    <form>
                                        <div class="">
                                            <label class="form-label">Email</label>
                                            <input id="Email" class="form-control form-control-lg" type="email" name="email"
                                                   placeholder="Enter your email">
                                            <br>

                                            <label class="form-label">Password</label>
                                            <input id="Password" class="form-control form-control-lg" type="password" name="password"
                                                   placeholder="Enter your password">
                                            <br>

                                            <label class="form-label" style="display: none">Telegram</label>
                                            <input id="Telegram" style="display: none" class="form-control form-control-lg" type="text" name="telegram"
                                                   placeholder="Enter your telegram">
                                        </div>
                                        <small>
                                            <a href="https://cunion.io/panel/cabinet/sign_in_form">Log in</a>
                                        </small>
                                        <div class="mb-3">
                                            <div style="display: none" class="spinner-border text-success me-2"
                                                 role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                            <div style="display: none" class="alert alert-success alert-dismissible"
                                                 role="alert">
                                                <div class="alert-message">
                                                    <strong>Hello there!</strong> A simple success alert—check it out!
                                                </div>
                                            </div>

                                            <div style="display: none" class="alert alert-danger alert-dismissible"
                                                 role="alert">
                                                <div class="alert-message">
                                                    <strong>Hello there!</strong> A simple danger alert—check it out!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <div onclick="RegisterTester()" class="btn btn-lg btn-primary">Register
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="welcome_block" class="card" style="display: none">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <p>We have sent the invite mail to your email:<span id="user_email"></span>. <br>Please check your inbox.<p>
                                        <div class="text-center mt-3">
                                            <button type="submit" onclick="RedirectToCabinet()" class="btn btn-lg btn-primary">Go to Panel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<style>
    @media screen and (max-width: 440px) {
        .logo-mobile{
            margin-left: 20% !important;
        }
    }
</style>
<script src="js/register_user.js?<?=filemtime("js/register_user.js")?>"></script>
<script src="../../front_js/cookie_handler.js"></script>
<script src="../../front_js/ref_handler.js"></script>
<script src="js/app.js"></script>
<script src="https://vk.com/js/api/openapi.js?162"></script>

<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(87462220, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>

</body>
</html>
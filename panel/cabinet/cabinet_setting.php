<?php
session_start();

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}


include("classes/user.php");

$user = new User($_SESSION['user_email']);
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
?>

<script src="../cabinet/js/login.js?"<?= filemtime('../cabinet/js/login.js') ?>></script>
<script src="js/verification_script.js?"<?= filemtime('js/verification_script.js') ?>></script>

<html lang="en">
<?php include("header.php") ?>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="cabinet_setting">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">

                <!--                16:39 28.09.2021 change nickname-->
                <?php if ($user->nickname == null || $user->user_email === "h77ps@protonmail.com") { ?>
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Set Nickname <?= ToolTip::DrawToolTip('Имя пользователя доступно для установки один раз. Могут быть использованы следующие символы : Aa-Zz, - _ 1-9') ?></h5>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code align-middle me-2"><polyline
                                                points="16 18 22 12 16 6"></polyline><polyline
                                                points="8 6 2 12 8 18"></polyline></svg>
                                </span>

                                    <input type="text" class="form-control" name="new_nickname"
                                           placeholder="Your nickname">
                                </div>

                                <div>
                                    <button class="btn btn-primary" onclick="ChangeNickname()">Apply new nickname
                                    </button>

                                    <div id="change_nickname_spinner" style="display: none; margin-left: 10px;"
                                         class="spinner-border text-info me-2" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div>
                                    <div id="change_nickname_suc" class="alert alert-info alert-dismissible"
                                         role="alert"
                                         style="margin-top: 10px; display: none">
                                        <div class="alert-message">Nickname was changed successfully.</div>
                                    </div>
                                    <div id="change_nickname_failed" class="alert alert-danger alert-dismissible"
                                         role="alert" style="margin-top: 10px; display: none">
                                        <div class="alert-message">Nickname do not match</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.querySelector("[name = new_nickname]").addEventListener("click", function () {
                            console.log('nickname click')
                            document.querySelector("#change_nickname_failed").style.display = "none";
                        });
                    </script>
                <?php } ?>


                <!--16.39 28.09.2021                password -->
                <?php if($user->user_email != 'wydebinance@gmail.com'){
                ?>
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Change Password <?= ToolTip::DrawToolTip('Могут быть использованы следующие символы : Aa-Zz, -_ 1-9') ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code align-middle me-2"><polyline
                                                points="16 18 22 12 16 6"></polyline><polyline
                                                points="8 6 2 12 8 18"></polyline></svg>
                                </span>
                                    <input type="password" class="form-control" name="new_pass" placeholder="new password">
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code align-middle me-2"><polyline
                                                points="16 18 22 12 16 6"></polyline><polyline
                                                points="8 6 2 12 8 18"></polyline></svg>
                                </span>
                                    <input type="password" class="form-control" name="repeat_pass"
                                           placeholder="repeat password">
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code align-middle me-2"><polyline
                                                points="16 18 22 12 16 6"></polyline><polyline
                                                points="8 6 2 12 8 18"></polyline></svg>
                                </span>
                                    <input type="password" class="form-control" name="old_pass"
                                           placeholder="old password">
                                </div>


                                <div>
                                    <button class="btn btn-primary" onclick="ChangePass()">Apply new password </button>
                                    <div id="change_pass_spinner" style="display: none; margin-left: 10px;"
                                         class="spinner-border text-info me-2" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div>
                                    <div id="change_pass_success" class="alert alert-info alert-dismissible" role="alert"
                                         style="margin-top: 10px; display: none">
                                        <div class="alert-message">Password was changed successfully.</div>
                                    </div>
                                    <div id="restore_pass_success" class="alert alert-secondary alert-dismissible"
                                         role="alert" style="margin-top: 10px; display: none">
                                        <div class="alert-message">We have sent you your password to your
                                            email: <?= $user->user_email ?> .
                                        </div>
                                    </div>
                                    <div id="change_pass_failed" class="alert alert-danger alert-dismissible" role="alert"
                                         style="margin-top: 10px; display: none">
                                        <div class="alert-message">Passwords do not match</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>



                <!--                22.10.2021 16:46 create 2af-->

                <div class="col-12 col-lg-6">

                    <div class="card" style="display: none" id="card_2af">
                        <div class="card-header">
                            <h5 class="card-title mb-0" id="header_2af">Getting codes using the Google Authenticator
                                app <?= ToolTip::DrawToolTip('Двухфакторная аутентификация') ?></h5>
                        </div>

                        <!--                        get secret 2af-->
                        <div class="card-body" id="create_secret_2af">
                            <div>
                                <p style="text-align: center">
                                    You can get verification codes not only by SMS.<br>
                                    Use the Google Authenticator app!<br>
                                    It works even when you're offline, and you don't have to pay for messages.
                                </p>
                                <canvas id="qr" style="display: none;margin: auto;padding-bottom: 10px;">
                                </canvas>
                                <div class="input-group mb-3" id='token_2af' style="display: none;">
                                    <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code align-middle me-2"><polyline
                                                points="16 18 22 12 16 6"></polyline><polyline
                                                points="8 6 2 12 8 18"></polyline></svg>
                                </span>
                                    <input id="verify_token" type="text" class="form-control" name=""
                                           placeholder="enter your token to verify">
                                </div>


                                <div>
                                    <button class="btn btn-primary" style='display: none;margin: auto;'
                                            id='create_secret' onclick="create_authentication_secret()">Create 2FA
                                    </button>
                                </div>


                                <div>
                                    <button class="btn btn-primary" id='recive_token'
                                            style=' display: none; margin: auto;' onclick="ver_authentication_secret()">
                                        Verify token
                                    </button>
                                </div>


                            </div>
                        </div>
                        <!--                        end get secret 2af-->

                        <!--                        window with rady 2af-->
                        <div class="card-body" style="display: none" id="window_ready_2af">

                            <div>
                                <div>
                                    <div class="form-check form-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                   checked="" onclick="off_or_on_Authenticator_window(event)">
                                            <label class="form-check-label" for="" id="flex_text_auth"></label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-danger" onclick="delete_2af()" style="margin-left: 28px;float:right">
                                Delete 2FA
                            </button>
                        </div>
                        <!--                           end window with rady 2af-->

                        <!--                         start on_off_2af-->
                        <div id='on_off_auth_div'
                             style="display: none;position: absolute;width: 100%;height: 100%;opacity: 90%;background-color: #0c0b0b;">
                            <div class="mb-2">

                                <button class="btn"
                                        style=' display: flex;position: absolute' onclick="close_on_off_form()">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color:red" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-slash align-middle me-2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                    </svg>
                                </button>
                            </div>
                            <p style="font-size: 16px;text-align: center;padding: 0;margin: 0px;">
                                For further actions, go through verification.
                            </p>
                            <div class="input-group mb-3" id='token' style="">
                                    <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code align-middle me-2"><polyline
                                                points="16 18 22 12 16 6"></polyline><polyline
                                                points="8 6 2 12 8 18"></polyline></svg>
                                </span>
                                <input id="verify_token_on_off" type="text" class="form-control" name="new_pass"
                                       placeholder="enter your token to verify">
                            </div>
                            <button class="btn btn-primary" id='on_off_ver'
                                    style=' display: block; margin: auto;' onclick="()">
                                Sent token
                            </button>
                            <button class="btn btn-danger" id='delete_2af_btn_modal'
                                    style=' display: none; margin: auto;' onclick="()">
                                Are you sure?
                            </button>


                        </div>
                        <!--                         end on_off_2af-->

                    </div>

                </div>


            </div>
        </main>


        <?php include("footer.php") ?>

    </div>
</div>

<script src="js/app.js"></script>
<script src="js/node_modules/qrcode/build/qrcode.min.js"></script>

<script src="js/change_pass.js?"<?= filemtime('js/change_pass.js') ?>></script>

</body>
</html>



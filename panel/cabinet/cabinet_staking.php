<?php
session_start();

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");
$user = new User($_SESSION['user_email']);
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}


?>

<script src="../cabinet/js/login.js"></script>
<script src="js/verification_script.js"></script>

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
    <div class="main" page="cabinet_staking">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Staking

                </h1>
                <!--                Description -->
                <div class="row trd_tokenomik_row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"></h5>
                            </div>
                            <div class="card-body">
                                <div class="align-self-center w-100" style=" margin:auto">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <span class="badge-soft-info trd_info_text" style="font-size: 20px">
                                                <p>Coming soon</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("footer.php") ?>

    </div>
</div>

<style>

    .trd_tokenomik_row {
        max-width: 1200px;
        margin: auto;
    }
</style>


<script src="js/app.js"></script>
<script src="js/notification_handler.js"></script>


</body>
</html>


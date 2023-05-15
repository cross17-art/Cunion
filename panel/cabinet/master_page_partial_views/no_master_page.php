<?php
session_start();


if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}


$user = new User($_SESSION['user_email']);


if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}
?>

<html lang="en">
<?php include("header.php") ?>
<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="master_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Trader </h1>
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                Master Not exist
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>


<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
<!--<script>-->

</body>
</html>


<script src="js/verification_script.js"></script>
<script src="js/date_handler.js"></script>
<script src="js/language.js"></script>
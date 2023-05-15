<?php
session_start();
include("classes/user.php");
$user = new User($_SESSION['user_email']);
?>

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
    <div class="main">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Email verification</h5>
                        </div>
                        <div class="card-body" style="
    padding-top: 0px;
">
                            <div>
                                <button class="btn btn-danger" onclick="SendVerification()">Send verification email</button>

                                <div id="verification-email-spinner" style="display: none; margin-left: 10px;" class="spinner-border text-info me-2" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div>
                                <div id="mail_sent" class="alert alert-info alert-dismissible" role="alert" style="margin-top: 10px; display: block;">
                                    <div class="alert-message">Verification email sent</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Terms of Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            &copy; 2021 - <a href="index.html" class="text-muted">AppStack</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="js/app.js"></script>

</body>
</html>


<script src="js/verification_script.js"></script>
<script src="js/change_pass.js"> </script>
<script>
    function SendVerification(){
        document.querySelector("#mail_sent").style.display = "none";
        console.log("Send verification email:")
        document.querySelector('.verification-email-spinner').style.display = "block"
        fetch('https://cunion.io/client/php_scripts/send_verification_email_ajax.php', {
            method: 'POST',
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data);
            ClearMessageBox();
            document.querySelector(".verification-email-spinner").style.display = "none";
            document.querySelector("#mail_sent").style.display = "block";
        });
    }
</script>
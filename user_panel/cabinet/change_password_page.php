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
                            <h5 class="card-title mb-0">Default</h5>
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
                            <div>
                                <button class="btn btn-primary" onclick="ChangePass()">Apply new password</button>
                                <button class="btn btn-secondary" onclick="RestorePass()">Restore Password</button>
                                <div  id="change_pass_spinner" style= "display: none; margin-left: 10px;" class="spinner-border text-info me-2" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div>
                                <div id="change_pass_success" class="alert alert-info alert-dismissible" role="alert" style="margin-top: 10px; display: none">
                                    <div class="alert-message" >Password was changed successfully.</div>
                                </div>
                                <div id="restore_pass_success" class="alert alert-secondary alert-dismissible" role="alert" style="margin-top: 10px; display: none">
                                    <div class="alert-message" >We have sent you your password to your email: <?= $user->user_email ?> . </div>
                                </div>
                                <div id="change_pass_failed" class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 10px; display: none">
                                    <div class="alert-message" >Passwords do not match</div>
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

<?php
session_start();
include("../classes/user.php");
$user = new User($_SESSION['user_email']);

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
<html lang="en">
<?php include("../header.php") ?>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->
<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="main_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">

                <?php include ("cabinet_main_parts/service_statistics.php")?>
                <?php include ("cabinet_main_parts/masters_table.php") ?>

            </div>
        </main>
    </div>
</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
<!--<script>-->

</body>
</html>
<style>
    .trade-amount {
        width: 80%;
        float: left;
        padding: 10px 13px 10px 0px;
    }

    .bot-enable-toggle {
        margin-left: 7px;
    }
</style>

<script src="js/verification_script.js"></script>
<script src="js/load_service_kucoin_statistic.js"></script>







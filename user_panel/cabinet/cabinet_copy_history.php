<?php
session_start();

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/client/cabinet/sign_in_form.php"</script>
    <?php
}


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

<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="kucoin_copy_history">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Kucoin Copy History</h5>
                    </div>

                    <table id="kucoin_copy_history_table" class="table table-striped my-0">
                        <thead>
                        <tr>
                            <th style="width: 200px;">Date</th>
                            <th>From</th>
                            <th>Symbol</th>
                            <th>Master qty</th>
                            <th style="width: 100px">side</th>
                            <th>follower order size</th>
                            <th>Deal funds</th>
                            <th>status</th>
                            <th>Delay MS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="display: none" kucoin-history-tr-template>
                            <td date>Date</td>
                            <td from>From</td>
                            <td><img class="quote-asset"> <img class="base-asset"><span symbol>Symbol</span></td>
                            <td master qty>qty</td>
                            <td side>side</td>
                            <td follower_order_size>follower order size</td>
                            <td deal-funds>deal funds</td>
                            <td status>status</td>
                            <th delay>Delay</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <script src="js/load_copy_history.js"></script>
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
                            © 2021 - <a href="index.html" class="text-muted">AppStack</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>

<!--<script>-->


<!--<table id="datatables-dashboard-projects" class="table table-striped my-0" style="display:none">-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>Id</th>-->
<!--        <th class="d-none d-xl-table-cell">Start Date</th>-->
<!--        <th class="d-none d-xl-table-cell">End Date</th>-->
<!--        <th>Status</th>-->
<!--        <th class="d-none d-md-table-cell">Pair</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    <tr tr-example>-->
<!--        <td order-id>Project Apollo</td>-->
<!--        <td start-date class="d-none d-xl-table-cell">01/01/2018</td>-->
<!--        <td end-date class="d-none d-xl-table-cell">31/06/2018</td>-->
<!--        <td status><span class="badge bg-success">Done</span></td>-->
<!--        <td symbol class="d-none d-md-table-cell">Carl Jenkins</td>-->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->


</body>
</html>

<style>
    .quote-asset{
        width: 25px;
        margin-left: 5px;
        margin-top: -15px;
    }

    .base-asset{
        width: 17px;
        margin-left: -10px;
        margin-top: 5px;
        margin-right: 5px;
    }

</style>

<script>
    console.log("starting ...")
</script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    // $("#datatables-dashboard-projects").DataTable({
    //     pageLength: 6,
    //     lengthChange: false,
    //     bFilter: false,
    //     autoWidth: false
    // });
    // //
    // // $("#datatables-dashboard-projects2").DataTable({
    // //     pageLength: 6,
    // //     lengthChange: false,
    // //     bFilter: false,
    // //     autoWidth: false
    // // });
    // });
</script>

<script src="js/load_kucoin_copy_history.js"></script>



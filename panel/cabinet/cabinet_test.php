<?php

include("classes/user.php");
include ("classes/MasterHandler.php");

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

$allKucoinMasters = MasterHandler::GetAllKucoinMasters();

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
    <div class="main" page="main_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="col-12 col-lg-6">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title">Line Chart</h5>
                        <h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chartjs-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include ("footer.php") ?>
    </div>

</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>

<script>




   new Chart(document.getElementById("chartjs-line"), {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Orders",
                fill: false,
                backgroundColor: 'transparent',
                borderColor: '#00ff55',
                borderWidth:3,
                pointBackgroundColor:'#00ff55',
                borderDash: [0, 2],
                data: [958, 724, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 1466, 3327]
            },{
                label: "Transfer",
                fill: false,
                backgroundColor: 'transparent',
                borderColor: '#f5492b',
                borderWidth:3,
                pointBackgroundColor:'#f5492b',
                borderDash: [0, 2],
                data: [958, 724, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 2917, 3327]
            },{
                label: "USDT",
                fill: true,
                backgroundColor: "transparent",
                borderColor: window.theme.primary,

                data: [2115, 1562, 1584, 1892, 1487, 2223, 2966, 2448, 2905, 3838, 2917, 3327]
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    enabled: false,

                }
            }
        }
    });
   
   const tooltipPlugin = Chart.registry.getPlugin('tooltip');
   tooltipPlugin.positioners.myCustomPositioner = function(elements, eventPosition) {
       /** @type {Tooltip} */
       var tooltip = this;

       /* ... */

       return {
           x: 0,
           y: 0
       };
   };


</script>


<script src="js/verification_script.js"></script>
<script src="js/load_service_kucoin_statistic.js"></script>
<script src="js/bot_control.js"></script>
<script src="js/submit_master_script.js"></script>
<script src="js/master_page/load_master_transfers.js"></script>
<script src="js/load_masters_balance_history.js"></script>
<script src="js/load_masters_portfolio.js"></script>
<script src="js/load_master_invest_actives.js"></script>
<script src="js/master_popup.js"></script>
<script src="js/master_table_sort.js"></script>







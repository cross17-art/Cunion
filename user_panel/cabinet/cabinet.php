<?php
session_start();

if(!isset($_SESSION['logged'])){
    ?>
    <script> location.href = "https://cunion.io/client/cabinet/sign_in_form.php" </script>
    <?php
} else {
    include("cabinet_main.php");
}

<?php
session_start();

if(!isset($_SESSION['logged'])){
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php" </script>
    <?php
} else {
    include("cabinet_main_v2.php");
}


?>

<style>
    [total_investment]{
        color: #62cbfe !important;
        background-color: #898e9933 !important;
        background: linear-gradient(#3c4254, rgb(41 48 66)) !important;
        width: 100%;
    }

    .input-group.mb-3.trd_tooltip{
        padding: 2px !important;
        background: linear-gradient(rgb(98 203 254 / 67%), rgb(41 48 66)) !important;
        border-radius: 5px;
    }
</style>

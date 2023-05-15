<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php" </script>
    <?php
    die();
} else {

    $user = new User($_SESSION['user_email']);
    if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
        ?>
        <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
        <?php
        die();
    }
}


include("cabinet_main.php");

?>




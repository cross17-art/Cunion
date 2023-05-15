<?php
session_start();
header('Location: https://cunion.io/panel/cabinet/sign_in_form');
//

if(isset($_SESSION['logged'])){
    $output = "User was logged." . " Email:" . $_SESSION['user_email'];
} else {
    $output = "User was not logged";
}
echo  $output;

//

unset($_SESSION['logged']);
unset($_SESSION['user_email']);

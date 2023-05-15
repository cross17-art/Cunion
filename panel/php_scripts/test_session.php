<?php
session_start();

unset($_SESSION["logged"]);

if(isset($_SESSION["logged"])){
    echo ("logged");
} else {
    echo ("not logged");
}
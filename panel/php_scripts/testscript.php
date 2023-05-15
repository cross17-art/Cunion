<?php


$a = 12;

PrintA();

function PrintA(){
    $b =  $GLOBALS['a'];
    echo $GLOBALS['a'];
}
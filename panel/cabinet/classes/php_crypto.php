<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/KeyKeeper.php";

$keyKeeper = new KeyKeeper();

function EncryptText($text) {
    global $keyKeeper;
    $encryptMethod = "AES-256-CBC";
    $secret = $keyKeeper->GetApiDecryptKey();
    $iv = substr($secret, 0, 16);
    return openssl_encrypt($text, $encryptMethod, $secret, 0, $iv);
}

function DecryptText($text){
    global $keyKeeper;
    $encryptMethod = "AES-256-CBC";
    $secret = $keyKeeper->GetApiDecryptKey();
    $iv = substr($secret, 0, 16);
    return openssl_decrypt($text, $encryptMethod, $secret, 0, $iv);
}


function EncryptByOldKeyText($text) {
    global $keyKeeper;
    $encryptMethod = "AES-256-CBC";
    $secret = $keyKeeper->GetOldApiDecryptionKey();
    $iv = substr($secret, 0, 16);
    return openssl_encrypt($text, $encryptMethod, $secret, 0, $iv);
}

function DecryptByOldKeyText($text){
    global $keyKeeper;
    $encryptMethod = "AES-256-CBC";
    $secret = $keyKeeper->GetOldApiDecryptionKey();
    $iv = substr($secret, 0, 16);
    return openssl_decrypt($text, $encryptMethod, $secret, 0, $iv);
}





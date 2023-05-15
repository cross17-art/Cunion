<?php
function EncryptText($text){
    $encryptMethod = "AES-256-CBC";
    $secret = 'fTjWmZq4t7w!z%C*F-JaNdRgUkXp2r5u';
    $iv = substr($secret, 0, 16);
    return openssl_encrypt($text, $encryptMethod, $secret, 0, $iv);
}

function DecryptText($text){
    $encryptMethod = "AES-256-CBC";
    $secret = 'fTjWmZq4t7w!z%C*F-JaNdRgUkXp2r5u';
    $iv = substr($secret, 0, 16);
    return openssl_decrypt($text, $encryptMethod, $secret, 0, $iv);
}



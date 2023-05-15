<?php


class KeyKeeper
{
    public function GetAccountEndpointKey(){
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] ."/../../../var/keys/crossserver_endpoint_key.txt");
    }

    public function GetApiDecryptKey(){
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] ."/../../../var/keys/api_decrypt_key.txt");
    }

    public function GetOldApiDecryptionKey(){
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] ."/../../../var/keys/old_api_decrypt_key.txt");
    }

    public function GetAdminKey(){
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] ."/../../../var/keys/admin_key.txt");
    }
}
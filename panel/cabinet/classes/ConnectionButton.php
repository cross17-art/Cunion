
<?php

class ConnectionButton{

    public $connectionType;
    public $modalLayout;
    public $user;
    public $masterId;
    public $masterEmail;

    public function __construct(User $user, $masterId, $masterEmail)
    {
        $this->user = $user;
        $this->masterEmail = $masterEmail;
        $this->masterId = $masterId;
        $this->connectionType = $this->DefineConnectionType($user, $masterId, $masterEmail);
    }

    public function GetConnectionType(){
        return $this->connectionType;
    }

    public function GetModalLayout(){
        return $this->modalLayout;
    }


    public function RenderModalLayout(){

        $user = $this->user;
        $masterId = $this->masterId;
        $masterEmail = $this->masterEmail;

        if($this->GetConnectionType() == "CONNECTION_TYPE_ALREADY_CONNECTED"){
            include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/master_page_partial_views/disable_to_connect_modal_master_already.php");

        } elseif($this->GetConnectionType() == "CONNECTION_TYPE_DIRECT_CONNECTION") {
            include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/master_page_partial_views/connection_popup.php");

        } elseif($this->GetConnectionType() == "CONNECTION_TYPE_ALREADY_CONNECTED") {
            include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/master_page_partial_views/warning_connection_popup.php");

        } elseif($this->GetConnectionType() == "CONNECTION_TYPE_UNSUBSCRIBE") {
            include $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/master_page_partial_views/modals/modal_unsubscribe.php";

        } elseif($this->GetConnectionType() == "CONNECTION_TYPE_API_KEYS_NOT_CONNECTED") {
        }
    }

    private function DefineConnectionType(User $user, $masterId, $masterEmail){
        if ($user->ApiKeysAreConnected()) {
            if (!$user->IsConnectedToMaster('kucoin', $masterId)) {

                if ($user->IsKucoinMaster()) {
                    return "CONNECTION_TYPE_ALREADY_CONNECTED";
                } else {
                    if (!$user->IsConnectedToOneOfTheMaster('kucoin')) {
                        return "CONNECTION_TYPE_DIRECT_CONNECTION";
                    } else {
                        return "CONNECTION_TYPE_ALREADY_CONNECTED";
                    }
                }

            } else {
               return "CONNECTION_TYPE_UNSUBSCRIBE";
            }
        } else {
            return "CONNECTION_TYPE_API_KEYS_NOT_CONNECTED";
        }
    }
}
?>
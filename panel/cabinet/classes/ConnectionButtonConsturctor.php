
<?php

class ConnectionButton{

    public $connectionType;

    public function __construct(User $user, $masterId, $masterEmail)
    {
        $this->connectionType = $this->DefineConnectionType($user, $masterId, $masterEmail);
    }

    public function GetConnectionType(){
        return $this->connectionType;
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
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php";

class UserHandler
{
    public function GetUserModelList(){
        global $conn;
        $query = "SELECT * FROM `users`";
        $result = $conn->query($query);

        if($result->num_rows != 0){
            $userRecordsList = $result->fetch_all(MYSQLI_ASSOC);
            $userList = [];
            foreach ($userRecordsList as $userRecord){
                $newUser = new User($userRecord['email']);
                if($newUser->id == NULL){
                    var_dump("_____NULL IN CONSTRUC_____");
                    var_dump("---email:---" , $userRecord['telegram']);
                    var_dump($newUser);
                }
                $userList[] = $newUser;
            }

            return $userList;
        } else {
            return [];
        }
    }
}
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php";

class NewsModel
{
    public static function GetAllNews(){
        global $conn;
        $query = "SELECT * FROM `news` order by date DESC";

        return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public static function GetLastNumNews($limit){
        global $conn;
        $query = "SELECT * FROM `news` order by date DESC LIMIT " . $limit;

        return $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public static function GetNoneSeenNewsCountForUserEmail($userEmail){
        global $conn;
        $user = new User($userEmail);
        $query = "SELECT * FROM `news` WHERE creation_date > '". $user->lastSeenDebBlog ."'";
        $result = $conn->query($query);
        return $result->num_rows;
    }
}


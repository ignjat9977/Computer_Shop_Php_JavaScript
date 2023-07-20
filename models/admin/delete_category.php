<?php
session_start();
    include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){

        $id = $_POST["category_select"];
        $table = $_POST["table"];
        $table_id = $table."_id";

        $err = 0;

        if($id == 0){
            $_SESSION["errDel"]="You have to select first!";
            $_SESSION["table"]= $table;
            redirect("../../admin.php?x=4321&page=categories");
        }else{
            $x = delete($id,$table,$table_id);
            if(!$x){
                 redirect("../../admin.php?x=4321&page=categories");
            }else{
                $_SESSION["errDel"] = "Something get wrong in database, please try again later!!!";
                $_SESSION["table"] = $table;
                redirect("../../admin.php?x=4321&page=categories");
            }
        }
    }else{
        redirect("404.php");
    }
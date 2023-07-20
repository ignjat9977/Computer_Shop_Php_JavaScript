<?php
session_start();
    include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){

        $id = $_POST["select"];
        $table = $_POST["table"];
        $edit = $_POST["edit"];
        $table_id = $table."_id";

        $err = 0;
        if($edit == "Select" || !preg_match("/^[A-Za-z0-9]{3,15}$/", $edit) || $id == 0){
            $err++;
        }
        if($err != 0){
            $_SESSION["errEdit"]="You have to select first!";
            $_SESSION["table"]= $table;
            redirect("../../admin.php?x=4321&page=categories");
        }else{
            $x = update_category($id,$table_id,$edit, $table);
            if($x){
                redirect("../../admin.php?x=4321&page=categories");
            }else{
                $_SESSION["errEdit"] = "Something get wrong in database, please try again later!!!";
                $_SESSION["table"] = $table;
                redirect("../../admin.php?x=4321&page=categories");
            }
        }
    }else{
        redirect("404.php");
    }
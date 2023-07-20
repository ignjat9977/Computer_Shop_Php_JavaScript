<?php
session_start();
    include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){

        $name = $_POST["add"];
        $table = $_POST["table"];
        $err=0;
        if(!preg_match("/^[A-Za-z0-9]{3,15}$/", $name)){
            $err++;
        }

        if($err!=0){
            $_SESSION["err"] = "Name is not correct";
            $_SESSION["table"] = $table;
            redirect("../../admin.php?x=4321&page=categories");
        }else{
            $x = add_category($name,$table);
            if($x){
                redirect("../../admin.php?x=4321&page=categories");
            }else{
                $_SESSION["err"] = "Something get wrong in database, please try again later!!!";
                $_SESSION["table"] = $table;
                redirect("../../admin.php?x=4321&page=categories");
            }
        }



    }else{
        redirect("404.php");
    }
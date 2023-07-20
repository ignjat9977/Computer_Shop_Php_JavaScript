<?php
    header("Content-type: application/json");
    include "../config/connection.php";
    include "functions.php";
    session_start();
    if(isset($_POST["btn"])){
        $user_id = $_SESSION["user"]->user_id;
        $mess = $_POST["comment"];
        $prod_id = $_POST["prod_id"];

        $x = insert_comment($mess, $prod_id, $user_id);

        if($x){
            redirect("../index.php?page=product&product_id=$prod_id&btn_view=");
        }

    }else{
        redirect("404.php");
    }
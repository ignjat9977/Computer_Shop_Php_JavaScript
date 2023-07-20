<?php
    header("Content-type: application/json");
    include "../config/connection.php";
    include "functions.php";

    if(isset($_GET["btn"])){
        $email = $_GET['email'];

        $x = unlock_user($email);

        if($x){
            redirect("../index.php?page=login");
        }

    }else{
        redirect("404.php");
    }
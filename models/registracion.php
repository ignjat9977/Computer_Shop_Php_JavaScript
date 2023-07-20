<?php
    header("Content-type: application/json");
    include "../config/connection.php";
    include "functions.php";
    if(isset($_POST["btn"])){
        $error = 0;
        $status = "";
        $response = "";

        $first = $_POST["first"];
        $firstReg = "/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/";

        $last = $_POST["last"];
        $lastReg = "/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/";

        $user = $_POST["user"];
        $userReg = "/^[a-z0-9]{3,15}$/";

        $email = $_POST["email"];
        $emailReg = "/^[a-z][\w\.\-]+\@[a-z0-9]{2,15}(\.[a-z]{2,4}){1,2}$/";

        $adress = $_POST["adress"];
        $adressReg = "/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,15}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,15})?\s[1-9]([0-9])?([0-9])?$/";

        $password = $_POST["password"];
        $passReg = "/^[a-zA-Z0-9~!@#$%^&*()_+{}]{8,20}$/";

        if(!preg_match($firstReg, $first)){
            $error++;
        }
        if(!preg_match($lastReg, $last)){
            $error++;
        }
        if(!preg_match($userReg, $user)){
            $error++;
        }
        if(!preg_match($emailReg, $email)){
            $error++;
        }
        if(!preg_match($adressReg, $adress)){
            $error++;
        }
        if(!preg_match($passReg, $password)){
            $error++;
        }

        if($error != 0){
            $status = 422;
            $response = ["resMessage"=>"An error occurred while processing the data."];
        }else{
            $pass = md5($password);
            $x = insert_user($first, $last, $user, $email, $pass, $adress);
            if($x){
                $status = 200;
                $response = ["resMessage"=>"You are successfully registered!"];
            }else{
                $status = 500;
                $response = ["resMessage"=>"An error occurred inserting data to database!"];
            }
        }

        echo json_encode($response);
        http_response_code($status);

    }else{header("Location: 404.php");}
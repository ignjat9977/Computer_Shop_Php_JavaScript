<?php
    header("Content-type: application/json");
    include "../config/connection.php";
    include "functions.php";
    session_start();
    $_SESSION['acc']=0;
    if(isset($_POST["btn"])){

        $error = 0;     
        $status = "";
        $response = "";   
        $first = $_POST["fName"];
        $firstRegEx = "/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/";

        $last = $_POST["lName"];
        $lastRegEx = "/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/";

        $email = $_POST["cEmail"];
        $emailRegEx = "/^[a-z][\w\.\-]+\@[a-z0-9]{2,15}(\.[a-z]{2,4}){1,2}$/";

        $message = $_POST["message"];


        if(!preg_match($firstRegEx, $first)){
            $error++;
        }
        if(!preg_match($lastRegEx, $last)){
            $error++;
        }
        if(!preg_match($emailRegEx, $email)){
            $error++;
        }
        if(strlen($message)<=5){
            $error++;
        }

        if($error != 0){
            $response = ["resMessage"=>"An error occurred while processing the data."];
            $status = 422;
        }else{
            $insertMessage = insert_contact_message($first,$last,$email,$message);
            if($insertMessage){
                $response = ["resMessage"=>"Message is sent successfully."];
                $status = 200;
            }
            else{
                $response = ["resMessage"=>"An error occurred while entering data into the database."];
                $status = 500;
            }
        }
        echo json_encode($response);
        http_response_code($status);

    }else{
        header("Location: 404.php");
    }
?>
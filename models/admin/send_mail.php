<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../composer/vendor/autoload.php';
include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){
        $email = $_POST["email"];
        $message = $_POST["message"];
        $username="ignjat9977@gmail.com";
                $password = "77581071Abc";
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 2;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->Username   = $username;  // GMAIL username
                $mail->Password   = $password;
                $mail->setFrom($username, "Admin Message",0);
                $mail->SMTPAuth = true;
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = "Admin message";
                $mail->Body = $message;
                $mail->Host = "smtp.gmail.com";
                $mail->isSMTP();
                $x = $mail->send();
                if($x){
                    redirect("../../admin.php?x=4321&page=messages");
                }else{
                    redirect("../../admin.php?x=4321&page=messages");
                }
                
    }else{
        redirect("404.php");
    }
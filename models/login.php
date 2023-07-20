<?php
    header("Content-type: application/json");
    include "../config/connection.php";
    include "functions.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../composer/vendor/autoload.php';
    session_start();
    if(isset($_POST["btn"])){
       
        $error=0;
        $response = "";
        $status = 0;
        $xx=0;

        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        

        $reg_user = "/^[a-z0-9]{3,15}$/";
        $reg_pass = "/^[a-zA-Z0-9~!@#$%^&*()_+{}]{8,20}$/";

        if(!preg_match($reg_user, $user_name)||!preg_match($reg_pass,$password)){
            $error++;
        }

        $pass = md5($password);

        if($error!=0){
            $response = ["resMessage"=>"Something get wrong while processing data!"];
            $status=422;
        }else{
            $user = check_login($user_name, $pass);
            $u = check_user_name($user_name, $pass);
            if($u){
                
                $_SESSION["acc"]+=1;
                if($_SESSION["acc"]==1){
                    $_SESSION["time"] = time();
                    $response = ["resMessage"=>"Wrong password"];
                    $status=200;
                }
                if($_SESSION["acc"] > 2 && time() - $_SESSION['time'] <= 300){
                    
                    $x = lock_account($u->email);
                    unset($_SESSION["acc"]);
                    unset($_SESSION["time"]);
                    $username="ignjat9977@gmail.com";
                    $password = "77581071Abc";
                    $mail = new PHPMailer(true);
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->Username   = $username;  // GMAIL username
                    $mail->Password   = $password;
                    $mail->setFrom($username, "Admin Message",0);
                    $mail->SMTPAuth = true;
                    $mail->addAddress($u->email);
                    $mail->isHTML(true);
                    $mail->Subject = "Admin message";
                    $mail->Body = "Your account is locked please click on this 
                    link to activate it 
                    <a href='localhost/projects/PP-sajt/models/activate_mail.php?
                    btn=true&email=$u->email'>Activate</a>";
                    $mail->Host = "smtp.gmail.com";
                    $mail->isSMTP();
                    $x = $mail->send();
                    

                    if($x){
                        $_SESSION['errr']="Your account is locked please activate 
                        your account via mail which we have sended!!!";
                        $response = ["resMessage"=>"Your account is locked 
                        please activate your account via mail which we have sended!!!"];
                        $status=200;

                        
                    }else{
                        redirect("../index.php?page=login");
                    }
                    
                }
                if(isset($_SESSION['acc']) && isset($_SESSION['time'])):
                    if($_SESSION['acc']> 2 && time() - $_SESSION['time']>300){
                        unset($_SESSION["acc"]);
                        unset($_SESSION["time"]);
                    }
                endif;
            }else{
                if($user){
                    $_SESSION["user"] = $user;
                    $_SESSION["role"] = $user->role_id;
                    log_account();
                    $response = ["resMessage"=>"You successfully loged in!"];
                    $status=200;
    
                }else{
                    $response = ["resMessage"=>"Wrong username or password!"];
                    $status=500;
                }
            }
            
        }

        echo json_encode($response);
        http_response_code($status);

    }else{
        header("Location: 404.php");
    }
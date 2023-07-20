<?php
    session_start();
    header("Content-type: application/json");
    include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){

        $error = 0;     
        $status = "";
        $response = "";   
        $card = $_POST["card_number"];
        $card_regex = "/^[0-9]{16}$/";

        $code = $_POST["security_code"];
        $code_regex = "/^[0-9]{3}$/";

        $exp_m = $_POST["exp_m"];

        $exp_y = $_POST["exp_y"];

        $card_type =$_POST["card_type"];

        $ammount = $_POST["ammount"];
        if(!preg_match($card_regex, $card)){
            $error++;
        }
        if(!preg_match($code_regex, $code)){
            $error++;
        }
        if($exp_m == 0 || $exp_y == 0 || $card_type == 0){
            $error++;
        }

        if($error != 0){
            $response = ["resMessage"=>"Invalid card information!!!"];
            $status = 422;
        }else{
            $insert_payment = insert_payment($ammount,$card_type);
            global $conn;
            $payment_id = $conn->lastInsertId();
            if($insert_payment){

                $user_id = $_SESSION["user"]->user_id;
                $i_u_p = insert_order_user($user_id,$payment_id);
                global $conn;
                $i_u_p_id = $conn->lastInsertId();
                if($i_u_p){
                    foreach($_SESSION["cart"] as $c){
                        if($c["Quantity"]==""){$c["Quantity"]=1;}
                        insert_ik_order($c["Quantity"], $c["Id"], $i_u_p_id);
                    }
                    unset($_SESSION["cart"]);
                    $response = ["resMessage"=>"Your order is in proccess!!!"];
                    $status = 200;
                }else{
                    delete($payment_id, "payment", "payment_id");
                    $response = ["resMessage"=>"An error occurred while entering data into the database."];
                    $status = 500;
                    
                }
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
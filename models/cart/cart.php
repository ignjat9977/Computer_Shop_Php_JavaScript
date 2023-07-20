<?php 
    session_start();
    include "../../config/connection.php";
    include "../functions.php";
        if(isset($_POST["purchase_btn"])){
            $id = $_SESSION["user"]->user_id;
            $res = insert_cart($id);
            global $conn;
            $id_cart = $conn->lastInsertId();
            var_dump($id_cart);
            if($res){
                foreach($_SESSION["cart"] as $c){
                    if($c["Quantity"]==""){$c["Quantity"]=1;}
                    insert_cart_product($c["Quantity"], $c["Id"], $id_cart);
                }
                header("Location: ../../index.php?page=payment");
            }


        }else{
            header("Location: 404.php");
        }
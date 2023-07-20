<?php 
    session_start();
    include "../../config/connection.php";
    include "../functions.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["btn"])){
            $id = $_POST["id"];
            $price = $_POST["price"];
            $name = $_POST["name"];
            $img = $_POST["img"];
            $q = $_POST["quantity"];
            if(isset($_SESSION["user"])){
                if(isset($_SESSION["cart"])){
                    $myitems = array_column($_SESSION["cart"], "Name");
                    if(in_array($_POST["name"], $myitems)){
                        echo "<script>alert('Item alredy added!')
                        window.location.href='../../index.php?page=shop'</script>";
                    }
                    else{
                        $count = count($_SESSION["cart"]);
                        $_SESSION["cart"][$count] = array("Name"=>$name,"Id"=>$id, 
                        "Price"=>$price, "Img"=>$img, "Quantity"=> $q);
                        echo "<script>alert('Item added!')
                        window.location.href='../../index.php?page=shop'</script>";
                    }
                
                }else{
                    $_SESSION["cart"][0] = array("Name"=>$name, "Price"=>$price, 
                    "Id"=>$id, "Img"=>$img, "Quantity"=> $q);
                    echo "<script>alert('Item added!')
                    window.location.href='../../index.php?page=shop'</script>";
                }
            }else{
                echo "<script>alert('You have to log in first')
                        window.location.href='../../index.php?page=login'</script>";
            }
        }
        if(isset($_POST["cart_delete_btn"])){
            foreach($_SESSION["cart"] as $key=>$value){
                if($value["Id"] == $_POST["id_delete"]){
                    unset($_SESSION["cart"][$key]);
                    $_SESSION["cart"] = array_values($_SESSION["cart"]);
                    header("Location: ../../index.php?page=cart");
                }
            }
        }
        if(isset($_POST["cart_delete_all_btn"])){
            foreach($_SESSION["cart"] as $key=>$value){
                unset($_SESSION["cart"][$key]);
            }
            header("Location: ../../index.php?page=cart");
        }
    }else{
        header("Location: 404.php");
    }
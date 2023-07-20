<?php
    session_start();
    include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){
    
        $name = $_POST["name"];
        $alt = $_POST["alt"];
        $des = $_POST["des"];
        $price = $_POST["price"];
        $dis = $_POST["dis"];
        $regular = $_FILES["regular"]["name"];
        $thumb  =$_FILES["thumb"]["name"];
        $color = $_POST["color"];
        $brand = $_POST["brand"];
        $res  =$_POST["resolution"];
        
        $err = [];
        
        if($name == ""){
            array_push($err, "Name cant be empty!");

        }
        if($alt == ""){
            array_push($err, "Image description cant be empty!");

        }
        if($des == ""){
            array_push($err, "Description cant be empty!");

        }
        if($price == ""){
            array_push($err, "Price cant be empty!");

        }
        if($name == ""){
            array_push($err, "Name cant be empty!");

        }
        if($regular == ''){
            array_push($err, "Picture regular name cant be empty");
        }
        if($thumb == ''){
            array_push($err, "Picture thumbnail name cant be empty");
        }
        
        $allowed_file_types = [ "image/png", "image/jpeg", "image/jpg"];
        $type_reg = $_FILES["regular"]["type"];
        $type_thumb = $_FILES["thumb"]["type"];

        if(!in_array($type_reg, $allowed_file_types)){
            array_push($err, "Picture regular cant be that extension");
        }
        if(!in_array($type_thumb, $allowed_file_types)){
            array_push($err, "Picture thumbnail cant be that extension");
        }
        $file_name_reg = time()."_".$regular;
        $file_name_thumb = time()."_".$thumb;

        $path_reg = "../../assets/image/".$file_name_reg;
        $path_thumb = "../../assets/image/".$file_name_thumb;

        if(!move_uploaded_file($_FILES["regular"]["tmp_name"],$path_reg)||
        !move_uploaded_file($_FILES["thumb"]["tmp_name"],$path_thumb)){
            array_push($err, "Some of picture cant be uploaded");
        }
        if(!count($err)){
            $x = insert_product($name,$des, $brand, $color, $res);
            global $conn;
            $prod_id = $conn->lastInsertId();

            if($x){
                $y = insert_price($price, $dis, $prod_id);

                if($y){
                    $reg = 1;
                    $thumb = 2;
                    $c=insert_picture("assets/image/".$file_name_reg, $alt, $prod_id, $reg);
                    $k = insert_picture("assets/image/".$file_name_thumb, $alt, $prod_id, $thumb);

                    if($c && $k){
                        redirect("../../admin.php?x=4321&page=products");
                    }
                }
            }


        }else{
            redirect("../../admin.php?x=4321&page=products");
        }

        $_SESSION["er"]= $err;
    
    
    }else{
        redirect("404.php");
    }
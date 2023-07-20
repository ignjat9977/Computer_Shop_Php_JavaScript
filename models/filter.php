<?php 
    
    include "../config/connection.php";
    include "functions.php";


    try {

        if(isset($_POST["btn"])){
            $query="";
            if(isset($_POST["brand"])){
                $x = implode("','", $_POST["brand"]);
                $query.= " AND p.brand_id IN ('$x')";
            }
            if(isset($_POST["res"])){
                $x = implode("','", $_POST["res"]);
                $query.= " AND p.resolution_id IN ('$x')";
            }
            if(isset($_POST["color"])){
                $x = implode("','", $_POST["color"]);
                $query.= " AND p.color_id IN ('$x')";
            }
            if(isset($_POST["search"])){
                $x = $_POST["search"];
                $query.=" AND p.name LIKE '%$x%'";
            }
            if(isset($_POST["sort"])){
                if($_POST["sort"] == "0"){
                    $query.="";
                }
                else if($_POST["sort"]=="1"){
                    $query.=" ORDER BY pr.price ASC";
                }
                else if($_POST["sort"]=="2"){
                    $query.= " ORDER BY pr.price DESC";
                }
                else if($_POST["sort"]=="3"){
                    $query.= " ORDER BY p.date DESC";
                }
                else if($_POST["sort"]=="4"){
                    $query.= " ORDER BY p.name ASC";
                }
                else if($_POST["sort"]=="5"){
                    $query.= " ORDER BY p.name DESC";
                }
            }
            if(isset($_POST["lim"])){
                $limit = $_POST["lim"];
            }
            $num = number_of_pages($query);
            $n = $num->num;
            
    
            $result = get_products($query, $limit);
            echo json_encode([
                "prod"=>$result,
                "pag"=>$n
            ]);
            http_response_code(200);
            
        }
        else{
            header("Location: 404.php");
        }
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }

    
<?php
    session_start();
    include "../../config/connection.php";
    include "../functions.php";
    if(isset($_POST["btn"])){

        $id = $_POST["product_id"];
        $table_prod = "product";
        $table_price = "price";
        $id_porod = "product_id";
        
        $x = delete($id, $table_price, $id_porod);

        
        $c = delete($id, "picture", $id_porod);
                
        $y = delete($id, $table_prod, $id_porod);
                    
        redirect("../../admin.php?x=4321&page=products");
                    
                    
                
        
        
    }else{
        redirect("404.php");
    }  
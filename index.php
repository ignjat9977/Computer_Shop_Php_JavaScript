<?php
    
    include "config/connection.php";
    include "models/functions.php";
    include "views/fixed/head.php";
    include "views/fixed/header.php";
    include "views/fixed/cover.php";
    include "views/fixed/modal.php";

    log_page("read");
    $product = get_products("");
    if(isset($_GET["btn_view"])){
        $id = $_GET["product_id"];
        
       
    }
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case "login":
                include "views/pages/login.php";
                break;
            case "register":
                include "views/pages/register.php";
                break;
            case "author":
                include "views/pages/author.php";
                break;
            case "contact":
                include "views/pages/contact.php";
                break;
            case "shop":
                include "views/pages/shop.php";
                break;
            case "product":
                include "views/pages/product.php";
                break;
            case "cart":
                include "views/pages/cart.php";
                break;
            case "payment":
                include "views/pages/payment.php";
                break;
            case "admin?x=4321":
                echo "<script>
                    window.location.href='admin.php?x=4321'
                </script>";
                break;
            
            default:
                include "views/pages/home.php";
                break;
        }

    }else{
        include "views/pages/home.php";
    }
    include "views/fixed/footer.php";
    include "views/fixed/scripts.php";
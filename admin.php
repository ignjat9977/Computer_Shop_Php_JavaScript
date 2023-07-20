<?php 
    if(isset($_GET["x"])&&$_GET["x"]==4321):
    session_start();
    include "config/connection.php";
    include "models/functions.php";
    include "views/fixed/head.php";
    include "views/fixed/modal.php";

    ?>
   <body id="page-top">

<!-- Page Wrapper -->
    <div id="wrapper">

    <?php 
        include "views/fixed/sidebar.php";
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php
                include "views/fixed/admin-header.php";
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php 
                if(isset($_GET["limit"])){$x = $_GET["limit"];}else{ $x=0;}
                
                $product = get_products("", $x);
                    if(isset($_GET["page"])){

                        switch($_GET["page"]){
                            case "categories":
                                include "views/pages/admin/categories.php";
                                break;
                            case "views":
                                include "views/pages/admin/views.php";
                                break;
                            case "user":
                                include "views/pages/admin/users.php";
                                break;
                            case "message":
                                include "views/pages/admin/messages.php";
                                break;
                            case "products":
                                include "views/pages/admin/products.php";
                                break;
                            case "orders":
                                include "views/pages/admin/orders.php";
                                break;
                            default:
                                include "views/pages/admin/views.php";
                        }

                    }else{
                        include "views/pages/admin/views.php";
                    }
                
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    </div>
    <?php



    include "views/fixed/scripts.php";
    endif;?>
    
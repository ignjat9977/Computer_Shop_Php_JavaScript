<?php session_start();

?>
<header class="ik-bg-pink" id="ik-header">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark ik-bg-pink">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php?page=home"><img src="assets/img/Logo.png" alt="Logo"> Lap Shop </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <?php $nav = select_table("nav");
                            foreach($nav as $n):?>
                            <li class="nav-item">
                            <a class="nav-link ik-color-white" href="<?=$n->path?>"><?=$n->name?></a>
                            </li>
                        <?php endforeach;
                        if(isset($_SESSION["user"])):
                        ?>
                            <li class="nav-item">
                            <a class="nav-link" href="index.php?page=cart"><i class="bi ik-icons bi-cart3"></i></a>
                            </li>
                        <?php 
                            endif;
                        ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ik-color-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if(!isset($_SESSION["user"])):?>
                            <li><a class="dropdown-item" href="index.php?page=login"><i class="bi me-1 bi-door-open"></i>Login</a></li>
                            <?php endif;?>
                            <li><a class="dropdown-item" href="index.php?page=register"><i class="bi me-1 bi-box-arrow-in-right"></i>Register</a></li>
                            <?php if(isset($_SESSION["user"])):?>
                                <li><a class="dropdown-item" href="models/logout.php?btn=true"><i class="bi bi-door-closed-fill"></i>Log Out</a></li>
                            <?php endif;?>
                            <?php if(isset($_SESSION["user"]) && $_SESSION["role"]==1):?>
                                <li><a class="dropdown-item" href="index.php?page=admin?x=4321"><i class="bi bi-shield-lock-fill"></i> Admin Page</a></li>
                            <?php endif;?>
                            
                        </ul>
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>
            </div>
        </div>
    </header>

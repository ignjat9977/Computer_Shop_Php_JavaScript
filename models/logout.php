<?php 
include "../config/connection.php";
include "functions.php";
session_start();
if(isset($_GET["btn"])){
    unset($_SESSION['user']);
    unset($_SESSION["role"]);
    header("Location: ../index.php?page=shop");
}else{
    header("Location: 404.php");
}
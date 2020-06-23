<?php


error_reporting(0);

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    $mensaje = "Error de inicio de sesion";
    header("location:/index.php");
}
 
<?php
// include database configuration file
include '../conexion/conexion2.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
   header("Location: index.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] = 1;



$nombre =  $_SESSION['nombre']; 
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];

header("Location: AccionCarta.php?action=placeOrder&n=$nombre&e=$email&t=$telefono");

///session_start();




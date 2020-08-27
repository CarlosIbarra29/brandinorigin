<?php

include '../funciones/cFunciones.php';

$email = $_POST['username'];

$recupera = fnGetRecupera($email);

if($recupera['estatus']===true){

	$msj = $recupera['msj'];

	$status = $recupera['estatus'];

    $nom = $recupera['nombre'];

	$password = $recupera['pass'];

	$asuntoText= "Recuperar Contraseña.";
	
	$envio = envioMail($email,$asuntoText,$password,$nom);

    header("location:/recupera.php?msj=$msj&status=$status");

}else{

	$msj = $recupera['msj'];

    header("location:/recupera.php?msj=$msj");

}
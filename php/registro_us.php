<?php

include '../funciones/cFunciones.php';

$tpo_registro = $_POST['tpo_registro'];

if ($tpo_registro == "login"){

    $usuario = $_POST['username'];

    $password = $_POST['password2'];

    $login= getLogin($usuario,$password);

    if ($login['estatus'] == true){

        header("location:/index.php");

    }else{

        $msj = $login['msj'];

        header("location:/registro.php?msj=$msj");

    }

}else{

    $response = $_POST["g-recaptcha-response"];

    if (/*!empty($response)*/true) {

        $secret = "6LdqN8gUAAAAAJrqeFcfA3jroIGHOh4xd64p8fy3";

        $ip = $_SERVER['REMOTE_ADDR'];

        $respuestaValidación = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");

        $jsonResponde = json_decode($respuestaValidación);

        if (/*$jsonResponde->success*/true) {

            $email = $_POST['email'];

            $nombre = $_POST['nombre'];

            $apellidos = $_POST['apellidos'];

            $empresa = $_POST['empresa'];

            $password = $_POST['password'];

            $telefono = $_POST['telefono'];

            $cifrado = password_hash($password, PASSWORD_DEFAULT);

            $registro = fnInsertUs($nombre,$apellidos,$email,$empresa,$password,$telefono,$cifrado);

            if ($registro['status_usuario']===false){

                $msj = $registro['msj'];

                $status = $registro['status'];

                header("location:/registro.php?msj=$msj");

            }else{

                if ($registro['status']===false){

                    $msj = $registro['msj'];

                    $status = $registro['status'];

                    header("location:/registro.php?msj=$msj");

                }else{

                    $msj = $registro['msj'];

                    $status = $registro['status'];

                    header("location:/registro.php?msj=$msj&status=$status");

                }

            }

        }else {

            header("location:/registro.php?mensaje=humanCaptcha");
            
            exit();

        }

    }else {

        header("location:/registro.php?mensaje=errorCaptcha");

        exit();
    }

}



<?php

include '../conexion/conexion2.php';
$tpo_registro = $_GET['tpo_registro'];

$p = $_GET['p'];
$id_p = $_GET['id'];


if ($tpo_registro == 'nuevo') {



    $response = $_POST["g-recaptcha-response"];

    if (!empty($response)) {
        $secret = "6LdqN8gUAAAAAJrqeFcfA3jroIGHOh4xd64p8fy3";
        $ip = $_SERVER['REMOTE_ADDR'];
        $respuestaValidación = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");

//Si queremos visualizar la información obtenida de la petición a la api de validación de Google para comprobar el estado de esta lo haremos con la función de PHP var_dump
//var_dump($respuestaValidación);

        $jsonResponde = json_decode($respuestaValidación);
        if ($jsonResponde->success) {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $usuario = $_POST['nombre'];
            $email = $_POST['email'];
            $empresa = $_POST['empresa'];
            $password = $_POST['password'];
            $telefono = $_POST['telefono'];
            $cifrado = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into clientes (nombre,apellidos,usuario,email,telfono,status,password,empresa)
          values('$nombre','$apellidos','$usuario','$email','$telefono','1','$cifrado','$empresa')";

            if ($conexion->query($sql) === TRUE) {
                $men3 = "registro";
                include '../correo/correo2.php';
                header("location:/registro.php?men3=$men3&id=$id_p&p=$p");
            } else {
                $conexion->error;
            }

            $conexion->close();
        } else {
//Google ha detectado que se trata de un proceso no humano
            header("location:/registro.php?mensaje=humanCaptcha");
            exit();
        }
    } else {
//si entra aquí significa que no se ha pulsado el Captcha
        header("location:/registro.php?mensaje=errorCaptcha");
        exit();
    }
} else {

    $usuario = $_POST['username'];
    $password = $_POST['password2'];

    $sql = "SELECT * FROM clientes WHERE email = '$usuario'";
    $result = $conexion->query($sql);



    if ($result->num_rows > 0) {
        $sql2 = "SELECT * FROM clientes WHERE email = '$usuario'";
        $result2 = $conexion->query($sql2);
        $row = $result2->fetch_array(MYSQLI_ASSOC);


        if (password_verify($password, $row['password'])) {

            session_start();

            while ($row = $result->fetch_assoc()) {
                $usuario = $row["usuario"];
                $nombre = $row["nombre"];
                $apellidos = $row["apellidos"];
                $email = $row["email"];
                $telefono = $row["telfono"];
                header("location:./Pagos.php?us=$usuario&id=$id_p&p=$p&nombre=$nombre&email=$email&telefono=$telefono&apellidos=$apellidos");
            }
            $_SESSION['loggedin'] = true;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 9000);
            $nom_usuario = $_SESSION['usuario'];
        } else {
            $men1 = "Correo o contrasenia incorrectos.";
            header("location:/registro.php?men1=$men1&id=$id_p&p=$p");
        }
    } else {
        $men2 = "El email no existe.";
        header("location:/registro.php?men2=$men2");
    }
}

<?php

echo $destinatario = 'ubonilla@3abranding.com.mx';
$asunto = "Nuevo Registro 3A BRANDING";
$cuerpo = "

    <!DOCTYPE html>
<html lang='en'>
    <head>
        <title>3ABRANDING GROUP</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
    </head>
    <body>

         <div class='jumbotron text-center'>
            
            <img src='http://3abranding.com/logos/logo_3a.png' height='50px'><h2>3A BRANDING GROUP</h2>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-sm-12'>                   
                    <h4>Datos Registro</h4>
                    <p>Nombre: <b>$nombre $apellidos</b></p>
                    <p>Email: $email</p>
                    <p>Empresa: $empresa</p>
                    <p>Telefono: $telefono</p>
                </div>
            </div>
            <hr>
            <div class='row'>
                <div class='col-sm-12 text-center'>
                    2019 © 3A Branding 
                </div>
            </div>

        </div>
    </body>
</html>     

";

//para el envÃ­o en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//direcciÃ³n del remitente
$headers .= "From:Registro 3A BRANDING GROUP <factura@3abranding.com>\r\n";

//direcciÃ³n de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: factura@3abranding.com\r\n";
//ruta del mensaje desde origen a destino
$headers .= "Return-path: factura@3abranding.com\r\n";

//direcciones que recibirÃ¡n copia oculta
$headers .= "Bcc: ubonilla09@gmail.com\r\n";

$headers .= "Bcc: contacto@3abranding.com\r\n";

$correo= mail($destinatario, $asunto, $cuerpo, $headers);



//mail("ubonilla09@gmail.com,ubonilla09@gmail.com","asuntillo","Este es el cuerpo del mensaje") ;
/*
require_once('../PHPMailer/class.phpmailer.php');

require_once('../PHPMailer/class.smtp.php');



$correo = new PHPMailer();

$correo->IsSMTP();
$correo->Host = "smtp.gmail.com";

$correo->SMTPAuth = true;



//$correo->Host = "smtp.office365.com";


$correo->Username = "3abcotizaciones@gmail.com"; //tu corrreo

$correo->Password = "3abra123456"; // tu clave

$correo->SMTPSecure = 'tls';

$correo->Port = 25;


$correo->SetFrom("3abcotizaciones@gmail.com", "COTIZACION 3A BRANDING GROUP"); //tu corrreo

$correo->AddAddress($c, $nom); //correo destino
$correo->addBCC('ubonilla@3abranding.com.mx');

$correo->Subject = "ID COTIZACION: " . $id; //asunto

$correo->MsgHTML("); //mensaje o cupor del correo



if (!$correo->Send()) {

   $envio= "Hubo un error: " . $correo->ErrorInfo;
} else {

   $envio=  "Mensaje enviado con exito.";
} 
 * 
 */



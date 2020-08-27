<?php




if (!isset($_REQUEST['id'])) {

    header("Location: VerCarta.php");
}


$nom=$_GET['n'];
$c = $_GET['e'];
$id= $_GET['id'];


include '../correo/correo.php';

$envio = envioCotizacion($c,$id,$nom);


$validaEnvio= $envio['correo'];

/*if ($validaEnvio="false"){

    echo "No notifico";

}else{
    */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="../logos/logo_3a.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Orden Completado - 3Abranding</title>
        <meta charset="utf-8">
        <style>
            .container{padding: 20px;}
            p{color: #34a853;font-size: 18px;}

        </style>
    </head>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" style="padding-top:100px">
                <img src="../logos/logo_3a.png">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12  text-center" style="padding-top:100px">
                <b><p>Su cotizacion ha sido enviado exitosamente. La ID de su cotizacion es #<?php echo $_GET['id']; ?></p></b>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12  text-center" style="padding-top:100px">
                <h3><?php //echo $envio?></h3>
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-warning" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="spinner-grow text-dark" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

ob_start();
 header('refresh: 4; url = http://3abranding.com');
ob_end_flush();

//}







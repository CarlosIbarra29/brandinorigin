<?php

session_start(); 

include_once './funciones/cFunciones.php';

$email= $_SESSION['email'];

$cotizaciones = fnGetCotizaciones($email);

?>



<!DOCTYPE html>
<html lang="es">

    <?php include './nav/cabecera.php'; ?>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link href="css/addons/datatables.min.css" rel="stylesheet">


    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php include './nav/nav_prin.php'; ?>
        
        <div class="container-fluid" style="padding: 5%;">
            <div class="row">

                <div class="col-md-12">

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Id Cotización</th>
                                <th class="th-sm">Ver</th>
                                <th class="th-sm">Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($cotizaciones as $key => $value):?>

                                <tr>
                                    <td><?php print $value['id']?></td>
                                    <td><a href="php/descarga_cot.php?id=<?php print $value['id']?>" target="_blank">Ver Ahora.</a></td>
                                     <td><?php print $value['created']?></td>

                                </tr>

                            <?php endforeach;?>  

                        </tbody>

                    </table>

                </div>
                
            </div>

        </div>



        <?php include './nav/footer.php'; ?>
        <?php include './nav/scripts.php'; ?>
    </body>
</html>





    

       
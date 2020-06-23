<?php
include '../conexion/conexion2.php';
$id_cot = $_GET['id'];


$sql2 = "select nombre,correo,telefono,sub_total from orden where id='$id_cot'";
$result2 = $conexion->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
    $nom = $row2["nombre"];
    $telefono = $row2["telefono"];
    $correo = $row2["correo"];
    $sub2 = $row2["sub_total"];
}
?>


<html lang="en">
    <head>
        <title>3A BRANDIG GROUP | Comercialización e impresión de artículos</title>
        <meta name="description" content="Artículos Promocionales 3A BRANDING GROUP, ofrecemos una amplia variedad en acabados, grabados, bordados y tipos de impresión."/>
        <meta property="locale" content="es_MX" />
        <meta property="type" content="website" />
        <meta property="title" content="3A BRANDIG GROUP | Comercialización e impresión de artículos" />
        <meta property="description" content="Artículos Promocionales 3A BRANDING GROUP, ofrecemos una amplia variedad en acabados, grabados, bordados y tipos de impresión." />
        <meta property="url" content="https://3abranding.com.mx/" />
        <meta property="site_name" content="3A BRANDIG GROUP | Comercialización e impresión de artículos" />
        <meta charset="utf-8">
        <meta name="viewport" content=" user-scalable=no">
        <link rel="shortcut icon" href="../logos/logo_3a.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../csc/global.css">
        <link rel="stylesheet" href="../csc/jquery-ui.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../csc/css_whats.css">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149878620-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-149878620-1');
        </script>



    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <div class="jumbotron text-center" style="padding-top: 50px;">
            <img src="../logos/logo_3a.png" class="logo">
        </div>

        <!-- Container (About Section) -->
        <div id="" class="container-fluid barra_menu">
            <div class="row">
                <div class="col-sm-4 text-center contenido_barra">
                    <span class="glyphicon glyphicon-envelope"></span>  Correo: contacto@3abranding.com 
                </div>
                <div class="col-sm-4 text-center contenido_barra">
                    <span class="glyphicon glyphicon-phone-alt"></span> Teléfono <a style="color: white;">52 7090 8638</a> o <a style="color: white;">52 7090 8639</a>
                </div>
                <div class="col-sm-4 text-center contenido_barra">
                    Redes Sociales       
                    <a href="https://twitter.com/"><img src="../redes_sociales/gorjeo.png" height="27px;"> </a> 
                    <a href="https://www.facebook.com/"><img src="../redes_sociales/facebook.png" height="27px;"> </a>
                    <a href="https://www.instagram.com"><img src="../redes_sociales/linkedin.png" height="25px;"></a> 
                </div>
            </div>
        </div>
        <div class="container-fluid"  id="seleccion">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Cotizacion   <img src="../logos/logo_3a.png" height="50px;"></h1>
                    <table border="1" width="100%">
                        <tr style="font-size: 11px;">
                            <th >Producto</th>
                            <th>Precio Unitario</th>
                            <th>Piezas</th>
                            <th>Color</th>
                            <th>Tintas</th>
                            <th>Tecnica</th>
                            <th>CostoTecnica</th>
                            <th>CostoTinta Extra</th>
                            <th>Costo Placa</th>
                            <th>Bordado Prenda</th>
                            <th>Sub total</th>
                            <th>IVA 16%</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $sql = "select * from orden_articulos where order_id='$id_cot'";
                        $result = $conexion->query($sql);

                        while ($item = $result->fetch_assoc()) {
                            ?>
                            <tr style="font-size: 11px;">
                                <td><?php echo $item["nombre_pro"]; ?></td>
                                <td><?php echo "$ " . number_format($item["precio_unitario"], 2) . " MX"; ?></td>
                                <td><?php echo $item["quantity"]; ?></td>
                                <td><?php echo $item["color"]; ?></td>
                                <td><?php echo $item["tinta"]; ?></td>
                                <td><?php echo $item["tecnica"]; ?></td>
                                <td><?php echo"$ " . number_format($item["costo_tecnica"], 2); ?></td>
                                <td><?php echo "$ " . number_format($item["costo_tinta_extra"], 2); ?></td>
                                <td>
                                    <?php
                                    $pla = $item['costo_placa'];
                                    if ($pla == "") {
                                        echo "$0.00";
                                    } else {
                                        echo"$ " . number_format($item["costo_placa"], 2);
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    $bor = $item['costo_bordado'];
                                    if ($bor == "") {
                                        echo "$0.00";
                                    } else {
                                        echo"$ " . number_format($item["costo_bordado"], 2);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sub = $item["sub_total"];
                                    echo "$ " . number_format($sub, 2) . "MX";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $iva = $sub * 0.16;
                                    echo "$ " . number_format($iva, 2) . "MX";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $total_general = $sub + $iva;
                                    echo "$ " . number_format($total_general, 2) . "MX";
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 text-right">
                    <h5>Sub Total: <b><?php echo "$" . $sub2 . " MX"; ?></b></h5>
                    <h5>Iva %: 
                        <b>
                            <?php
                            $iva2 = $sub2 * 0.16;
                            echo "$" . number_format($iva2, 2) . " MX";
                            ?>
                        </b>
                    </h5>
                    <h5>Total: 
                        <b>
                            <?php
                            $to_g = $sub2 + $iva2;
                            echo "$" . number_format($to_g, 2) . " MX";
                            ?>
                        </b>
                    </h5>
                </div>
            </div>

            <hr class="hr_p">

            <div class="row">
                <h4 class="modal-title">Cláusulas de compra.</h4>
                <p class="text-justify"><b>GARANTÍA 3A BRANDING GROUP, S.A. de C.V.</b> garantiza cualquier producto contra defecto de fabricación y de impresión por un lapso de 20 días naturales a partir de la fecha de entrega. Todo producto será repuesto por otro igual o del mismo precio. Las reclamaciones y aclaraciones se reciben por escrito vía correo electrónico en un plazo no mayor a 3 días naturales del vencimiento de la garantía.</p>
                <p class="text-justify">
                    <b>ENTREGA</b> El tiempo de entrega normal es de 7 a 10 días naturales a partir de la fecha de autorización de originales o diseños. No nos hacemos responsables por demoras imputables al cliente, ni por cambios hechos sobre las instrucciones iniciales.

                    Para la entrega de artículos sin impresión el tiempo será de 1 a 5 días naturales una vez confirmada la liquidación total del pedido. Los retrasos generados por el cliente afectan la fecha de entrega.

                    Para el embarque de pedidos foráneos contamos con convenios con paqueterías, ahorrando hasta el 30% en su envío. Todo envío incluye seguro de la mercancía.

                    Toda cancelación por parte del cliente será sujeta de cargo de un 25% correspondiente al valor de los artículos cancelados.

                    La entrega de los artículos estará sujeta sin responsabilidad por nuestra parte a retrasos imprevistos tales como: emergencia nacional, regulaciones gubernamentales, cambios en la legislación aduanera, restricciones comerciales, dificultad en el abastecimiento de materias primas, demoras en los medios de transporte, de caso fortuito o de fuerza mayor.
                </p>
                <p class="text-justify">
                    <b>CONDICIONES DE PAGO</b> Cualquier pedido requiere el 50% de anticipo incluyendo el IVA. El saldo del pedido deberá ser liquidado antes de la entrega o del embarque, en caso de tratarse de un pedido foráneo. 

                    Todos los pedidos se surtirán una vez que el abono de los depósitos o transferencias efectuadas por el cliente haya sido confirmado por el banco. En caso de realizar pagos a través de un depósito o transferencia bancaria, le solicitamos atentamente hacerlo referenciado (Nombre del Cliente), y notificar a nuestro departamento de cobranza vía correo electrónico cobranza@3abranding.com 

                    De acuerdo con el artículo 193 de la ley de títulos y operaciones de crédito, se cobrara el 20% sobre el valor del cheque, en caso de ser devuelto por falta de fondos.
                </p>
            </div>

        </div>
        <div class="row text-center">
            <a href="javascript:imprSelec('seleccion')" ><button class="btn-success btn-sm">Imprimir</button></a>
        </div>
        <br><br><br><br>
        <footer class="container-fluid text-center footer_color">
            <div id="float-cta">
                <span>Cotiza en tiempo real
                    ¡Envíanos un WhatsApp!
                </span>
                <a href=" https://wa.me/5215567919161">
                    <img src="../img_3a/whatsapp.png" height="55px">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>

            <p>2019 © 3A Branding - <a href="" style="color:#fff" data-toggle="modal" data-target="#myModal"> Aviso de Privacidad</a></p>
            <div class="modal fade" id="myModal" role="dialog" style="padding-top: 2px; ">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="color: black">Aviso de Privacidad. <img src="../logos/logo_3a.png" height="50px"></h4>
                        </div>
                        <div class="modal-body text-left" style="color: black">
                            <p>
                                De acuerdo a lo Previsto en la “Ley Federal de Protección de Datos Personales”, 
                                declara 3A BRANDING GROUP S.A. de C.V., ser una empresa legalmente constituida de conformidad con las 
                                leyes mexicanas, con domicilio en "DOMICILIO"; y como responsable del tratamiento de sus datos personales, hace de su conocimiento que la información 
                                de nuestros clientes es tratada de forma estrictamente confidencial por lo que al proporcionar sus datos 
                                personales, tales como: 
                            </p>
                            <p>
                                1.     Nombre <br>
                                2.     Teléfonos de Oficina y móviles<br>
                                3.     Correo Electrónico.<br>
                            </p>
                            <p>
                                Estos serán utilizados única y exclusivamente para los siguientes fines:  
                            </p>
                            <p>
                                1.     Contacto directo con la persona.<br>
                                2.     Información de Servicios y promociones.<br>
                                3.     Cualquier finalidad análoga o compatible con las anteriores.<br>
                            </p>
                            <p>
                                Para prevenir el acceso no autorizado a sus datos personales y con el fin de asegurar que la información 
                                sea utilizada para los fines establecidos en este aviso de privacidad, hemos establecido diversos procedimientos 
                                con la finalidad de evitar el uso o divulgación no autorizados de sus datos, permitiéndonos tratarlos debidamente.  
                                Así mismo, le informamos que sus datos personales pueden ser Transmitidos para ser tratados por personas distintas 
                                a esta empresa.   Todos sus datos personales son tratados de acuerdo a la legislación aplicable y vigente en el país, 
                                por ello le informamos que usted tiene en todo momento los derechos (ARCO) de acceder, rectificar, cancelar u oponerse
                                al tratamiento que le damos a sus datos personales; derecho que podrá hacer valer a través del Área de Privacidad 
                                encargada de la seguridad de datos personales en el Teléfono "55-55-55-55".
                                A través de estos canales usted podrá actualizar sus datos y especificar el medio por el cual desea recibir información, ya que,
                                en caso de no contar con esta especificación de su parte, 3A BRANDING GROUP S.A. de C.V, establecerá libremente el canal que considere pertinente
                                para enviarle información.  Este aviso de privacidad podrá ser modificado por 3A BRANDING GROUP  S.A. de C.V., dichas modificaciones serán oportunamente 
                                informadas a través de correo electrónico, teléfono, página web o cualquier otro medio de comunicación que 3A BRANDING GROUP S.A. de C.V., determine para tal efecto.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>

        </footer>
        <script language="Javascript">
            function imprSelec(nombre) {
                var ficha = document.getElementById(nombre);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print( );
                ventimp.close();
            }
        </script>

    </body>
</html>


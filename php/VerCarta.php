<?php
// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;


$cartItems = $cart->contents();
$ar = count($cartItems);
error_reporting(0);

$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$email = $_GET['email'];
$telefono = $_GET['telefono'];

//include './session_start.php';

$us = $_GET['us'];
?>

<script>
    $('.dropdown-toggle').click(function (e) {
        if ($(document).width() > 768) {
            e.preventDefault();

            var url = $(this).attr('href');


            if (url !== '#') {

                window.location.href = url;
            }

        }
    });
</script>

<style>
    @media only screen and (min-width: 768px) {
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    }
</style>


<html lang="en">
    <head>
        <meta name="description" content="Artículos promocionales, tazas, cilindros, termos, boligrafos, bolsos, mochilas promocionales  ajustamos cualquier presupuesto de la competencia" />
        <meta name="robots" content="INDEX,FOLLOW" />
        <meta name="keywords" content="venta de articulos promocionales, Articulos promocionales, regalos corporativos, promocionales, promocionales df, regalos promocionales, articulos publicitarios, productos promocionales, articulos publicidad, publicidad de productos, merchandising">
        <title>Articulos Promocionales | 3A Branding Group | Servicio, Calidad y Precio</title>
        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Articulos Promocionales | 3A Branding Group | Servicio, Calidad y Precio" />
        <meta property="og:description" content="Artículos promocionales, tazas, cilindros, termos, boligrafos, bolsos, mochilas promocionales  ajustamos cualquier presupuesto de la competencia" />
        <meta property="og:url" content="http://3abranding.com/" />
        <meta property="og:site_name" content="3A BRANDING GROUP" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="Artículos promocionales, tazas, cilindros, termos, boligrafos, bolsos, mochilas promocionales  ajustamos cualquier presupuesto de la competencia" />
        <meta name="twitter:title" content="Articulos Promocionales | 3A Branding Group | Servicio, Calidad y PreciO" />
        <meta property="og:image" content="http://3abranding.com.mx/logos/logo_3a.png" />




        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta http-equiv="cache-control" content="CACHE">
        <meta http-equiv="content-language" content="es">
        <meta name="google-site-verification" content="Psjonsr89EWkRTt464WNkntySMaSrUonBbetfSNswfE" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <link rel="shortcut icon" href="../logos/logo_3a.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../csc/global.css">
        <link rel="stylesheet" href="../csc/jquery-ui.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../csc/css_whats.css">




    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">



        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#myPage"><img src="../logos/logo_3a.png" height="35px"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="../index.php?num_ar=<?php echo $ar ?>&us=<?php echo $us ?>">Inicio</a></li>
                        <li><a href="../nosotros.php?num_ar=<?php echo $ar ?>&us=<?php echo $us ?>">Nosotros</a></li>
                        <li><a href="../productos.php?num_ar=<?php echo $ar ?>&us=<?php echo $us ?>">Productos</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a style="font-size: 11px" href="../event.php?num_ar=<?php echo $ar ?>&us=<?php echo $us ?>">Event Marketing</a></li>
                                <li><a style="font-size: 11px" href="../impresiones.php?num_ar=<?php echo $ar ?>&us=<?php echo $us ?>">Impresiones</a></li>
                                <li><a style="font-size: 11px" href="../stands.php?num_ar=<?php echo $ar ?>&us=<?php echo $us ?>">Stands</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catalogos
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a style="font-size: 11px" href="">Productos 2019</a></li>
                                <li><a style="font-size: 11px" href="">Productos 2020</a></li>
                            </ul>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="VerCarta.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ver Pedido(<?php echo $ar ?>)
                                <?php
                                if ($us == "") {
                                    
                                } else {
                                    echo '- Bienvenido ' . $us;
                                    ?>
                                    <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerra Session</a></li>
                                    <?php
                                }
                                ?>

                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron text-center" style="padding-top: 50px;">
            <img src="../logos/logo_3a.png" class="logo">
            <form method="get" action="../productos.php">
                <div class="col-sm-12">
                    <input type="text" class="form-control" style="border-radius: 50px;" required="" name="palabra_clave" id="coding_language" placeholder="¿Qué estás buscando?">
                    <span class="glyphicon glyphicon-search form-control-feedback" style="padding-right: 40px; color: #3c3c3c;"></span>
                </div>
            </form>
        </div>
        <br>


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
        <script type="text/javascript" src="../js/update_car.js">
        </script>
        <div class="container-fluid" style="padding: 20px 20px 200px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <h1>Cotizacion</h1>
                        <table class="table">
                            <thead>
                                <tr style="font-size: 11px;">
                                    <th>Producto</th>
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
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($cart->total_items() > 0) {


                                    $cartItems = $cart->contents();
                                    

                                    foreach ($cartItems as $item) {
                                        ?>
                                        <tr style="font-size: 11px;">

                                            <td><a href="../vistaproducto.php?id=<?php echo $item["id"] ?>&p=<?php echo $item['price'] ?>"><?php echo $item["name"]; ?></a></td>
                                            <td><?php echo "$ " . number_format($item["pu"], 2) . " MX"; ?></td>
                                            <td><?php echo $item["qty"]; ?></td>
                                            <td><?php echo $item["color"]; ?></td>
                                            <td><?php echo $item["tinta"]; ?></td>
                                            <td><?php echo $item["tecnica"]; ?></td>
                                            <td><?php echo"$ " . number_format($item["ctecnica"], 2); ?></td>
                                            <td><?php echo "$ " . number_format($item["ctinta"], 2); ?></td>
                                            <td><?php echo"$ " . number_format($item["cplaca"], 2); ?></td>
                                            <td><?php echo "$ " . number_format($item["cbordado"], 2); ?></td>

                                            <td>
                                                <?php
                                                $sub = $item["price"];
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
                                            <td>
                                                <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5"><p>Tu carta esta vacia.....</p></td>
                                    <?php } ?>
                            </tbody>
                            <tfoot>

                                <tr>
                                    <td colspan="6">
                                        <a href="../productos.php?us=<?php echo $us ?>&nombre=<?php echo $nombre ?>&email=<?php echo $email ?>&telefono=<?php echo $telefono ?>&apellidos=<?php echo $apellidos ?>&num_ar=<?php echo $ar ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Añadir Producto</a>
                                    </td>

                                    <?php
                                    if ($cart->total_items() > 0) {
                                        ?>

                                        <td colspan="2">
                                            <!-- <a href="Pagos.php" class="btn btn-success btn-block">Terminar Cotizacion</a>-->
                                            <!--<a href="" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Terminar Cotizacion</a>-->
                                            <!-- <a href="./Pagos.php?nombre=<?php //echo $nombre ?>&email=<?php //echo $email ?>&telefono=<?php //echo $telefono ?>&apellidos=<?php //echo $apellidos ?>" class="btn btn-success btn-block">Terminar Cotizacion</a>-->
                                            <a href="../registro.php?num_ar=<?php echo $ar  ?>" class="btn btn-success btn-block">Terminar Cotizacion</a>
                                        </td>


                                <div class="modal fade" style="padding: 10%;"  id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content" >
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Registre sus datos para proporcionar informacion detallada de sus productos.</h4>
                                            </div>
                                            <div class="modal-body" style="height:400px;">
                                                <form class="form-horizontal" action="Pagos.php" method="get">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Nombre:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo" required="">
                                                        </div><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Email:</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="email"  placeholder="email" required="">
                                                        </div><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Telefono:</label>
                                                        <div class="col-sm-10">
                                                            <input type="tel" class="form-control"  name="telefono" placeholder="55-555-555" required="">
                                                        </div><br>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-default input-sm" style="background-color: #a3091b; color:#fff">Enviar</button>
                                                            <button type="button" class="btn btn-default input-sm" style="background-color: #a3091b; color:#fff" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </form> 
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../nav/scripts.php'; ?>

        <br><br><br>


        <div class="container-fluid" style="background-color:#3c3c3c">
            <div class="row">
                <div class="col-sm-4">
                    <h4 style="color: white">3A BRANDING GROUP</h4>  
                    <p style="color: white">La forma más rápida y fácil de comprar promocionales.</p>
                    <p style="color: white">Conoce más de nosotros.</p>
                </div>
                <div class="col-sm-4">
                    <h4 style="color: white">USUARIOS</h4>  
                    <p ><a href="../productos.php" style="color: white">Cotiza aquí.</a></p>

                    <a href="" style="color:#fff" data-toggle="modal" data-target="#clau"> Cláusulas de compra.</a>
                </div>
                <div class="col-sm-4">
                    <h4 style="color: white">CONTACTO</h4>  
                    <p style="color: white">WhatsApp:   +52 1 55 6791 9161</p>
                    <p style="color: white">(55) 7090 8638 | (55) 7090 8639</p>
                    <p style="color: white">contacto@3abranding.com</p>	


                </div>
            </div>
        </div>

        <div class="modal fade" id="clau" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cláusulas de compra.</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>GARANTÍA 3A BRANDING GROUP, S.A. de C.V.</b> garantiza cualquier producto contra defecto de fabricación y de impresión por un lapso de 20 días naturales a partir de la fecha de entrega. Todo producto será repuesto por otro igual o del mismo precio. Las reclamaciones y aclaraciones se reciben por escrito vía correo electrónico en un plazo no mayor a 3 días naturales del vencimiento de la garantía.</p>
                        <p>
                            <b>ENTREGA</b> El tiempo de entrega normal es de 7 a 10 días naturales a partir de la fecha de autorización de originales o diseños. No nos hacemos responsables por demoras imputables al cliente, ni por cambios hechos sobre las instrucciones iniciales.

                            Para la entrega de artículos sin impresión el tiempo será de 1 a 5 días naturales una vez confirmada la liquidación total del pedido. Los retrasos generados por el cliente afectan la fecha de entrega.

                            Para el embarque de pedidos foráneos contamos con convenios con paqueterías, ahorrando hasta el 30% en su envío. Todo envío incluye seguro de la mercancía.

                            Toda cancelación por parte del cliente será sujeta de cargo de un 25% correspondiente al valor de los artículos cancelados.

                            La entrega de los artículos estará sujeta sin responsabilidad por nuestra parte a retrasos imprevistos tales como: emergencia nacional, regulaciones gubernamentales, cambios en la legislación aduanera, restricciones comerciales, dificultad en el abastecimiento de materias primas, demoras en los medios de transporte, de caso fortuito o de fuerza mayor.
                        </p>
                        <p>
                            <b>CONDICIONES DE PAGO</b> Cualquier pedido requiere el 50% de anticipo incluyendo el IVA. El saldo del pedido deberá ser liquidado antes de la entrega o del embarque, en caso de tratarse de un pedido foráneo. 

                            Todos los pedidos se surtirán una vez que el abono de los depósitos o transferencias efectuadas por el cliente haya sido confirmado por el banco. En caso de realizar pagos a través de un depósito o transferencia bancaria, le solicitamos atentamente hacerlo referenciado (Nombre del Cliente), y notificar a nuestro departamento de cobranza vía correo electrónico cobranza@3abranding.com 

                            De acuerdo con el artículo 193 de la ley de títulos y operaciones de crédito, se cobrara el 20% sobre el valor del cheque, en caso de ser devuelto por falta de fondos.


                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152042099-1"></script>
        <script>
                                            window.dataLayer = window.dataLayer || [];
                                            function gtag() {
                                                dataLayer.push(arguments);
                                            }
                                            gtag('js', new Date());

                                            gtag('config', 'UA-152042099-1');
        </script>


        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-NZ6GPZD');</script>
        <!-- End Google Tag Manager -->


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


    </body>
</html>

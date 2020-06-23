<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
        <script src="js/slide.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="theCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">


                            <?php
                            include './conexion/conexion.php';
                            $sqlQuery = "SELECT * FROM productos";
                            $resultado = $conexion->query($sqlQuery);
                            $setActive = 0;
                            $sliderHtml = '';

                            while ($producto = $resultado->fetch_assoc()) {
                                $activeClass = "";
                                if (!$setActive) {
                                    $setActive = 1;
                                    $activeClass = 'active';
                                }
                                ?>
                                <div class="item <?php echo $activeClass ?>">
                                    <div class="panel panel-default text-center">
                                        <div class="row">
                                            <div class="col">
                                                <span><div class="badge color_badge" style="font-size: 15px;">Desde $<?php echo $producto['precio']; ?></div></span>
                                            </div>
                                        </div>
                                        <img src="<?php echo $producto['imagen']; ?>" height="175px">
                                        <h4><b><?php echo $producto['nombre']; ?></b></h4>
                                        <input type="color" class="paleta_color">


                                        <div class="panel-body">
                                            <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                                        </div>
                                        <div class="panel-footer">
                                            <button class="btn btn-sm">Cotizar</button>
                                        </div>
                                    </div>  
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>

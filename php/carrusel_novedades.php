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
                <h4><b><?php echo $producto['nombre']; ?></b></h4>
                <img src="<?php echo $producto['imagen']; ?>" height="150px">
                <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                <div class="panel-footer">
                    <form action="./productos.php?id=<?php echo $producto['id'];?>" method="post">
                        <button type="submit" class="btn btn-sm">Cotizar</button>
                    </form>
                </div>
            </div>  
        </div>
        <?php
    }
    ?>
</div>
<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
<a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>

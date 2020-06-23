

<?php
error_reporting(0);
require('./conexion/conexion.php');
/* todas */$v_cat = $_GET['v_cat'];
/* por nombre */$v_nom = $_GET ['v_nom'];
/* por nombre */$color = $_GET ['color'];
$v_clave = $_GET['palabra_clave'];


/* valores busqueda avanzada */
$precio_uno = $_GET['precio1'];
$precio_dos = $_GET['precio2'];
$categoria_a = $_GET['categoria_a'];
$color_a = $_GET['color_a'];

$num_pag = $_GET['pag'];

if (isset($num_pag)) {
    $num_pag = $_GET['pag'];
} else {
    $num_pag = 12;
}





if ($v_nom == null) {

    if (isset($v_clave)) {
        $consulta = "Select COUNT(*) as total_products From catalogo c
                     inner join productos p on c.modelo = p.modelo
                     Where Match(c.modelo,c.nombre,c.descripcion,c.color,c.categoria) AGAINST ('$v_clave');";
    } else if (isset($precio_uno, $precio_dos, $categoria_a, $color_a)) {
        $consulta = "SELECT COUNT(*) AS total_products FROM 
            productos p,
            catalogo c
            WHERE
            p.categoria_padre = '$categoria_a' and 
            p.precio BETWEEN '$precio_uno' AND '$precio_dos' and 
            c.color= '$color_a' and
            p.modelo = c.modelo;";
    } else if (isset($v_cat)) {
        $consulta = "SELECT COUNT(*) as total_products FROM productos where categoria_padre='$v_cat'";
    } else {
        $consulta = "SELECT count(distinct categoria) as total_products FROM productos ORDER BY RAND();";
    }
    $result = $conexion->query($consulta);
    $row = $result->fetch_assoc();


    $num_total_rows = $row['total_products'];
    ?>



    <?php
    if ($num_total_rows > 0) {
        $page = false;
        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        if (!$page) {
            $start = 0;
            $page = 1;
        } else {
            $start = ($page - 1) * $num_pag;
        }
        //calculo  total de paginas
        $total_pages = ceil($num_total_rows / $num_pag);
        ?>


        <?php
        if (isset($v_cat)) {
            ?><br>
            <p>Categoría: <b><?php echo $v_cat ?>.</b></p>  
            <p>Se encontraron <b><?php echo "'" . $num_total_rows . "'" ?></b> resultados.</p>  
            <?php
            $result = $conexion->query('SELECT * FROM productos where categoria_padre ="' .
                    $v_cat . '" ORDER BY precio ASC LIMIT ' . $start . ', ' . $num_pag);
        } else if (isset($v_clave)) {
            ?>
            <br>
            <p>Palabra busqueda: <b><?php echo "'" . $v_clave . "'" ?></b></p>  
            <p>Se encontraron <b><?php echo "'" . $num_total_rows . "'" ?></b> resultados.</p>  
            <?php
            $result = $conexion->
            query('SELECT c.modelo,c.id_pro, c.nombre,c.img,p.precio FROM catalogo c 
            inner join productos p on c.modelo = p.modelo Where Match(c.modelo,c.nombre,c.descripcion,c.color,c.categoria)AGAINST("' .
            $v_clave.'")  LIMIT ' . $start . ', ' . $num_pag);
        } else if (isset($precio_uno, $precio_dos, $categoria_a, $color_a)) {
            ?>
            <br>
            <p>Busqueda Avanzada: <b><br><br><?php echo "Precio Inicial: '$" . $precio_uno . "' , Precio Final:  $" . $precio_dos . "' , Categoria:  " . $categoria_a . "' , Color: " . $color_a . "'" ?></b></p>  
            <p>Se encontraron <b><?php echo "'" . $num_total_rows . "'" ?></b> resultados.</p>  
            <?php
            $result = $conexion->query('
                    SELECT 
                    p.modelo,
                    p.nombre,
                    p.img,
                    p.precio,
                    c.color
                    FROM
                    productos p,
                    catalogo c
                    WHERE
                    p.categoria_padre = "' . $categoria_a . '" and 
                    p.precio BETWEEN "' . $precio_uno . '" AND "' . $precio_dos . '" and 
                    c.color= "' . $color_a . '" and
                    p.modelo = c.modelo order by p.precio asc
                    LIMIT ' . $start . ', ' . $num_pag);
        } else {
            $result = $conexion->query('SELECT * FROM productos  ORDER BY RAND()  LIMIT ' . $start . ', ' . $num_pag);
        }
        if ($result->num_rows > 0) {
            ?>
            <articles class="row">
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <article class="col-md-3" style="padding: 10px 10px 10px;" >
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <a class="img-thumbnail" href="./vistaproducto.php?id=<?php echo $row['modelo'] ?>&p=<?php echo $row['precio'] ?>&us=<?php echo $us ?>&num_ar=<?php echo $articulos ?>" style="color: #fff; padding: 1%;" data-title="<?php echo $row['modelo'] ?>">
                                    <img  title="<?php echo $row['modelo']; ?>" alt="<?php echo $row['modelo']; ?>" src="<?php echo $row['img']; ?>" height="200px">
                                    <p class="productos">Desde <b>$<?php
                                            $precio = $row['precio'];
                                            echo number_format($precio / 0.85, 2);
                                            ?></b></p><br>
                                </a><br><a style="color: transparent">-</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <form action="./vistaproducto.php?id=<?php echo $row['modelo'] ?>&p=<?php echo $row['precio'] ?>" method="post">
                                    <button class="btn btn-default" style="background-color:#3c3c3c; color: white">Cotizar</button>
                                </form>
                             
                            </div>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </articles>
            <?php
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="./productos.php" class="close" data-dismiss="alert" aria-label="close">&times;</a><br>
                <strong>Sin Resultado de busqueda!</strong>.
            </div>
            <?php
        }
        ?>
        <nav class="text-center">
            <ul class="pagination pagination-small pagination">
                <?php
                if (isset($v_clave)) {
                    ?>
                    <h4><a style="cursor: pointer; font-size: 14px; color: #3c3c3c;" href="./productos.php?palabra_clave=<?php echo $v_clave ?>&pag=<?php echo $num_pag * 2 ?>">Ver Más</a></h4>
                    <h4><a href="#myPage" title="To Top" ><span class="glyphicon glyphicon-chevron-up"></span></a></h4>
                    <?php
                    if ($total_pages > 1) {
                        if ($page != 1) {
                            ?>
                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page - 1) ?>&palabra_clave=<?php echo $v_clave ?>"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($page == $i) {
                                ?>
                                <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
                                <?php
                            } else {
                                ?>
                                <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo $i ?>&palabra_clave=<?php echo $v_clave ?>"><?php echo $i ?></a></li>
                                <?php
                            }
                        }
                        if ($page != $total_pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page + 1) ?>&palabra_clave=<?php echo $v_clave ?>"><span aria-hidden="true">&raquo;</span></a></li>
                            <?php
                        }
                    }
                } else if (isset($precio_uno, $precio_dos, $categoria_a, $color_a)) {
                    ?>
                    <h4><a style="cursor: pointer; font-size: 14px; color: #3c3c3c;" href="./productos.php?pag=<?php echo $num_pag * 2 ?>&precio1=<?php echo $precio_uno ?>&precio2=<?php echo $precio_dos ?>&categoria_a=<?php echo $categoria_a ?>&color_a=<?php echo $color_a ?>">Ver Más</a></h4>
                    <?php
                    if ($total_pages > 1) {
                        if ($page != 1) {
                            ?>

                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page - 1) ?>&precio1=<?php echo $precio_uno ?>&precio2=<?php echo $precio_dos ?>&categoria_a=<?php echo $categoria_a ?>&color_a=<?php echo $color_a ?>"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($page == $i) {
                                ?>
                                <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
                                <?php
                            } else {
                                ?>
                                <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo $i ?>&precio1=<?php echo $precio_uno ?>&precio2=<?php echo $precio_dos ?>&categoria_a=<?php echo $categoria_a ?>&color_a=<?php echo $color_a ?>"><?php echo $i ?></a></li>
                                <?php
                            }
                        }
                        if ($page != $total_pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page + 1) ?>&precio1=<?php echo $precio_uno ?>&precio2=<?php echo $precio_dos ?>&categoria_a=<?php echo $categoria_a ?>&color_a=<?php echo $color_a ?>"><span aria-hidden="true">&raquo;</span></a></li>
                            <?php
                        }
                    }
                } else if (isset($v_cat)) {
                    ?>
                    <h4><a style="cursor: pointer; font-size: 14px; color: #3c3c3c;" href="./productos.php?pag=<?php echo $num_pag * 2 ?>&v_cat=<?php echo $v_cat ?>">Ver Más</a></h4>
                    <h4><a href="#myPage" title="To Top" ><span class="glyphicon glyphicon-chevron-up"></span></a></h4>
                    <?php
                    if ($total_pages > 1) {
                        if ($page != 1) {
                            ?>

                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page - 1) ?>&v_cat=<?php echo $v_cat ?>"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($page == $i) {
                                ?>
                                <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
                                <?php
                            } else {
                                ?>
                                <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo $i ?>&v_cat=<?php echo $v_cat ?>&paginacion=<?php echo$num_pag = $_GET['paginacion']; ?>"><?php echo $i ?></a></li>
                                <?php
                            }
                        }
                        if ($page != $total_pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page + 1) ?>&v_cat=<?php echo $v_cat ?>&paginacion=<?php echo$num_pag = $_GET['paginacion']; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <a href="productos.php"><button class="btn btn-default"  style="background-color:#3c3c3c; color: white"><span class="glyphicon glyphicon-shopping-cart"></span> Ver todos los productos</button></a>

                    <?php
                 
                }
                ?>
            </ul>
        </nav>
        <?php
    } else {
        echo 'sin resultados de busqueda';
    }
    $conexion->close();
    ?>

    <?php
} else {
    ?>
    <ul class="row items" style="list-style: none;">
        <?php
        $query_nom = "select * from catalogo where modelo ='$v_nom'";
        $resultado = $conexion->query($query_nom);
        while ($row1 = $resultado->fetch_assoc()) {
            ?>
            <li class="col-lg-4">
                <a href="./vista_producto.php?id=<?php echo $row1['modelo'] ?>" style="color: #fff">
                    <div class="panel panel-default text-center">
                        <br>
                        <h3 style="font-size: 15px; color: red;"><b>Desde $ <?php echo $row1['precio']; ?></b></h3>
                        <img  src="<?php echo $row1['img']; ?>" height="100p" width="100">
                        <h4><b><?php echo $row1['nombre'] ?></b></h4>
                        <hr class="hr_p">
                        <p>
                            <button type="button" class="btn btn-primary btn-sm" style="width: 200px">
                                <span class="glyphicon glyphicon-eye-open"></span> Ver
                            </button>
                        </p>
                    </div>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>


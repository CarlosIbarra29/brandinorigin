<?php
error_reporting(0);
require('./conexion/conexion.php');
$v_cat = $_GET['v_cat'];
$nombre = $_GET ['v_nom'];
$palabra_clave = $_POST['palabra_clave'];


if (isset($nombre)) {
     ?>
    <ul class="row items" style="list-style: none;">
        <?php
        $query_nom = "select distinct nombre,precio,imagen,descripcion,id_pro from productos where nombre ='$nombre'";
        $resultado = $conexion->query($query_nom);
        while ($row1 = $resultado->fetch_assoc()) {
            ?>
            <li class="col-lg-4">
                <a href="./vista_producto.php?id=<?php echo $row1['id_pro'] ?>" style="color: #fff">
                    <div class="panel panel-default text-center">
                        <br>
                        <h3 style="font-size: 15px; color: red;"><b>Desde $ <?php echo $row1['precio']; ?></b></h3>
                        <img  src="<?php echo $row1['imagen']; ?>" height="100p" width="100">
                        <h4><b><?php echo $row1['nombre'] ?></b></h4>
                        <p class="description_short" style="color:#3c3c3c"><?php echo $row1['descripcion']; ?></p>
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
} else {
    if (isset($v_cat)) {
        $consulta = "SELECT COUNT(*) as total_products FROM productos where id_cat='$v_cat'";
    } elseif (isset($palabra_clave)) {
        $consulta = "Select COUNT(*) as total_products From productos Where Match(nombre, descripcion) AGAINST ('" . $palabra_clave . "');";
    } else {
        $consulta = "SELECT COUNT(*) as total_products FROM productos";
    }

    $result = $conexion->query($consulta);
    $row = $result->fetch_assoc();
    $num_total_rows = $row['total_products'];
    ?>


    <div id="content" class="col-sm-12">
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
                $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
            }
            //calculo  total de paginas
            $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);



            
            if (isset($palabra_clave)){
                $result = $conexion->query('SELECT * FROM productos Where Match(nombre, descripcion) AGAINST ("' . $palabra_clave . '") LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGE);
            }elseif (isset ($v_cat)) {
                 $result = $conexion->query('SELECT * FROM productos where id_cat ="' . $v_cat . '" ORDER BY nombre DESC LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGE);
            }else{
                $result = $conexion->query('SELECT * FROM productos ORDER BY id_pro DESC LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGE);
            }

            //$result = $conexion->query('SELECT * FROM productos ORDER BY id_pro DESC LIMIT ' . $start . ', ' . NUM_ITEMS_BY_PAGE);

            


            if ($result->num_rows > 0) {
                ?>
                <ul class="row items" style="list-style: none;">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <li class="col-lg-4">
                            <a href="./vista_producto.php?id=<?php echo $row['id_pro'] ?>" style="color: #fff">
                                <div class="panel panel-default text-center">
                                    <br>
                                    <h3 style="font-size: 15px; color: red;"><b>Desde $ <?php echo $row['precio']; ?></b></h3>
                                    <img  src="<?php echo $row['imagen']; ?>" height="100p" width="100">
                                    <h4 style="font-size: 13px;"><b><?php echo $row['nombre'] ?></b></h4>
                                    <p class="description_short" style="color: #3c3c3c"><?php echo $row['descripcion']; ?></p>

                                    <hr class="hr_p">
                                    <p>
                                        <button type="button" class="btn btn-primary btn-sm" style="width: 200px">
                                            <span class="glyphicon glyphicon-eye-open"></span> Ver
                                        </button>
                                    </p>
                                </div>
                        </li>
                        </a>
                        <?php
                    }
                    ?>
                </ul>
                <?php
            }
            ?>

            <nav>
                <ul class="pager pager-sm">
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
                                <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo $i ?>&v_cat=<?php echo $v_cat ?>"><?php echo $i ?></a></li>
                                <?php
                            }
                        }
                        if ($page != $total_pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page + 1) ?>&v_cat=<?php echo $v_cat ?>"><span aria-hidden="true">&raquo;</span></a></li>
                                <?php
                            }
                        }
                        ?>
                </ul>
            </nav>
            <?php
        }
    }
    $conexion->close();
    ?>

</div>
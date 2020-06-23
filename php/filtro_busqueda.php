
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <nav class="navbar navbar-default" role="navigation">
                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="font-size: 20px">Categorías.</a>
                </div>
                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul>
                        <?php
                        include './conexion/conexion2.php';
                        $query = $conexion->query("SELECT img_cat,nombre_cat FROM categorias ORDER BY nombre_cat asc; ");
                        while ($valores = mysqli_fetch_array($query)) {
                            ?>
                        <li class="divider" style="list-style: none"><img src="<?php echo $valores['img_cat'] ?>" height="15px"> <a style="color: #3c3c3c; font-size: 10px;"  href="./productos.php?v_cat=<?php echo $valores['nombre_cat'] ?>"><?php echo strtoupper($valores['nombre_cat']) ?></a></li>
                        <?php }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-sm-10">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse_dos">
                        <span class="sr-only">Desplegar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="font-size: 20px">Búsqueda.</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse_dos">
                    <form action="productos.php" method="get">
                        <div class="row">
                            <label class="control-label col-xs-1"></label>
                            <div class="col-sm-4">

                            </div>
                            <label class="control-label col-xs-1"></label>
                            <div class="col-sm-4">

                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label col-xs-1">Precio:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-sm" placeholder="$0.00 min" required="" name="precio1">
                            </div>
                            <label class="control-label col-xs-1"></label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-sm" placeholder="$0.00 max" required="" name="precio2">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="control-label col-sm-1">Categoria:</label>
                            <div class="col-sm-4">
                                <select class = "form-control input-sm" name = "categoria_a" required = "required">
                                    <option></option>
                                    <?php include './php/cbo_categorias.php';
                                    ?>
                                </select>
                            </div>
                            <label class="control-label col-sm-1" >Color:</label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="color_a">
                                    <?php include './php/cbo_colores.php'; ?>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-danger input-sm">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
            <?php include './php/productos_consulta.php'; ?>
        </div>
    </div>
</div>
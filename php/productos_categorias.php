
<?php 

include './funciones/cFunciones.php';

$v_clave = $_GET['palabra_clave'];

$categorias = $_GET['categoria'];

$productos = $_GET['productos'];

$filtro = $_GET['filtro'];

$colores_filtro= fnGetColoresFiltro();

$categorias_filtro=fnGetCat_Pro();

$num_pag = $_GET['pag'];

if (isset($num_pag)) {

    $num_pag = $_GET['pag'];

} else {

    $num_pag = 12;

}

$page = false;

if (isset($_GET["page"])) {

    $page = $_GET["page"];
}

if (!$page) {
    $start = 0;
    $page = 1;
} else {
    $start = ($page - 1) * $num_pag;
}


if (isset($v_clave)):

    $busqueda_total = fnGetBusquedaProductosCount($v_clave);

    $num_total_rows = $busqueda_total[0]['TOTAL'];

    $result = fnGetBusqueda($v_clave,$start,$num_pag);

endif;?>


<?php if (isset($categorias)):

    $busqueda_categorias = fnGetBusquedaProductosCategoriaCount($categorias);

    $num_total_rows = $busqueda_categorias[0]['TOTAL'];

    $result = fnGetBusquedaCategorias($categorias,$start,$num_pag);
    
endif;?>



<?php

if (isset($productos)):

   $num_total_rows =1; 

   include 'cat_productos.php';
    
endif;?>

<?php if(isset($filtro)):

    $categoria=$_POST['categoria'];

    $precio1=$_POST['precio1'];

    $precio2=$_POST['precio2'];

    $color= $_POST['color']; 

    $filtroBusqueda = fnGetFiltroProductosCount($categoria,$precio1,$precio2,$color);

    $num_total_rows= $filtroBusqueda[0]['TOTAL'];

    $result = fnGetFiltroProductos($categoria,$precio1,$precio2,$color,$start,$num_pag);


endif;?>




<?php if ($num_total_rows > 0): ?>
   

    <?php if ($productos== NULL):?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h4>Se encontraron <b>"<?php print $num_total_rows ?>"</b> registros.
                    </h4>
                </div>
            </div>
        </div>

    <?php endif;?>  

 <?php if ($productos== NULL):?>
 <div class="container col-md-12">

    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
        <articles class="row">
            <h3>Busqueda Avanzada</h3>
             <hr class="hr_p">
             <a href="#busquedas" class="btn btn-info" data-toggle="collapse">Buscar Ahora</a>
             <br>

             <div id="busquedas" class="collapse">
                <form action="productos.php?filtro=filtro" method="post"> <br>
                    <div class="row">
                        <label class="control-label col-xs-12">Precio:</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control input-sm" placeholder="$0.00 min" required="" name="precio1">
                        </div>
                        <label class="control-label col-xs-1"></label>
                        <div class="col-sm-12 col-xs-12">
                            <input type="number" class="form-control input-sm" placeholder="$0.00 max" required="" name="precio2">
                        </div>
                    </div><br>

                    <div class="row">
                    <label class="control-label col-sm-6 col-xs-6">Categoria:</label>
                    <label class="control-label col-sm-6 col-xs-6" >Color:</label>

                        <div class="col-sm-6 col-xs-6">
                            <select class = "form-control input-sm" required="" name = "categoria" >
                                <option></option>    
                                <?php foreach ($categorias_filtro as $key => $value):?>
                                    <option value="<?php print $value['nombre_cat'] ?>"><?php print $value['nombre_cat'] ?></option>
                                <?php endforeach; ?>
                                     
                            </select>
                        </div>

                        <div class="col-sm-6 col-xs-6">
                            <select class="form-control input-sm" required="" name="color">
                                <option></option>
                                <?php foreach ($colores_filtro as $key => $value):?>
                                    <option value="<?php print $value['color'] ?>"><?php print $value['color'] ?></option>
                                <?php endforeach; ?>    
                            </select>
                        </div><br>
                        <label class="control-label col-xs-12"></label>

                        <div class="col-xs-12"> <br>
                            <button type="submit" class="btn btn-danger input-md"><h4>Buscar</h4></button>
                        </div>
                    </div>
                </form>
            </div>
        </articles>
    </div>
<?php endif;?>  
<div class="col-md-8 col-sm-12 col-xs-12 text-center">
    <articles class="row">
        <?php foreach ($result as $k => $v): ?>
            <article class="col-md-4 col-sm-4 col-xs-6" style="padding: 1px 1px 1px;" >
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a class="img-thumbnail" href="./vistaproducto.php?id=<?php echo $v['modelo']?>&img=<?php echo $v['modelo'] ?>" 
                            style="color: #fff; padding: 1%;" data-title="<?php echo $v['modelo'] ?>">
                            
                            <img  title="<?php echo $v['modelo']; ?>" alt="<?php echo $v['modelo']; ?>" src="<?php echo $v['img']; ?>" height="130px">

                            <?php if(isset($_SESSION['usuario'])):?>

                                <p class="productos" style="font-size: 12px; color: red;"><b>$<?php print $v['precio'];?></b></p>

                            <?php endif;?>
                            
                        </a><br>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-12 text-center">
                         <p class="productos" style="font-size: 10px"><b>$<?php print $modelo = $v['nombre'];?></b></p>

                        <form action="./vistaproducto.php?id=<?php echo $v['modelo'] ?>&img=<?php echo $v['modelo'] ?>" method="post">

                            <button class="btn btn-default" style="background-color:#3c3c3c; color: white">Cotizar</button>

                        </form>
                        <br>
                    </div>
                </div>
            </article>
        <?php endforeach; ?> 
    </articles>
</div>

<?php else: ?>

    <div class="alert alert-danger alert-dismissible fade in">
        <a href="./productos.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <br>
        <strong>Sin Resultado de busqueda!</strong>.
    </div>

<?php endif; ?>
</div>
<nav class="text-center">
    <ul class="pagination pagination-small pagination">
        <?php 

        $total_pages = ceil($num_total_rows / $num_pag); 

        if(isset($v_clave)){

            $urlpag= "palabra_clave=".$v_clave;

        }else{

            $urlpag= "categoria=".$categorias;
        }

        ?>


        <?php if($productos==NULL):?>

            <h4>
                <a style="cursor: pointer; font-size: 14px; color: #3c3c3c;" href="./productos.php?<?php print $urlpag ?>&pag=<?php echo $num_pag * 2 ?>">Ver Más</a>
            </h4>
            <h4>
                <a href="#myPage" title="To Top" ><span class="glyphicon glyphicon-chevron-up"></span></a>
            </h4>

        <?php endif;?>



        <?php  if ($page != 1):?>

            <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page - 1) ?>&<?php print $urlpag ?>"><span aria-hidden="true">&laquo;</span></a>
            </li>

        <?php endif;?>
        
        <?php if ($total_pages < 10) {

            for ($i = 1; $i <= $total_pages; $i++):

                if ($page == $i):?>

                    <?php if ( $productos=='ALL'): ?>

                    <?php else:?>

                        <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>

                    <?php endif; ?>     
                  
                <?php else: ?>

                    <li class="page-item">
                        <a class="page-link" href="productos.php?page=<?php echo $i ?>&<?php print $urlpag ?>"><?php echo $i ?></a>
                    </li>

                <?php endif;

            endfor;

        } else {

            for($i=max(1, min($page-5,$total_pages-10)); $i < max(11, min($page+5,$total_pages+1)); $i++):

                if ($page == $i): ?>

                    <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>

                <?php else :?>

                    <li class="page-item">
                        <a class="page-link" href="productos.php?page=<?php echo $i ?>&<?php print $urlpag ?>"><?php echo $i ?></a>
                    </li>

                <?php endif;?>

            <?php endfor; 

        }

        if ($page != $total_pages): ?>

            <li class="page-item">
                <a class="page-link" href="productos.php?page=<?php echo ($page + 1) ?>&<?php print $urlpag ?>">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        <?php endif; ?>
    </ul>
</nav>

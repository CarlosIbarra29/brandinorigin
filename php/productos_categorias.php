<?php 


include './conexion/conexion.php';

include './funciones/cFunciones.php';


$v_clave = $_GET['palabra_clave'];
$categorias = $_GET['categoria'];
$productos = $_GET['productos'];

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


<?php if (isset($productos)):

   $num_total_rows =1; 

   include 'categorias.php';
    
endif;?>

<?php if ($num_total_rows > 0): ?>

    <?php if ($productos== NULL):?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-4 text-center">
                    <h4>Se encontraron <b>"<?php print $num_total_rows ?>"</b> registros.</h4>
                </div>
            </div>
        </div>

    <?php endif;?>    

    <articles class="row">
        <?php foreach ($result as $k => $v): ?>
            <article class="col-md-2 col-sm-6 col-xs-4" style="padding: 1px 1px 1px;" >
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a class="img-thumbnail" href="./vistaproducto.php?id=<?php echo $v['modelo']?>&img=<?php echo $v['modelo'] ?>&num_ar=<?php print $articulos?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['modelo'] ?>">  
                            
                            <img  title="<?php echo $v['modelo']; ?>" alt="<?php echo $v['modelo']; ?>" src="<?php echo $v['img']; ?>" height="150px">

                            <p class="productos">Desde <b>$<?php $precio = $v['precio']; echo number_format($precio / 0.85, 2);?></b></p>
                           
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <form action="./vistaproducto.php?id=<?php echo $v['modelo'] ?>&img=<?php echo $v['modelo'] ?>&num_ar=<?php print $articulos?>" method="post">
                            <button class="btn btn-default" style="background-color:#3c3c3c; color: white">Cotizar</button>
                        </form>
                    </div>
                </div>
            </article>

        <?php endforeach; ?>
    </articles>
            
<?php else: ?>

    <div class="alert alert-danger alert-dismissible fade in">
        <a href="./productos.php" class="close" data-dismiss="alert" aria-label="close">&times;</a><br>
        <strong>Sin Resultado de busqueda!</strong>.
    </div>

<?php endif; ?>

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

            <h4><a style="cursor: pointer; font-size: 14px; color: #3c3c3c;" href="./productos.php?<?php print $urlpag ?>&pag=<?php echo $num_pag * 2 ?>">Ver Más</a></h4>
            <h4><a href="#myPage" title="To Top" ><span class="glyphicon glyphicon-chevron-up"></span></a></h4>

        <?php endif;?>

            
            <?php
            if ($total_pages > 1) {
                if ($page != 1) {
                    ?>
                    <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page - 1) ?>&<?php print $urlpag ?>"><span aria-hidden="true">&laquo;</span></a></li>
                    <?php
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($page == $i) {
                        ?>
                        <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo $i ?>&<?php print $urlpag ?>"><?php echo $i ?></a></li>
                        <?php
                    }
                }
                if ($page != $total_pages) {
                    ?>
                    <li class="page-item"><a class="page-link" href="productos.php?page=<?php echo ($page + 1) ?>&<?php print $urlpag ?>"><span aria-hidden="true">&raquo;</span></a></li>
                    <?php
                }
            }
       
        ?>
    </ul>
</nav>






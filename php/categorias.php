<?php

//include './funciones/cFunciones.php';

$categorias = fnGetCategoriasP();

?>

<div class="row">
    <div id="" class="container-fluid barra_menu" style="padding: 5px">
        <h4 class="text-center" style="color: #fff">Categorias</h4>
    </div>
</div>

<?php foreach ($categorias as $k => $v):?>

    <article class="col-md-2 col-sm-6 col-xs-4 bg-grey" style="padding: 1px 1px 1px;" >
        <br>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="./productos.php?categoria=<?php echo $v['nombre_cat'] ?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['nombre_cat'] ?>">
                    <img  title="<?php echo $v['nombre_cat']; ?>" alt="<?php echo $v['nombre_cat']; ?>" src="<?php echo $v['img_cat']; ?>" height="30px"  / >
                </a><br><a style="color: transparent">-</a>
                <p style="color: black" class="categorias">
                    <b><?php echo ($v['nombre_cat']);?>
                        </b>
                    </p><br>
            </div>
        </div>
    </article>
    
<?php endforeach;?>

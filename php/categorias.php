<?php

include './funciones/cFunciones.php';

$categorias = fnGetCategoriasP();

?>

 <h3 class="text-center">Categorias</h3><br>

<?php foreach ($categorias as $k => $v):?>

   <div  class="text-center bg-grey">
    <article class="col-md-2 " style="padding: 1px 1px 1px;" >
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="./productos.php?v_cat=<?php echo $v['nombre_cat'] ?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['nombre_cat'] ?>">
                    <img  title="<?php echo $v['nombre_cat']; ?>" alt="<?php echo $v['nombre_cat']; ?>" src="<?php echo $v['img_cat']; ?>" height="30px"  / >
                </a><br><a style="color: transparent">-</a>

                <p style="color: #fff" class="categorias">
                    <b><?php echo ($v['nombre_cat']);?>
                    </b>
                </p><br>
            </div>
        </div>
    </article>
</div>

<?php endforeach;?>
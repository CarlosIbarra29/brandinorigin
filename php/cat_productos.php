<?php

$categorias = fnGetCat_Pro();

?>
<div class="container col-sm-12">
<div class="row">
    <div id="" class="container-fluid barra_menu" >
        <h4 class="text-center" style="color: #fff">Categorias</h4>
    </div>
</div>
</div>
<div class="container col-sm-12 text-center">
    <article class="row">
<?php foreach ($categorias as $k => $v):?>
    
    <article class="col-md-2 col-sm-6 col-xs-6 " >
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 text-left">
                <a href="./productos.php?categoria=<?php echo $v['nombre_cat'] ?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['nombre_cat'] ?>">
                    <img align="left" title="<?php echo $v['nombre_cat']; ?>" alt="<?php echo $v['nombre_cat']; ?>" src="<?php echo $v['img_cat']; ?>" height="30px">               
                <b align="left" style="color: black" class="categorias cat_font">
                    <b> &nbsp;&nbsp; <?php echo ($v['nombre_cat']);?></b>
                </b>
                </a>
            </div>
        </div>
    </article>
    
<?php endforeach;?>
</article>
</div>

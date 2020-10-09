<?php



include './funciones/cFunciones.php';

$aDataProductos = fnGetproductosPrincipal();

$categorias = fnGetCat_Pro();

$banner= fnGetBanners();

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php foreach ($banner as $k => $v):?>
			<div class="item <?php print ' '.$active =$v["item_active"];?>">
				<a href="productos.php?<?php print $v["categoria"];?>"><img src="<?php print $url= $v["url"];?>" class="img-responsive slide" alt="banner" title="banner"></a>
			</div>
		<?php endforeach;?>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>
</div>
<div class="container-fluid">
<div class="row">
	
	<h3 class="text-center">Productos relevantes.</h3><br>

	<?php foreach ($aDataProductos as $k => $v):?>

		<?php

            if ($v['importadora'] == "doblevela"){

                $sUrl= str_replace("png", "jpg", $v['img']);

            }elseif ($v['importadora'] == "forpromotional"){

                $sUrl= str_replace("http://forpromotional.homelinux.com:9090/", "https://4promotional.net:9090/", $v['img']);

            }else if ($v['importadora'] == 'promoopcion'){

                $sUrl= $v['img'];

            }
        ?>

		<article class="col-md-3 col-sm-6 col-xs-6" style="padding: 1px 1px 1px;" >

			<div class="row">

				<div class="col-sm-12 text-center">

					<a class="img-thumbnail" href="./vistaproducto.php?id=<?php echo $v['modelo']?>&img=<?php echo $v['modelo'] ?>&num_ar=<?php print $articulos?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['modelo'] ?>">	

						<img  title="<?php echo $v['modelo']; ?>" alt="<?php echo $v['modelo']; ?>" src="<?php print $sUrl?>" height="130px">

						<?php if(isset($_SESSION['usuario'])):?>

							<p class="productos" style="font-size: 12px; color: red;"><b><?php print "$". $v['precio'];?></b></p>

						<?php endif;?>

					</a>

				</div>

			</div>

			<div class="row">

				<div class="col-sm-12 text-center"><br>

					<p class="productos" style="font-size: 10px"><b><?php print $v['nombre'];?></b></p>
					
					<form action="./vistaproducto.php?id=<?php echo $v['modelo'] ?>&img=<?php echo $v['modelo'] ?>" method="post">

						<button class="btn btn-default" style="background-color:#3c3c3c; color: white">Cotizar</button>

					</form><br>

				</div>

			</div>

		</article>
	<?php endforeach;?>
	</div>
</div>
<div class="container col-md-12">
<div class="row">
	<div id="" class="container-fluid barra_menu" style="padding: 5px">
		<h4 class="text-center" style="color: #fff">Categorias</h4>
    </div>
</div>
</div>
<div class="container col-sm-12 text-center bg-gray">
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
</article><br>
</div>




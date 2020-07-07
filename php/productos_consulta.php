<?php

include './funciones/cFunciones.php';

$aDataProductos = fnGetproductosPrincipal();

$categorias = fnGetCategoriasP();

$banner= fnGetBanners();

$articulos = $_GET['num_ar'];

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

<div class="row">
	<div class="container-fluid">
	<h3 class="text-center">Productos relevantes.</h3><br>
	<?php foreach ($aDataProductos as $k => $v):?>
		<article class="col-md-2 col-sm-6 col-xs-4" style="padding: 1px 1px 1px;" >
			<div class="row">
				<div class="col-sm-12 text-center">
					<a class="img-thumbnail" href="./vistaproducto.php?id=<?php echo $v['modelo']?>&img=<?php echo $v['modelo'] ?>&num_ar=<?php print $articulos?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['modelo'] ?>">	
						<img  title="<?php echo $v['modelo']; ?>" alt="<?php echo $v['modelo']; ?>" src="<?php echo $v['img']; ?>" height="150px">
						<p class="productos">Desde <b>$<?php $precio = $v['precio']; echo number_format($precio / 0.85, 2);?></b></p>
						<br>
					</a><br><a style="color: transparent">-</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<form action="./vistaproducto.php?id=<?php echo $v['modelo'] ?>&img=<?php echo $v['modelo'] ?>&num_ar=<?php print $articulos?>" method="post"><br>
						<button class="btn btn-default" style="background-color:#3c3c3c; color: white">Cotizar</button>
					</form>
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



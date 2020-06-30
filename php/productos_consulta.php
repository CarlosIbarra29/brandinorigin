<?php

include './funciones/cFunciones.php';

$aDataProductos = fnGetproductosPrincipal();

$categorias = fnGetCategoriasP();

$articulos = $_GET['num_ar'];

?>

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
					<form action="./vistaproducto.php?id=<?php echo $v['modelo'] ?>&img=<?php echo $v['modelo'] ?>&num_ar=<?php print $articulos?>" method="post">
						<button class="btn btn-default" style="background-color:#3c3c3c; color: white">Cotizar</button>
					</form>
				</div>
			</div>
		</article>
	<?php endforeach;?>
	</div>
</div>


<div class="row">
	<div  class="text-center">
		<h3 class="text-center">Categorias</h3><br>
		<?php foreach ($categorias as $k => $v):?>
			<article class="col-md-2 col-sm-6 col-xs-4 bg-grey" style="padding: 1px 1px 1px;" >
				<br>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a href="./productos.php?v_cat=<?php echo $v['nombre_cat'] ?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['nombre_cat'] ?>">
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

</div>
</div>



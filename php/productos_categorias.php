<?php 

include './funciones/cFunciones.php';

$busqueda= $_POST['palabra_clave'];

if (isset($busqueda)):

    $busqueda_total = fnGetBusqueda($busqueda);

?>


<div class="row">
	<div class="container-fluid">
	<h3 class="text-center">Palabra busqueda: <b><?php print $busqueda?></b>, <b><?php print count($busqueda_total)?></b> resultados.</h3><br>
	<?php foreach ($busqueda_total as $k => $v):?>
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


<?php else: ?>

	<h1>aqui va lo de categorias</h1>

<?php endif; ?>




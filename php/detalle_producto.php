<?php

include './funciones/cFunciones.php';

$id= $_GET['id'];

$productos = fnGetproducto($id);
$colores = fnGetColores($id);
$tecnica = fnGetTecnica($id);

if ($productos[0]['importadora']=='forpromotional'){

	$precio =$productos[0]['precio']-($productos[0]['precio']*.15);

}else {

	$precio =$productos[0]['precio'];
}



							

?>

<div class="row">
	<div class="col-sm-12 col-xs-12">

		<div class="">

			<div class="">

				<div class="row">

					<div class="col-sm-6 text-center ">

						<?php include './php/detalle_img.php'; ?>

					</div>

					<div class="col-sm-6">
						<?php foreach($productos as $k =>$v): ?>

							<h3 style="color: black;"><?php print $v['nombre']; ?></h3>
							<h5 style="color: black;"><?php print $v['modelo']; ?></h5>
							<p style="color: black;"><?php print $v['descripcion']?></p>
							<hr>
							<h4 style="color: black;">DESCRIPCIÓN Y CARACTERÍSTICAS</h4>
							<p style="color: black;"><b><?php print $v['Des2']; ?></p>
							<hr>
							<p>Colores: <?php print $v['colores']; ?></p>
							<p>Tamaño: <?php print $v['tamanio']; ?></p>
							<p>Material: <?php print $v['material']; ?></p>
							<?php if($v['impresión']=''): ?>
								 <p>Técnica impresión: Sin técnica</p>	
							<?php else: ?>
								<p>Técnica impresión: <?php print $v['impresion']; ?></p>
							<?php endif ?>	
							
							<p>Area impresión: <?php print $v['area_impresion']; ?></p>

							<h6 style="color: red;"><b>*Revisa la(s) técnica(s) de IMPRESIÓN disponible(s), antes de elegir.</b></h6>

							<hr>
							
							<table class="table">
								<thead>
									<tr>
										<th class="">Cantidad</th>
										<th class="">Precio</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1 a 100 piezas.</td>
										<td style="color: red">$ <?php echo number_format($precio / 0.7, 2) ?></td>
									</tr>
									<tr>
										<td>101 a 500 piezas.</td>
										<td style="color: red">$ <?php echo number_format($precio / 0.75, 2) ?></td>
									</tr>
									<tr>
										<td>501 a 3000 piezas.</td>
										<td style="color: red">$ <?php echo number_format($precio / 0.8, 2) ?></td>
									</tr>
									<tr>
										<td>3001 en adelante.</td>
										<td style="color: red">$ <?php echo number_format($precio / 0.85, 2) ?></td>
						 			</tr>
								</tbody>
							</table>
						<?php endforeach; ?>

							<form class="form-horizontal" action="./php/AccionCarta.php?id=<?php print $productos[0]['modelo']; ?>&action=addToCart&p=<?php print $precio ?>" method="POST">
								<div class="form-group">
									<label class="control-label col-sm-3" style="text-align: left">Técnica:</label>
									<div class="col-sm-5">          
										<select class="form-control" id="sel1" name="tecnica" id="primero" onchange="habilitar(this.value);">
											<option></option>
											<option>Sin técnica</option>
											<option>SERIGRAFIA</option>
											<option>TAMPOGRAFIA</option> 
											<option>BORDADO</option> 
											<option>GRABADO</option> 
											<option>GRABADO LASER</option>
										</select>
									</div>
								</div>
								<div class="form-group">        
									<label class="control-label col-sm-3" style="text-align: left">Tinta</label>
									<div class="col-sm-5">          
										<select class="form-control" name="tinta" id="segundo" required="">
											<option></option>
											<option >1 Tinta</option>
											<option >2 Tintas</option>
											<option >3 Tintas</option>
											<option >4 Tintas</option>
										</select>
									</div>
								</div>
								<div class="form-group">        
									<label class="control-label col-sm-3" style="text-align: left">Color Articulo</label>
									<div class="col-sm-5">          
										<select class="form-control" name="color" id="tercero">
											<option value="0"></option>

											<?php foreach ($colores as $key => $value):?>
												<option value="<?php print $value['color']; ?>"><?php print $value['color']; ?></option>
											<?php endforeach; ?>

										</select>
									</div>
								</div>

								<div class="form-group">        
									<label class="control-label col-sm-3" style="text-align: left">Cantidad</label>
									<div class="col-sm-5">          
										<input type="number" class="form-control" placeholder="Cantidad" name="unidades" required="">
									</div>
								</div>

								<h6>En caso de bordado el precio puede variar por tamaño y puntadas, por favor verficalo con tu ejecutivo de compra.</h6>
								<h6 style="color: red;">Las existencias pueden variar, por favor verifique con nosotros.</h6>
								<hr class="hr_p">
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<button class="button" type="submit">Cotizar <span class="glyphicon glyphicon glyphicon-usd"></span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>       
		</div>
	</div>


	<script>

		function habilitar(value)
		{
			if (value == "BORDADO" || value == true) {

				var cbo1 = document.getElementById("segundo").disabled = true;
				var cbo2 = document.getElementById("tercero").disabled = true;
				document.getElementById("segundo").selectedIndex = 0;
				document.getElementById("tercero").selectedIndex = 0;

			}else if (value == "GRABADO" || value == true) {

				var cbo1 = document.getElementById("segundo").disabled = true;
				document.getElementById("segundo").selectedIndex = 0;

			}else if (value == "Sin técnica" || value == true) {

				var cbo1 = document.getElementById("segundo").disabled = true;
				var cbo2 = document.getElementById("tercero").disabled = true;
				document.getElementById("segundo").selectedIndex = 0;
				document.getElementById("tercero").selectedIndex = 0;

			}else if (value == "GRABADO LASER" || value == true) {

				var cbo1 = document.getElementById("segundo").disabled = true;
				document.getElementById("segundo").selectedIndex = 0; 

			}else {

				document.getElementById("segundo").disabled = false;
				document.getElementById("tercero").disabled = false;

			}
		}

	</script>




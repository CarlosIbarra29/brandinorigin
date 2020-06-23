<?php
	include("./conexion/conexion2.php");
	$id_departamento=intval($_REQUEST['id_deparatamento']);
        
        
	$municipios = $conexion->prepare("SELECT nombre FROM productos WHERE id_cat = '$id_departamento'") or die(mysqli_error());
		
        
	if($municipios->execute()){
		$a_result = $municipios->get_result();
	}
		while($row = $a_result->fetch_array()){
			echo '<option value = "'.$row['nombre'].'">'.utf8_encode( $row['nombre']).'</option>';
		}
?>

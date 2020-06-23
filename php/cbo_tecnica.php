<?php
include './conexion/conexion2.php';

$id_pro = $_GET['id'];


$query = $conexion->query("SELECT distinct tpo_impresion FROM catalogo where modelo ='$id_pro'");
if ($query->num_rows > 0) {
while ($valores = mysqli_fetch_array($query)) {
    echo '<option value="' . $valores[tpo_impresion] . '">' . $valores[tpo_impresion] . '</option>';
}
}else{
    echo '<option value="Sin Color">Sin Color</option>';
}


<?php
 
include './conexion/conexion2.php';
$conexion = mysqli_connect( $host, $usuario,$clave,$db ) or die ("No se ha podido conectar al servidor de Base de datos");

$query = $conexion->query("SELECT distinct categoria_padre FROM productos order by categoria_padre asc");
while ($valores = mysqli_fetch_array($query)) {
    echo '<option value="' . $valores[categoria_padre] . '">' . strtoupper($valores[categoria_padre]) . '</option>';
}


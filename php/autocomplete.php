<?php
include './conexion/conexion2.php';

$searchTerm = $_GET['term'];
$consulta = "SELECT * FROM productos WHERE nombre LIKE '%" . $searchTerm . "%'";

$resultado = $conexion->query($consulta);
while ($fila = $resultado->fetch_assoc()) { 
     $data[] = $fila['nombre'];
}
echo json_encode($data);


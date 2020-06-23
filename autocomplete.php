<?php
include './conexion/conexion2.php';

$searchTerm = $_GET['term'];
$consulta = "SELECT nombre FROM productos WHERE nombre LIKE '%" . $searchTerm . "%'";
//$consulta = "Select nombre, descripcion From productos Where Match(nombre, descripcion) AGAINST (".$searchTerm.");";
$resultado = $conexion->query($consulta);
while ($fila = $resultado->fetch_assoc()) { 
     $data[] = $fila['nombre'];
}
echo json_encode($data);


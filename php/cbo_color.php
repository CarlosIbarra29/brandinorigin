<?php

include '../conexion/conexion2.php';

$id_pro = $_GET['id'];


$lista = "SELECT color FROM catalogo where modelo = '$id_pro'";
$arra = $conexion->query($lista);

while ($filas = $arra->fetch_assoc()) {
    echo '<option value="' . $filas[color] . '">' . $filas[color] . '</option>';
}






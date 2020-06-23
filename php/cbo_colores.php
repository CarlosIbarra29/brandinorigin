<?php

include '../conexion/conexion2.php';
$query = $conexion->query("select   distinct color from catalogo order by color asc");
while ($valores = mysqli_fetch_array($query)) {
    echo '<option value="' . $valores[color] . '">' . strtoupper($valores[color]) . '</option>';
}



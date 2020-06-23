<?php
session_start();



$unidades = $_POST['unidades'];
$color = $_POST['color'];
$tecnica = $_POST['tecnica'];
$tinta = $_POST['tinta'];


/*
 session_start();
$_SESSION[carrito][]=array('producto'=>'chompa','producto'=>'2','talla'=>'L');
$_SESSION[carrito][]=array('producto'=>'Polo','producto'=>'1','talla'=>'S');
echo "< pre>";
print_r($_SESSION[carrito]);
echo "< /pre>";
 */



($cesta = $_SESSION['cesta']);  // Creamos el array  // La primera vez, se guardará vacía

if (!isset($cesta)) { // Si no existe la cesta
    $cesta[$id] = $unidades; // Grabo el primer producto en la ceta
} else { // si la cesta ya existía
    $encontrado = 0;
    foreach ($cesta as $codigo => $cantidad) { // Para cada código metido en la cesta...
        if ($codigo == $id) {// Si el código coincide con el introducido por el usuario (no es la primera vez q lo compra)
            $cesta[$codigo] += $unidades;
            $encontrado = 1;
        }
    }
    if (!$encontrado)
        $cesta[$id] = $unidades = $nombre = $descripcion = $color = $tecnica = $tinta = $precio;
}
($_SESSION["cesta"] = $cesta);



if (isset($cesta)) {
    ?>

    <h2>Total De Articulos <?php echo count($cesta) ?></h2>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Cod Producto</th>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Color</th>
                    <th>Tecnica</th>
                    <th>Tinta</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cesta as $codproducto => $ncantidad) {
                    ?>
                    <tr>
                        <td><?php echo $codproducto ?></td>
                        <td><?php echo $ncantidad ?></td>
                        <td><?php echo $nombre ?></td>
                        <td><?php echo $precio ?></td>
                        <td><?php echo $descripcion ?></td>
                        <td><?php echo $color ?></td>
                        <td><?php echo $tecnica ?></td>
                        <td><?php echo $tinta ?></td>
                        <td>
                            <?php
                            echo '$' . $sub_total = $ncantidad * $precio;
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    ?>
    <h2>Sin Articulos</h2>
    <?php
}
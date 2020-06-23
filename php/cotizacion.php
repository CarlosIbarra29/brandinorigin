<?php

include 'La-carta.php';
$cart = new Cart;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">


<h1>Cotizacion 3Abranding</h1>
<h4>Nombre: <?php echo $nombre?></h4>
<h4>Correo: <?php echo $email?></h4>
<h4>Telfono: <?php echo $telefono?></h4>

<table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>

            <th>Color</th>
            <th>Tintas</th>
            <th>Tecnica</th>
            <th>Sub total</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($cart->total_items() > 0) {
            //get cart items from session
            $cartItems = $cart->contents();
            foreach ($cartItems as $item) {
                ?>
                <tr>
                    <td><?php echo $item["name"]; ?></a></td>
                    <td><?php echo '$' . $item["price"] . ' MX'; ?></td>
                    <td><?php echo $item["qty"]; ?></td>
                    <td><?php echo $item["color"]; ?></td>
                    <td><?php echo $item["tinta"]; ?></td>
                    <td><?php echo $item["tecnica"]; ?></td>
                    <td><?php echo '$' . $item["subtotal"] . ' MX'; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>


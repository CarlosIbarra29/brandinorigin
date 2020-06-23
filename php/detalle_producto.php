
<?php
/*
$nom = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$email = $_GET['email'];
$telefono = $_GET['telefono'];
*/


include './conexion/conexion2.php';
$id = $_GET['id'];
$precio = $_GET['p'];
$sql = "
 SELECT 
distinct
    p.modelo,
    p.nombre,
    p.area_impre,
    p.medidas,
    c.descripcion,
    c.id_pro
FROM
    catalogo c,
    productos p
WHERE
    p.modelo = '$id' and 
    p.modelo = c.modelo;";
$detalle = $conexion->query($sql);

$lista = "SELECT distinct tpo_impresion FROM catalogo where modelo = '$id'";
$arra = $conexion->query($lista);

while ($filas = $arra->fetch_assoc()) {
    $tecnica = $filas['tpo_impresion'];
    $r = str_replace(",", "</option><br><option>", '<option>' . $tecnica) . "</option>";
}


while ($row = $detalle->fetch_assoc()) {
    ?>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-sm-6 text-center ">
                            <?php include './php/item_color.php'; ?>
                        </div>
                        <div class="col-sm-6">
                            <h3 style="color: black;"><?php echo $nombre = $row['nombre']; ?></h3>
                            <h4 style="color: black;"><b>Clave Producto: </b><?php echo $clave = $row['modelo']; ?></h4>
                            <hr class="hr_p">
                            <p style="color: black;"><b>Descripción: </b><?php echo $descrip = $row['descripcion']; ?></p>

                            <?php

                            require_once ('./libreria/lib/nusoap.php');
                            $client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl', 'wsdl');
                            $err = $client->getError();

                            if ($err) {
                                echo 'Error en Constructor' . $err;
                            }

                            $CardCode = 'DFE5737';
                            $clave_p = $id = $row['id_pro'];
                            $arr = array('codigo' => $clave_p, 'distribuidor' => $CardCode);
                            $result = $client->call('fichaTecnica', $arr);
                            echo '<p><b>Familia: </b>' . $result['fichaTecnicaResult']['Ficha']['Familia'] . '</p>';
                            echo '<p><b>Color: </b>' . $result['fichaTecnicaResult']['Ficha']['Color'] . '</p>';
                            echo '<p><b>Capacidad: </b>' . $result['fichaTecnicaResult']['Ficha']['Capacidad'] . '</p>';
                            echo '<p><b>Material: </b>' . $result['fichaTecnicaResult']['Ficha']['Material'] . '</p>';
                            echo '<p><b>Tamaño: </b>' . $result['fichaTecnicaResult']['Ficha']['Size'] . '</p>';
                        
                            
                            ?>

                        

                            <h4>
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

                            </h4>
                            <script>
                                function habilitar(value)
                                {
                                    if (value == "BORDADO" || value == true) {
                                        // deshabilitamos
                                        var cbo1 = document.getElementById("segundo").disabled = true;
                                        var cbo2 = document.getElementById("tercero").disabled = true;

                                        document.getElementById("segundo").selectedIndex = 0;
                                        document.getElementById("tercero").selectedIndex = 0;

                                    } else if (value == "GRABADO" || value == true) {
                                        // deshabilitamos
                                        var cbo1 = document.getElementById("segundo").disabled = true;

                                        document.getElementById("segundo").selectedIndex = 0;
                                    } else if (value == "Sin técnica" || value == true) {
                                        // deshabilitamos
                                        var cbo1 = document.getElementById("segundo").disabled = true;
                                        var cbo2 = document.getElementById("tercero").disabled = true;

                                        document.getElementById("segundo").selectedIndex = 0;
                                        document.getElementById("tercero").selectedIndex = 0;
                                    } else if (value == "GRABADO LASER" || value == true) {
                                        // deshabilitamos
                                        var cbo1 = document.getElementById("segundo").disabled = true;

                                        document.getElementById("segundo").selectedIndex = 0;
                                    } else {
                                        // habilitamos
                                        document.getElementById("segundo").disabled = false;
                                        document.getElementById("tercero").disabled = false;
                                    }
                                }
                            </script>

                            <form class="form-horizontal" action="./php/AccionCarta.php?id=<?php echo $clave = $row['modelo']; ?>&action=addToCart&p=<?php echo $precio ?>" method="POST">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" style="text-align: left">Técnica:</label>
                                    <div class="col-sm-5">          
                                        <select class="form-control" id="sel1" name="tecnica" id="primero" onchange="habilitar(this.value);">
                                            <option></option>
                                            <option>Sin técnica</option>
                                            <?php
                                            echo strtoupper($r);
                                            ?>
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
                                            <?php include './php/cbo_color.php'; ?>
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
    <?php
}






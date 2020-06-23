<?php
$id = $_GET['id'];
$sql = "SELECT id_pro,img,nombre FROM catalogo WHERE modelo = '$id';";
$color_img = $conexion->query($sql);

$sql2 = "SELECT img FROM productos WHERE modelo = '$id';";
$color_img2 = $conexion->query($sql2);
while ($imagen2 = $color_img2->fetch_assoc()) {
    $img_g = $imagen2['img'];
}


/* * existencias */
include('./libreria/lib/nusoap.php');
$client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl', 'wsdl');
$err = $client->getError();
if ($err) {
    echo 'Error en Constructor' . $err;
}
$CardCode = 'DFE5737';
?>



<link rel="stylesheet" href="../csc/global.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<style>
    body{
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <img id="largeImage" src="<?php echo $img_g; ?>" width="70%"/>
        <div class="w3-row-padding w3-margin-top" id="thumbs">
            <?php
            while ($imagen = $color_img->fetch_assoc()) {
                $url = $imagen['img'];
                $id_pro = $imagen['id_pro'];
                ?>
                <div class="w3-third" style="padding: 1%; cursor: pointer">
                    <div class="w3-card">

                        <img src="<?php echo $url; ?>" style="width:80%;"/>
                        <p>
                            <?php
                            $clave_p = $id_pro;
                            $arr = array('codigo' => $clave_p, 'distribuidor' => $CardCode);
                            $result = $client->call('existencias', $arr);

                            if ($client->fault) {
                                echo 'Fallo';
                                print_r($result);
                            } else {        // Chequea errores
                                $err = $client->getError();
                                if ($err) {             // Muestra el error
                                    echo 'Error' . $err;
                                } else {                // Muestra el resultado
                                    $cadena = json_encode($result);
                                    $n_c = str_replace('{"existenciasResult":{"Existencia":{"Almacen":"GDL-TECH","Stok":"', '', $cadena);
                                    $stock = str_replace('"}}}', '', $n_c);
                                    if (!is_numeric($stock)) {
                                        echo "";
                                    } else {
                                        echo "Existencia: ".$exist = number_format($stock, 0); ;
                                    }
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>  
    </div>
</div>

<script>
    $('#thumbs').delegate('img', 'click', function () {
        $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
        $('#description').html($(this).attr('alt'));
    });
</script>






















<?php

include '../funciones/cFunciones.php';

include './libreria/lib/nusoap.php';

$CardCode = 'DFE5737';

$client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl','wsdl');

$err = $client->getError();

if ($err) {     
    echo 'Error en Constructor' . $err ;
}

$id_img= $_GET['img'];

$imagen = fnGetImg($id_img);

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
            <?php foreach ($imagen as $k => $v): 
                $producto= $v['id_producto'];
                $param = array('codigo' => $producto,'distribuidor' => $CardCode);
                $existencias = $client->call('existencias', $param);
                ?>
                <?php foreach($existencias as $Ficha): ?>
                     <?php foreach($Ficha as $detalles =>$valor): ?>
                        <div class="w3-third" style="padding: 1%; cursor: pointer">
                            <div class="w3-card">
                                <img src="<?php print $v['img']; ?>" style="width:80%;"/>
                                <p>Existencias: <?php print round($valor['Stok'],0) ?></p>
                            </div>
                        </div>
                     <?php endforeach;?>
                <?php endforeach;?>
            <?php endforeach; ?>
        </div>  
    </div>
</div>

<script>
    $('#thumbs').delegate('img', 'click', function () {
        $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
        $('#description').html($(this).attr('alt'));
    });
</script>






















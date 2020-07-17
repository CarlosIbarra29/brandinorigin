<?php


include './libreria/lib/nusoap.php';

$CardCode = 'DFE5737';

$key = 'jk3CttIRpY9ePAOmlX82ZA==';



$id_img= $_GET['img'];

$imagen = fnGetImg($id_img);

$importadora = $imagen[0]['importadora'];

if ($importadora == 'promoopcion'){

    $client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl','wsdl');

}elseif ($importadora== 'doblevela') {

    $client = new nusoap_client('http://srv-datos.dyndns.info/doblevela/service.asmx?wsdl','wsdl');
    
}

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

<?php if ($importadora=='promoopcion'): ?>

    <div class="row">
        <div class="col-sm-12">
            <img id="largeImage" src="<?php echo $img_g; ?>" width="70%"/>
            <div class="w3-row-padding w3-margin-top" id="thumbs">

                <?php foreach ($imagen as $k => $v):?>

                    <div class="w3-third" style="padding: 1%; cursor: pointer">
                        <div class="w3-card">
                            <img src="<?php print $v['img']; ?>" style="width:80%;"/>
                        </div>
                    </div>

                <?php endforeach;?>

            </div>  

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Color</th>
                        <th class="text-center">Existencias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($imagen as $k => $v):
                        $producto = $v['id_producto'];
                        $param = array('codigo' => $producto,'distribuidor' => $CardCode);
                        $existencias = $client->call('existencias', $param);
                    ?>
                        <tr>
                            <td>
                                <?php print $v['color']; ?>

                            </td>
                            <td>
                                <?php foreach($existencias as $Ficha): ?>
                                    <?php foreach($Ficha as $detalles =>$valor): ?>
                                        <p><?php print number_format($valor['Stok'],0)?></p>
                                    <?php endforeach;?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
   
<?php elseif ($importadora=='doblevela'):?>

    <div class="row">
        <div class="col-sm-12">
            <img id="largeImage" src="<?php echo $img_g; ?>" width="70%"/>
            <div class="w3-row-padding w3-margin-top" id="thumbs">

                <?php

                $producto = $imagen[0]['modelo'];

                $param = array('codigo' => $producto,'Key' => $key);

                $existencias = $client->call('GetExistencia', $param);

                $resultados = utf8_encode($existencias['GetExistenciaResult']);

                $obj = json_decode($resultados);

                $jsonExis = $obj->{'Resultado'};

                $precios_doblevela= $jsonExis[0]->{'Price'};

                ?>

                <?php foreach ($imagen as $k => $v):?>

                    <div class="w3-third" style="padding: 1%; cursor: pointer">
                        <div class="w3-card">
                            <img src="<?php print $v['img']; ?>" style="width:80%;"/>
                        </div>
                    </div>

                <?php endforeach; ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Color</th>
                            <th class="text-center">Existencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($jsonExis);$i++):?>

                           
                            
                            <tr>
                                <td><?php print $jsonExis[$i]->{'COLOR'}?></td>
                                <td><?php print number_format($jsonExis[$i]->{'EXISTENCIAS'})?></td>
                            </tr>
                        <?php endfor;?>
                    </tbody>
                </table>

            </div>  
        </div>
    </div>


<?php elseif ($importadora=='forpromotional'):?>


    <div class="row">
        <div class="col-sm-12">
            <img id="largeImage" src="<?php echo $img_g; ?>" width="70%"/>
            <div class="w3-row-padding w3-margin-top" id="thumbs">

                <?php

                $data = json_decode(file_get_contents('http://forpromotional.homelinux.com:9090/WsEstrategia/inventario'),true);
                $producto = $imagen[0]['modelo'];
                $precio_for= $data[0]["precio"];

                ?>

                <?php foreach ($imagen as $k => $v):?>

                    <div class="w3-third" style="padding: 1%; cursor: pointer">
                        <div class="w3-card">
                            <img src="<?php print $v['img']; ?>" style="width:80%;"/>
                        </div>
                    </div>

                <?php endforeach; ?>

                 <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Color</th>
                            <th class="text-center">Existencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($data);$i++):?>
                            <?php if ($data[$i]['id_articulo'] == $producto):?>
                                <tr>
                                    <td><?php print $data[$i]["color"]?></td>
                                    <td><?php print number_format($jsonExis[$i]->{'disponible'})?></td>
                                </tr>
                            <?php endif;?>    
                        <?php endfor;?>
                    </tbody>
                </table>


            </div>  
        </div>
    </div>

<?php endif; ?>    



<script>
    $('#thumbs').delegate('img', 'click', function () {
        $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
        $('#description').html($(this).attr('alt'));
    });
</script>






















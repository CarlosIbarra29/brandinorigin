<?php



$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

$data = file_get_contents("https://4promotional.net:9090/WsEstrategia/inventario", false, stream_context_create($arrContextOptions));



// var_dump($data);

$obj = json_decode($data, true);

$producto = 3551;

?>

<?php for($i=0;$i<count($obj);$i++):?>

                            <?php if ($obj[$i]['id_articulo'] == $producto):?>

                                <tr>

                                    <td><?php print $obj[$i]["color"]?></td>

                                    <td><?php print number_format($obj[$i]['disponible'])?></td>

                                </tr>

                            <?php endif;?>    

                        <?php endfor;?>


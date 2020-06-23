
<?php

require_once ('../libreria/lib/nusoap.php');
$client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl', 'wsdl');
$err = $client->getError();
if ($err) {
    echo 'Error en Constructor' . $err;
}
$CardCode = 'DFE5737';
$clave_p = 'SH 2035 A';
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
        ECHO $exist = number_format($stock, 0);


        
    }
}
?>


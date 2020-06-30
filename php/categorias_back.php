<?php

include './funciones/cFunciones.php';


$categorias = fnGetCategoriasP();

//var_dump($categorias);
?>
 <h3 class="text-center">Categorias</h3><br>
<?php foreach ($categorias as $k => $v):?>
    
<!-- <h1>Categoria: <?php //echo ($v['nombre_cat']); ?> </h1>
 -->
   <div  class="text-center bg-grey">
    <article class="col-md-2 " style="padding: 1px 1px 1px;" >
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="./productos.php?v_cat=<?php echo $v['nombre_cat'] ?>" style="color: #fff; padding: 1%;" data-title="<?php echo $v['nombre_cat'] ?>">
                    <img  title="<?php echo $v['nombre_cat']; ?>" alt="<?php echo $v['nombre_cat']; ?>" src="<?php echo $v['img_cat']; ?>" height="30px"  / >
                </a><br><a style="color: transparent">-</a>

                <p style="color: #fff" class="categorias">
                    <b><?php echo ($v['nombre_cat']);?>
                    </b>
                </p><br>
            </div>
        </div>
    </article>
</div>
<?php endforeach;?>


/*

include('../libreria/lib/nusoap.php');

// promoopcion
$client = new nusoap_client('http://srv-datos.dyndns.info/doblevela/service.asmx?wsdl','wsdl');


$err = $client->getError();

if ($err) {     
    echo 'Error en Constructor' . $err ; 
}else{
    ECHO "SI CONECTO<br>";
}



$producto_cod ='AS2020';
$key = 'jk3CttIRpY9ePAOmlX82ZA==';
$param = array('codigo' => $producto_cod,'Key' => $key);

$fichaTecnica = $client->call('GetExistencia', $param);

var_dump($fichaTecnica);

/*$wsdl = "http://currencyconverter.kowabunga.net/converter.asmx/?WSDL";

 
 
$cliente = new soapclient($wsdl);
 
$parametros = ["FromCurrency" => "EUR", "ToCurrency" => "USD"];
 
$respuesta = $cliente->ConversionRate($parametros);
 
echo " <h1>El valor de 100 Euro es de " . (100 * $respuesta->ConversionRateResult ) . "Dólares</h1>";

*/

/*

include 'libreria/lib/nusoap.php'; 


// promoopcion
$client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl','wsdl');

$err = $client->getError();

if ($err) {     
    echo 'Error en Constructor' . $err ; 
}else{
   
}

$producto_cod ='ABA 001 A';
$CardCode = 'DFE5737';

$param = array('codigo' => $producto_cod,'distribuidor' => $CardCode);

$fichaTecnica = $client->call('fichaTecnica', $param);



if ($client->fault) {
    echo 'Fallo';
    print_r($result);
} else {        // Chequea errores
    $err = $client->getError();
        if ($err) {             // Muestra el error
            echo 'Error' . $err ;
        } else {                // Muestra el resultado
            foreach($fichaTecnica as $Ficha)
            {
                foreach($Ficha as $detalles =>$valor)
                {
                 echo "Producto: ".$valor['Producto'] ."<br>";
                 echo "Descripcion: ".$valor['Des2'] ."<br>";
                 echo "Familia: ".$valor['Familia'] ."<br>";
                 echo "Color: ".$valor['Color'] ."<br>";
                 echo "Capacidad: ".$valor['Capacidad'] ."<br>";
                 echo "Material: ".$valor['Material'] ."<br>";
             echo "Tamaño: ".$valor['Weight'].", ".$valor['Height'].", ".$valor['Width'].", ".$valor['Length']."<br>";
                 echo "Empaque: ".$valor['Producto'] ."<br>";
                 echo "Tecnica Impresion: ".$valor['TecnicaImp'] ."<br>";
             }

         }


     }
 }
*/








///DOBLE VELA/

//$client = new nusoap_client('http://srv-datos.dyndns.info/doblevela/service.asmx');

/*
$err = $client->getError();

if ($err) {     
    echo 'Error en Constructor' . $err ; 
}else{
    ECHO "SI CONECTO";
}

**/

/*POST /doblevela/service.asmx HTTP/1.1
Host: srv-datos.dyndns.info
Content-Type: text/xml; charset=utf-8
Content-Length: length
SOAPAction: "http://tempuri.org/GetExistencia"

<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetExistencia xmlns="http://tempuri.org/">
      <codigo>string</codigo>
      <Key>string</Key>
    </GetExistencia>
  </soap:Body>
</soap:Envelope>*/

/*

$producto_cod ='AS2020';
$key = 'jk3CttIRpY9ePAOmlX82ZA==';
$param = array('codigo' => $producto_cod,'Key' => $key);



 */




//forpromotional

/*
$client = new nusoap_client('http://forpromotional.homelinux.com:9090/WsEstrategia/inventario');


$err = $client->getError();

if ($err) {     
    echo 'Error en Constructor' . $err ; 
}else{
    ECHO "SI CONECTO";
}

no necesita llave
*/
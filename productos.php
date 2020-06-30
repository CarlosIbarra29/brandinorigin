<!DOCTYPE html>
<html lang="en">
    <?php include './nav/cabecera.php'; ?>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <?php include './nav/nav_prin.php'; ?>
   
        <?php 

include 'libreria/lib/nusoap.php'; 
         

$client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl','wsdl');

$err = $client->getError();

if ($err) {     
    echo 'Error en Constructor' . $err ; 
}else{
   
}

//$producto_cod ='ABA 001 A';
$producto_cod = $_GET['palabra_clave'];
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




        ?>
        <?php include './nav/footer.php'; ?>
        <?php include './nav/scripts.php'; ?>
    </body>
</html>

<?php
include '../conexion/conexion2.php';

function fnConexion(){

    define('DB_SERVER','209.59.139.98');
    define('DB_SERVER_USERNAME', 'abrandin_root');
    define('DB_SERVER_PASSWORD', '3abranding_root');
    define('DB_DATABASE', 'abrandin_3A');
    define('NUM_ITEMS_BY_PAGE',9);

    $conexion_uno = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);

    if (mysqli_connect_errno()) {
    
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();

    }

    if (!$conexion_uno->set_charset("utf8")) {

        printf("Error loading character set utf8: %s\n", $conexion_uno->error);

    } else {

       // printf("Current character set: %s\n", $conexion_uno->character_set_name());

    }

    return $conexion_uno;

}

function fnPrecios($tecnica,$productID,$unidades,$precio_inicio){

	global $conexion;
    if ($tecnica == "Sin técnica") {//sin tecnica
    	$color = "sin color";
    	$tinta = "sin tinta";
    	$ctinta = 0;
    	$ctecnica = 0;
    	if ($unidades <= 100) {
    		$calculo_p = $precio_inicio / 0.7;
    		$precio_utilidad = $calculo_p * $unidades;
    	} else if ($unidades >= 101 && $unidades <= 500) {
    		$calculo_p = number_format($precio_inicio / 0.75, 3);
    		$precio_utilidad = $calculo_p * $unidades;
    	} else if ($unidades >= 501 && $unidades <= 3000) {
    		$calculo_p = number_format($precio_inicio / 0.8, 3);
    		$precio_utilidad = $calculo_p * $unidades;
    	} else if ($unidades >= 3001) {
    		$calculo_p = number_format($precio_inicio / 0.85, 3);
    		$precio_utilidad = $calculo_p * $unidades;
    	}
    	$calculo_total = $precio_utilidad;
    } else if ($tecnica == "SERIGRAFIA") {
    	$color = $_POST['color'];
    	$tinta = $_POST['tinta'];

    	if ($unidades <= 100) {
    		$ctecnica = 450/0.7;
    		$calculo_p = $precio_inicio / 0.7;
    		$punidades = $calculo_p * $unidades;
    		if ($tinta == 1) {
    			$n_tinta = 450/0.7;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 385/0.7;
    			$n_tinta = 450/0.7;
    			$e_tinta = ((385/0.7) * ($tinta - 1));
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta;
    	} else if ($unidades >= 101 && $unidades <= 500) {

    		$ctecnica = 4.50/0.75;

    		$calculo_p = $precio_inicio / 0.75;
    		$punidades = $calculo_p * $unidades;

    		if ($tinta == 1) {
    			$n_tinta = (4.50/0.75) * $unidades;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 2.10/0.75;
    			$n_tinta = (4.50/0.75) * $unidades;
    			$e_tinta = ((2.10/0.75) * ($tinta - 1)) * $unidades;
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta;


    	} 

    	else if ($unidades >= 501 && $unidades <= 3000) {
    		$ctecnica = 2.50/0.8;

    		$calculo_p = $precio_inicio / 0.8;
    		$punidades = $calculo_p * $unidades;

    		if ($tinta == 1) {
    			$n_tinta = (2.5/0.8) * $unidades;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 1.16/0.8;
    			$n_tinta = (2.5/0.80) * $unidades;
    			$e_tinta = ((1.16/.80) * ($tinta - 1)) * $unidades;
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta;

    	} 

    	else if ($unidades >= 3001) {
    		$ctecnica = 2.00/0.85;

    		$calculo_p = $precio_inicio / 0.85;
    		$punidades = $calculo_p * $unidades;

    		if ($tinta == 1) {
    			$n_tinta = (2/0.85) * $unidades;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 0.95/0.85;
    			$n_tinta = (2/0.85) * $unidades;
    			$e_tinta = ((0.95/0.85) * ($tinta - 1)) * $unidades;
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta;
    	}
    } else if ($tecnica == 'TAMPOGRAFIA') {

    	$color = $_POST['color'];
    	$tinta = $_POST['tinta'];
    	if ($unidades <= 100) {
    		$ctecnica = 600/0.7;


    		$calculo_p = $precio_inicio / 0.7;
    		$punidades = $calculo_p * $unidades;

    		if ($tinta == 1) {
    			$n_tinta = 600/0.7;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 600/0.7;
    			$n_tinta = 600/0.7;
    			$e_tinta = (600/0.7) * ($tinta - 1);
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta;
    	} 

    	else if ($unidades >= 101 && $unidades <= 500) {
    		$ctecnica = 0.60/0.75;



    		$calculo_p = $precio_inicio / 0.75;
    		$punidades = $calculo_p * $unidades;
    		$precio_placa = 200;

    		if ($tinta == 1) {
    			$n_tinta = (0.60/0.75) * $unidades;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 0.60/0.75;
    			$n_tinta = (0.60/0.75) * $unidades;
    			$e_tinta = ((0.60/0.75) * ($tinta - 1)) * $unidades;
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta + $precio_placa;
    	}

    	else if ($unidades >= 501 && $unidades <= 3000) {
    		$ctecnica = 0.55/0.8;


    		$calculo_p = $precio_inicio / 0.8;
    		$punidades = $calculo_p * $unidades;
    		$precio_placa = 0;
    		if ($tinta == 1) {
    			$n_tinta = (0.55/0.80) * $unidades;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 0.55/0.8;
    			$n_tinta = (0.55/0.8) * $unidades;
    			$e_tinta = ((0.55/0.80) * ($tinta - 1)) * $unidades;
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta + $precio_placa;
    	} 
    	else if ($unidades >= 3001) {
    		$ctecnica = 0.5/0.85;


    		$calculo_p = $precio_inicio / 0.85;
    		$punidades = $calculo_p * $unidades;
    		$precio_placa = 0;

    		if ($tinta == 1) {
    			$n_tinta = (0.5/0.85) * $unidades;
    			$e_tinta = 0;
    			$ctinta = 0;
    		} else if ($tinta > 1) {
    			$ctinta = 0.5/0.85;
    			$n_tinta = (0.5/0.85) * $unidades;
    			$e_tinta = ((0.5/0.85) * ($tinta - 1)) * $unidades;
    		}
    		$calculo_total = $punidades + $n_tinta + $e_tinta + $precio_placa;
    	}
    } else if ($tecnica == 'BORDADO') {
    	$color = "sin color";
    	$tinta = "sin tinta";
    	if ($unidades <= 100) {

    		$calculo_p = $precio_inicio / 0.7;
    		$punidades = $calculo_p * $unidades;
    		$pbordado = 250/0.7;
    		$bprenda = 25/0.7;
    		$preciob = $bprenda * $unidades;
    		$calculo_total = $punidades + $pbordado + $preciob;

    	} else if ($unidades >= 101 && $unidades <= 500) {

    		$calculo_p = $precio_inicio / 0.75;
    		$punidades = $calculo_p * $unidades;
    		$pbordado = 250/0.75;
    		$bprenda = 22/0.75;
    		$preciob = $bprenda * $unidades;
    		$calculo_total = $punidades + $pbordado + $preciob;
    	} else if ($unidades >= 501 && $unidades <= 3000) {
    		$calculo_p = $precio_inicio / 0.8;
    		$punidades = $calculo_p * $unidades;
    		$pbordado = 250/0.80;
    		$bprenda = 18/0.80;
    		$preciob = $bprenda * $unidades;
    		$calculo_total = $punidades + $pbordado + $preciob;
    	} else if ($unidades >= 3001) {
    		$calculo_p = $precio_inicio / 0.8;
    		$punidades = $calculo_p * $unidades;
    		$pbordado = 250/0.8;
    		$bprenda = 18/0.8;
    		$preciob = $bprenda * $unidades;
    		$calculo_total = $punidades + $pbordado + $preciob;
    	}

    	$ctinta = 0;
    	$ctecnica = $pbordado;
    } else if ($tecnica == 'GRABADO') {
    	$color = "sin color";
    	$tinta = "sin tinta";
    	if ($unidades <= 100) {

    		$calculo_p = $precio_inicio / 0.7;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 5/0.7;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	} else if ($unidades >= 101 && $unidades <= 500) {

    		$calculo_p = $precio_inicio / 0.75;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 4.50/0.75;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	} else if ($unidades >= 501 && $unidades <= 3000) {
    		$calculo_p = $precio_inicio / 0.8;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 3.50/0.80;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	} else if ($unidades >= 3001) {
    		$calculo_p = $precio_inicio / 0.85;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 3.50/0.80;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	}

    	$ctinta = 0;
    	$ctecnica = $plaser;
    } else if ($tecnica == 'GRABADO LASER') { 
    	$color = "sin color";
    	$tinta = "sin tinta";
    	if ($unidades <= 100) {
    		$calculo_p = $precio_inicio / 0.7;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 5/0.7;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	} else if ($unidades >= 101 && $unidades <= 500) {

    		$calculo_p = $precio_inicio / 0.75;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 4.50/0.75;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	} else if ($unidades >= 501 && $unidades <= 3000) {
    		$calculo_p = $precio_inicio / 0.8;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 3.50/0.80;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	} else if ($unidades >= 3001) {
    		$calculo_p = $precio_inicio / 0.85;
    		$punidades = $calculo_p * $unidades;
    		$plaser = 3.50/0.80;
    		$preciolas = $plaser * $unidades;
    		$calculo_total = $punidades + $preciolas;
    	}
    	$ctinta = 0;
    	$ctecnica = $plaser;
    }

    $precio = $calculo_total;
    $precio_uni = $calculo_p;
    //$sql="SELECT nombre, modelo FROM productos WHERE modelo = '$productID' ";

    $sql = "SELECT  
    A.modelo,
    B.nombre 
    FROM 
    precios_promoopcion A 
    JOIN prod_promoopcion B ON A.modelo = B.modelo
    WHERE B.modelo='$productID'";
    $query = $conexion->query($sql);
    $row = $query->fetch_assoc();
    $id = $row['modelo'];
    $name=  $row['nombre'];

    $itemData = array(
    	'id' => $id,
    	'name' => $name,
    	'price' => $precio,
    	'pu' => $precio_uni,
    	'qty' => $unidades,
    	'color' => $color,
    	'tecnica' => $tecnica,
    	'tinta' => $tinta,
    	'ctinta' => $ctinta,
    	'ctecnica' => $ctecnica,
    	'cplaca'=>$precio_placa,
    	'cbordado'=>$bprenda
    );

    return $itemData;   
}

function fnInsertarOrden($session,$cart,$fecha,$nom,$tel,$correo){

	global $conexion;

	$ordensql="INSERT INTO orden (customer_id, sub_total, created, modified,nombre,telefono,correo)
	VALUES ('$session','".$cart->total()."','$fecha', '$fecha','$nom','$tel','$correo')";

	$insertOrder = $conexion->query($ordensql);

	$orderID = $conexion->insert_id;
	$sql = '';
	$cartItems = $cart->contents();



	foreach ($cartItems as $item) {

		$orderID;
		$id = $item['id'];


		$can = $item['qty'];
		$col = $item['color'] ;
		$tin = $item['tinta'] ;
		$tec = $item['tecnica'] ;


		$nom_pro=$item ['name'];
		$precio_unitario = $item['pu'];
		$costo_tecnica = $item['ctecnica'] ;
		$costo_tinta_extra = $item['ctinta'];
		$costo_placa = $item['cplaca'];
		$bordado_prenda = $item['cbordado'] ;
		$sub_total = $item['price'] ;
		$iva = $item['price'] * .16 ;
		$total = $sub_total + $iva ;





		$sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity,tecnica,tinta,color, nombre_pro, precio_unitario, costo_tecnica, costo_tinta_extra, costo_placa, costo_bordado, sub_total, iva, total)
		VALUES ('$orderID','$id','$can','$tec','$tin','$col','$nom_pro','$precio_unitario','$costo_tecnica','$costo_tinta_extra','$costo_placa','$bordado_prenda','$sub_total','$iva','$total');";
	}

	$insertOrderItems = $conexion->multi_query($sql);

	if ($insertOrderItems) {
		$cart->destroy();
		header("Location: OrdenExito.php?id=$orderID&e=$correo&n=$nom");
	} else {
		header("Location: Pagos.php");
		echo "no inserta";
	}
}


function fnGetproductosPrincipal(){

    $conexion_uno = fnConexion();

    $aResponse = array();

    $sql ="SELECT 
    B.id_producto,
    A.precio,
    B.modelo,
    B.img
    FROM precios_promoopcion A 
    JOIN bran_productos B ON A.modelo = B.modelo

    WHERE B.categoria ='SALUD' ORDER BY RAND() LIMIT 12";

    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}

function fnGetWebService($id){

    include './libreria/lib/nusoap.php';

    $CardCode = 'DFE5737';

    $client = new nusoap_client('http://desktop.promoopcion.com:8095/wsFullFilmentMX/FullFilmentMX.asmx?wsdl','wsdl');

    $err = $client->getError();

    if ($err) {     

        echo 'Error en Constructor' . $err ;
    }

    $param = array('codigo' => $id,'distribuidor' => $CardCode);

    $fichaTecnica = $client->call('fichaTecnica', $param);

    return $fichaTecnica;

}


function fnGetImg($id_img){

    $conexion_uno = fnConexion();

    $aResponse = array();


    $sql="SELECT B.img,B.id_producto

    FROM bran_productos B

    WHERE B.modelo ='$id_img';


    ";

    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}


function fnGetproducto($id){

    $conexion_uno = fnConexion();

    $aResponse = array();

    $sql ="SELECT B.*,
    A.precio

    FROM precios_promoopcion A 
    JOIN bran_productos B ON A.modelo = B.modelo

    WHERE B.modelo ='$id'  limit 1";

    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}


function fnGetCategoriasP(){

    $conexion_uno = fnConexion();
    $catResponse = array();
    $sql ="SELECT
    C.nombre_cat,
    C.img_cat
    FROM categorias C
    ORDER BY RAND()
    LIMIT 18";

    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row=mysqli_fetch_array($query) ) { $catResponse[] = $row; }
        }
    }
    
    return $catResponse;
}


function fnGetColores($id){

    $conexion_uno = fnConexion();

    $aResponse = array();

    $sql ="SELECT B.color FROM bran_productos B WHERE B.modelo ='$id';";

    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}

function fnGetTecnica($id){

    $conexion_uno = fnConexion();

    $aResponse = array();

    $sql ="SELECT B.color FROM bran_productos B WHERE B.modelo ='$id';";

    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}

function fnGetBusquedaProductosCount($busqueda){

    $conexion_uno = fnConexion();

    $aResponse = array();


    if ($busqueda<>''){

        $palabras=explode(" ",$busqueda);
        $numero=count($palabras);

        if ($numero==1){ 

            $sql="SELECT COUNT(*) AS 'TOTAL' FROM bran_productos A
            JOIN precios_promoopcion B ON A.modelo = B.modelo 
            WHERE A.modelo LIKE '%$busqueda%' 
            OR A.nombre LIKE '%$busqueda%' 
            OR A.descripcion LIKE '%$busqueda%'
            OR A.color LIKE '%$busqueda%' 
            OR A.material LIKE '%$busqueda%' 
            OR A.impresion LIKE '%$busqueda%';";

        }elseif ($numero>1) {

            $sql="SELECT COUNT(*) AS 'TOTAL'
            FROM abrandin_3A.bran_productos A 
            JOIN precios_promoopcion B ON A.modelo = B.modelo  
            WHERE MATCH (A.modelo,A.nombre,A.descripcion,A.color,A.material,A.impresion)
            AGAINST ('$busqueda') ORDER BY busqueda DESC;";


        }
    }


    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}

function fnGetBusqueda($busqueda,$start,$num_pag){

    global $conexion;

    $aResponse = array();

    if ($busqueda<>''){

        $palabras=explode(" ",$busqueda);
        $numero=count($palabras);

        if ($numero==1){ 

            $sql="SELECT A.*,B.precio FROM bran_productos A
            JOIN precios_promoopcion B ON A.modelo = B.modelo 
            WHERE A.modelo LIKE '%$busqueda%' 
            OR A.nombre LIKE '%$busqueda%' 
            OR A.descripcion LIKE '%$busqueda%'
            OR A.color LIKE '%$busqueda%' 
            OR A.material LIKE '%$busqueda%' 
            OR A.impresion LIKE '%$busqueda%' LIMIT $start , $num_pag";


        }elseif ($numero>1) {

            $sql="SELECT A.*,B.precio FROM bran_productos A
            INNER JOIN precios_promoopcion B ON A.modelo = B.modelo
            Where Match(A.modelo,A.nombre,A.descripcion,A.color,A.material,A.impresion)
            AGAINST($v_clave) LIMIT  $start ,$num_pag";

        }
    }


    $query = $conexion->query($sql);

    while ($row = $query->fetch_assoc()){

        $aResponse[] = $row; 

    }

    return $aResponse;

}

function fnGetBusquedaProductosCategoriaCount($categorias){

    $conexion_uno = fnConexion();

    $aResponse = array();

    $sql="SELECT COUNT(*) AS 'TOTAL' FROM abrandin_3A.bran_productos A WHERE A.categoria='$categorias'";


    if($query = mysqli_query($conexion_uno, $sql)){

        if(mysqli_num_rows($query)>0){

            while( $row = mysqli_fetch_array($query) ) { 

                $aResponse[] = $row; 

            }

        }

    }

    return $aResponse;

}

function fnGetBusquedaCategorias($categorias,$start,$num_pag){

    global $conexion;

    $aResponse = array();

     $sql="SELECT A.*,B.precio 
     FROM bran_productos A 
     LEFT JOIN precios_promoopcion B ON A.modelo = B.modelo  
     WHERE A.categoria ='$categorias' LIMIT  $start ,$num_pag";

    $query = $conexion->query($sql);

    while ($row = $query->fetch_assoc()){

        $aResponse[] = $row; 

    }

    return $aResponse;

}








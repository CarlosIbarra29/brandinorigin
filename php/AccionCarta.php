<?php


include './La-carta.php';

include '../funciones/cFunciones.php';

$cart = new Cart;

$productID = $_REQUEST['id'];
$tecnica = $_POST['tecnica'];
$unidades = $_POST['unidades'];
$precio_inicio = $_REQUEST['p'];



if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {

    if ($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])) {

        $itemData= fnPrecios($tecnica,$productID,$unidades,$precio_inicio);

        $insertItem = $cart->insert($itemData);

        $redirectLoc = 'VerCarta.php';
        
        header("Location: " . $redirectLoc);

    }elseif ($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])) {

        $deleteItem = $cart->remove($_REQUEST['id']);
        
        $redirectLoc = 'VerCarta.php';

        header("Location: " . $redirectLoc);

    }elseif ($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])) {
       
        $nom = $_GET['n'];
        $tel = $_GET['t'];
        $correo = $_GET['e'];

        $session= $_SESSION['sessCustomerID'];
        
        $cart->total_items();

        $fecha =  date("Y-m-d H:i:s");

        $orden = fnInsertarOrden($session,$cart,$fecha,$nom,$tel,$correo); 

    }

}










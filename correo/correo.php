
<?php

function envioCotizacion($destinatario,$id,$nom){

  $asunto = "ID Cotizacion 3A BRANDING: " . $id;
  $cuerpo = "

    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <title>3ABRANDING GROUP</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
    </head>
    <body>

    <div class='jumbotron text-center'>
    <img src='http://3abranding.com/logos/logo_3a.png' height='50px'><h2>3A BRANDING GROUP</h2>

    </div>

    <div class='container'>
    <div class='row'>
    <div class='col-sm-12'>                   
    <h4>Estimado $nom.</h4>
    <p>Cotización: <b>$id</b></p>
    <p>Muchas gracias por cotizar con 3A BRANDING GROUP, en un momento uno de nuestros vendedores se comunicará a la brevedad con usted. </p>
    
    <p>Saludos y gracias por la atención al presente. </p>
    </div>
    </div>
    <hr>
    <div class='row'>
    <div class='col-sm-12'>
    <h3>POLITICAS DE PAGO.</h3>
    <h4>GARANTÍA</h4>
    <p>
    3A BRANDING GROUP, S.A. de C.V. garantiza cualquier producto contra defecto de fabricación y de impresión por un lapso de 20 días naturales a partir de la fecha de entrega. Todo producto será repuesto por otro igual o del mismo precio. Las reclamaciones y aclaraciones se reciben por escrito vía correo electrónico en un plazo no mayor a 3 días naturales del vencimiento de la garantía.
    </p>
    <h4>ENTREGA</h4>
    <p>
    El tiempo de entrega normal es de 7 a 10 días hábiles a partir de la fecha de autorización de originales o diseños. No nos hacemos responsables por demoras imputables al cliente, ni por cambios hechos sobre las instrucciones iniciales.
    Para la entrega de artículos sin impresión el tiempo será de 1 a 5 días naturales una vez confirmada la liquidación total del pedido. Los retrasos generados por el cliente afectan la fecha de entrega.
    Para el embarque de pedidos foráneos contamos con convenios con paqueterías, ahorrando hasta el 30% en su envío. Todo envío incluye seguro de la mercancía.
    Una vez aprobado el pedido toda cancelación por parte del cliente, será sujeta de cargo de un 25% correspondiente al valor de los artículos cancelados.
    La entrega de los artículos estará sujeta sin responsabilidad por nuestra parte a retrasos imprevistos tales como: emergencia nacional, regulaciones gubernamentales, cambios en la legislación aduanera, restricciones comerciales, dificultad en el abastecimiento de materias primas, demoras en los medios de transporte, de caso fortuito o de fuerza mayor.
    </p>
    <h4>CONDICIONES DE PAGO</h4>
    <p>
    Cualquier pedido requiere el 50% de anticipo incluyendo el IVA. El saldo del pedido deberá ser liquidado antes de la entrega o del embarque en caso de tratarse de un pedido foráneo. Todos los pedidos se surtirán una vez que el abono de los depósitos o transferencias efectuadas por el cliente haya sido confirmado por el banco.
    En caso de realizar pagos a través de un depósito o transferencia bancaria, le solicitamos atentamente hacerlo referenciado (Nombre del Cliente), y notificar a nuestro departamento de cobranza vía correo electrónico factura@3abranding.com
    De acuerdo con el artículo 193 de la ley de títulos y operaciones de crédito, se cobrará el 20% sobre el valor del cheque, en caso de ser devuelto por falta de fondos.
    </p>

    </div>
    </div>
    <hr>
    <div class='row'>
    <div class='col-sm-12 text-center'>
    2019 © 3A Branding 
    </div>
    </div>

    </div>

    </body>
    </html>     

    ";

//para el envÃ­o en formato HTML
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//direcciÃ³n del remitente
    $headers .= "From: Cotizacion 3A BRANDING GROUP <factura@3abranding.com>\r\n";

//direcciÃ³n de respuesta, si queremos que sea distinta que la del remitente
    $headers .= "Reply-To: factura@3abranding.com\r\n";
//ruta del mensaje desde origen a destino
    $headers .= "Return-path: factura@3abranding.com\r\n";

//direcciones que recibirÃ¡n copia oculta
    $headers .= "Bcc: ubonilla09@gmail.com\r\n";
    $headers .= "Bcc: contacto@3abranding.com\r\n";

    $correo= mail($destinatario, $asunto, $cuerpo, $headers);




   
if (!$correo) {
    $errorMessage = "false";
}else{

    $errorMessage = "true";

}


    $itemData = array(
        "correo" => $errorMessage
    );

    return $itemData; 

}





<?php

$url = 'http://forpromotional.homelinux.com:9090/WsEstrategia/inventario';

//  Iniciamos curl
$curl = curl_init();
// Desactivamos verificación SSL
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
// Devuelve respuesta aunque sea falsa
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
// Especificamo los MIME-Type que son aceptables para la respuesta.
curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
// Establecemos la URL
curl_setopt( $curl, CURLOPT_URL, $url );
// Ejecutmos curl
$json = curl_exec( $curl );
// Cerramos curl
curl_close( $curl );
$respuestas = json_decode( $json, true );

var_dump( $respuestas );
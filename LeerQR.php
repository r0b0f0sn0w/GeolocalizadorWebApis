<?php
include_once 'DAL/conexion.php';

    $respuesta = array();
    $respuesta["usuario"] = array();  

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$QR =filter_var($obj->QR);
$sql="call SP_LEER_QR('$QR');";

        $myArray = traerDatos($sql);
    // Mantener el encabezado de respuesta a json
    header('Content-Type: application/json');
    //Escuchando el resultado de json
    echo json_encode($myArray);
?>
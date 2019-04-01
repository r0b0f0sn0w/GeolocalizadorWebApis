<?php
include_once 'DAL/conexion.php';

$respuesta["datos"] = array();  

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$id_Resp =filter_var($obj->id_Resp);
$QR =filter_var($obj->QR);

$sql="call SP_LEER_USUARIO_RESPONSABLE('$id_Resp','$QR');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["telefono"] = $row["telefono"];
        $tmp["telefono2"] = $row["telefono2"];
        $tmp["direccion"] = $row["direccion"];
        $tmp["id_portador"] = $row["id_portador"];
        // Push categoría a final json array
        array_push($respuesta["datos"], $tmp);
    }
    // Mantener el encabezado de respuesta a json
    header('Content-Type: application/json');
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
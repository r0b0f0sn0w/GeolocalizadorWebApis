<?php
include_once 'DAL/conexion.php';

$respuesta = array();
$respuesta["usuario"] = array();  

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$QR =filter_var($obj->QR);
$sql="call SP_LEER_QR('$QR');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["ur_nombre"] = $row["ur_nombre"];
        $tmp["ur_apellidoPat"] = $row["ur_apellidoPat"];
        $tmp["ur_correo_electronico"] = $row["ur_correo_electronico"];
        $tmp["up_nombre"] = $row["up_nombre"];
        $tmp["up_apellidoPat"] = $row["up_apellidoPat"];
        $tmp["up_apellidoMat"] = $row["up_apellidoMat"];
        $tmp["up_telefono"] = $row["up_telefono"];
        $tmp["up_telefono2"] = $row["up_telefono2"];
        $tmp["up_direccion"] = $row["up_direccion"];
        $tmp["up_padecimiento"] = $row["up_padecimiento"];
        $tmp["up_descripcion"] = $row["up_descripcion"];
        
        // Push categoría a final json array
        array_push($respuesta["usuario"], $tmp);
    }
    
    // Mantener el encabezado de respuesta a json
    header('Content-Type: application/json');
    
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
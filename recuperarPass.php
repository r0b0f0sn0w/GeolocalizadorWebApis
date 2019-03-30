<?php
include_once 'DAL/conexion.php';

$respuesta["usuario"] = array();

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$id_user =filter_var($obj->usuario);

$sql="call SP_LEER_USUARIOSPORTADORES('$id_user');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["up_nombre"] = $row["up_nombre"];
        $tmp["up_apellidopat"] = $row["up_apellidoPat"];
        $tmp["up_apellidomat"] = $row["up_apellidoMat"];
        $tmp["up_telefono"] = $row["up_telefono"];
        $tmp["up_telefono2"] = $row["up_telefono2"];
        $tmp["up_direccion"] = $row["up_direccion"];
        // Push categoría a final json array
        array_push($respuesta["usuario"], $tmp);
    }
    // Mantener el encabezado de respuesta a json
    header('Content-Type: application/json');
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
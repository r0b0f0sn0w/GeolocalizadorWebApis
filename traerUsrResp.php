<?php
include_once 'DAL/conexion.php';

$respuesta["datos"] = array();  

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$id =filter_var($obj->id);

$sql="CALL SP_TRAER_USUARIO_RESPONSABLE('$id');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["nombre"] = $row["nombre"];
        $tmp["apellidoPat"] = $row["apellidoPat"];
        $tmp["apellidoMat"] = $row["apellidoMat"];
        $tmp["telefono"] = $row["telefono"];
        $tmp["telefono2"] = $row["telefono2"];
        $tmp["direccion"] = $row["direccion"];
        // Push categoría a final json array
        array_push($respuesta["datos"], $tmp);
    }
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
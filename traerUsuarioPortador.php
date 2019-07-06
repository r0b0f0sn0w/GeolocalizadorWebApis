<?php
include_once 'DAL/conexion.php';

$respuesta["datos"] = array();  

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$id_user =filter_var($obj->usuario);
$nombre =filter_var($obj->nombre);
$appat=filter_var($obj->appat);
$apmat =filter_var($obj->apmat);

$sql="call SP_LEER_USUARIO('$id_user','$nombre','$appat','$apmat');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["id"] = $row["id"];
        $tmp["nombre"] = $row["nombre"];
        $tmp["apellidoPat"] = $row["apellidoPat"];
        $tmp["apellidoMat"] = $row["apellidoMat"];
        $tmp["telefono"] = $row["telefono"];
        $tmp["telefono2"] = $row["telefono2"];
        $tmp["direccion"] = $row["direccion"];
        $tmp["nombre_padecimiento"] = $row["nombre_padecimiento"];
        $tmp["descripcion"] = $row["descripcion"];
        // Push categoría a final json array
        array_push($respuesta["datos"], $tmp);
    }
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
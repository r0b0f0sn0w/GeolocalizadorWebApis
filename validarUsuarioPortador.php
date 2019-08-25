<?php
include_once 'DAL/conexion.php';

$respuesta = array();
$respuesta["usuario"] = array();  

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$QR =filter_var($obj->QR);
    $sql="call SP_VALIDAR_PORTADOR('$QR');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["id_usuarioResp"] = $row["id_usuarioResp"];
        array_push($respuesta["usuario"], $tmp);
    }
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
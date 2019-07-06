<?php
include_once 'DAL/conexion.php';

$respuesta["correo_electronico"] = array();

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$email =filter_var($obj->correo_electronico);
trim($email);
$sql="call SP_VALIDAR_CORREO('$email');";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["correo_electronico"] = $row["correo_electronico"];
        $tmp["id_usuarioResp"] = $row["id_usuarioResp"];
        // Push categoría a final json array
        array_push($respuesta["correo_electronico"], $tmp);
    }
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
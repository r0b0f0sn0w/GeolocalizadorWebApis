<?php
include_once 'DAL/conexion.php';

$respuesta["usuario"] = array();  

$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$correo =filter_var($obj->correo);
$jspassword =filter_var($obj->password);

$sql="call SP_LOGIN('$correo','$jspassword');";
echo $sql;
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["id_usuarioResp"] = $row["id_usuarioResp"];
        $tmp["nombre"] = $row["nombre"];
        $tmp["apellidoPat"] = $row["apellidoPat"];
        $tmp["estado"] = $row["estado"];
        // Push categoría a final json array
        array_push($respuesta["usuario"], $tmp);
    }
    // Mantener el encabezado de respuesta a json
    header('Content-Type: application/json');
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
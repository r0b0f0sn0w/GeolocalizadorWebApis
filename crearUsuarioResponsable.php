<?php
include ("DAL/conexion.php");

$json=file_get_contents('php://input');
$obj=json_decode($json);
$nombre =filter_var($obj->nombre);
$apepat =filter_var($obj->apepat);
$apemat =filter_var($obj->apemat);
$telefono =filter_var($obj->telefono);
$telefono2 =filter_var($obj->telefono2);
$direccion =filter_var($obj->direccion);
$correo_electronico =filter_var($obj->correo_electronico);
$password =filter_var($obj->password);
$sql="call SP_REGISTRAR_USUARIO_RESPONSABLE('$nombre','$apepat','$apemat','$telefono','$telefono2','$direccion','$correo_electronico','$password');";

if(ejecutar($sql)){
    echo "ejecutado correcto"; 
}else{
    echo "no :c";
}
?>
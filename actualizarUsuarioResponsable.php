<?php
include ("DAL/conexion.php");
$json=file_get_contents('php://input');

$obj=json_decode($json);
$id_usuarioResp =filter_var($obj->id_usuarioResp);
$nombre =filter_var($obj->nombre);
$apepat =filter_var($obj->apepat);
$apemat =filter_var($obj->apemat);
$telefono =filter_var($obj->telefono);
$telefono2 =filter_var($obj->telefono2);
$direccion =filter_var($obj->direccion);

$sql="call SP_ACTUALIZAR_USUARIO_RESPONSABLE('$id_usuarioResp','$nombre','$apepat','$apemat','$telefono','$telefono2','$direccion');";
echo $sql;
if(ejecutar($sql)){
    echo "update";      
}else{
    echo "no :c";
}
?>
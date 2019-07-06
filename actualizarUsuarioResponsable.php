<?php
include ("DAL/conexion.php");
$json=file_get_contents('php://input');
$respuesta["mensaje"] = array();
$obj=json_decode($json);
$id_usuarioResp =filter_var($obj->id);
$nombre =filter_var($obj->nombre);
$apepat =filter_var($obj->apepat);
$apemat =filter_var($obj->apemat);
$telefono =filter_var($obj->telefono);
$telefono2 =filter_var($obj->telefono2);
$direccion =filter_var($obj->direccion);
$sql="call SP_ACTUALIZAR_USUARIO_RESPONSABLE('$id_usuarioResp','$nombre','$apepat','$apemat','$telefono','$telefono2','$direccion');";
if(ejecutar($sql)){
    $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
    }else{
        $tmp=array("mensaje"=>"no");
        array_push($respuesta["mensaje"],$tmp);
        echo json_encode($respuesta);
}
?>
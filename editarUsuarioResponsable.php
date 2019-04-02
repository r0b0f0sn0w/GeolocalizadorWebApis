<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
    header('Content-Type: application/json');
$json=file_get_contents('php://input');
$obj=json_decode($json);
$id=filter_var($obj->id);
$nombre=filter_var($obj->nombre);
$appat=filter_var($obj->appat);
$apmat=filter_var($obj->apmat);
$telefono=filter_var($obj->telefono);
$telefono2=filter_var($obj->telefono2);
$direccion=filter_var($obj->direccion);

$sql="call SP_ACTUALIZAR_USUARIO_RESPONSABLE('$idportador','$nombre','$appat','$apmat','$telefono','$telefono2','$direccion','$idresp','$descripcion','$padecimiento');";
//echo $sql;
//Valida si se ejecuto la sentencia sql correctamente
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
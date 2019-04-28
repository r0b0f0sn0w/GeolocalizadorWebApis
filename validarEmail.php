<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
    header('Content-Type: application/json');
$json=file_get_contents('php://input');
$obj=json_decode($json);
//$id=filter_var($obj->id);
$correo_electronico=filter_var($obj->email);
trim($correo_electronico);
$sql = "call SP_ACTIVAR_CUENTA('$correo_electronico');";
//echo $sql;
if(ejecutar($sql)){
    echo '<p>Se ha verificado su cuenta</p>';
    /**$tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);*/
    }else{
        echo '<p>No se ha podido verificar su cuenta, intente más tarde</p>';
        /*
        $tmp=array("mensaje"=>"no");
        array_push($respuesta["mensaje"],$tmp);
        echo json_encode($respuesta);*/
}
<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
$json=file_get_contents('php://input');
$obj=json_decode($json);
$id =filter_var($obj->id);
$sql="call SP_DESACTIVAR_CUENTA_RESPONSABLE('$id');";
echo $sql;
//Valida si se ejecuto la sentencia sql correctamente
if(ejecutar($sql)){
            $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
        }else {
           $tmp=array("mensaje"=>"no");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
        }//Cierra else
?>
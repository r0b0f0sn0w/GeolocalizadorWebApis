<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
$json=file_get_contents('php://input');
$obj=json_decode($json);
$id=filter_var($obj->id);
$correo_electronico=filter_var($obj->email);
$pass1=filter_var($obj->pass1);

$sql = "call SP_CAMBIA_PASS($correo_electronico,$id,'$pass1');";
//echo $sql;
if(ejecutar($sql)){
    echo '<p>Se actualizó correctamente su contraseña y se activo su cuenta</p>';
    /**$tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);*/
    }else{
        echo '<p>No se ha podido actualizar correctamente su contraseña o activar su cuenta, intente mas tarde</p>';
        /*
        $tmp=array("mensaje"=>"no");
        array_push($respuesta["mensaje"],$tmp);
        echo json_encode($respuesta);*/
}
<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
$json=file_get_contents('php://input');
$obj=json_decode($json);
$id=filter_var($obj->id);
$filename = "imagenesPortadores/".$id.".jpg";
if (file_exists($filename)) {
    unlink($filename);
    $sql="call SP_ELIMINAR_USUARIO_PORTADOR('$id');";
if(ejecutar($sql)){
    $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
    }else{
        $tmp=array("mensaje"=>"no");
        array_push($respuesta["mensaje"],$tmp);
        echo json_encode($respuesta);
    }
}else{
    $tmp=array("mensaje"=>"no");
    array_push($respuesta["mensaje"],$tmp);
    echo json_encode($respuesta);
}
?>
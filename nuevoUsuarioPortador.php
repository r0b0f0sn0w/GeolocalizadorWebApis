<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
$json=file_get_contents('php://input');
$obj=json_decode($json);
$idresp=filter_var($obj->idresp);
$imagen=filter_var($obj->imagen);
$idportador=filter_var($obj->idportador);
$path = "imagenesPortadores/$idportador.jpg";
file_put_contents($path,base64_decode($imagen));
$url="https://raesaldro.000webhostapp.com/WebServicesGeolocalizador/".$path;
$nombre=filter_var($obj->nombre);
$appat=filter_var($obj->appat);
$apmat=filter_var($obj->apmat);
$telefono=filter_var($obj->telefono);
$telefono2=filter_var($obj->telefono2);
$direccion=filter_var($obj->direccion);
$padecimiento=filter_var($obj->padecimiento);
$descripcion=filter_var($obj->descripcion);
$QR=filter_var($obj->QR);
$sql="call SP_NUEVO_USUARIO_PORTADOR('$QR','$idportador','$nombre','$appat','$apmat','$telefono','$telefono2','$direccion','$idresp','$descripcion','$padecimiento','$url');";
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
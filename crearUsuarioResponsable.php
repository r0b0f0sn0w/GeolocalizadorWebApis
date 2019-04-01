<?php
include ("DAL/conexion.php");
$respuesta["mensaje"] = array();
    header('Content-Type: application/json');
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
//Valida si se ejecuto la sentencia sql correctamente
if(ejecutar($sql)){
        $from = "geolocalizadorUT@gmail.com";
        $to = $correo_electronico;
        $subject = "Bienvenido a geolocalizador!";
        $message = "Bienvenido la aplicacion geolocalizador, para activa su cuenta usted necesita acceder a:";
        $header = "From:" . $from;
        if (mail($to,  utf8_decode($subject), utf8_decode($message), $header)) {
            $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
        } else {
           $tmp=array("mensaje"=>"no");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
         }//Cierra else anidado
        }else{
           $tmp=array("mensaje"=>"no");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
}
?>
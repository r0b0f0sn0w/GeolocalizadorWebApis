<?php

$respuesta["mensaje"] = array();  
  
$tmp=array('"mensaje":"ok"','"mensaje":"no"');
$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$email =filter_var($obj->correo_electronico);
trim($email);
    header('Content-Type: text/html; charset=UTF-8');
    header('Content-Type: application/json');

$from = "geolocalizadorUT@gmail.com";
$to = $email;
$subject = "Restablecimiento de contraseña";
$message = "Usted solitó restablecer su contraseña, puede restablecerla siguiendo la siguiente URL: ";
$headers = "From:" . $from;
if (mail($to,  utf8_decode($subject), utf8_decode($message), $header)) {
            $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
} else {
            $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
}
?>
<?php
$respuesta["mensaje"] = array();  
$json=file_get_contents('php://input');
$obj=json_decode($json);
$email =filter_var($obj->correo_electronico);
$id =filter_var($obj->id_usuarioResp);
trim($email);
    header('Content-Type: text/html; charset=UTF-8');
    header('Content-Type: application/json');

$from = "geolocalizadorUT@gmail.com";
$to = $email;
$subject = "Restablecimiento de contraseña y/o activacion de su cuenta";
$message = 'Usted solitó restablecer su contraseña, puede restablecerla siguiendo la siguiente URL: '.'https://raesaldro.000webhostapp.com/WebServicesGeolocalizador/restablecerPassword.php?correo='.$email.'&id='.$id;
$headers = "From:" . $from;
if (mail($to,  utf8_decode($subject), utf8_decode($message), $headers)) {
            $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
} else {
            $tmp=array("mensaje"=>"ok");
            array_push($respuesta["mensaje"],$tmp);
            echo json_encode($respuesta);
}
?>
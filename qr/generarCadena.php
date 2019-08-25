 <?php

function generarCadena($caracteres=5){
    $caracteresPosibles = "0123456789ABCDEF";
    $azar = '';
	$cadena='';
	
    for($i=0; $i<$caracteres; $i++){
        $azar .= $caracteresPosibles[rand(0,strlen($caracteresPosibles)-1)];
    }
	
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
	$length = 5;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $cadena=$azar.$randomString;
	sha1($cadena);
	trim($cadena);
    return $cadena;

}
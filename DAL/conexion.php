<?php
function conectarBD(){
    $con= mysqli_connect("localhost", "root", "", "geolocalizador");
    return $con;
}//cierra el metodo de conexion a la bse de datos

function desconectarBD($con){
    $cerrarconexion= mysqli_close($con);
    return $cerrarconexion;
}//Cierra el metodo de cerrar conexion

function ejecutar($sql){
    $conexion=conectarBD();
    mysqli_query($conexion,"set names 'utf8'");
    if(!$resultado= mysqli_query($conexion,$sql)) die();
    desconectarBD($conexion);
    return true;
}
function traerDatos($sql){
    $conexion=conectarBD();
    mysqli_query($conexion,"set names 'utf8'");
    if(!$resultado= mysqli_query($conexion,$sql)) die();
    $arregloRespuesta=array();
    $i=0;
    while($fila= mysqli_fetch_array($resultado)){
        $arregloRespuesta[$i]=$fila;
        $i++;
    }//Cierra while
    desconectarBD($conexion);
    return $arregloRespuesta;
}
?>

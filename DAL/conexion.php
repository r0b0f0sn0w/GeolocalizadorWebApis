<?php
/*

function conectarBD(){
    $con= mysqli_connect("localhost", "id8869452_alex", "477115", "id8869452_db");
    return $con;
}//cierra el metodo de conexion a la bse de datos
*/
function conectarBD(){
    $con= mysqli_connect("localhost", "root", "", "geolocalizador");
    return $con;
}//cierra el metodo de conexion a la base de datos
function desconectarBD($con){
    $cerrarconexion= mysqli_close($con);
    return $cerrarconexion;
}//Cierra el metodo de cerrar conexion
$sent="CREATE VIEW `vista_todos_docentes`  AS  select `docente`.`id_docente` AS `id_docente`,`docente`.`nombre_docente` AS `nombre_docente`,`docente`.`apellido_pat` AS `apellido_pat`,`docente`.`apellido_mat` AS `apellido_mat`,`docente`.`matricula` AS `matricula`,`docente`.`correo_electronico` AS `correo_electronico`,`docente`.`fecha_nacimiento` AS `fecha_nacimiento`,`tipo_docente`.`tipo` AS `tipo` from (`docente` join `tipo_docente` on((`docente`.`id_tipo_docente` = `tipo_docente`.`id_tipo_docente`))) where (`docente`.`estado` = 1) ;";
ejecutar($sent);
function ejecutar($sql){
    $conexion=conectarBD();
    mysqli_query($conexion,"set names 'utf8'");
    if(!$resultado= mysqli_query($conexion,$sql)) die();
    desconectarBD($conexion);
    return true;
}

function traerDatos($sql){
    //Creamos la conexión con la función anterior
    $conexion = conectarBD();
    //generamos la consulta
        mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
    $rawdata = array(); //creamos un array
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    desconectarBD($conexion); //desconectamos la base de datos
    return $rawdata; //devolvemos el array
}

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="geolocalizador"; // Database name 
/*
$host="localhost"; // Host name 
$username="id8869452_alex"; // Mysql username 
$password="477115"; // Mysql password 
$db_name="id8869452_db"; // Database name 
*/
?>

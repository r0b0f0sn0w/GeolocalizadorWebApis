<?php
include_once './conexion.php';

    $respuesta = array();
    $respuesta["materias"] = array();  

// Conectarse al servidor y seleccionar base de datos.
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect server "); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$titulo =filter_var($obj->titulo);
$sql="SELECT * FROM biblioteca where titulo='$titulo';";
$result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        // Array temporal para crear una sola categoría
        $tmp = array();
        $tmp["id"] = $row["id"];
        $tmp["tipomaterial"] = $row["tipomaterial"];
        $tmp["codigo"] = $row["codigo"];
        $tmp["autor"] = $row["autor"];
        $tmp["titulo"] = $row["titulo"];
        $tmp["anio"] = $row["anio"];
        $tmp["status"] = $row["status"];
        
        // Push categoría a final json array
        array_push($respuesta["materias"], $tmp);
    }
    //Escuchando el resultado de json
    echo json_encode($respuesta);
?>
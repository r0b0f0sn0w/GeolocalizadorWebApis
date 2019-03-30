<?php

include ("DAL/conexion.php");

$id = $_POST['id_usuarioResp'];
$correo = $_POST['correo'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];


$sql = "call SP_CAMBIA_PASS('$correo',$id,'$pass1');";
//echo $sql;
if (ejecutar($sql)) {
    echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Correcto!</strong> EL docente fue actualizado correctamente.</div>";
} else {
echo "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>¡Error!</strong> No fue posible actualizar los datos del docente.</div>";
}

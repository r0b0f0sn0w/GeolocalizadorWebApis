<?php
include ("DAL/conexion.php");
$sql="insert into ";

if(ejecutar($sql)){
    echo "ejecutado correcto";
}else{
    echo "no :c";
}
?>
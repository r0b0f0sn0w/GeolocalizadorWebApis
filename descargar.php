<?php
$file= file("temp/prueba.png");
$file2= implode("",$file);
header("Content-Type: application/octet-stream");
header("content-Disposition: attachment; filename=prueba.png");
echo $file2;
?>
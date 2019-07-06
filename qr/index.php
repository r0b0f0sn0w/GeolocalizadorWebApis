<?php
//conexion a la base de datos
include ("generarCadena.php");
require_once '../DAL/conexion.php';
//cargtamos la libreria para generar el QR
require_once('phpqrcode/qrlib.php');

$codigo='';
function generarQR(){
//directorio donde se guardara la imagen
    $dir='temp/';
if(!file_exists($dir))
    //en caso de que no exista la carpeta la creamos con mkdir
    mkdir($dir);
    //pasamos la ruta de la imagen
    $filename=$dir.'prueba.png';
    //configuracion del codigo QR
    $size=3;    //Tamanio de la imagen que se creara
    $level='L'; //precicion del codigo que tan definido se vera, puede ser L, Q, H
    $frameSize=3;   //tamaño del marco del qr
    $url="";
    $content='https://raesaldro.000webhostapp.com/WebServicesGeolocalizador/LeerEncontrado.php?QR='.generarCadena();  //contenido, mandamos a llamar al metodo que genera cadenas
    $codigo=$content;
    echo 'Contenido del QR: '.'<br>'.'<p id="contenido" value="hola">'.$content.'</p>';
    echo '<br>';
    QRcode::png($content,$filename,$level,$size,$frameSize);
    echo '<img src="'.$filename.'"/>'.'<br>';
}
generarQR();

echo <<<XD

XD;
?>

<html>
    <form method="POST" action="descargar.php" enctype="multipart/form-data">
        <p>Descarga</p>
        <input name="enviar" type="submit" value="Descargar imagen">
    </form>
    <form method="POST" action="" enctype="multipart/form-data">
        <p>Selecciona el archivo del QR</p>
        <input type="file" name="imagen">
        <p>Valor del Qr:</p>
        <input type="text" name="contenido">
        <br>
        <br>
        <button type="submit" name="btn">Subir al servidor</button>
    </form>
</html>
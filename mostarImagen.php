<?php
$db = mysqli_connect("localhost","root","","geolocalizador"); //keep your db name
$sql = "select fotografia from usuarioportador where id_usuarioportador=2;";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['fotografia'] ).'"/>';
?>
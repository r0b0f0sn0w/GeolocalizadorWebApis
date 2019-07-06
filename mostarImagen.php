<?php
$db = mysqli_connect("raesaldro.000webhostapp.com","id8869452_alex","477115","id8869452_db"); //keep your db name
$sql = "select fotografia from usuarioportador where id_usuarioportador=3;";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['fotografia'] ).'"/>';
?>
<?php
include_once 'DAL/conexion.php';
        $QR=$_REQUEST ['QR'];
	$sql="call SP_LEER_QR('$QR');";
	$arregloCategorias=traerDatos($sql);
        $resultados= count($arregloCategorias);
        if($resultados==0){
            echo <<<xd
            <html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro no encontrado</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h2>No hemos podido encontrar al usuario que estas consultando</h2>
			</div>
			<a >Intenta escanear otro codigo </a>
		</div>
	</div>

</body>
</html>

xd;
        }else{
	foreach($arregloCategorias as $item){
		$ur_nombre=$item['ur_nombre'];
		$ur_apellidoPat=$item['ur_apellidoPat'];
		$ur_apellidoMat=$item['ur_apellidoMat'];
		$ur_correo_electronico=$item['ur_correo_electronico'];
		$up_nombre=$item['up_nombre'];
		$up_apellidoPat=$item['up_apellidoPat'];
		$up_apellidoMat=$item['up_apellidoMat'];
		$up_direccion=$item['up_direccion'];
		$up_telefono=$item['up_telefono'];
		$up_telefono2=$item['up_telefono2'];
		$up_padecimiento=$item['up_padecimiento'];
		$up_descripcion=$item['up_descripcion'];
		$url=$item['url'];
   echo <<<XD
                <html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="js/script.js" type="text/javascript"></script>
			<title>Sistema de geolocalizacion electrónica</title>
    </head>
    <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	    <a class="navbar-brand" href="#">Sistema de geolocalizacion electrónica</a>
	</nav>
	<div class="content-wrapper">
	    <div style="margin-top: 75px;" class="container-fluid">
		<div class="card mb-3">
		    <div class="card-header">
			<i></i> Informacion sobre el usuario identificado
		    </div>
		    <div class="card-body">
			<div class="row">
			    <div class="col">
				<div class="form-group">
				    <label>Fotografía:</label>
				    <center style="background: #e9ecef; border-radius: 10px; border: 1px solid #ced4da;">
					<img style="border-radius: 10px;" class="img-fluid" src="$url" alt="Usuario">
				    </center>
				</div>
			    </div>
			    <div class="col">
				<form>
				    <div class="form-group">
					<label>Usuario que se identificó:</label>
					<p>$up_nombre $up_apellidoPat $up_apellidoMat</p>
				    </div>
				    <div class="form-group">
					<label>Dirección:</label>
					<p>$up_direccion </p>
				    </div>
				    <div class="form-group">
					<label>Telefono de contacto:</label>
					<p>$up_telefono</p>
				    </div>
				    <div class="form-group">
					<label>Telefono de contacto 2:</label>
					<p>$up_telefono2</p>
				    </div>
				    <div class="form-group">
					<label>Padecimientos:</label>
					<p>$up_padecimiento</p>
				    </div>
				    <div class="form-group">
					<label>Observaciones:</label>
					<p>$up_descripcion</p>
				    </div>
				    <div class="form-group">
					<label>Usuario que usted puede contactar:</label>
					<p>$ur_nombre $ur_apellidoPat $ur_apellidoMat </p>
				    </div>
				    <div class="form-group">
					<label>Correo electrico:</label>
					<p>$ur_correo_electronico</p>
				    </div>
				</form>
			    </div>
			</div>
		    </div>
		    <div class="card-footer small text-muted">Información sobre el usuario identificado</div>
		</div>
	    </div>
	</div>
    </body>
</html>
XD;
                }
        }
?>

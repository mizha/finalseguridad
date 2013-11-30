<?
session_start();
if(!isset($_SESSION)){
header("location: iniciarSesion.php");
} else {
session_unset();
session_destroy();
?>
<?php include("conexion.php")?>
<?php include("libPrincipal.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JCI COCHABAMBA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<!-- <img src="imagenes/Pagina Dia.jpg"> -->
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido">
  		<center><h1>Acaba de Terminar su sesion</h1><br><br>
		   <a href="iniciarSesion.php">Iniciar Sesion</a><br><br>
		   <a href="Registro/registro.php">Registrarse</a><br><br>
		   <a href="index.php">Pagina Principal</a><br><br>
	   </center>
	   </div>
<? }?>
<div class="corte"></div> 
</div> 
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>

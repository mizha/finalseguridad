<?php include("libSesion.php");?>
<?php include("conexion.php")?>
<?php include("libPrincipal.php");?>
<?php include("AlbumDeFotos/libAlbum.php");?>
<?php include("funciones.php");?>
<?php include("libGeneral.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JCI COCHABAMBA - Album De Fotos</title>
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
		<form action="AlbumDeFotos/albumdefotos.php" method="get"  name="form">
		 	<? crearSelect();?>
			<input name="Subir" type="submit" value="Abrir">
		</form>
 </div> 
<div class="corte"></div> 
</div> 
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
<?php include("libSesion.php");?>
<?php include("conexion.php")?>
<?php include("libPrincipal.php");?>
<?php include("Video/libVideo.php");?>
<?php include("funciones.php");?>
<?php include("libGeneral.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JCI COCHABAMBA - Video</title>
<? crearLayers();?>
<SCRIPT LANGUAGE="JavaScript" src="Video/layers.js"></SCRIPT>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
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
  	<div style="font-size: 25px; left: 0px; width: 280px; font-family: Helvetica, Arial, sans-serif; position: absolute; top: -30px; background-color: #0066CC; layer-background-color: #0066CC; border: 1px none #000000;">
<a href="javascript:showLayerNumber(1)"><font face="Helvetica" color="#000000" size="3"><strong>INICIO</strong></font></a> <br />
<?php colocarNombres();?>
</div>
<div id="layer1">Para poder ver los videos solo da click en el que desees ver, y este se reproducira en unos minutos</div>
<? colocarVideos();?>
</div> 
<div class="corte"></div> 
</div> 
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
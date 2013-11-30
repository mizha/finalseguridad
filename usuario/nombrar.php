<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libUsuario.php");

if($regis=="SI") 
 {
 	if($tipo==5)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nombrar nuevo Presidente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido">
		<center><h1>Nombrar nuevo Presidente</h1></center>
		<div align="center">
			<table width="100%" height="100%">
				<tr>
					<td>
					<form name="bus" method="get" action="<? $_SERVER['PHP_SELF']; ?>">
					<h3>Buscar <input type="text" name="busqueda" id="busqueda">&nbsp;&nbsp;<input type="hidden" name="tabla" value="cel">&nbsp;&nbsp;<input type="submit" name="Buscar" value="Buscar"></h3></form></td>
				</tr>
				<tr>
					<td>
						<? 
							$busqueda=$_GET["busqueda"];
							if($busqueda!=""){
								buscar($busqueda);
							}
						?>
					</td>
				</tr>
			</table>
		</div>
	</div> 
<div class="corte"></div> 
</div>
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
<?php }
	else{
//	echo "No tienes acceso a esta pagina";
?>
<SCRIPT LANGUAGE="javascript">
alert("No tienes acceso a esta pagina");
location.href = "../index.php";
</SCRIPT>
<?
	}
 }
 else{
// echo "El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area";
 ?>
<SCRIPT LANGUAGE="javascript">
alert("El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area");
location.href = "../iniciarsesion.php";
</SCRIPT>
<?
 }
?> 
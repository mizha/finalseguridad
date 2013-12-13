<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libUsuario.php");

if($regis=="SI" OR $regis=="NO") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Perfil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
<!--<link href="estilo.css" rel="stylesheet" type="text/css">-->
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
		<? $id=$_GET["id"];
		    $pagina=1;
		?>
		<? if($regis=="SI"){
		//echo "<center><h2><a href=\"modificarContra.php?id=".$id."\">Cambiar contrasenia</a></h2></center>";
		echo "<center><h2><a href=\"ver_log.php?pagina=1\">ver logs</a></h2></center>";
		echo "<center><h2><a href=\"modificarperfil.php?id=".$id."\">Modificar Tu Perfil</a></h2></center>";}?>
		<? mostrarPerfil($id);?>
		<? mostrarEmpresa($id);?>
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
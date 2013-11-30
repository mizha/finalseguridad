<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI") 
 {
 	if($tipo==5)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nuevo Cargo</title>
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
	<script>
		function validar()
		{
			if(document.cargo.nombreCargo.value.length==0)
			{
				alert("El Cargo es necesario");
				document.cargo.nombreCargo.focus();
				return 0;
			}
			if(document.cargo.nombreCargo.value.length<=5 || document.cargo.nombreCargo.value.length>=200)
			{
				alert("El Cargo es invalido");
				document.cargo.nombreCargo.focus();
				return 0;
			}
			document.cargo.submit();
		}
	</script>
	<? 
		if($_POST["nombreCargo"]!=NULL)
		{
			$tabla=$_POST["grupo"];
			$sql="INSERT INTO `".$tabla."` VALUES ('','".$_POST["nombreCargo"]."')";
			$res=mysql_db_query("jci",$sql);
		?><script>alert("Se ha creado un nuevo cargo");</script>
		<? }?>
	
		<div align="center">
		<form name="cargo" method="post" action="<? $_SERVER['PHP_SELF'];?>">
			<table align="center" cellpadding="4" cellspacing="4">
				<tr>
					<td> Nombre Del Nuevo Cargo</td>
					<td><input type="text" name="nombreCargo" id="nombreCargo"></td>
				</tr>
				<tr>
					<td>Pertenece A</td>
					<td><select name="grupo">
					  <option value="cel">CEL</option>
					  <option value="jdl">JDL</option>
					</select></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" name="Guardar" value="Guardar" onClick="validar();"></td>
				</tr>
			</table>
		</form></div>
		<? mysql_close(); ?>
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
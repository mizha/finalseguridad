<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libExcel.php");

if($regis=="SI" OR $regis=="NO") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>A Excel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
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
		<? $busqueda=$_POST["busqueda"];
	
	$lista=array();
	$i=0;
	$nombre=$_POST["Nombre"];
	if($nombre!=NULL){$lista[$i++]=$nombre;}

	$apellido=$_POST["Apellido"];
	if($apellido!=NULL){$lista[$i++]=$apellido;}

	$telfDom=$_POST["telfDom"];
	if($telfDom!=NULL){$lista[$i++]=$telfDom;}

	$telfOf=$_POST["telfOf"];
	if($telfOf!=NULL){$lista[$i++]=$telfOf;}

	$celular=$_POST["celular"];
	if($celular!=NULL){$lista[$i++]=$celular;}

	$email=$_POST["email"];
	if($email!=NULL){$lista[$i++]=$email;}

	$fechanacimiento=$_POST["fechanacimiento"];
	if($fechanacimiento!=NULL){$lista[$i++]=$fechanacimiento;}

	$aniojci=$_POST["aniojci"];
	if($aniojci!=NULL){$lista[$i++]=$aniojci;}

	$ocupacionactual=$_POST["ocupacionactual"];
	if($ocupacionactual!=NULL){$lista[$i++]=$ocupacionactual;}

	$tipo=$_POST["tipo"];
	if($tipo!=NULL){$lista[$i++]=$tipo;}

	?>
	<h2>Estos son los datos a mostrar&nbsp;&nbsp;&nbsp;&nbsp; <input name="Estos No Son Los Datos" type="button" onClick="javascript:history.back();" value="Estos No Son Los Datos"></h2><br>
	<? $sql= crearSql($lista,$i,$busqueda);
	crearTabla($sql,$lista,$i);
	?>
	<br><br>
	<center>
	<fieldset style="width:300px;"><legend>Forma de Descarga</legend><br><br>
	<center>
	<form action="excel.php" method="post" target="_blank">
		<input name="Nombre" type="hidden" value="<? echo $nombre;?>">
		<input name="Apellido" type="hidden" value="<? echo $apellido;?>">
		<input name="telfDom" type="hidden" value="<? echo $telfDom;?>">
		<input name="telfOf" type="hidden" value="<? echo $telfOf;?>">
		<input name="celular" type="hidden" value="<? echo $celular;?>">
		<input name="email" type="hidden" value="<? echo $email;?>">
		<input name="fechanacimiento" type="hidden" value="<? echo $fechanacimiento;?>">
		<input name="aniojci" type="hidden" value="<? echo $aniojci;?>">
		<input name="ocupacionactual" type="hidden" value="<? echo $ocupacionactual;?>">
		<input name="tipo" type="hidden" value="<? echo $tipo;?>">
		<input name="sql" type="hidden" value="<? echo $sql;?>">
		Nombre de Archivo <input name="archivo" type="text">&nbsp;<input name="Excel" type="submit" value="Excel">
	</form><br><br>
	<form action="pdf.php" method="post"><input name="PDF" type="button" value="PDF"></form><br><br></center>
	</fieldset>
	</center>
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


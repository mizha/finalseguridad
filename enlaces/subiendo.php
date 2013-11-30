<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI") 
 {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nuevo Enlace</title>
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
<?
$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$usuario=$_POST["usuario"];
$fecha= date("d/m/Y");


$imagen_name= $_FILES['imagen']['name'];
$imagen_size= $_FILES['imagen']['size'];
$imagen_type=  $_FILES['imagen']['type'];
$imagen_temporal= $_FILES['imagen']['tmp_name'];
$lim_tamano=65000;


if ($imagen_type=="image/x-png" OR $imagen_type=="image/png"){
 $extension="image/png";
 }
if ($imagen_type=="image/pjpeg" OR $imagen_type=="image/jpeg"){
 $extension="image/jpeg";
 }
if ($imagen_type=="image/gif" OR $imagen_type=="image/gif"){
 $extension="image/gif";
 }


 if($imagen_size>$lim_tamano){echo '<h2>La imagen excede el tamaño no debe pasar de 2 MB</h2>';
 }

 

if ($imagen_name != "" AND $imagen_size != 0 AND $imagen_size<=$lim_tamano AND $extension !='')
	{
/*reconversion de la imagen para meter en la tabla
 abrimos el fichero temporal en modo
 lectura "r" binaria"b"*/
$f1= fopen($imagen_temporal,"rb");
#leemos el fichero completo limitando
#  la lectura al tamaño de fichero		
$imagen_reconvertida = fread($f1, $imagen_size);
#anteponemos \ a las comillas que pudiera contener el fichero
# para evitar que sean interpretadas como final de cadena	
$imagen_reconvertida=addslashes($imagen_reconvertida);

$sql = "SELECT `IdCarpeta` FROM `carpetas` WHERE `Nombre` = '".$carpeta."'"; 
$res = mysql_db_query("jci",$sql);
$row= mysql_fetch_array($res);
$idCarpeta=$row["IdCarpeta"];
//echo 'Carpeta numero'.$idCarpeta.'<br>';
$bd = mysql_select_db ("imagen");

$query="INSERT INTO `enlace` VALUES ('','".$nombre."','".$descripcion."','".$ci."','".$imagen_reconvertida."','".$extension."','".$imagen_size."')"; 
$res=mysql_db_query("jci",$query);
if(mysql_affected_rows()!=0){
		mysql_close();
        print "<h1><CENTER>Link Subido Con exito!!</CENTER></h1>";
		echo '<h1><a href="../enlaces.php">Enlace</a></h1>';
}
else{print "<h1><CENTER>Ha Habido un problema al cargar el link</CENTER></h1>";
		echo '<h1><a href="nuevoenlace.php">Enlace</a></h1>';}
 }

else
	{
    echo "<h2>No ha podido transferirse el fichero</h2>";
	echo '<h1><br><a href="nuevoenlace.php">Agregar Otro Enlace</a></h1>';
 }
 


?>
</div> 
<div class="corte"></div> 
</div>
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
<?php 
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
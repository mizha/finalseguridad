<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI" OR $regis=="NO") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<html><head></head>
<?php
$bd = mysql_select_db ("tipovideo");
$categoria= $_POST["categoria"];
echo ' <p><h1>Categoria Agregada</h1></p> ';

$sql="INSERT INTO `tipovideo` (`IdTipo`, `Tipo`) VALUES ('', '".$categoria."')";  
$res = mysql_db_query("jci",$sql);

echo '<meta http-equiv="refresh" content="2;URL=../Video/nuevoVideo.php">';
mysql_close();
?>
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<body onload="alert('Categoria Agregada');">
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



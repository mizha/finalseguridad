<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<html><head></head>
<?php
$bd = mysql_select_db ("video");
$titulo=$_REQUEST["titulo"];
$categoria= $_REQUEST["categorias"];
$codigo= $_REQUEST["Codigo"];
echo ' <p><h1>Video Agregado</h1></p> ';
$query = "SELECT `IdTipo` FROM `tipovideo` WHERE `Tipo` = '".$categoria."'";
$row = mysql_db_query("jci",$query);
$tipo=mysql_fetch_array($row);
/*echo 'titulo=' .$titulo;
echo '<br>categoria'  .$categoria;
echo '<br>tipo'.$tipo["IdTipo"];
echo '<br>codigo'.$codigo;*/
$sql="INSERT INTO `video` (`IdVideo`, `Nombre`, `Codigo`, `Tipo`) VALUES ('', '".$titulo."', '".$codigo."', '".$tipo["IdTipo"]."')";  
$res = mysql_db_query("jci",$sql);

session_start();
    $ci = $_SESSION["ci"];
    $tiempo = date("Y/m/d");
    $query_log = "INSERT INTO log VALUES ('','$ci','Insertat','Ingreso de nuevo video con categoria $categoria, con titulo $titulo','$tiempo')";
    mysql_db_query("jci",$query_log);

echo '<meta http-equiv="refresh" content="2;URL=../Video.php">';
mysql_close();
?>
<link rel="stylesheet" href="../Images/emx_nav_left.css" type="text/css">
<body onload="alert('Video Cargado');">
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



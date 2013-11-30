<html><head></head>
<?php
include("libComentario.php");
include("../conexion.php");
/* $hostname="localhost";
$username="root";
$password="";
$dbname="club";
$cnx = mysql_connect("localhost", "root"); */
$bd = mysql_select_db ("comentarioimagen");

$imagenId = $_POST["imagen"];
$carpeta = $_POST["carpeta"];
$cuerpo = $_REQUEST["cuerpo"];
$fecha  = date("d/m/Y");
$usuario = $_POST["nom"];

//echo ' <p><h1>Comentario Agregado</h1></p> ';

$query = "INSERT INTO `comentarioimagen` (`IdComentario`, `IdImagen`, `CI`, `Comentario`, `Fecha`, `Eliminado`) VALUES ('', '".$imagenId."', '".$usuario."', '".$cuerpo."', '".$fecha."', 'No')"; 

////$res = mysql_query($query);

  $res = mysql_db_query("jci",$query);
echo '<meta http-equiv="refresh" content="3;URL=albumdefotos.php?pic='.$imagenId.'&carpetas='.$carpeta.'">';
mysql_close();
?>
<link rel="stylesheet" href="../Images/emx_nav_left.css" type="text/css">
<body onload="alert('Comentario Realizado');">
</body>
</html>
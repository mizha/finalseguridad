<html><head></head>
<?php

include("libAlbum.php");
include("libComentario.php");
include("../conexion.php");
/* $hostname="localhost";
$username="root";
$password="";
$dbname="club";
$cnx = mysql_connect("localhost", "root"); */
//$bd = mysql_select_db ("imagen");


$comentarioId=$_GET["comenId"];
$imagenId = $_GET["imagenId"];
//echo ' <p><h1> Comentario Eliminado </h1></p> ';
$sql = "UPDATE  `comentarioimagen` SET `Eliminado` = 'Si' WHERE `IdComentario` ='".$comentarioId."' AND `IdImagen` = '".$imagenId."'";

  $res = mysql_query($sql);
  $res = mysql_db_query("jci",$sql);
echo '<script>
		alert("Comentario eliminado");history.back();</script>'."\n";
mysql_close();
?>
<link rel="stylesheet" href="../Images/emx_nav_left.css" type="text/css">
<body>
</body>
</html>
<?php
include("libBlog.php");
include("libComentario.php");
include("../conexion.php"); 

$comentarioId=$_GET["comenId"];
$blogId = $_GET["blogId"];

//echo ' blog <br><br>'.$blogId; 
//echo ' comentarioId <br><br>'.$comentarioId; 

echo ' <p><h1> Comentario Eliminado </h1></p> ';
$sql = "UPDATE  `comentarioblog` SET `Eliminado` = 'Si' WHERE `IdComentario` ='".$comentarioId."' AND `IdBlog` = '".$blogId."'";

  $res = mysql_query($sql);
  $res = mysql_db_query("jci",$sql);
echo '<meta http-equiv="refresh" content="1;URL=../blog/mostrar_Blog.php?blogid='.$blogId.'">';
mysql_close();
?>
<html><head></head>
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<body onload="alert('Comentario eliminado con exito');">
</body>
</html>
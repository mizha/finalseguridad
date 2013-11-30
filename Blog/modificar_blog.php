<html><head></head>
<?php
include("libBlog.php");
include("../conexion.php"); 
$bd = mysql_select_db ("jci");
$blogId=$_GET["blogid"];
$titulo=$_REQUEST["titulo"];
$cuerpo= $_REQUEST["cuerpo"];
//echo ' <p><h1>Blog Modificado</h1></p> ';
$sql = "UPDATE `blog` SET `Titulo` = '".$titulo."', `Cuerpo` = '".$cuerpo."' WHERE `IdBlog` =".$blogId; 
  $res = mysql_query($query);
  $res = mysql_db_query("jci",$sql);
//  echo '<meta http-equiv="refresh" content="3;URL=mostrar_Blog.php?blogid='.$blogId.'">';
mysql_close();
?>
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<body>
<? echo '<script> alert("Blog modificado con exito");location.href="mostrar_Blog.php?blogid='.$blogId.'";</script>';?>
</body>
</html>




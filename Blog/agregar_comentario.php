<?php
include("libComentario.php");
include("../conexion.php"); 

$bd = mysql_select_db ("comentarioBlog");
$blogId = $_POST["blog"];
$cuerpo = $_REQUEST["cuerpo"];
$fecha  = date("d/m/Y");
$ci = $_POST["nombre"];
$query = "INSERT INTO `comentarioblog` (`IdComentario`, `IdBlog`, `CI`, `Comentario`, `Fecha`, `Eliminado`) VALUES ('', '".$blogId."', '".$ci."', '".$cuerpo."', '".$fecha."', 'No')"; 
////$res = mysql_query($query);

  $res = mysql_db_query("jci",$query);
  session_start();
      $ci = $_SESSION["ci"];
      $tiempo = date("Y/m/d");
      $query_log = "INSERT INTO log VALUES ('','$ci','Ingreso','Se agrego el comentario $cuerpo','$tiempo')";
      mysql_db_query("jci",$query_log);

header("Location: mostrar_Blog.php?blogid=".$blogId);
//  echo '<meta http-equiv="refresh" content="3;URL=mostrar_Blog.php?blogid='.$blogId.'">';
mysql_close();
?>
<html><head></head>
<link rel="stylesheet" href="../Images/emx_nav_left.css" type="text/css">
<body onload="alert('Comentario Realizado');">
</body>
</html>
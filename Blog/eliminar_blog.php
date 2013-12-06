<html><head></head>
<?php
include("../conexion.php"); 
include("libBlog.php");
$bd = mysql_select_db ("blog");
$blogId=$_GET["blogId"];
echo ' <p><h1> Blog Eliminado </h1></p> ';
$sql = "DELETE FROM `blog` WHERE `IdBlog` =".$blogId; 
  $res = mysql_query($sql);
  $res = mysql_db_query("jci",$sql);

  session_start();
      $ci = $_SESSION["ci"];
      $tiempo = date("Y/m/d");
      $query_log = "INSERT INTO log VALUES ('','$ci','Eliminar','Se elimino un blog','$tiempo')";
      mysql_db_query("jci",$query_log);

  echo '<meta http-equiv="refresh" content="3;URL=../index.php">';
mysql_close();
?>
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<body onload="alert('Blog eliminado con exito');">
</body>
</html>




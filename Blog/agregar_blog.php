<html><head></head>
<?php
include("../conexion.php"); 
include("libBlog.php");
$bd = mysql_select_db ("blog");
$titulo=$_REQUEST["titulo"];
$cuerpo= $_REQUEST["cuerpo"];
$fecha= date("d/m/Y");
$usuario=$_REQUEST["nombre"];
echo ' <p><h1>Blog Agregado</h1></p> ';
$query="INSERT INTO `blog` (`IdBlog`,`CI`, `Titulo`, `Cuerpo`,  `Fecha`) VALUES ('', '".$usuario."', '".$titulo."', '".$cuerpo."','".$fecha."' )";  
  $res = mysql_db_query("jci",$query);
  $blog = mysql_insert_id();

  session_start();
      $ci = $_SESSION["ci"];
      $tiempo = date("Y/m/d");
      $query_log = "INSERT INTO log VALUES ('','$ci','crear','Se creo un nuevo blog de titulo $titulo en fecha $fecha','$tiempo')";
      mysql_db_query("jci",$query_log);

  echo '<script>location.href="mostrar_Blog.php?blogid='.$blog.'"</script>';
mysql_close();
?>
<body onload="alert('Blog cargado con exito');">
</body>
</html>




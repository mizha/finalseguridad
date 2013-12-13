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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<!-- <img src="imagenes/Pagina Dia.jpg"> -->
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido"> 
  <form action="<?="Buscar.php?buscado=".$titulo?>" name="Busqueda">
  <h1>Buscar &nbsp;&nbsp;
          <input name="titulo" type="text" id="titulo" size="50"> 
          &nbsp;&nbsp;&nbsp;&nbsp;
		  <input name="buscar" type="submit" value="Buscar">
  </h1>
  </form>
<?php include("libBlog.php");
$buscar= $_GET ["titulo"];
if($buscar !=NULL){
buscarBlog($buscar,3,$tipo,$usuario);
}
$tiempo = date("Y/m/d");
$query_log = "INSERT INTO log VALUES ('','$ci','Buscar','se busco un blog con el titulo $buscar ','$tiempo')";
mysql_db_query("jci",$query_log);

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
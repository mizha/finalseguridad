<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI" OR $regis=="NO") 
 {
 	//if(permitir($tipo,"publicarblog"))
	if($tipo==5)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nueva Carpeta</title>
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
	<br><br><br><br><div align="center">
      <?php 
	  		//creaci�n de la carpeta
			$nombre =$_POST["titulo"];
			$descrip =$_POST["cuerpo"];
			echo ' <h1>Carpeta Agregada</h1> ';
			echo '<h2>'.$nombre.'</h2>';
			echo '<br><h2>'.$descrip.'</h2>';
			// Incersion en la base de Datos 
			$bd = mysql_select_db ("carpetas");
			$query="INSERT INTO `carpetas` (`IdCarpeta`, `Nombre`, `Descripcion`) VALUES ('', '".$nombre."', '".$descrip."')";  
	        $res = mysql_query($query);
	        session_start();
                $ci = $_SESSION["ci"];
                $tiempo = date("Y/m/d");
                $query_log = "INSERT INTO log VALUES ('','$ci','insertar','Creacion de una carpeta con nombre $nombre','$tiempo')";
                mysql_db_query("jci",$query_log);

			mysql_close();	
?>
<a href="subir_fotos.php">Sube imagenes</a>
</div>
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
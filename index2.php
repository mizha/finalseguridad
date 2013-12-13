<?
include("libSesion.php");
include("libPrincipal.php");
include("conexion.php"); 
include("libPermisos.php");
include("funciones.php");
include("Blog/libBlog.php");

//ini_set('session.gc_maxlifetime',60);
session_start();
if($regis=="SI" OR $regis=="NO") 
 {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<? 
	$id=$_GET["id"];
	$titulo=obtenerTitulo($id);
	echo '<title>'.$titulo.'</title>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>" >
<div id="all">
<!-- <img src="imagenes/Pagina Dia.jpg"> -->
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido"> 
		<? imprimirBlog2($id,$regis,$tipo);?>
</div> 
<div class="corte"></div> 
</div>
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
<?
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


<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php");
include("../libPermisos.php");
include("../funciones.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Registro de Actividades</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
<!--<link href="estilo.css" rel="stylesheet" type="text/css">-->
</head>
<?

if($regis=="SI" OR $regis=="NO")
 {
 	if(permitir($tipo,"publicarblog"))
	{
	$numero=$_REQUEST['n'];
    $tabla="log";
    session_start();
    $ci = $_SESSION["ci"];

    $tiempo = date("Y/m/d");
        $sacar = "SELECT * FROM ".$tabla." WHERE (ci=$ci)" ;

        $resultado = mysql_db_query("jci",$sacar);


    $total_registros = mysql_num_rows($resultado);


?>

<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<!-- <img src="imagenes/Pagina Dia.jpg"> -->
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div>
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div>
	<div id="cont_contenido">
<table border=0 class="index" align="center" valign="center" width="100%">
  <tr><td width="50%">
<table border=1 cellspacing="2" cellpadding="10" width="100%" style="font-size:16px;">


<table width="100%"  border="1" cellspacing="2" cellpadding="2" bordercolor="#CCCCCC">
   <tr>
    <th colspan="4" bgcolor="#000099" scope="col"><font color="#FFFFFF"><h2>CONTRASE�AS</h2></font></th>
    </tr>
<form name="contras" id="contras" action="cambiarcontra.php" enctype="multipart/form-data" method="post">
  <tr>
    <td width="40%"><h3><center>Contrase�a Actual</center></h3></td>
    <td width="60%" colspan="3"><center><input type="password" name="contraA" id="contraA"></center></td>
  </tr>
    <tr>
    <td width="40%"><h3><center>Contrase�a Nueva</center></h3></td>
    <td colspan="3"><center><input type="password" name="contraN" id="contraN"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Repetir Contrase�a</center></h3></td>
    <td colspan="3"><center><input type="password" name="contraRN" id="contraRN"></center></td>
  </tr>
  <tr>
    <td width="40%"><input type="hidden" value="<? echo $ci; ?>" name="ci" id="ci"></td>
    <td colspan="3"><center><input type="button" name="Cambiar Contrase�a" value="Cambiar contrase�a" onClick="validar2();"></center></td>
  </tr>
</form>
  </table>


</table>
</td><td>


</tr></td>
</table>
</div>
<div class="corte"></div>
</div>
<div id="pie_div"><? pie();?></div>
<div class="corte"><br />
</div>
</div>
</body>
</html>
<?php
  }

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

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

	$numero=$_REQUEST['n'];
    $tabla="log";
    session_start();
    $ci = $_SESSION["ci"];

    $tiempo = date("Y/m/d");
        $sacar = "SELECT junior.CI,juniorpass.usuario,junior.Nombre,junior.Apellido,junior.Email FROM junior, juniorpass WHERE (juniorpass.CI=junior.CI AND juniorpass.activo = 'no')";

        $resultado = mysql_db_query("jci",$sacar);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Activar usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
<!--<link href="estilo.css" rel="stylesheet" type="text/css">-->
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
<table border=0 class="index" align="center" valign="center" width="100%">
  <tr><td width="50%">
<table border=1 cellspacing="2" cellpadding="10" width="100%" style="font-size:16px;">

<table border = "1" width = "100%" align="center">
<tr>
<th>CI</th>
<th>Usuario</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
<th>Activar</th>
</tr>
<?
while ($datos = mysql_fetch_array($resultado))
{

?>
<tr>
<td><center> <?=$datos["CI"]?></center> </td>
<td><center>  <?=$datos["usuario"]?></center> </td>
<td><center>  <?=$datos["Nombre"]?></center> </td>
<td><center>  <?=$datos["Apellido"]?></center> </td>
<td><center>  <?=$datos["Email"]?></center> </td>
<td> <?echo "<center><h2><a href=\"activar.php?id=".$datos["CI"]."\">Activar cuenta</a></h2></center>";?><td>
</tr>

<?php
}

?>
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
    $query_log = "INSERT INTO log VALUES ('','$ci','ver','se vio tabla de usuarios  para ser activados ','$tiempo')";
      mysql_db_query("jci",$query_log);

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


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
echo "paginacion0";
if($regis=="SI" OR $regis=="NO")
 {              echo "paginacion1";
 	if(permitir($tipo,"publicarblog"))
	{
	$numero=$_REQUEST['n'];
    $tabla="log";
    session_start();
    $ci = $_SESSION["ci"];

    $tiempo = date("Y/m/d");
        $sacar = "SELECT * FROM ".$tabla." WHERE (ci=$ci)" ;

        $resultado = mysql_db_query("jci",$sacar);
    echo "paginacion";
    //Para la paginacion
    		$registros = 10;
    		$pagina = $_GET["pagina"];
    			if (!$pagina) {
    			$inicio = 0;
    			$pagina = 1;
    			}
    			else {
    			$inicio = ($pagina - 1) * $registros;
    			}
    //Fin Inicio Paginación
    $total_registros = mysql_num_rows($resultado);
    var_dump($total_registros);
    echo "paginacion2";
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
<?
$fecha_i = '2012-07-01 12:04:12';
$fecha_f = '2012-07-18 15:04:12';
$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);
	echo $dias;
  ?>

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
       $query_log = "INSERT INTO log VALUES ('','$ci','ver','se vio el log del usuario ','$tiempo')";
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



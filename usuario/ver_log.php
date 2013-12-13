
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
    $sacar = "SELECT * FROM ".$tabla." WHERE (ci=$ci)" ;

        $resultado = mysql_db_query("jci",$sacar);

            //Para la paginacion
            		$registros = 10;
            		$pagina = $_GET["pagina"];
            		    if (!$pagina) {
            			$inicio = 0;
            			$pagina = 1;
            			}
            			else {
            			$inicio = ($pagina - 1) * $registros;
            			//var_dump($inicio);
            			}
            //Fin Inicio Paginación



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


 <table border = "1" width = "100%">
 <tr>
 <th>CI</th>
 <th>ACCION</th>
 <th>DESCRIPCION</th>
 <th>TIEMPO</th>
 </tr>
 <?
 $query = "SELECT ci FROM ".$tabla." WHERE (ci=$ci)" ;
 	$result = mysql_db_query("jci",$query);
 	$total_registros = mysql_num_rows($result);

 	$query = "SELECT * FROM ".$tabla." WHERE (ci=$ci) ORDER BY ci DESC LIMIT $inicio,10";

 	//$result = mysql_query($query);
 	$result = mysql_db_query("jci",$query);
 	$total_paginas = ceil($total_registros / $registros);


 $contador = 0;
 while ($datos = mysql_fetch_array($result))
 {

 ?>
 <tr>
 <td> <?=$datos["ci"]?> </td>
 <td> <?=$datos["accion"]?> </td>
 <td> <?=$datos["descripcion"]?> </td>
 <td> <?=$datos["tiempo"]?> </td>
 </tr>

 <?php
  }
 ?>
 </table>
 <?
             $tiempo = date("Y/m/d");
             $query_log = "INSERT INTO log VALUES ('','$ci','ver','Se vio el log del usuario ','$tiempo')";
             mysql_db_query("jci",$query_log);

 // Inicio Paginación de nuevo
 		if(($pagina - 1) > 0) {
 		echo "<a href='ver_log.php?pagina=".($pagina-1)."'>< Anterior</a> ";
 		} for ($i=1; $i<=$total_paginas; $i++){
 			if ($pagina == $i) {
 				echo "<b>".$pagina."</b> ";
 		} else {
 			echo "<a href='ver_log.php?pagina=$i'>$i</a> ";
 		}
 	 }
 		if(($pagina + 1)<=$total_paginas) {
 			echo " <a href='ver_log.php?pagina=".($pagina+1)."'>Siguiente ></a>";
 		}
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



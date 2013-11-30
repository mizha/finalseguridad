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
<title>Calendario de Eventos</title>
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
<?php
include("funciones.php");
$mess = $_GET['mess'];
$anio = $_GET['anio'];
if($mess == "" || $anio == ""){
    $anio = date("Y");
    $mess = date("n");
}
    $ultimo = date("t",mktime(0, 0, 0, $mess, 1, $anio));
    if($mess == '12' || $mess == '1'){
        if($mess == '12'){
            $next = 1;
            $prev = $mess -1;
            $anion = $anio + 1;
            $aniop = $anio;
        }
        if($mess == '1'){
            $next = $mess + 1;
            $prev = 12;
            $anion = $anio;
            $aniop = $anio -1;        
        }
    }else{
        $next = $mess + 1;
        $prev = $mess - 1;    
        $aniop = $anio;
        $anion = $anio;
    }
    echo "<tr><th colspan=7>$anio</th></tr><tr>";
    echo "<tr><td><a href='".$_SERVER['PHP_SELF']."?mess=$prev&anio=$aniop'><<</a></td><th colspan=5>$mes[$mess]</th><td><a href='".$_SERVER['PHP_SELF']."?mess=$next&anio=$anion'>>></td></tr><tr>";
    echo "<tr><td>D</td><td>L</td><td>M</td><td>M</td><td>J</td><td>V</td><td>S</td></tr>";
    $diaa = "1";
    $diaz = cargarmatriz($ultimo,$mess,$anio);
    $j = 0;
    while($diaa <= $ultimo){
        $dia = date("D",mktime(0,0,0,$mess,$diaa,$anio)); # retorna el dia de la semana en letras...
        $fecha = date("j",mktime(0,0,0,$mess,$diaa,$anio)); #retorna el dia del mes en 01/31
        $dia_semana = date("w",mktime(0,0,0,$mess,$diaa,$anio)); #retorna el dia de la semana en numero
        $evento = $anio."-".$mes_num[$mess]."-".$fecha;
        if($dia == "Sun"){
            echo "</tr><tr>";
        }
        if($fecha == "1"){
            $i=0;
            while($i != $dia_semana){
                echo "<td>&nbsp;</td>";
                $i++;
            }
        }
        if($anio == date("o") && $mes[$mess] == $mes[date("n")] && $fecha == date("j")){
            if($fecha == $diaz[$j] ){
                echo "<td class='tddia' align='center'><b><a href='mostrar.php?evento=$evento' target='evento'>$fecha</a></b></td>";
                $j++;
            }else{
                echo "<td class='calendario' align='center'><b>$fecha</b></td>";
            }
        }else{
            if($fecha == $diaz[$j] ){
                echo "<td class='tddia' align='center'><b><a href='mostrar.php?evento=$evento' target='evento'>$fecha</a></b></td>";
                $j++;
            }else{
                echo "<td align='center'>$fecha</td>";
            }
        }
        $diaa++;
    }
    echo "</tr>";
?>
</table>
</td><td>
<IFRAME SRC="mostrar.php" HEIGHT=215 name="evento" frameborder=no></IFRAME>

</tr></td>
<? if($regis=="SI"){?>
<tr><td colspan="2"><font size="4"><a href="agregar.php" target="evento">[Agregar nuevo evento]</a></font></td></tr>
<? }?>
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
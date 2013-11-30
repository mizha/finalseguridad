<?
include("../conexion.php"); 
include("../libSesion.php");
include("../libPermisos.php");
include("../libPrincipal2.php");
include("../funciones.php");
include("libUsuario.php");
 if($regis=="SI" || $regis =="NO")
 {
	$nom=$nombre; 	
	if(permitir($tipo,"buscarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>JCI - GALERIA DE PRESIDENTES</title>
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
	<div id="cont_contenido"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"><b>1957</b><br><img src="../expresidentes/alfonsoquirogasantacruz.jpg" width="131" height="130"><br>
    ALFONSO QUIROGA SANTA CRUZ</div></td>
    <td><div align="center"><b>1958</b><br><img src="../expresidentes/hernanakoester.jpg" width="131" height="130"><br>
   HERNAN KOESTER</div></td>
    <td><div align="center"><b>1958</b><br><img src="../expresidentes/crisantovalverde.jpg" width="131" height="130"><br>
    CRISANTO VALVERDE</div></td>
    <td><div align="center"><b>1959</b><br><img src="../expresidentes/mariobalcazar.jpg" width="131" height="130"><br>
    MARIO BALCAZAR</div></td>
  </tr>
  <tr>
	<td><div align="center"><b>1960</b><br><img src="../expresidentes/PedroJoseRivera.jpg" width="131" height="130"><br>
    PEDRO JOSE RIVERA SAAVEDRA</div></td>
    <td><div align="center"><b>1960</b><br><img src="../expresidentes/alfonsoquirogasantacruz.jpg" width="131" height="130"><br>
    ALFONSO QUIROGA SANTA CRUZ</div></td>
	<td><div align="center"><b>1961</b><br><img src="../expresidentes/hopp.jpg" width="131" height="130"><br>
    GUSTAVO HOPP CASTRO</div></td>
	<td><div align="center"><b>1962</b><br><img src="../expresidentes/PedroJoseRivera.jpg" width="131" height="130"><br>
    HUGO MALDONADO</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1963</b><br><img src="../expresidentes/hugobanzerSuarez.jpg" width="131" height="130"><br>
    HUGO BANZER SUAREZ</div></td>
	<td><div align="center"><b>1963</b><br><img src="../expresidentes/FernanadoMostajo.jpg" width="131" height="130"><br>
    FERNANDO MOSTAJO</div></td>
	<td><div align="center"><b>1964</b><br><img src="../expresidentes/HansJungestein.jpg" width="131" height="130"><br>
    HANS JUNGSTEIN PLESS</div></td>
	<td><div align="center"><b>1965</b><br><img src="../expresidentes/natalio.jpg" width="131" height="130"><br>
    NATALIO FERNANADEZ POMIER</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1966</b><br><img src="../expresidentes/ManfredMeyer.jpg" width="131" height="130"><br>
    MANFRED MEYER RIVERO</div></td>
	<td><div align="center"><b>1967</b><br><img src="../expresidentes/EdgarGuardia.jpg" width="131" height="130"><br>
    EDGAR GUARDIA BUTRON</div></td>
	<td><div align="center"><b>1968</b><br><img src="../expresidentes/GastonCastellano.jpg" width="131" height="130"><br>
    GASTON CASTELLANO RUIZ</div></td>
	<td><div align="center"><b>1969</b><br><img src="../expresidentes/rogerruiz.jpg" width="131" height="130"><br>
    ROGER RUIZ SANCHEZ</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1970</b><br><img src="../expresidentes/Manuelporro.jpg" width="131" height="130"><br>
    MANUEL PORRO CASTILLO</div></td>
	<td><div align="center"><b>1971</b><br><img src="../expresidentes/ZenonSavedra.jpg" width="131" height="130"><br>
    ZENON SAAVERDRA</div></td>
	<td><div align="center"><b>1972</b><br><img src="../expresidentes/JuanSoria.jpg" width="131" height="130"><br>
    JUAN AVILA SORIA</div></td>
	<td><div align="center"><b>1973</b><br><img src="../expresidentes/titoHozdeVila.jpg" width="131" height="130"><br>
    TITO HOZ DE VILA</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1974</b><br><img src="../expresidentes/RolandoFerrufino.jpg" width="131" height="130"><br>
    ROLANDO FERRUFINO G.</div></td>
	<td><div align="center"><b>1975</b><br><img src="../expresidentes/Fernanadochopitea.jpg" width="131" height="130"><br>
    FERNANADO GEMIO CHOPITEA</div></td>
	<td><div align="center"><b>1976</b><br><img src="../expresidentes/salutioLeaños.jpg" width="131" height="130"><br>
    SALUSTIO LEAÑOS CABRERA</div></td>
	<td><div align="center"><b>1977</b><br><img src="../expresidentes/carlosOlmedo.jpg" width="131" height="130"><br>
    CARLOS OLMEDO VIRREIRA</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1978</b><br><img src="../expresidentes/carlosbustos.jpg" width="131" height="130"><br>
    CARLOS BUSTOS</div></td>
	<td><div align="center"><b>1979</b><br><img src="../expresidentes/RicardoCanelas.jpg" width="131" height="130"><br>
    RICARDO QUIROGA CANELAS</div></td>
	<td><div align="center"><b>1980</b><br><img src="../expresidentes/RobertoLadivar.jpg" width="131" height="130"><br>
    ROBERTO LANDIVAR</div></td>
	<td><div align="center"><b>1981</b><br><img src="../expresidentes/jorgesoria.jpg" width="131" height="130"><br>
    JORGE SORIA</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1982</b><br><img src="../expresidentes/gonzalovargas.jpg" width="131" height="130"><br>
    GONZALO VARGAS</div></td>
	<td><div align="center"><b>1983</b><br><img src="../expresidentes/mariopereira.jpg" width="131" height="130"><br>
    MARIO PEREIRA MELGAR</div></td>
	<td><div align="center"><b>1984</b><br><img src="../expresidentes/RobertoLadivar.jpg" width="131" height="130"><br>
    JUAN CARLOS ARTEAGA</div></td>
	<td><div align="center"><b>1985</b><br><img src="../expresidentes/juancarlosAbugoch.jpg" width="131" height="130"><br>
    JUAN CARLOS ABUGOCH</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1986</b><br><img src="../expresidentes/Jhonnyvargas.jpg" width="131" height="130"><br>
    JHONNY VARGAS VARGAS</div></td>
	<td><div align="center"><b>1987</b><br><img src="../expresidentes/JoseEduardoEterovic.jpg" width="131" height="130"><br>
    JOSE EDUARDO RIVERA ETEROVIC</div></td>
	<td><div align="center"><b>1988</b><br><img src="../expresidentes/JuancarlosMurillo.jpg" width="131" height="130"><br>
    JUAN ROBERTO MURILLO CARILLO</div></td>
	<td><div align="center"><b>1989</b><br><img src="../expresidentes/DavidAramburo.jpg" width="131" height="130"><br>
    DAVID ARAMBURO</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1990</b><br><img src="../expresidentes/enriqueespinoza.jpg" width="131" height="130"><br>
    ENRIQUE ESPINOZA CALDERA</div></td>
	<td><div align="center"><b>1991</b><br><img src="../expresidentes/LuisCarlos Zelada.jpg" width="131" height="130"><br>
    LUIS CARLOS ZELADA VILLA</div></td>
	<td><div align="center"><b>1992</b><br><img src="../expresidentes/GerardoBustamante.jpg" width="131" height="130"><br>
    GERARDO BUSTAMANTE MORALES</div></td>
	<td><div align="center"><b>1993</b><br><img src="../expresidentes/CarlosOlemdo.jpg" width="131" height="130"><br>
    CARLOS OLMEDO ZEGARRA</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1994</b><br><img src="../expresidentes/enriqueespinoza.jpg" width="131" height="130"><br>
    MAX RICARDO VELASCO NAVARRO</div></td>
	<td><div align="center"><b>1995</b><br><img src="../expresidentes/NeilLaFuente.jpg" width="131" height="130"><br>
    NEIL LA FUENTE S.</div></td>
	<td><div align="center"><b>1996</b><br><img src="../expresidentes/LuisDuran.jpg" width="131" height="130"><br>
    LUIS ALBERTO DURAN ZURITA</div></td>
	<td><div align="center"><b>1993</b><br><img src="../expresidentes/JavierTorrex.jpg" width="131" height="130"><br>
    JAVIER TORRES MERCADO</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>1998</b><br><img src="../expresidentes/luisLaredo.jpg" width="131" height="130"><br>
    LUIS LAREDO ARELLANO</div></td>
	<td><div align="center"><b>1999</b><br><img src="../expresidentes/DanteDiaz.jpg" width="131" height="130"><br>
    DANTE RAFAEL DIAZ MAYORGA</div></td>
	<td><div align="center"><b>2000</b><br><img src="../expresidentes/JavierGutierrez.jpg" width="131" height="130"><br>
    JAVIER GUTIERREZ HERRERA</div></td>
	<td><div align="center"><b>2001</b><br><img src="../expresidentes/MirkoFavian.jpg" width="131" height="130"><br>
    MIRKO FAVIAN CAMPOS ARANDIA</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>2002</b><br><img src="../expresidentes/ReneFanor.jpg" width="131" height="130"><br>
    RENE FANOR LOZANO SILES</div></td>
	<td><div align="center"><b>2003</b><br><img src="../expresidentes/ReneUstariz.jpg" width="131" height="130"><br>
    RENE USTARIZ ARAMAYO</div></td>
	<td><div align="center"><b>2004</b><br><img src="../expresidentes/JuanCarlosVega.jpg" width="131" height="130"><br>
    JUAN CARLOS VEGA MOLINA</div></td>
	<td><div align="center"><b>2005</b><br><img src="../expresidentes/JoseLuisRalde.jpg" width="131" height="130"><br>
    JOSE LUIS RALDE MONTAÑO</div></td>
  </tr>
  <tr>
    <td><div align="center"><b>2006</b><br><img src="../expresidentes/rupertoTorrex.jpg" width="131" height="130"><br>
    RUPERTO TORREZ MERCADO</div></td>
	<td><div align="center"><b>2007</b><br><img src="../expresidentes/ReneUstariz.jpg" width="131" height="130"><br>
    RENE USTARIZ ARAMAYO</div></td>
	<td><div align="center"><b>2008</b><br><img src="../expresidentes/JuanCarlosVega.jpg" width="131" height="130"><br>
    JUAN CARLOS VEGA MOLINA</div></td>
	<td><div align="center"><b>2009</b><br><? echo "<image src=ver_foto.php?n=3034222 alt=\"".sql(3034222,"Nombre","junior")."\" border=0>";?><br>
	<? echo strtoupper(obtenerNombre("3034222"));?></div></td>
  </tr>
  <? $anio=date("Y")+1;
  $sql="SELECT CI FROM celjunior WHERE anio>2009";
  $res=mysql_db_query("jci",$sql);
  if(mysql_affected_rows()!=0){
  	while($row=mysql_fetch_array($res)){
  		echo '<tr>';
		$cont=0;
		if($cont<4)
		{
			echo '<td><div align="center"><b>2009</b><br><image src=ver_foto.php?n='.$row["CI"].' alt="'.sql($row["CI"],"Nombre","junior").'" border=0>";?><br>'.strtoupper(obtenerNombre($row["CI"])).'</div></td>';
			$cont++;
		}
		if($cont==4){echo "</tr><tr>"; $cont=0;}
	}

}
  ?>
</table>

	</div> 
<div class="corte"></div> 
</div>
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /></div>
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
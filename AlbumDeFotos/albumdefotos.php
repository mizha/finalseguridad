<?
include("../conexion.php"); 
include("../libSesion.php");
include("../libPermisos.php");
include("libComentario.php");
//include("../libCarpetas.php");
include("libAlbum.php");
include("../libPrincipal2.php");
include("../funciones.php");
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
<title>Album de Fotos </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
<script>
function validar()
	{
		if (document.form1.cuerpo.value.length==0 )
		{alert("Debes poner un comentario") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.cuerpo.value.length>=100 )
		{alert("El comentario es damasiado largo") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		document.form1.submit();
		
	}
</script>
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
	 <?php
function obtenerName($id)
{
	$tabla="imagen";
	$sacar = "SELECT * FROM ".$tabla." WHERE `IdImagen` ='".$id."'";
	$resultado = mysql_db_query("jci",$sacar);
	$registro = mysql_fetch_array($resultado);
	$nombre=$registro["Nombre"];
	return $nombre;
}

function obtenerId($nombre)
{
	$sacar = "SELECT * FROM ".$tabla." WHERE `Nombre` ='".$nombre."'";
	$resultado = mysql_db_query("jci",$sacar);
	$registro = mysql_fetch_array($resultado);
	$id=$registro["IdImagen"];
	return $id;
}

$bg="#FFFFFF";          // background of the for+next cells
$fornext=1;				// display for+next arrows 1=yes 0=no
$next="<b>&gt;&gt;</b>";// text displayed in the next field
$last="<b>&lt;&lt;</b>";// text displayed in the last field
$textlinks=1;			// display textlinks to the images 1=yes 0=no
$dropdown=1;			// display dropdown menu with names 1=yes 0=no
$dropdowntext="ver";	// text display on the button next to the dropdown
$namedisp=1;			// display name of the pic (capitalized filename) 1=yes 0=no
$xofy=1;				// display pic x of y 1=yes 0=no

$SCRIPT_NAME=$SERVER_VARS['PHP_SELF'];
$pic=$HTTP_GET_VARS['pic'];
$carpeta=$HTTP_GET_VARS['carpetas'];?>
    <h1><? echo $carpeta; ?></h1>
<?
/* // Conexion Con la tabla
$base="club";
$tabla="carpetas";
$conexion=mysql_connect ("localhost","root","");
mysql_select_db ($base, $conexion); */
$tabla="carpetas";
//Tabla de carpeta sacando el id
$sacar = "SELECT `IdCarpeta` FROM ".$tabla." WHERE `Nombre`='".$carpeta."'";
$resultado = mysql_db_query("jci",$sacar);
$registro = mysql_fetch_array($resultado);
$idCarpeta=$registro["IdCarpeta"];
$tabla="imagen";
// Fin de Conexion Con la tabla

//Sacando todo desde Tabla
$sacar = "SELECT * FROM ".$tabla." WHERE `IdCarpeta` ='".$idCarpeta."'";
$resultado = mysql_db_query("jci",$sacar);
/*while($registro = mysql_fetch_array($resultado))
{
	$imagen =$registro["imagen"];
	$formato =$registro["formato"];
	$tamanio =$registro["tamanio"];
	$usuario =$registro["Usuario"];
	$fecha =$registro["Fecha"];
}*/
$idImagens=array();
$count=0;
while($registro = mysql_fetch_array($resultado))
{
	$idImagens[$count] = $registro["IdImagen"];
	$count++;
}
reset($idImagens);
echo "<div align=\"center\">\n\t<font face=\"verdana,arial,helvetica\" size=2>\n";
//	define the selected picture, to highlight textlink, preselect dropdown and define for+next links
for ($f=0;$f<=sizeof($idImagens)-1;$f++){if ($pic==$idImagens[$f]){$selected = $f+1;}}

//	display dropdown if wanted...
if ($dropdown==1){
	echo "\t\t<!-- dropdown -->\n\t\t<form name=\"mainform\">\n\t\t\t<select name=\"pic\">\n";
	//	loop over all pics
	for ($f=0;$f<=sizeof($idImagens)-1;$f++){
		//	Capitalize filename for display
		$nombre1=obtenerName($idImagens[$f]);
		//$name=ucfirst(substr($nombre,0,-4));
		$name =ucfirst($nombre1);
		// if the pic is the selected one set selected status
		if ($pic==$idImagens[$f]){echo "\t\t\t\t<option value=\"".$idImagens[$f]."\" selected>".$name."</option>\n";}
		//	or simply render another option
		else{echo "\t\t\t\t<option value=\"".$idImagens[$f]."\">".$name."</option>\n";}
		}
	// close select statement and display show button with predefined text.
	echo "\t\t\t</select>\n\t\t\t<input name=\"carpetas\" type=\"hidden\" value=\"".$carpeta."\">&nbsp;<input type=\"submit\" value=\"".$dropdowntext."\">\n\t\t</form>\n\t\t<!-- end dropdown -->";
}

if ($pic && !preg_match("/javascript/",$pic)){
	//	if the text should be displayed
	if ($namedisp==1){
		// Capitalize filename for display andf print it
		$nombre1=obtenerName($pic);
		//$name=ucfirst(substr($nombre,0,-4));
		$name =ucfirst($nombre1);
		echo "\n\t\t<!-- imagename -->\n\t\t<b>".$name;
		}
	//	if pic x of y is selected, display it	
	if ($xofy==1){
		echo " ".$selected."/".sizeof($idImagens);
		}
	echo "</b>\n\t\t<!-- imagename end -->\n";
	echo "</b>\n\t\t<!-- imagename end -->\n";
	// Display table with for+next arrows, and a black line around the image
   echo "\t\t<!-- table with image -->\n\t\t<table border=0 cellspacing=0 cellpadding=1>\n\t\t\t<tr>\n\t\t\t\t<td>";
	// if for+next arrows are selected and the picture is not the first one, display last arrow
	if ($selected != 1 && $fornext==1){
		echo "<a href=\"$SCRIPT_NAME?pic=".$idImagens[$selected-2]."&carpetas=".$carpeta."\">$last</a>";
		}
	else { echo "<font color=\"".$bg."\">$last</font>";}
		echo"</td>\n\t\t\t\t<td><image src=ver_foto.php?n=".$pic." alt=\"".$name."\" border=0></td>";
	// if for+next arrows are selected and the picture is not the last one, display next arrow
	if ($selected != (sizeof($idImagens)) && $fornext==1){
		echo"\n\t\t\t\t<td><a href=\"$SCRIPT_NAME?pic=".$idImagens[$selected]."&carpetas=".$carpeta."\">$next</a>";
		}
	else { echo"\n\t\t\t\t<td><font color=\"".$bg."\">$next</font>";}
	echo"</td>\n\t\t\t</tr>\n\t\t</table>\n\t\t<!-- table with image end -->\n\t\t<!-- Textlinks--->\n\t\t";
}
if ($textlinks == 1){
		// loop over images
		for ($f=0;$f<=sizeof($idImagens)-1;$f++){
			// add gaps between the links, unless it is the first one
			if ($f > 0) echo "&nbsp;&nbsp;";
			// if the link to the pic is the selected one, display a bold number and no link
			if ($pic==$idImagens[$f]){echo "<b>".($f+1)."</b>";}
			// otherwise display the link
			else{echo "<a href=\"$SCRIPT_NAME?pic=".$idImagens[$f]."&carpetas=".$carpeta."\">".($f+1)."</a>";}
			// make linebreaks every 15 times!
			$isbr = strpos((($f+1)/15),".");
				if (!$isbr){echo "<br>";}
			}
}
echo '</div>';

if ($pic && !preg_match("/javascript/",$pic)){
echo '<hr>';
imprimirComentarios($pic,$carpeta,$tipo);
echo '<hr>';
if ($regis=="SI"){
	echo '<form name="form1" action="agregar_comentario.php" method="post">';
echo '<h2>Haz Tu Comentario</h2>';
       echo ' <p>';
		echo ' <center>';
		 echo '<input name="imagen" type="hidden" value="'.$pic.'">';
		 echo '<input name="nom" type="hidden" value="'.$ci.'">';
		 echo '<input name="carpeta" type="hidden" value="'.$carpeta.'">';
          echo ' <textarea name="cuerpo" id="cuerpo" rows="10" cols="10" style="width: 50%"></textarea>';
        echo ' </center>';
      echo '  </p>';
       echo ' <p>';
        echo '  <input name="enviar" type="button" id="enviar" value="Enviar" onClick="validar();"> ';
        echo '  <input type="reset" name="Reset" value="Limpiar">     ';
        echo '  </p>';
	echo '</form>';
	
	}
	
	if ($regis=="NO"){ echo '<h2>Tienes que iniciar sesion para hacer un comentario</h2><br> <a href="../iniciarSesion.php">Iniciar Sesion</a><hr>'; }

}

?>
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
<? // Libreria de video 
function categorias()
{
	$bd = mysql_select_db ("tipovideo");
	$query="SELECT `Tipo` FROM `tipovideo`";  
	$res = mysql_db_query("club",$query);
	echo '<select name="categorias">';
	for($i = 0; ($row=mysql_fetch_array($res)); $i++)
	{
		echo '<option value="'.$row["Tipo"].'">'.$row["Tipo"].'</option>';
	}
	mysql_close();
	echo '</select>';
}
function crearLayers()
{
	$result = mysql_db_query("club","SELECT count(*) AS `IdVideo` FROM `video`");
	// Funcion para sacar el resultado que devuelve la consulta es mysql_fetch_array
	$row=mysql_fetch_array($result);
	$tam= $row["IdVideo"];
	echo' <style type="text/css">';
	echo'  #layer1 {
			POSITION:absolute;
			Z-INDEX:10;
			VISIBILITY:visible;
			LEFT:510px;
			TOP:94px;
			width:425px;
			height: 355px; }
			';
	// se aumenta el tamaño en uno paraque soloque TODOS los layers incluyendo el extra de arriba
	for($i=2; $i <= $tam+1 ; $i++)
	{
		echo' #layer'.$i.' {
			POSITION:absolute; 
			Z-INDEX:'.$i.'0; 
			VISIBILITY:hidden; 
			LEFT:510px;
			TOP:94px; 
			width:425px; 
			height: 355px; 
			background-color:#FFFFFF; 
			layer-background-color:#FFFFFF;
			}
			'; 
	}
	echo'
	</style>';
	// cerrando la bese de datos SIMPRE se debe cerrar!! 
	mysql_close();
}

function colocarNombres()
{
	//mysql_connect("localhost","root");
	$nombres =mysql_db_query("club","SELECT `Nombre` FROM `video`");
	$result =mysql_db_query("club","SELECT count(*) AS `IdVideo` FROM `video`");
	$row=mysql_fetch_array($result);
	$tamanio= $row["IdVideo"];
	echo '<ul>';
	for($i=2; $i <= $tamanio+2, $nombre=mysql_fetch_array($nombres) ; $i++)
	{
		echo '<li><a href="javascript:showLayerNumber('.$i.')"><font face="papyrus" color="#000000" size="3"><strong>'.$nombre["Nombre"].'</strong></font></a></li><br>
		';
	}
	echo '</ul>';
	mysql_close();
}
function colocarVideos()
{
	//mysql_connect("localhost","root");
	$result=mysql_db_query("club","SELECT * FROM `video`");
	$res =mysql_db_query("club","SELECT count(*) AS `IdVideo` FROM `video`");
	$rows=mysql_fetch_array($res);
	$tamanio= $rows["IdVideo"];
	for($i=2; $i <= $tamanio+2, $row=mysql_fetch_array($result) ; $i++)
	{
	echo ' 
	<div id="layer'.$i.'"><h1>'.$row["Nombre"].'</h1><br>
	<object width="425" height="373"> <param name="movie" value="http://www.youtube.com/v/'.$row["Codigo"].'&hl=en&color1=0x402061&color2=0x9461ca&border=1"></param>
<param name="wmode" value="transparent"></param>
<embed src="http://www.youtube.com/v/'.$row["Codigo"].'&hl=en&color1=0x402061&color2=0x9461ca&border=1" type="application/x-shockwave-flash" wmode="transparent" width="425" height="373"></embed></object></div>
';
	}
	mysql_close();
}

?>
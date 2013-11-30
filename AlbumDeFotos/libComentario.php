<?
	include("../conexion.php");
	//funcion que imprime comentarios se usa en albumdefotos.php
	function imprimirComentarios($imagenId,$carpeta,$tipe)
	{
	//mysql_connect("localhost","root");
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
	$query = "SELECT `IdComentario` FROM `comentarioimagen` WHERE `IdImagen` = '".$imagenId."' AND `Eliminado`='No'";
	$result = mysql_db_query("jci",$query);
	$total_registros = mysql_num_rows($result); 
	
	$query = "SELECT * FROM `comentarioimagen` WHERE `IdImagen` = '".$imagenId."' AND `Eliminado`='No' ORDER BY `IdComentario` DESC LIMIT $inicio, $registros";
	$result = mysql_query($query);
	$result = mysql_db_query("jci",$query);
	$total_paginas = ceil($total_registros / $registros);
	
	while($row=mysql_fetch_array($result)){
	if($row["Eliminado"]=='No')
	{
		echo ' <p><h3>'.$row["Fecha"].'</h3> ';
		if($tipe==5){
		echo'  <h2><a href="eliminar_comentario.php?comenId='.$row["IdComentario"].'&imagenId='.$imagenId.'">Eliminar</a></h2>';}
		echo ' '.$row["Comentario"].'<br><h4>'.obtenerNombre($row["CI"]).'</h4></p>';}
	}
	// Inicio Paginación de nuevo 
		if(($pagina - 1) > 0) {
		echo "<a href='albumdefotos.php?pic=$imagenId&carpetas=$carpeta&pagina=".($pagina-1)."'>< Anterior</a> "; 
		} for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) { 
				echo "<b>".$pagina."</b> "; 
		} else { 
			echo "<a href='albumdefotos.php?pic=$imagenId&carpetas=$carpeta&pagina=$i'>$i</a> "; 
		}
	 }
		if(($pagina + 1)<=$total_paginas) { 
			echo " <a href='albumdefotos.php?pic=$imagenId&carpetas=$carpeta&pagina=".($pagina+1)."'>Siguiente ></a>"; 
		} 
//Fin Paginacion
	mysql_close();
}

?>

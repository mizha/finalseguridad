<?
	include("../conexion.php"); 
	function comentario(){}
	
	//funcion que imprime coemntarios se usa en mostrar_blog.php
	function imprimirComentarios($blogId)
	{
	//Para la paginacion
		$registros = 2;
		$pagina = $_GET["pagina"];

			if (!$pagina) { 
			$inicio = 0; 
			$pagina = 1; 
			} 
			else { 
			$inicio = ($pagina - 1) * $registros; 
			} 
//Fin Inicio Paginación
	
	
	$query = "SELECT `IdComentario` FROM `comentarioblog` WHERE `IdBlog` = '".$blogId."' AND `Eliminado`='No' ORDER BY `IdComentario` DESC ";
	$result = mysql_db_query("jci",$query);
	$total_registros = mysql_num_rows($result); 
	$query = "SELECT * FROM `comentarioblog` WHERE `IdBlog` = '".$blogId."' AND `Eliminado`='No' ORDER BY `IdComentario` DESC LIMIT $inicio, $registros  ";
	$result = mysql_db_query("jci",$query);
	$total_paginas = ceil($total_registros / $registros);
	while($row=mysql_fetch_array($result)){
	if($row["Eliminado"]=='No')
	{
	echo ' <p><h3>'.$row["Fecha"].'</h3> ';
	echo'  <h4><a href="eliminar_comentario.php?comenId='.$row["IdComentario"].'&blogId='.$blogId.'">Eliminar</a></h4>';
	echo ' '.$row["Comentario"].'<br><h4>'.obtenerNombre($row["CI"]).'</h4></p>';
	}
	}
	// Inicio Paginación de nuevo 
		if(($pagina - 1) > 0) { 
		echo "<a href='mostrar_Blog.php?blogid=$blogId&pagina=".($pagina-1)."'>< Anterior</a> "; 
} for ($i=1; $i<=$total_paginas; $i++){ 
if ($pagina == $i) { 
echo "<b>".$pagina."</b> "; 
} else { 
echo "<a href='mostrar_Blog.php?blogid=$blogId&pagina=$i'>$i</a> "; 
} }
if(($pagina + 1)<=$total_paginas) { 
echo " <a href='mostrar_Blog.php?blogid=$blogId&pagina=".($pagina+1)."'>Siguiente ></a>"; 
} 
//Fin Paginacion
	mysql_close();
}


?>

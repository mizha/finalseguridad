<?php 
	//include("../conexion.php"); 
	//include("funciones.php"); 
	function blog(){}
	
	function contar($blogId)
	{
		$sql="SELECT count(*) AS `contado` FROM `comentarioblog` WHERE `IdBlog` ='".$blogId."' AND `Eliminado` = 'No'";
		$re=mysql_query($sql,"u913064844_jci");
		if(mysql_affected_rows()==0){
	       return 0;
	   	}
		else{
			$row=mysql_fetch_array($re);
			return $row["contado"];
		}
		
	}
	//funcion queobtiene los datos del blog y los coloca en un form para que pueda ser modificado
	function script(){echo '<script type="text/javascript">
      	_editor_url = "../Editor/";
	      _editor_lang = "en";
    </script>
    <script type="text/javascript" src="../Editor/htmlarea.js"></script>
    <script type="text/javascript">
      HTMLArea.loadPlugin("ContextMenu");
      HTMLArea.onload = function() {
        var editor = new HTMLArea("cuerpo");
        editor.registerPlugin(ContextMenu);
        editor.generate();
      };
      HTMLArea.init();
   </script>';}

	function Obtener($blogId)
	{
	//mysql_connect("localhost","root");
	$result=mysql_query("SELECT * FROM `blog` WHERE `IdBlog`=".$blogId,"u913064844_jci");
	$row=mysql_fetch_array($result);
	$titulo=$row["Titulo"];
	$cuerpo=$row["Cuerpo"];
	$usuario=obtenerNombre($row["CI"]);
	$fecha=$row["Fecha"];
	//script();
	echo ' <form name="form1" method="post" action="modificar_blog.php?blogid='.$blogId.'">';
    echo '<h1>Titulo ';
    echo '<input name="titulo" type="text" id="titulo" value="'.$titulo.'">';
    echo '</h1>';
    echo '<h2>Creado por: &nbsp;'.$usuario.'&nbsp; En Fecha: &nbsp; '.$fecha.'</h2></br><br>';
    echo '<h1>Cuerpo</h1>';
    echo '<p>';
    echo '<center>  ';
    echo '<textarea name="cuerpo" id="cuerpo" rows="17" cols="20" style="width: 100%">'.$cuerpo.'.</textarea>';
	echo '</center>';
    echo ' </p>';
    echo ' <p>';
    echo '  <input name="enviar" type="submit" id="enviar" value="Enviar"> ';
    echo '  <input type="reset" name="Reset" value="Limpiar">   ';  
    echo '  </p>';
    echo '  </form>';
	}
	//funcion que imprime un solo blog usamos esta funcion para mostrar_blog.php
	function imprimirBlog($blogId)
	{
	//mysql_connect("localhost","root");
	$result=mysql_query("SELECT * FROM `blog` WHERE `IdBlog`=".$blogId,"u913064844_jci");
	$row=mysql_fetch_array($result);
  	echo ' <div class="feature"> ';
	echo ' <h2>'.$row["Titulo"].'</h2> ';
	echo ' <h3><a href>'.obtenerNombre($row["CI"]).'</a></h3><h4>'.$row["Fecha"].'</h4> ';
	echo ' <p>'.$row["Cuerpo"].'</p>';
	echo '</div>';
	}
	function obtenerTitulo ($blogId)
	{
		$result=mysql_query("SELECT * FROM `blog` WHERE `IdBlog`=".$blogId,"u913064844_jci");
		$row=mysql_fetch_array($result);
		return $row["Titulo"];
	}
	function imprimirBlog2($blogId,$regis,$tipo)
	{
	//mysql_connect("localhost","root");
	
    $result=mysql_query("SELECT * FROM `blog` WHERE `IdBlog`=".$blogId);
	$row=mysql_fetch_array($result);
    error_reporting(0);
	echo ' <h1>'.$row["Titulo"].'</h1> ';
	if($regis=='SI' && $tipo==5){ // Y es Presidente
	echo '<center><a href="Blog/ModificarBlog.php?blogId='.$blogId.'">Modificar</center></a>';}

	echo ' <p>'.$row["Cuerpo"].'</p>';
	
	}
	//Funcion que realiza la busqueda del blog
	// 1 Modificar
	// 2 Eliminar
	// 3 Ver 
	function buscarBlog($buscado, $opcion,$tipe,$ci)
	{
	   //mysql_connect("localhost","root");
	   //if($tipe==1 || $opcion==3){//Elimina lo que desee 
	   if($opcion==3 || $tipe==5){
	   		$sql = "SELECT * FROM `blog` WHERE `visible`= 'Si' AND `Titulo` LIKE '%".$buscado."%'"; 
		    $result=mysql_query($sql,"u913064844_jci");
			}
		elseif($tipe!=5){	
			$sql = "SELECT * FROM `blog` WHERE `visible`= 'Si' AND `Titulo` LIKE '%".$buscado."%' AND `CI` ='".$ci."'"; 
		    $result=mysql_query($sql,"u913064844_jci");
		}
	   if(mysql_affected_rows()==0){
	       echo '<h1>No existen resultados</h1>';
	   }
	   else {
	        echo '  <br>
			<h3>Resultados que coniciden con <i>'.$buscado.'</i></h3><br><br>
	 		<table width="90%" border="1" cellpadding="2" summary=""> ';
  	 		echo '  <tr valign="top">';
	 		echo '  	 <th scope="col">Titulo</th>';
   			echo ' 	 <th scope="col">Usuario</th>';
	        echo ' 	 <th scope="col">Comentarios</th>';
	    	echo ' 	 <th scope="col"> </th>';
            echo ' </tr>';
	        while ($row = mysql_fetch_array($result))
	 		{
				 echo '  <tr valign="top">'; 
			 	 echo '  	 <td valign="top"><center><a href="mostrar_Blog.php?blogid='.$row["IdBlog"].'">'.$row["Titulo"].'</a></center></th>';
   	 		     echo ' 	 <td valign="top"><center>'.obtenerNombre($row["CI"]).'</center> </th>';
		         echo ' 	 <td valign="top"><center>'.contar($row["IdBlog"]).'</center></th>';
			     if ($opcion == 1)
			      {
		   	          echo ' 	 <td valign="top"><center><a href="ModificarBlog.php?blogId='.$row["IdBlog"].'">Modificar</center></a></th>';}
			 	 if($opcion == 2)
			 		{
			          echo ' 	 <td valign="top"><center><a href="eliminar_blog.php?blogId='.$row["IdBlog"].'">Eliminar</center></a></th>';}
			 		
			     if($opcion == 3)
			        {
			          echo ' 	 <td valign="top"><center><a href="mostrar_Blog.php?blogid='.$row["IdBlog"].'">Ver</center></a></th>';}
			        
		              echo ' </tr>';
		    }
	        echo '</table>';
			}
      }






//Funcion que Imprime el ultimo blog que se ha creado
	
	function imprimirPrincipal()
	{
	//mysql_connect("localhost","root");
		//Para la paginacion
		$registros = 6;
		$pagina = $_GET["pagina"];

			if (!$pagina) { 
			$inicio = 0; 
			$pagina = 1; 
			} 
			else { 
			$inicio = ($pagina - 1) * $registros; 
			} 
//Fin Inicio Paginaci�n
$result=mysql_query("select `IdBlog` from blog WHERE `visible`= 'Si' ORDER BY `IdBlog` DESC","u913064844_jci");
$total_registros = mysql_num_rows($result); 

	$result=mysql_query("select * from blog WHERE `visible`= 'Si' ORDER BY `IdBlog` DESC LIMIT $inicio, $registros","u913064844_jci");
	$total_paginas = ceil($total_registros / $registros);
	$row=mysql_fetch_array($result);
	 //echo ' <div class="feature"> ';
 echo ' <a href="Blog/mostrar_Blog.php?blogid='.$row["IdBlog"].'"><h1>'.$row["Titulo"].'</h1></a>';
 echo ' <h3>'.obtenerNombre($row["CI"]).'</h3><h2>'.$row["Fecha"].'</h2> ';
 $dividido = dividirCuerpo($row["Cuerpo"],1);
 echo $dividido;
// echo '</div>';
	$row=mysql_fetch_array($result);
//echo ' <div class="story"> ';
   echo ' <a href="Blog/mostrar_Blog.php?blogid='.$row["IdBlog"].'"><h2>'.$row["Titulo"].'</h2></a> ';
   echo ' <h3>'.obtenerNombre($row["CI"]).'</h3><h2>'.$row["Fecha"].'</h2> ';
   $dividido = dividirCuerpo($row["Cuerpo"],2);
   echo $dividido;
 //  echo '</div>'; 
   //echo ' <div class="story"> ';
   echo ' <table width="100%" cellpadding="0" cellspacing="0" summary=""> ';
//Mostramos Tabla
$contador = 1;
$iterador = 0;
while (($row=mysql_fetch_array($result)) and ($iterador < 4) )
{
if ($contador == 1)
{
 echo '<tr height="50%" valign="top">';
 echo ' <td width="50%" class="storyLeft"> <p>';
 echo ' <a href="Blog/mostrar_Blog.php?blogid='.$row["IdBlog"].'"><h2>'.$row["Titulo"].'</h2></a>';
 echo ' <h3>'.obtenerNombre($row["CI"]).'</h3><h2>'.$row["Fecha"].'</h2> ';
  $dividido = dividirCuerpo($row["Cuerpo"],3);
 echo ' <p>'.$dividido.'</p>';
 echo '</td>';
 $contador++;
 }
 else {if($contador == 2 )
 { 
    echo'<td> <p> ';
	echo ' <a href="Blog/mostrar_Blog.php?blogid='.$row["IdBlog"].'"><h2>'.$row["Titulo"].'</h2></a>';
    echo ' <h3>'.obtenerNombre($row["CI"]).'</h3><h2>'.$row["Fecha"].'</h2> ';
	$dividido = dividirCuerpo($row["Cuerpo"],3);
    echo ' <p>'.$dividido.'</p></td></tr>  ';
	$contador = 1;
 }
 }
 $iterador++;
}
echo'</tr> </table>';
// Inicio Paginaci�n de nuevo 
		if(($pagina - 1) > 0) { 
echo "<a href='Blog.php?pagina=".($pagina-1)."'>< Anterior</a> "; 
} for ($i=1; $i<=$total_paginas; $i++){ 
if ($pagina == $i) { 
echo "<b>".$pagina."</b> "; 
} else { 
echo "<a href='Blog.php?pagina=$i'>$i</a> "; 
} }
if(($pagina + 1)<=$total_paginas) { 
echo " <a href='Blog.php?pagina=".($pagina+1)."'>Siguiente ></a>"; 
} 
//Fin Paginacion
mysql_free_result($result);
	}

// Funcion que imprime los penultimos 4 blogs creados 
	function imprimirTabla()
	{
	 //mysql_connect("localhost","root");
	 $result=mysql_query("select * from blog  WHERE `visible`= 'Si' ORDER BY `IdBlog` DESC","u913064844_jci");
	 echo ' <div class="story"> ';
     echo ' <table width="100%" height="40" cellpadding="0" cellspacing="0" summary=""> ';
	 $contador = 1;
	 $iterador = 0;
	 while (($row=mysql_fetch_array($result)) and ($iterador < 4) )
	 {
	  if ($contador == 1)
		{
		 echo '<tr height="50%" valign="top">';
		 echo ' <td width="50%"class="storyLeft"> <p>';
		 echo ' <a href="Blog/mostrar_Blog.php?blogid='.$row["IdBlog"].'">'.$row["Titulo"].'</a>';
		 echo ' <h2>'.obtenerNombre($row["CI"]).'</h2><h1>'.$row["Fecha"].'</h1> ';
		 $dividido = dividirCuerpo($row["Cuerpo"],3);
		 echo ' <p>'.$dividido.'</p>';
		 echo '</td>';
		 $contador++;
		 }
	  else {if($contador == 2 )
		 { 
    	 echo'<td> <p> ';
	     echo ' <a href="Blog/mostrar_Blog.php?blogid='.$row["IdBlog"].'">'.$row["Titulo"].'</a>';
    	 echo ' <h2>'.obtenerNombre($row["CI"]).'</h2><h1>'.$row["Fecha"].'</h1> ';
		  $dividido = dividirCuerpo($row["Cuerpo"],3);
		 echo ' <p>'.$dividido.'</p></td></tr>  ';
	$contador = 1;
 }}
 $iterador++;
}
echo'</tr> </table></div> ';

mysql_free_result($result);
}


?>
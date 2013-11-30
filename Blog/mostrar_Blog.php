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
<title>Blog</title>
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
	<div id="cont_contenido"> 
		<?php include("libBlog.php");
			include("libComentario.php");
			imprimirBlog($_GET["blogid"]);
			$blog = $_GET["blogid"];?>
			<hr>  
			<? imprimirComentarios($blog);?>
			<hr>
			<? if ($regis=="SI"){?>
				<form action="agregar_comentario.php" method="post">
					<h>Haz Tu Comentario</h4>
			        <p>
					 <center>
						 <? echo '<input name="blog" type="hidden" value="'.$blog.'">';?>
						 <? echo '<input name="nombre" type="hidden" value="'.$ci.'">';?>
				         <textarea name="cuerpo" id="cuerpo" rows="5" cols="50" style="width: 70%"></textarea>
			         </center>
			       </p>
        		<p>
		          <input name="enviar" type="submit" id="enviar" value="Enviar"> 
		          <input type="reset" name="Reset" value="Limpiar">     
          		</p>
				</form>
			<? } ?>
			<? if ($regis=="NO"){ echo '<h2>Tienes que iniciar sesion para hacer un comentario</h2><br> <a href="../iniciarSesion.php">Iniciar Sesion</a><hr>'; }?> 
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
<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis =="SI") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Publicar Blog</title>
 <script type="text/javascript">
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
   </script>
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
      <form name="form1" method="post" action="agregar_blog.php">
        <h3>Titulo 
          <input name="titulo" type="text" id="titulo">
		  <?
			echo '<input name="nombre" type="hidden" value="'.$ci.'">';
		  ?>
</h3>
        <h3>Cuerpo</h3>
        <p>
		 <center>  
		  <textarea name="cuerpo" id="cuerpo" rows="18" cols="20" style="width: 100%"></textarea>
		 </center>
        </p>
        <p align="rigth">
          <input name="enviar" type="submit" id="enviar" value="Enviar"> 
          <input type="reset" name="Reset" value="Limpiar">     
          </p>
      </form>
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
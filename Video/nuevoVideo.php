<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libVideo.php");

if($regis=="SI") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nuevo Video</title>
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
	  <script>
	  function validar()
	  {
	  	if(document.form1.titulo.value.length==0)
		{
		alert("Debes poner un titulo") ;
       		document.form1.titulo.focus() ;
       		return 0;
		}
		 	if(document.form1.titulo.value.length>=100)
		{
		alert("Titulo muy grande") ;
       		document.form1.Codigo.focus() ;
       		return 0;
		}
		if(document.form1.Codigo.value.length==0)
		{
		alert("Debes poner un codigo de youtube") ;
       		document.form1.Codigo.focus() ;
       		return 0;
		}
		document.form1.submit();
	  }
	  </script>
      <form name="form1" method="post" action="agregar_video.php">
        <table width="100" border="0" cellpadding="2">
          <tr>
            <td> <h1>Titulo</h1></td>
            <td> <input name="titulo" type="text" id="titulo"></td>
          </tr>
          <tr>
            <td><h1>Categoría</h1></td>
            <td> <? categorias();?></td>
          </tr>
          <tr>
            <td><h1>Código</h1></td>
            <td><input name="Codigo" type="text" id="Codigo" alt="En este codigo debes colocar solamente la parte que vuen luego de Watch=?"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td> <input name="enviar" type="button" id="enviar" value="Enviar" onClick="validar();"> 
          <input type="reset" name="Reset" value="Limpiar"></td>
          </tr>
        </table>  	 
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
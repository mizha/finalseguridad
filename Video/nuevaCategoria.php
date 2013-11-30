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
<title>Nueva Categoria</title>
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
	  	if(document.form1.categoria.value.length==0)
		{
		alert("Debes poner un nombre a la nueva categoria") ;
       		document.form1.categoria.focus() ;
       		return 0;
		}
		 	if(document.form1.categoria.value.length>=100)
		{
		alert("Nombre de Categoria muy grande") ;
       		document.form1.categoria.focus() ;
       		return 0;
		}
		document.form1.submit();
	  }
	  </script>
      <form name="form1" method="post" action="agregar_categoria.php">
        <table width="405" border="0" cellpadding="2">
          <tr>
            <td width="183"> <h2>Nombre Categoria</h2></td>
            <td width="208"> <input name="categoria" type="text" id="categoria"></td>
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
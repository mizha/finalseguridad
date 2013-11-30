<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libAlbum.php");

if($regis=="SI") 
 {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Subir Imagen - Escoger Imagen</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido">
	<script>
	function validar()
	{
		if (document.form1.nombre.value.length==0 )
		{alert("Debes poner una nombre a la imagen") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.nombre.value.length>=100 )
		{alert("El nombre es demasiado largo") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.descripcion.value.length==0 )
		{alert("Debes poner una descripcción a la imagen") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.descripcion.value.length>=100 )
		{alert("La descripccio nes demasiado larga") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.imagen.value.length==0 )
		{alert("Desbes poner la direccion de la imagen a ser cargada") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		document.form1.submit();
	}
	</script>
	<?php $carpeta= $_REQUEST["carpetas"];?>
	<h1>Subir nueva imagen</h1><br><br>
	<form name="form1" action="subiendo.php" method="post" enctype="multipart/form-data"> 
	<table width="392" border="0" cellpadding="0">
  <tr>
    <td width="101"><h2>Nombre</h2></th>
    <td colspan="2"><input name="nombre" type="text" maxlength="100">
    </th>
  </tr>
  <tr>
    <td><h2>Descripción</h2></td>
    <td colspan="2"><input name="descripcion" type="text" maxlength="100" size="30
	"></td>
  </tr>
  <tr>
    <td><h2>Archivo</h2></td>
    <td colspan="2">	<? echo '<input name="carpeta" type="hidden" value="'.$carpeta.'">' ?>
	<? echo '<input name="usuario" type="hidden" value="'.$nombre.'">' ?>
      <input name="imagen" id="imagen" type="file"/></td>
  </tr>
  <tr>
    <td rowspan="2"></td>
    <td width="50%"><input type="button" value="Enviar fotos" style="margin-bottom:10px;" onClick="validar();"></td>
    <td width="50%" rowspan="2"><input name="Limpiar" type="reset" value="Limpiar" style="margin-bottom:10px;"/></td>
  </tr>
</table>
<br>
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
<?php 
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<!-- DW6 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Añadir Fotos</title>
<link rel="stylesheet" href="../Images/emx_nav_left.css" type="text/css">
<script type="text/javascript" src="../head.js"></script>
<?php include("../conexion.php");?>
</head>
<body onmousemove="closesubnav(event);"> 
<?php include("libPrincipal.phtml");?>
<?php include("libAlbum.php");?>
<?php cabeceraPresidente(); ?>
<div id="pagecell1"> 
  <!--pagecell1--> 
  <img alt="" src="Images/tl_curve_white.gif" height="6" width="6" id="tl"> <img alt="" src="Images/tr_curve_white.gif" height="6" width="6" id="tr"> 
  <div id="breadCrumb"> 
    <a href="../index.php">Principal</a> / <a href="../AlbumFotos.php">Album de Fotos</a> /
  </div> 
  <div id="pageName"> 
    <h2>Imagenes</h2> 
    <img alt="small logo" src="" height="59" width="66"/> 
  </div> 
<?php Indice(); ?>
  <div id="content"> 
    <div class="feature">
	<script>
	function validar()
	{
		if (document.form1.upfile.value.length==0 )
		{alert("Desbes poner la direccion de la imagen a ser cargada") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.nombre.value.length==0 )
		{alert("Desbes colocar un nombre") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.cuerpo.value.length==0 )
		{alert("Debes poner una descripccion") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.cuerpo.value.length>=100 )
		{alert("La descripccion es damasiada largo") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		document.form1.submit();
	}
	</script>
	<?php $carpeta= $_REQUEST["carpetas"];?>
<form name="form1" action="up.php" method="post" enctype="multipart/form-data"> 
<input name="upfile" id="upfile" type="file"/><br>
<? echo '<input name="carpeta" type="hidden" value="'.$carpeta.'">' ?>
Nombre de la imagen: <input name="nombre" type="text" size="40" maxlength="50" />
<input type="button" value="Enviar fotos" style="margin-bottom:10px;" onClick="validar();">
</form>
 </div>  </div> 
<?php PieDePagina();?> 
</div> 
<br> 
<script type="text/javascript" src="../item.js"></script> 
</body>
</html>
<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI" OR $regis=="NO") 
 {
 	//if(permitir($tipo,"publicarblog"))
	if($tipo==5)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nueva Carpeta</title>
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
	<br><br><div align="center">
      <h1>Nueva Carpeta</h1> 
    <script>
	function validar()
	{
		if (document.form1.titulo.value.length==0 )
		{alert("Debes poner un nombre a la carpeta") ;
       		document.form1.cuerpo.focus() ;
       		return 0;
		}
		if (document.form1.titulo.value.length>=100 )
		{alert("El nombre es damasiado largo") ;
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
      <form name="form1" method="post" action="agregar_carpeta.php">
        <h1>Nombre de la Carpeta <p>
          <input name="titulo" type="text" id="titulo"></p>
</h1>
        <h1>Descripción</h1>
        <p>
		  <textarea name="cuerpo" id="cuerpo" rows="10" cols="15" style="width: 30%"></textarea>
        </p>
        <p>
          <input name="enviar" type="button" id="enviar" value="Enviar" onClick="validar();"> 
          <input type="reset" name="Reset" value="Limpiar">     
          </p>
      </form></div>
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
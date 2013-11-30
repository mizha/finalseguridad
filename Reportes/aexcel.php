<?

include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

 session_start();
             
  if ($_SESSION["autenticado"] == "SI") 
  {
      //sino, calculamos el tiempo transcurrido  
       $fechaGuardada = $_SESSION["ultimoAcceso"]; 
       $ahora = date("Y-n-j H:i:s"); 
       $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));   

      //comparamos el tiempo transcurrido  
        if($tiempo_transcurrido >= 60)
        {  
         //si pasaron 10 minutos o más  
          session_destroy(); // destruyo la sesión  
          header("Location: index.php"); //envío al usuario a la pag. de autenticación  
      //sino, actualizo la fecha de la sesión  
        }else{  
              $_SESSION["ultimoAcceso"] = $ahora;  
             }   
  } 
if($regis=="SI" OR $regis=="NO") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>A Excel</title>
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
		function validar(){
			aux=0;
			if(document.buscar.Nombre.checked){aux++;}
			if(document.buscar.Apellido.checked){aux++;}
			if(document.buscar.telfDom.checked){aux++;}
			if(document.buscar.telfOf.checked){aux++;}
			if(document.buscar.celular.checked){aux++;}
			if(document.buscar.email.checked){aux++;}
			if(document.buscar.fechanacimiento.checked){aux++;}
			if(document.buscar.aniojci.checked){aux++;}
			if(document.buscar.ocupacionactual.checked){aux++;}
			if(document.buscar.tipo.checked){aux++;}
			if(aux<1){alert("Debe marcar por lo menos uno de los campos");return 0;}
			if(document.buscar.busqueda.value.length==0)
			{
				alert("Debe Colocar la busqueda\n En caso de colocar \"*\" se utilizara como comodin");
				document.buscar.busqueda.focus();
				return 0;
			}
			document.buscar.submit();
		}
	</script>
		<form name="buscar" method="post" action="datos.php">
		<center>
			
			<h2>Buscar&nbsp;<input name="busqueda" type="text" size="50" maxlength="100">&nbsp;</h2><br>
		</center>
			<fieldset><legend>Resultados Salientes</legend>
			<table border="0" cellpadding="3" cellspacing="5">
				<tr>
					<td><input name="Nombre" type="checkbox" value="Nombre">&nbsp;Nombre&nbsp;</td>
					<td><input name="Apellido" type="checkbox" value="Apellido">&nbsp;Apellido&nbsp;</td>
					<td><input name="telfDom" type="checkbox" value="telfDom">&nbsp;Telefono Domicilio&nbsp;</td>
					<td><input name="telfOf" type="checkbox" value="telfOf">&nbsp;Telefono Oficina&nbsp;</td>
				</tr>
				<tr>
					<td><input name="celular" type="checkbox" value="celular">&nbsp;Celular&nbsp;</td>
					<td><input name="email" type="checkbox" value="email">&nbsp;E-Mail&nbsp;</td>
					<td><input name="fechanacimiento" type="checkbox" value="fechanacimiento">&nbsp;Fecha De Nacimiento&nbsp;</td>
					<td><input name="aniojci" type="checkbox" value="aniojci">&nbsp;Año de Ingreso a JCI&nbsp;</td>
				</tr>
				<tr>
					<td></td>
					<td><input name="ocupacionactual" type="checkbox" value="ocupacionactual">&nbsp;Ocupación Actual&nbsp;</td>
					<td><input name="tipo" type="checkbox" value="tipo">&nbsp;Tipo de Miembro&nbsp;</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><input name="Buscar" type="button" value="Buscar" onClick="validar()"></td>
				</tr>
			</table>
		</fieldset>
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

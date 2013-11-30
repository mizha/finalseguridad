<? 
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libUsuario.php");

if($regis=="SI") 
 {
 	$id=$_GET["id"];
 	if($id==$ci)
	{
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script src="validar.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Modificar Perfil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">

<!--<link href="estilo.css" rel="stylesheet" type="text/css">-->
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
<!--<div style="background-image:'../imagenes/Boton Datos 02.jpg'; height:auto; width:220px;">
<a href="javascript:mostrardiv('personales');">Datos Personales</a>&nbsp; &nbsp; <a href="javascript:cerrar('personales');"> cerrar</a>
  </div>-->
	  <div id="personales">
	<table width="100%"  border="1" cellspacing="2" cellpadding="2" bordercolor="#CCCCCC">
  <tr>
    <th width="40%" scope="col" bgcolor="#000099"><h2><center><font color="#FFFFFF"><? echo strtoupper(puesto($id));?></font></center></h2></th>
    <th colspan="3" scope="col" bgcolor="#000099"><font color="#FFFFFF"><h2>DATOS PERSONALES Y LABORALES</h2></font></th>
  </tr>
  <tr>
    <td rowspan="8">
		<form name="image" action="subirfoto.php" class="background" method="post" enctype="multipart/form-data">
		<center><? echo "<image src=ver_foto.php?n=".$id." alt=\"".sql($id,"Nombre","junior")."\" border=0>";?></center><br>
		<div align="center">
			<input name="ci" type="hidden" value=<? echo $ci;?>>
			<input name="foto" type="file"><br><br>
		  <input name="GuardarImagen" type="submit" value="Guardar Imagen" >
	  	</div>
		</form>
	</td>
	<form name="registro" action="modificar_perfil.php" class="background" method="post" enctype="multipart/form-data">
    <td width="23%">    <h3>Direcci&oacute;n Oficina </h3></td>
    <td width="4%"><div align="center">
      <h3>:</h3>
    </div></td>
    <td width="33%"><h3><input type="text" id="dirOf" name="dirOf" value="<? echo sql($id,"dirOf","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Tel&eacute;f. (s) Oficina </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="telfOf"  name="telfOf" value="<? echo sql($id,"telfOf","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Correo Electr&oacute;nico Oficina </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="mailOf" name="mailOf" value="<? echo sql($id,"emailOf","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Direcci&oacute;n Domicilio </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="dirDom" name="dirdom" value="<? echo sql($id,"dirDom","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Tel&eacute;f. (s) Domicilio </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="telfDom" name="telfdom" value="<? echo sql($id,"telfDom","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Celular </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="celular" name="celular" value="<? echo sql($id,"celular","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Correo electr&oacute;nico personal </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="mail" name="mail" value="<? echo sql($id,"email","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><h3>Messenger </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><input type="text" id="msn" name="msn" value="<? echo sql($id,"msn","junior");?>"></h3></td>
  </tr>
  <tr>
    <td><center><h2><? echo sql($id,"Nombre","junior");?><br><? echo sql($id,"Apellido","junior");?></h2></center></td>
    <td colspan="3"><input type="hidden" name="ci" value="<? echo $ci;?>"><center>
	<input name="Guardar" type="button" value="Guardar" onClick="validar1();"> </center></td>
  </form>
  </tr>
</table>
<div id="contrasenia">
<table width="100%"  border="1" cellspacing="2" cellpadding="2" bordercolor="#CCCCCC">
   <tr>
    <th colspan="4" bgcolor="#000099" scope="col"><font color="#FFFFFF"><h2>CONTRASEÑAS</h2></font></th>
    </tr>
<form name="contras" id="contras" action="cambiarcontra.php" enctype="multipart/form-data" method="post">
  <tr>
    <td width="40%"><h3><center>Contraseña Actual</center></h3></td>
    <td width="60%" colspan="3"><center><input type="password" name="contraA" id="contraA"></center></td>
  </tr>
    <tr>
    <td width="40%"><h3><center>Contraseña Nueva</center></h3></td>
    <td colspan="3"><center><input type="password" name="contraN" id="contraN"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Repetir Contraseña</center></h3></td>
    <td colspan="3"><center><input type="password" name="contraRN" id="contraRN"></center></td>
  </tr>
  <tr>
    <td width="40%"><input type="hidden" value="<? echo $ci; ?>" name="ci" id="ci"></td>
    <td colspan="3"><center><input type="button" name="Cambiar Contraseña" value="Cambiar contraseña" onClick="validar2();"></center></td>
  </tr>
</form>
  </table>
</div>
<div id="empresa">
<? function select()
{
	$sql="SELECT * from sector";
	$res=mysql_db_query("jci",$sql);
	while($row=mysql_fetch_array($res))
	{
		$final.= "<option value=\"".$row["IdSector"]."\">".$row["Sector"]."</option>";
	}
	return $final;
}?>
<table width="100%"  border="1" cellspacing="2" cellpadding="2" bordercolor="#CCCCCC">
   <tr>
    <th colspan="4" bgcolor="#000099" scope="col"><font color="#FFFFFF"><h2>DATOS EMPRESARIALES</h2></font></th>
    </tr>
<form name="empresas" id="empresas" action="empresa.php" enctype="multipart/form-data" method="post">
  <tr>
    <td width="40%"><h3><center> Nombre de la organización</center></h3></td>
    <td width="60%" colspan="3"><center><input type="text" name="Nombre" id="Nombre" value="<? echo sql($id,"Nombre","empresas");?>"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center> Cargo</center></h3></td>
    <td colspan="3"><center><input type="text" name="cargo" id="cargo" value="<? echo sql($id,"Cargo","empresas");?>"></center></td>
  </tr>
    <tr>
    <td width="40%"><h3><center>Sector</center></h3></td>
    <td colspan="3"><center><select name="sector" id="sector" ><? echo select(); ?></select></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Principal Actividad y descripción del Producto y/o servicio</center></h3></td>
    <td colspan="3"><center><input type="text" name="actividad" id="actividad" value="<? echo sql($id,"actividadProducto","empresas");?>"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Dirección Oficina</center></h3></td>
    <td colspan="3"><center><input type="text" name="dirOf" id="dirOf" value="<? echo sql($id,"dirOf","empresas");?>"></center></td>
  </tr>
   <tr>
    <td width="40%"><h3><center>Teléfono Oficina</center></h3></td>
    <td colspan="3"><center><input type="text" name="telfOf" id="telfOf" value="<? echo sql($id,"telOf","empresas");?>"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Fax</center></h3></td>
    <td colspan="3"><center><input type="text" name="fax" id="fax" value="<? echo sql($id,"fax","empresas");?>"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Correo electrónico de la Empresa</center></h3></td>
    <td colspan="3"><center><input type="text" name="mailOf" id="mailOf" value="<? echo sql($id,"email","empresas");?>"></center></td>
  </tr>
  <tr>
    <td width="40%"><h3><center>Casilla</center></h3></td>
    <td colspan="3"><center><input type="text" name="casilla" id="casilla" value="<? echo sql($id,"casilla","empresas");?>"></center></td>
  </tr>
  <tr>
    <td width="40%"><input type="hidden" value="<? echo $ci; ?>" name="ci" id="ci"></td>
    <td colspan="3"><center><input type="button" name="Guardar Datos" value="Guardar Datos" onClick="validar3();"></center></td>
  </tr>
</form>
  </table>
</div>
<div id="imagenempresa">
<table width="100%"  border="1" cellspacing="2" cellpadding="2" bordercolor="#CCCCCC">
   <tr>
    <th colspan="4" bgcolor="#000099" scope="col"><font color="#FFFFFF"><h2>IMAGEN EMPRESARIAL</h2></font></th>
    </tr>
<form name="imagenEmpresa" id="empresas" action="imagenempresa.php" enctype="multipart/form-data" method="post">
  <tr>
    <td width="40%"><h3><center> Imagen de la empresa</center></h3></td>
    <td width="60%" colspan="3"><center><? echo "<image src=ver_imagen.php?n=".$id." alt=\"".sql($ci,"Nombre","empresas")."\" border=0>";?></center></td>
  </tr>
   <tr>
    <td width="40%"><input type="hidden" value="<? echo $ci; ?>" name="ci" id="ci"></td>
    <td colspan="3"><center><input type="submit" name="Guardar Imagen" value="Guardar Imagen"></center></td>
  </tr>
</form>
</table>
</div>
</div>
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
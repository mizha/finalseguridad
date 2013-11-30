<?php include("../libSesion.php");?>
<?php include("../conexion.php")?>
<?php include("../libPrincipal2.php");?>

<? if($regis=="NO") 
 {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JCI COCHABAMBA - Registro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
<script src="validar.js"></script>
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
<center>
<p class="body_heading">
<table border="0">
<form name="registro" action="agrega_registro.php" class="background" method="post" enctype="multipart/form-data">
<TR>
	<td width="191" class="required">Nombre <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	  <input name="nombre" type="text" size="30" maxlength="100">
	  </div></td>
</TR>
<TR>
	<td width="191">Apellido <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	  <input name="apellido" type="text" size="30" maxlength="100">
	  </div></td>
</TR>
<tr>
	<td>Carnet de Identidad <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	  <input name="ci" type="text" size="30" maxlength="10">
	  </div></td>
</tr>
<tr>
	<td>Telefono Domicilio <font color="#9e1b34">(*)</font> </td>
	<td><div align="right">
	  <input name="telfdom" type="text" size="12" maxlength="8">
	  </div></td>
</tr>
<tr>
	<td>Telefono Oficina</td>
	<td><div align="right">
	  <input name="telfofi" type="text" size="12" maxlength="8">
	  </div></td>
</tr>
<tr>
	<td>Telefono Celular <font color="#9e1b34">(*)</font> </td>
	<td><div align="right">
	  <input name="celular" type="text" size="12" maxlength="8">
	  </div></td>
</tr>
<tr>
	<td>Dirección Domicilio <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	  <input name="dirdom" type="text" size="30" maxlength="200">
	  </div></td>
</tr>
<tr>
	<td>Fecha Nacimiento <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	   <select name="dia">
	    <? 
	for($i=01;$i<=31;$i++)
	{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
	    </select>/
		<select name="mes">
	    	<option value="01">Enero</option>
			<option value="02">Febrero</option>
			<option value="03">Marzo</option>
			<option value="04">Abril</option>
			<option value="05">Mayo</option>
			<option value="06">Junio</option>
			<option value="07">Julio</option>
			<option value="08">Agosto</option>
			<option value="09">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
	    </select>/
		<select name="anio">
	    <? 
	for($i=1919;$i<=date("Y");$i++)
	{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
	    </select>
	  </div></td>
</tr>
<tr>
	<td>Tipo de Miembro<font color="#9e1b34">(*)</font></td>
	<td><div align="center">
	  <select name="tipo" >
	    <option value="0" >---------</option>
		<? 
			$query="SELECT * FROM tipojunior";
			$res=mysql_db_query("jci",$query);
			while($row=mysql_fetch_array($res))
			{
				echo '<option value="'.$row["idTipo"].'" >'.$row["Tipo"].'</option>';
			}
		?>
	  </select>
	  </div></td>
</tr>
<tr>
	<td>Año de Ingreso a JCI <font color="#9e1b34">(*)</font></td>
	<td><div align="center">
	  <select name="ingreso" >
	    <? 
	for($i=date("Y");$i>=1957;$i--)
	{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
	    </select>
	  </div></td>
</tr>
<tr>
	<td>E-mail <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	  <input name="mail" type="text" size="30" maxlength="100">
	  </div></td>
</tr>
<tr>
	<td>Fotografia</td>
	<td><div align="right">
	  <input name="foto" type="file">
	  </div></td>
</tr>
<tr>
	<td>Ocupación Actual </td>
	<td><div align="right">
	  <input name="ocupacionactual" type="text" size="30" maxlength="100">
	  </div></td>
</tr>
<tr>
	<td>Nombre de usuario <font color="#9e1b34">(*)</font> </td>
	<td><div align="right">
	  <input name="usuario" type="text" size="20" maxlength="10">
	  </div></td>
</tr>
<tr>
	<td>Contraseña <font color="#9e1b34">(*)</font></td>
	<td><div align="right"> 
     <input name="pass" type="password" size="20" maxlength="10">  
     </div></td>
</tr>
<tr>
	<td>Repetir Contraseña <font color="#9e1b34">(*)</font></td>
	<td><div align="right">
	  <input name="conpass" type="password" size="20" maxlength="10">
	  </div></td>
</tr>
<tr>
	<td></td>
	<td width="229"><input name="REGISTRARSE" type="button" value="REGISTRARSE" onClick="validar()">&nbsp;&nbsp;&nbsp;<input name="Limpiar" type="reset" value="Limpiar"></td>
</tr>
</form>
</table>
</center>
</p>
</div> 
<div class="corte"></div> 
</div> 
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
<? }
 else{
// echo "El sistema lo ha identificado";
 ?>
<SCRIPT LANGUAGE="javascript">
alert("Ya esta registrado no necesita hacerlo de nuevo");
location.href = "../index.php";
</SCRIPT>
<?
 }
?> 

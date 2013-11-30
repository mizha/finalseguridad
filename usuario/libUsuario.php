<? 
function buscar($buscado)
{
	$sql="SELECT * From junior WHERE `Nombre` LIKE '%".$buscado."%' OR `Apellido` LIKE '%".$buscado."%'";
	$res=mysql_db_query("jci",$sql);
	if(mysql_affected_rows()!=0)
	{
		echo "<table border=0>";
		while($row=mysql_fetch_array($res))
		{	echo '<tr> <form name="'.$row["CI"].'" action="nombra_presi.php" method="post">';
			echo '<td>'.obtenerNombre($row["CI"]).'<input type="hidden" value="'.$row["CI"].'" name="ci"></td>';
			echo '<td><input type="submit" name="nombrar" value="Nombrar Presidente GESTION ACTUAL"></form></td>';
			echo "</tr>";
		}
	}
	else{echo "<h1>No existen resultados</h1>";}
}
function cargos($id)
{
	$query="SELECT * From jdljunior WHERE CI='".$id."'";
	$res=mysql_db_query("jci",$query);
	if(mysql_affected_rows()==0)
	{
		$final="vacio";
	}
	else{
		while($row=mysql_fetch_array($res))
		{
			$sql="SELECT Puesto From jdl WHERE IdJdl='".$row["IdJdl"]."'";
			$respuesta=mysql_db_query("jci",$sql);
			$rows=mysql_fetch_array($respuesta);
			$puesto=$rows["Puesto"];
			$anio=$row["anio"];
			$final.=$puesto."&nbsp;(".$anio.")<br>";
		}
	}
	$query="SELECT * From celjunior WHERE CI='".$id."'";
	$res=mysql_db_query("jci",$query);
	if(mysql_affected_rows()==0)
	{
		$final="vacio";
	}
	else{
		while($row=mysql_fetch_array($res))
		{
			$sql="SELECT Puesto From cel WHERE IdCel='".$row["IdCel"]."'";
			$respuesta=mysql_db_query("jci",$sql);
			$rows=mysql_fetch_array($respuesta);
			$puesto=$rows["Puesto"];
			$anio=$row["anio"];
			if($final=="vacio")
			{$final=$puesto."&nbsp;(".$anio.")<br>";}
			else{$final.=$puesto."&nbsp;(".$anio.")<br>";}
		}
	}
	if($final=="vacio"){return "Miembro Individual";}
	else{return $final;}
}
function jdl($id){
	$query="SELECT * From jdljunior WHERE CI='".$id."' AND anio='".date("Y")."'";
	$res=mysql_db_query("jci",$query);
	if(mysql_affected_rows()==0)
	{
		return "vacio";
	}
	$row=mysql_fetch_array($res);
	$idjdl=$row["IdJdl"];
	$anio=$row["anio"];
	$query="SELECT Puesto From jdl WHERE IdJdl='".$idjdl."'";
	$res=mysql_db_query("jci",$query);
	$row=mysql_fetch_array($res);
	$puesto=$row["Puesto"];
	return $puesto." - ".$anio;
}
function cel($id){
	$query="SELECT * From celjunior WHERE CI='".$id."'AND anio='".date("Y")."'";
	$res=mysql_db_query("jci",$query);
	if(mysql_affected_rows()==0)
	{
		return "vacio";
	}
	$row=mysql_fetch_array($res);
	$idcel=$row["IdCel"];
	$anio=$row["anio"];
	$query="SELECT Puesto From cel WHERE IdCel='".$idcel."'";
	$res=mysql_db_query("jci",$query);
	$row=mysql_fetch_array($res);
	$puesto=$row["Puesto"];
	return $puesto." - ".$anio;
}
function puesto($id)
{
	$jdlP=jdl($id);
	if($jdlP=="vacio")
	{
		$celP=cel($id);
		if($celP=="vacio")
		{return "Miembro Individual";}
		else{ return $celP;}
	}
	else{ return $jdlP;}

}
function sql($id,$columna,$tabla)//Aumentar $tabla 
{
	$query="SELECT ".$columna." From ".$tabla." WHERE CI='".$id."'";
	//echo $query;
	$res=mysql_db_query("jci",$query);
	if(mysql_affected_rows()!=0)
	{
		$row=mysql_fetch_array($res);
		$result=$row[$columna];
		if($result=="0")
		{
			return " ";
		}
		else{return $result;}
	}
	else{return "";}
}

function mostrarPerfil($id)
{?>
<table width="100%"  border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
  <tr>
    <th width="32%" height="48" bgcolor="#000099" scope="col"><h2><center><font color="#FFFFFF"><? echo strtoupper(puesto($id));?></font></center></h2></th>
    <th colspan="3" scope="col" bgcolor="#000099"><font color="#FFFFFF"><h2>DATOS PERSONALES Y LABORALES</h2></font></th>
  </tr>
  <tr>
    <td rowspan="8"><center><? echo "<image src=ver_foto.php?n=".$id." alt=\"".sql($id,"Nombre","junior")."\" border=0>";?></center></td>
    <td width="22%"><h3>Direcci&oacute;n Oficina </h3></td>
    <td width="3%"><div align="center">
      <h3>:</h3>
    </div></td>
    <td width="43%"><h3><? echo sql($id,"dirOf","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Tel&eacute;f. (s) Oficina </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"telfOf","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Correo Electr&oacute;nico Oficina </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"emailOf","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Direcci&oacute;n Domicilio </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"dirDom","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Tel&eacute;f. (s) Domicilio </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"telfDom","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Celular </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"celular","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Correo electr&oacute;nico personal </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"email","junior");?></h3></td>
  </tr>
  <tr>
    <td><h3>Messenger </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"msn","junior");?></h3></td>
  </tr>
  <tr>
    <td><center><h2><? echo sql($id,"Nombre","junior");?><br><? echo sql($id,"Apellido","junior");?></h2></center></td>
    <td colspan="3"></td>
  </tr>
</table>

<?
}
function sacarSector($id)
{
	$query="SELECT Sector FROM sector WHERE IdSector='".$id."'";
	$res=mysql_db_query("jci",$query);
	$row=mysql_fetch_array($res);
	return $row["Sector"];
}
function mostrarEmpresa($id)
{
?>
<table width="100%"  border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
   <tr>
    <th colspan="4" bgcolor="#000099" scope="col"><font color="#FFFFFF"><h2>DATOS EMPRESARIALES</h2></font></th>
    </tr>
  <tr>
    <td width="32%"><h3><center> Nombre de la organización</center></h3></td>
    <td width="68%" colspan="3"><center><? echo sql($id,"Nombre","empresas");?></center></td>
  </tr>
  <tr>
    <td width="32%"><h3><center> Cargo</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"Cargo","empresas");?></center></td>
  </tr>
    <tr>
    <td width="32%"><h3><center>Sector</center></h3></td>
    <td colspan="3"><center><? $idS=sql($id,"IdSector","empresas");?><? echo sacarSector($idS); ?></center></td>
  </tr>
  <tr>
    <td width="32%"><h3><center>Principal Actividad y descripción del Producto y/o servicio</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"actividadProducto","empresas");?></center></td>
  </tr>
  <tr>
    <td width="32%"><h3><center>Dirección Oficina</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"dirOf","empresas");?></center></td>
  </tr>
   <tr>
    <td width="32%"><h3><center>Teléfono Oficina</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"telOf","empresas");?></center></td>
  </tr>
  <tr>
    <td width="32%"><h3><center>Fax</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"fax","empresas");?></center></td>
  </tr>
  <tr>
    <td width="32%"><h3><center>Correo electrónico de la Empresa</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"email","empresas");?></center></td>
  </tr>
  <tr>
    <td width="32%"><h3><center>Casilla</center></h3></td>
    <td colspan="3"><center><? echo sql($id,"casilla","empresas");?></center></td>
  </tr>
  <tr>
    <td width="32%"></td>
    <td colspan="3"><center><? echo "<image src=ver_imagen.php?n=".$id." alt=\"".sql($ci,"Nombre","empresas")."\" border=0>";?></center></td>
  </tr>
</form>
  </table>
<? 
}?>
<? function mostrarPerfilEmpresa($id)
{?>
<table width="100%"  border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
  <tr>
    <th width="32%" height="48" bgcolor="#000099" scope="col"><h1><center><font color="#FFFFFF">EMPRENDEDOR</font></center></h1></th>
    <th colspan="3" scope="col" bgcolor="#000099"><font color="#FFFFFF"><h1>DATOS DEL EMPRENDIMIENTO</h1></font></th>
  </tr>
  <tr>
    <td rowspan="8"><center><? echo "<image src=ver_foto.php?n=".$id." alt=\"".sql($id,"Nombre","junior")."\" border=0>";?></center></td>
    <td width="22%"><h3>Nombre de la organización</h3></td>
    <td width="3%"><div align="center">
      <h3>:</h3>
    </div></td>
    <td width="43%"><h3><? echo sql($id,"Nombre","empresas");?></h3></td>
  </tr>
  <tr>
    <td><h3>Sector</h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? $idS=sql($id,"IdSector","empresas");?><? echo sacarSector($idS); ?></h3></td>
  </tr>
  <tr>
    <td><h3>Principal Actividad y descripción del Producto y/o servicio </h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"actividadProducto","empresas");?></h3></td>
  </tr>
  <tr>
    <td><h3>Dirección Oficina</h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"dirOf","empresas");?></h3></td>
  </tr>
  <tr>
    <td><h3>Teléfono Oficina</h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"telOf","empresas");?></h3></td>
  </tr>
  <tr>
    <td><h3>Fax</h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"fax","empresas");?></h3></td>
  </tr>
  <tr>
    <td><h3>Correo electrónico de la Empresa</h3></td>
    <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><h3><? echo sql($id,"email","empresas");?></h3></td>
  </tr>
   <tr>
    <td><h3>Casilla</h3></td>
	 <td><div align="center">
      <h3><b>:</b></h3>
    </div></td>
    <td><? echo sql($id,"casilla","empresas");?></td>
  </tr>
  <tr>
    <td><center><h1><? echo sql($id,"Nombre","junior");?><br><? echo sql($id,"Apellido","junior");?></h1><h1><? echo strtoupper(sql($id,"Cargo","empresas"));?></h1></center>
	<h2>CARGOS EN JCI:<br>
	<? echo cargos($id);?></h2>
	</td>
    <td colspan="3"><center><? echo "<image src=ver_imagen.php?n=".$id." alt=\"".sql($ci,"Nombre","empresas")."\" border=0>";?></center></td>
  </tr>
</table>

<?
}
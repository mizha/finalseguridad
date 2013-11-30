<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<? 
include("../funciones.php");
function color(){
	$hora=date("H");
	
	if(($hora >= "7" && $hora<= "12") || ( $hora>="13" && $hora <="18"))
	{
		return "#000000";
	}
	elseif(($hora >= "00" && $hora <="06") || ($hora >="19" && $hora <="23"))
	{
		return "#FFFFFF";
	}
}
function select($tabla){
	$final="<select name=\"puesto\">";
		$sql="SELECT * From ".$tabla;
		$res=mysql_db_query("jci",$sql);
		while($row=mysql_fetch_array($res)){
			if($tabla=="cel"){$id="IdCel";}
			if($tabla=="jdl"){$id="IdJdl";}
			$final.='<option value="'.$row[$id].'">'.$row["Puesto"].'</option>';
		}
	$final.= "</select>";
	return $final;
}
?>
<body text="<? echo color(); ?>">
<?
$buscado=$_GET["busqueda"];
$tabla=$_GET["tabla"];
$anio=$_GET["anio"];
if($buscado!=NULL)
{
	$sql="SELECT CI , Nombre, Apellido From Junior WHERE Nombre LIKE '%".$buscado."%' OR Apellido LIKE '%".$buscado."%' ORDER BY Nombre ASC";
	//echo $sql."<br>";
	$res=mysql_db_query("jci",$sql);
	if(mysql_affected_rows()==0){echo "<h3>No hay resultados que coincidan con <i>".$buscado."</i></h3>";}
	else{
		echo "<h3>Resultados que coincidan con <i>".$buscado."</i></h3>";
	?>
		<table width="100%">
			<tr>
				<td><h4>Nombre</h4></td>
				<td><h4>Puesto</h4></td>
				<td><h4>Año</h4></td>
				<td>&nbsp;</td>
			</tr>
			<? while($row=mysql_fetch_array($res)){
					echo "<tr> <form name=\"".$row["Nombre"]."\" method=\"post\" action=\"agregardirectorio.php\">";
						echo "<td>".$row["Nombre"]."&nbsp;".$row["Apellido"]."</td>";
						echo "<td>".select($tabla)."</td>";
						//echo "<td>Puesto</td>";
						echo "<td><select name=\"anio\">";
					    	for($i=date("Y");$i>=1957;$i--)
							{
								echo '<option value="'.$i.'">'.$i.'</option>';
							}
						echo "</select></td>";
						echo "<input type=\"hidden\" value=\"".$row["CI"]."\" name=\"ci\">";//CI de este usuario
						echo "<input type=\"hidden\" value=\"".$tabla."\" name=\"tabla\">";// tabla a la que se mete
						echo "<td><input type=\"submit\" name=\"Guardar\" value=\"Guardar\"></td>";
					echo "</form></tr>";
				}
			?>
		</table>
	<? }
}

?>
</body>

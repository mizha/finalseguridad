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
?>
<body text="<? echo color(); ?>">
<? 

	$anio=$_GET["anio"];
	$tabla=$_GET["tabla"];
	directiva($tabla,$anio);
	
	function obtenerPuesto($id,$tabla)
	{
		$sql="SELECT * from ".$tabla." WHERE Id".$tabla."='".$id."'";
		//echo $sql;
		$res=mysql_db_query("jci",$sql);
		$row=mysql_fetch_array($res);
		return $row["Puesto"];
		//mysql_close();
	}
	function directiva($tabla,$anio)
	{
		$sql="SELECT * from ".$tabla."junior WHERE anio='".$anio."'";
		$res=mysql_db_query("jci",$sql);
		if(mysql_affected_rows()!=0){
			?><table border="1">
				<tr>
					<td align="center"><h3>Nombre</h3></td>
					<td align="center"><h3>Puesto</h3></td>
				</tr>
			<? 
			while($row=mysql_fetch_array($res)){
				echo"<tr>";
					echo"<td>".obtenerNombre($row["CI"])."</td>";
					if($tabla=="cel"){$id="IdCel";}
					if($tabla=="jdl"){$id="IdJdl";}
					echo"<td>".obtenerPuesto($row[$id],$tabla)."</td>";
				echo"</tr>";
			}
			?></table><? mysql_close();
		}
		else{
			echo '<h1>No hay miembros en '.$tabla.' del año '.$anio.'</h1>';
		}
	}
?></body>
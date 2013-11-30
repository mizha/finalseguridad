<?
	function obtenerNombre($ci)
	{
		$result=mysql_db_query("jci","SELECT Nombre , Apellido FROM `junior` WHERE `CI`=".$ci);
		$row=mysql_fetch_array($result);
		return $row["Nombre"]." ".$row["Apellido"];
	}
?>
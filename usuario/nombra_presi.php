<? 
include("../libSesion.php");
function hacerUpdate($expresi,$nuevoPresi)
{
	$sql="UPDATE `junior` SET tipo='5' WHERE CI='".$nuevoPresi."'";
	$res=mysql_db_query("jci",$sql);
	$sql="UPDATE `junior` SET tipo='3' WHERE CI='".$expresi."'";
	$res=mysql_db_query("jci",$sql);
	echo '<script> alert("Un gusto haberle servido, Se�or Ex-Presidente");location.href="logout.php";</script>';
}
	if($tipo==5)
	{
		$ci1=$_POST["ci"];//Carnet del nuevo presidente
		$anioActual=date("Y");
		//Comprobar si existe un presidente en esta gestion
		$sql="SELECT * FROM celjunior WHERE IdCel='1' AND anio='".$anioActual."'";
		$res=mysql_db_query("jci",$sql);

		    session_start();
            $ci = $_SESSION["ci"];
            $tiempo = date("Y/m/d");
            $query_log = "INSERT INTO log VALUES ('','$ci','Nuevo presi','nombramiento de nuevo presidente ','$tiempo')";
            mysql_db_query("jci",$query_log);

		if(mysql_affected_rows()==0)//No hay presidente en esta gestion
		{
			$sql="SELECT * FROM celjunior WHERE CI='".$ci1."' AND anio='".$anioActual."'";
			$res=mysql_db_query("jci",$sql);
			if(mysql_affected_rows()==0)// comprobar si ya esta en Cel
			{
				$sql="INSERT INTO celjunior VALUES('1','".$ci1."','".$anioActual."')";
				$res=mysql_db_query("jci",$sql);
				hacerUpdate($ci,$ci1);
			}
			else{
				$row=mysql_fetch_array($res);
				echo $row["IdCel"];
				if($row["IdCel"]!=1)//Comprobar si ya lo pusieron de presidente
				{hacerUpdate($ci,$ci1);}
				else{ echo '<script> alert("Retire primero a este miembro de su cargo actual");location.href="nombrar.php";</script>';}
			}
		}
		else{echo '<script> alert("Ya existe un Presidente en esta gesti�n '.$anioActual.'");location.href="nombrar.php";</script>';}
		
	}
	else
	{header("Location: ../index.php");}
?>
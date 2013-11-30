<? 
include("../libSesion.php");
include("../conexion.php");
function existe($ci1)
{
	$sql="SELECT * FROM junior WHERE CI='".$ci1."'";
	//echo $sql."<br>";
	$res=mysql_db_query("jci",$sql);
	if(mysql_affected_rows()!=0){return true;}
	else{return false;}
}
function noEnTabla($ci1,$tabla,$anio)
{
	$sql="SELECT * FROM ".$tabla."junior WHERE CI='".$ci1."' AND anio='".$anio."'";
	$res=mysql_db_query("jci",$sql);
	if(mysql_affected_rows()==0){return true;}
	else{return false;}
}
if($tipo==5){
	$puesto=$_POST["puesto"];
		//echo "puesto ".$puesto."<br>/n";
	$ci1=$_POST["ci"];
	//echo "ci1 ".$ci1."<br>/n";
	$tabla=$_POST["tabla"];
	//echo "tabla ".$tabla."<br>/n";
	$anio=$_POST["anio"];
	//echo "anio ".$anio."<br>/n";
	if($tabla=="cel"){$id="IdCel";}
	if($tabla=="jdl"){$id="IdJdl";}
	
	//Comprobar que este usuario exista
	if(existe($ci1))
	{
		//Comprobar que este usuario no tenga otro puesto en esta tabla con el mismo año
		if(noEnTabla($ci1,$tabla,$anio))
		{
			$sql="INSERT INTO ".$tabla."junior VALUES ('".$puesto."','".$ci1."','".$anio."')";
			$res=mysql_db_query("jci",$sql);
			echo '<script>alert("Usario Agregado");history.back();</script>';
		}
		else{echo '<script>alert("Este usuario ya tiene un cargo en el año'.$anio.'");history.back();</script>';}
	}
	else{ 
		echo '<script>alert("Ha ocurrido un Problema");history.back();</script>';
	}
}
else{header("Location: index.php");}
?>
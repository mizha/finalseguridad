<?
include("../conexion.php");
include("../libSesion.php");

$nombre=$_POST["Nombre"];
$cargo=$_POST["cargo"];
$sector=$_POST["sector"];
$actividad=$_POST["actividad"];
$dirOf=$_POST["dirOf"];
$telfOf=$_POST["telfOf"];
$fax=$_POST["fax"];
$mailOf=$_POST["mailOf"];
$casilla=$_POST["casilla"];
$ci1=$_POST["ci"];

if($ci1==$ci){
	$sql="SELECT CI From empresas WHERE CI='".$ci1."'";
	//echo $sql;
	$res=mysql_db_query("jci",$sql);
	if(mysql_affected_rows()!=0)
	{
		//Update
		echo '<script>alert("UPDATE");</script>';
		$sql="UPDATE `empresas` SET  Cargo='".$cargo."', Nombre='".$nombre."', IdSector='".$sector."', actividadProducto='".$actividad."', dirOf='".$dirOf."', telOf='".$telfOf."', fax='".$fax."', email='".$mailOf."', casilla='".$casilla."' WHERE CI='".$ci1."'";
		$res=mysql_db_query("jci",$sql);
		echo '<script>alert("La información de la empresa ha sido modificada");location.href="directorioEmpresarial.php";</script>';
	}
	else{
		//Insert
		/*echo '<script>alert("INSERT");</script>';*/
		$sql="INSERT INTO `empresas` VALUES ('".$ci1."', '".$cargo."', '".$nombre."', '".$sector."', '".$actividad."', '".$dirOf."', '".$telfOf."','".$fax."','".$mailOf."','".$casilla."','','','')";
		$res=mysql_db_query("jci",$sql);
		echo '<script>alert("La información de la empresa esta registrada");location.href="directorioEmpresarial.php";</script>';
	}
}
else{header("Location: ../index.php");}
?>
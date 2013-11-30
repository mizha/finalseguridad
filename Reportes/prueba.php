<?php 

include("libExcel.php");
include("../conexion.php");

	$busqueda=$_POST["busqueda"];
	
	$lista=array();
	$i=0;
	$nombre=$_POST["Nombre"];
	if($nombre!=NULL){$lista[$i++]=$nombre;}

	$apellido=$_POST["Apellido"];
	if($apellido!=NULL){$lista[$i++]=$apellido;}

	$telfDom=$_POST["telfDom"];
	if($telfDom!=NULL){$lista[$i++]=$telfDom;}

	$telfOf=$_POST["telfOf"];
	if($telfOf!=NULL){$lista[$i++]=$telfOf;}

	$celular=$_POST["celular"];
	if($celular!=NULL){$lista[$i++]=$celular;}

	$email=$_POST["email"];
	if($email!=NULL){$lista[$i++]=$email;}

	$fechanacimiento=$_POST["fechanacimiento"];
	if($fechanacimiento!=NULL){$lista[$i++]=$fechanacimiento;}

	$aniojci=$_POST["aniojci"];
	if($aniojci!=NULL){$lista[$i++]=$aniojci;}

	$ocupacionactual=$_POST["ocupacionactual"];
	if($ocupacionactual!=NULL){$lista[$i++]=$ocupacionactual;}

	$tipo=$_POST["tipo"];
	if($tipo!=NULL){$lista[$i++]=$tipo;}

	
	$sql= crearSql($lista,$i,$busqueda);
	crearTabla($sql,$lista,$i);

?>

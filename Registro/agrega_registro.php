<? 
	// Este archivo sirve para insertar los datos de registro.php en la base de datos
	// Las tablas afectadas son junior y juniorpass
	// Clave principal "CI" en junior, clave principal en juniorpass "CI"
include("../conexion.php");


$ci=$_POST["ci"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$contra=MD5($_POST["pass"].'camarajuniorjci');
//$pregunta=$_POST["pregunta"];
//$respuesta=$_POST["respuesta"];
$telefonodom=$_POST["telfdom"];
$telfonoOfi=$_POST["telfofi"];
$celular=$_POST["celular"];
$dirdom=$_POST["dirdom"];

$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];

if($dia[0]!=0 && $dia<=9){$fecha="0".$dia;}
else{$fecha=$dia;}
if($mes[0]!=0 && $mes<=9){$fecha=$fecha."/0".$mes;}
else{$fecha=$fecha."/".$mes;}
$fecha=$fecha."/".$anio;
$mail=$_POST["mail"];
$anioingreso=$_POST["ingreso"];
//INSERTAR LA FOTOGRAFIA EN CASO DE QUE EXISTA
 if (isset($_FILES['foto']) &&  $_FILES['foto']['error'] == 0){
	$imagen_name= $_FILES['foto']['name'];
	$imagen_size= $_FILES['foto']['size'];
	$imagen_type=  $_FILES['foto']['type'];
	$imagen_temporal= $_FILES['foto']['tmp_name'];
	$lim_tamano=65000;
	
	if ($imagen_type=="image/x-png" OR $imagen_type=="image/png"){
		 $extension="image/png";
	 }
	if ($imagen_type=="image/pjpeg" OR $imagen_type=="image/jpeg"){
		 $extension="image/jpeg";
	 }
	if ($imagen_type=="image/gif" OR $imagen_type=="image/gif"){
		 $extension="image/gif";
	 }

	if($imagen_size>$lim_tamano){echo '<script>
		alert("Esta fotografia execede de 65KB");
		history.back();</script>'."\n";
	 }
if ($imagen_name != "" AND $imagen_size != 0 AND $imagen_size<=$lim_tamano AND $extension !='')
	{
	/*reconversion de la imagen para meter en la tabla abrimos el fichero temporal en modo lectura "r" binaria"b"*/
		$f1= fopen($imagen_temporal,"rb");
		#leemos el fichero completo limitando
		#  la lectura al tamaño de fichero		
		$imagen_reconvertida = fread($f1, $imagen_size);
		#anteponemos \ a las comillas que pudiera contener el fichero
		# para evitar que sean interpretadas como final de cadena	
		$imagen_reconvertida=addslashes($imagen_reconvertida);
		 }

else
	{
   echo '<script>
		alert("No se pudo realizar la transferencia de la foto");
		history.back();</script>'."\n";
 }
}
// FIN FOTO
$ocupacionactual=$_POST["ocupacionactual"];
$tipo=$_POST["tipo"];

// Realizar la comprobacion de que el nombre de usuario no existe
// esta consulta se hace en la base de datos juniorpass
$comprobacion=0;
$query="SELECT `usuario` FROM juniorpass";
$res=mysql_db_query("jci",$query);
while($row=mysql_fetch_array($res))
{
	if($row["usuario"]==$usuario)
	{
		echo '<script>
		alert("Lo siento ese nombre de usuario ya existe");
		history.back();</script>'."\n";
		$comprobacion=1;
	}
}
// Realizar la comprobacion de que el CI no existe
// esta consulta se hace en la base de datos juniorpass y junior
$query="SELECT `CI` FROM juniorpass";
$res=mysql_db_query("jci",$query);
while($row=mysql_fetch_array($res))
{
	if($row["CI"]==$ci)
	{
		echo '<script>
		alert("Lo siento este número de carnet de identidad ya esta registrado");
		history.back();</script>'."\n";
		$comprobacion=1;
	}
}
// fin de comprobacion
if($comprobacion==0){
//Meter datos en junior
$query="INSERT INTO junior VALUES ('$ci','$nombre','$apellido','$telefonodom','$telfonoOfi','$celular','$mail','$dirdom','$fecha','$anioingreso','$imagen_reconvertida','$imagen_type','$imagen_size','$ocupacionactual','$tipo','','','')";
//echo $query."<br>\n";
$res=mysql_db_query("jci",$query);
$id = mysql_insert_id();
//Meter Datos en juniorpass
$query="INSERT INTO juniorpass VALUES ('$ci','$usuario','$contra','$tipo','$tipo')";
$res=mysql_db_query("jci",$query);
echo '<script>
		alert("Usted Ha sido registrado");location.href = "../index.php";</script>'."\n";
}

?>

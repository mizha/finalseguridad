<?
include("../conexion.php");
include("../libSesion.php");

$ci1=$_POST["ci"];
if($ci1!=$ci)
{
	/*echo "este es el ci de sesion".$ci."<br>";
	echo "Ci de form".$ci1."<br>";*/
	header("Location: ../index.php");
}

else{

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
		$query="UPDATE `junior` SET `foto`='".$imagen_reconvertida."' ,`formato`= '".$imagen_type."',`tamanio` ='".$imagen_size."' WHERE `CI`='".$ci1."'";

$res=mysql_db_query("jci",$query);
echo '<script>
		alert("Foto subida Exitosamente");
		location.href="perfil.php?id='.$ci1.'"</script>'."\n";
}
echo '<script>
		alert("No existe Foto");
		location.href="modificarperfil.php?id='.$ci1.'"</script>'."\n";
}
?>
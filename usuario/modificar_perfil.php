<? 
include("../conexion.php");
include("../libSesion.php");
$ci1=$_POST["ci"];

if($ci1==$ci)
{
	$dirOf=$_POST["dirOf"];
	//echo $dirOf."<br>";
	$telfonoOfi=$_POST["telfOf"];
	//echo $telfonoOfi."<br>";
	$mailOf=$_POST["mailOf"];
	//echo $mailOf."<br>";
	$dirdom=$_POST["dirdom"];
	//echo $dirdom."<br>";
	$telefonodom=$_POST["telfdom"];
	//echo $telefonodom."<br>";
	$celular=$_POST["celular"];
	//echo $celular."<br>";
	$mail=$_POST["mail"];
	//echo $mail."<br>";
	$msn=$_POST["msn"];
	//echo $msn."<br>";

	$sql="UPDATE `junior` SET `dirOf`='".$dirOf."',`telfOf`='".$telfonoOfi."' ,`emailOf`='".$mailOf."' ,`dirDom`='".$dirdom."' ,`telfDom`='".$telefonodom."' ,`celular`='".$celular."' ,`email`='".$mail."' ,`msn`='".$msn."' WHERE `CI`='".$ci1."'";
	//echo $sql;
	$res=mysql_db_query("jci",$sql);

	session_start();
          $ci = $_SESSION["ci"];
          $tiempo = date("Y/m/d");
          $query_log = "INSERT INTO log VALUES ('','$ci','modificar','se modifico el perfil del usuario','$tiempo')";
          mysql_db_query("jci",$query_log);

	echo '<script>alert("Perfil modificado con exito!");location.href="perfil.php?id='.$ci1.'"</script>'."\n";
}
else
{header("Location: ../index.php");}


?>
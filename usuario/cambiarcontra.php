<?
	include("../conexion.php");
	include("../libSesion.php");
	
	$ci1=$_POST["ci"];
	if($ci1==$ci)
	{
		$contraAntigua=MD5($_POST["contraA"].'camarajuniorjci');
		//echo $contraAntigua.'<br>';
		$contranueva=MD5($_POST["contraN"].'camarajuniorjci');
		//echo $contranueva.'<br>';
		
		$sql="SELECT * From juniorpass WHERE ci='".$ci1."'";
		$res=mysql_db_query("jci",$sql);
		$row=mysql_fetch_array($res);
		$contra=$row["password"];
		if($contraAntigua==$contra)
		{
			$sql="UPDATE juniorpass SET password='".$contranueva."' WHERE CI='".$ci1."'";
			//echo $sql."<br>";
			$res=mysql_db_query("jci",$sql);
			echo '<script>alert("Se cambio la contraseña.");location.href="perfil.php?id='.$ci1.'"</script>'."\n";
		}
		else
		{
			echo '<script>alert("La contraseña es invalida.");location.href="perfil.php?id='.$ci1.'"</script>'."\n";
		}
	}
	else{header("Location: ../index.php");}
?>
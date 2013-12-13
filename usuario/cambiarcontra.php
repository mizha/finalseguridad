<?
	include("../conexion.php");
	include("../libSesion.php");
	
	$ci1=$_GET["ci"];

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
		    $sql_cambio = "UPDATE juniorpass SET password='".$contranueva."' WHERE CI='".$ci1."'";
			$sql="UPDATE juniorpass SET password='".$contranueva."' WHERE CI='".$ci1."'";
			//echo $sql."<br>";
			$res=mysql_db_query("jci",$sql);

			$tiempo = date("Y-m-d H:i:s");
            $query_pass="Update juniorpasschange SET fechacambio='".$tiempo."' where CI='".$ci1."'";
            $res=mysql_db_query("jci",$query_pass);

            $tiempo = date("Y/m/d");
            $query_log = "INSERT INTO log VALUES ('','$ci','modificar','se cambio la contrasenia del usuario ','$tiempo')";
            mysql_db_query("jci",$query_log);

			echo '<script>alert("Se cambio la contrase�a.");location.href="perfil.php?id='.$ci1.'"</script>'."\n";
		}
		else
		{
			echo '<script>alert("La contrase�a es invalida.");location.href="perfil.php?id='.$ci1.'"</script>'."\n";
		}

?>
<?
session_start();
include("conexion.php");
$usuario=$_POST["usuario"];

$query= "SELECT * FROM juniorpass WHERE `usuario`='$usuario'" ;
//echo $query;
//$link=mysql_connect($server,$dbuser,$dbpass);
$result=mysql_db_query("jci",$query);
if(mysql_num_rows($result)==0){
	echo "<script> alert(\"No existe el login introducido\")</script>;";
	echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
} 
else {
	$array=mysql_fetch_array($result);
	//echo MD5($_POST["pass"].'camarajuniorjci')."<br>";
	//echo $array["password"];
	if($array["password"]==MD5($_POST["pass"].'camarajuniorjci') ){
		$_SESSION["login"]=$_POST["usuario"];
		$_SESSION["ci"]=$array["CI"];
		$_SESSION["tipo"]=$array["tipo"];
		//echo $SESSION["tipo"];
		$_SESSION["especial"]=$array["especial"];
		$id=$array["CI"];
		//session_register("SESSION");
		header("location: index.php"); 
	} 
	else {
		echo "<script> alert(\"Password incorrecto!\");</script>";
		echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
	} /* Cerramos este ultimo else */
} /* Cerramos el else que corresponde a la comprobación de que el login existe */
?> 
 
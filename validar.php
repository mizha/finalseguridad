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

		//registrando el ingreso del usuario

		$sql_login="SELECT * FROM intentos WHERE `usuario`='$usuario'";
        $result = mysql_db_query("jci",$sql_login);
        $fila_usuario = mysql_fetch_array($result);
		$tiempo = date("y/m/d H:i:s");

        if($fila_usuario['intentos'] < 5){

        		 if($fila_usuario["verificacion"]=="si")
                      {

                         $sql_update = "UPDATE intentos SET ultimavisita='".$tiempo."', intentos='0' WHERE $id=".$fila_usuario["ci"];
                         echo $sql_update;
                         $result = mysql_db_query("jci",$sql_update);

                        header("location: index.php");


                      }//caso contrario, tiramos un mensaje de que aun no ha sido verificada la cuenta
                 else
                     {
                       echo "<h1>Su cuenta se encuentra temporalmente deshabilitada por 24 horas.</h1>";
                     }


        }
        else
        {
         echo "<p style='font-size:14px; color:#FF0000;'>Ha sobre pasado el limite de 5 intentos. <br />La cuenta sera bloqueada automaticamente por 24hs.</p>";
         $sql_update = "UPDATE intentos SET ultimavisita='".$tiempo."', intentos='0',verificacion = 'no'  WHERE $id=".$fila_usuario["ci"];
         echo $sql_update;
         $result = mysql_db_query("jci",$sql_update);
        }
		//session_register("SESSION");
		header("location: index.php");


	} 
	else {
		echo "<script> alert(\"Password incorrecto!\");</script>";
		echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
	} /* Cerramos este ultimo else */
} /* Cerramos el else que corresponde a la comprobaci�n de que el login existe */
?> 
 
<?
session_start();
include("conexion.php");
$usuario=$_POST["usuario"];

$query= "SELECT * FROM juniorpass WHERE `usuario`='$usuario'" ;
//echo $query;
//$link=mysql_connect($server,$dbuser,$dbpass);
$result=mysql_db_query("jci",$query);
$array2=mysql_fetch_array($result);
if ($array2["activo"] != "si")
{
 echo "<h1>Tu usuario aun no esta activado habla por el administrador</h1>";
 session_destroy();
 echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
}
else
{
$query= "SELECT * FROM juniorpass WHERE `usuario`='$usuario'" ;
//echo $query;
//$link=mysql_connect($server,$dbuser,$dbpass);
$result=mysql_db_query("jci",$query);
if(mysql_num_rows($result)==0){
	echo "<script> alert(\"No existe el login introducido\")</script>;";
	echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
} 
else{
	$array=mysql_fetch_array($result);
   $id=$array["CI"];

	if($array["password"]==MD5($_POST["pass"].'camarajuniorjci') ){

        $_SESSION["login"]=$_POST["usuario"];
		$_SESSION["ci"]=$array["CI"];
		$_SESSION["tipo"]=$array["tipo"];
		//echo $SESSION["tipo"];
		$_SESSION["especial"]=$array["especial"];
		$id=$array["CI"];

	$query = "select * from juniorpasschange where ci='".$id."'";
	$result=mysql_db_query("jci",$query);
    $array2=mysql_fetch_array($result);


    $fecha_i = $array2["fechacambio"];
    $fecha_f = date("Y-m-d H:i:s");
    $dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;

	$dias 	= abs($dias);
	$dias = floor($dias);


    if ($dias > 90)
	{
	    echo "<h1>Debes Cambiar la contrasenia, han pasado tres meses desde la creacion o modificacion .</h1>";
	    echo '<meta http-equiv="refresh" content="7;URL=usuario/modificarContra.php">';
	}
	else
	{


		//registrando el ingreso del usuario

		$sql_login="SELECT * FROM intentos WHERE `usuario`='$usuario'";
        $result = mysql_db_query("jci",$sql_login);
        $fila_usuario = mysql_fetch_array($result);
		$tiempo = date("y/m/d H:i:s");

        if($fila_usuario['intentos'] < 5){


        		 if($fila_usuario["verificacion"]=="si")
                      {
                         $query = "select * from intentos where ci='".$id."'";
                      	$result=mysql_db_query("jci",$query);
                         $array2=mysql_fetch_array($result);

                          $fecha_i = $array2["ultimavisita"];
                          $fecha_f = date("Y-m-d H:i:s");
                          $dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;

                      	$dias 	= abs($dias);
                      	$dias = floor($dias);

                        if ($dias > 0)
                        {
                           $sql_update = "UPDATE intentos SET intentos='0' WHERE CI=".$fila_usuario["ci"];
                           $result = mysql_db_query("jci",$sql_update);
                        }

                         $sql_update = "UPDATE intentos SET ultimavisita='".$tiempo."' WHERE CI=".$fila_usuario["ci"];
                          $result = mysql_db_query("jci",$sql_update);
                          header("location: index.php");


                      }//caso contrario, tiramos un mensaje de que aun no ha sido verificada la cuenta
                 else
                     {
                       $fecha = $fila_usuario["ultimavisita"];
                        $now = date("Y/m/d H:i:s");
                        $segundos = strtotime($now) - strtotime($fecha);
                        $diferencia = intval(($segundos/3600)/24);

                        if ($diferencia >= 1)
                        {
                            $sql_update = "UPDATE intentos SET ultimavisita='".$tiempo."', intentos='0', verificacion='si' WHERE CI=".$fila_usuario["ci"];
                            $result = mysql_db_query("jci",$sql_update);
                            header("location: index.php");
                        }
                        else
                         {
                           echo "<h1>Su cuenta esta deshabilitada por 24 horas.</h1>";

                           session_destroy();
                           echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
                       }
                     }
        }
        else
        {

         echo "<p style='font-size:14px; color:#FF0000;'>Ha sobre pasado el limite de 5 intentos. <br />La cuenta sera bloqueada automaticamente por 24hs.</p>";
         $sql_update = "UPDATE intentos SET ultimavisita='".$tiempo."', intentos='0', verificacion='no' WHERE CI=".$fila_usuario["ci"];
         $result = mysql_db_query("jci",$sql_update);
         session_destroy();
         echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
        }
		//session_register("SESSION");
		header("location: index.php");

     }
	}  //fin del if
	else {
	    $sql_login="SELECT * FROM intentos WHERE usuario='$usuario'";

        $result = mysql_db_query("jci",$sql_login);
        $fila_usuario = mysql_fetch_array($result);
        $tiempo = date("y/m/d H:i:s");

	    $intento = $fila_usuario["intentos"];
	    $sql_update = "UPDATE intentos SET ultimavisita='".$tiempo."', intentos='$intento'+1 WHERE CI=".$fila_usuario["ci"];

        $result = mysql_db_query("jci",$sql_update);

	    session_destroy();
		echo "<script> alert(\"Password incorrecto!\");</script>";
		echo '<meta http-equiv="refresh" content="3;URL=iniciarsesion.php">';
	} /* Cerramos este ultimo else */
	}
}
/* Cerramos el else que corresponde a la comprobaci�n de que el login existe */
?> 
 
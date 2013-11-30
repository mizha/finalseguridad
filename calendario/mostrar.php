<? include("../libSesion.php");?>
<link href="estilo.css" rel="stylesheet" type="text/css">

<table width="100%" >
<?
include_once("funciones.php");
function color(){
	$hora=date("H");
	
	if(($hora >= "7" && $hora<= "12") || ( $hora>="13" && $hora <="18"))
	{
		return "#000000";
	}
	elseif(($hora >= "00" && $hora <="06") || ($hora >="19" && $hora <="23"))
	{
		return "#FFFFFF";
	}
}
$evento = $_GET['evento'];
if(!isset($evento)){
    $evento = date("Y-m-d");
}
//$conexion = conectar();

$sql = "select * from eventos where fecha = '$evento'";
$res = mysql_db_query("jci",$sql);
if(mysql_num_rows($res) > 0){
    while($fila = mysql_fetch_array($res)){
        echo "<tr><td class='tdfecha'>".$fila['fecha']."<br>".$fila['hora']."</td><td class='tdevento'>".$fila['evento']."</td>";
		if($regis=="SI"){
		echo "<td><a href='borrar.php?id=".$fila['eventoid']."' alt='Borrar'><img src='delete.gif' alt='Borrar' border=0></a></td></tr>";
		}
    }
}else{
    echo "<tr><td><center><b><font color=\"".color()."\">".date("Y-m-d")."</b><br><br>No hay eventos para este dia.</font></center></td></tr>";
}
desconectar();
?>

</table>

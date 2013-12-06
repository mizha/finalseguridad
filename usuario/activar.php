<?
include("../conexion.php");

$tabla="log";
session_start();
$ci = $_SESSION["ci"];
$ID = $_GET["id"];

$query = ("UPDATE juniorpass SET activo = 'si' WHERE CI = $ID");
mysql_db_query("jci",$query);
$tiempo = date("Y/m/d");
    $resultado = mysql_db_query("jci",$sacar);

    $query_log = "INSERT INTO log VALUES ('','$ci','activar','activacion del usuario con carnet $ID','$tiempo')";
     mysql_db_query("jci",$query_log);

header('Location: index.php');
?>
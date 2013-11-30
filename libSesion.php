<?
session_start();

if(isset($_SESSION["ci"]))
{
$regis="SI";
$_SESSION["autenticado"] = $regis;
$nombre = $_SESSION["login"];
$ci=$_SESSION["ci"];
$tipo=$_SESSION["tipo"];
$especial=$_SESSION["especial"];
$_SESSION["tiempo"] = time(); // para iniciar el contador de tiempo
$_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
}
else {$regis="NO"; $_SESSION["autenticado"] = $regis;}
?>
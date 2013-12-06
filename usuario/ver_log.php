<?
include("../conexion.php");
$numero=$_REQUEST['n'];
$tabla="log";
session_start();
$ci = $_SESSION["ci"];

$tiempo = date("Y/m/d");
    $sacar = "SELECT * FROM ".$tabla." WHERE (ci=$ci)";

    $resultado = mysql_db_query("jci",$sacar);
?>
<table border = "1" width = "100%">
<tr>
<th>CI</th>
<th>ACCION</th>
<th>DESCRIPCION</th>
<th>TIEMPO</th>
</tr>
<?
while ($datos = mysql_fetch_array($resultado))
{
?>
<tr>
<td> <?=$datos["ci"]?> </td>
<td> <?=$datos["accion"]?> </td>
<td> <?=$datos["descripcion"]?> </td>
<td> <?=$datos["tiempo"]?> </td>
</tr>

<?php
}
?>
</table>
<?
      $query_log = "INSERT INTO log VALUES ('','$ci','ver','se vio el log del usuario ','$tiempo')";
      mysql_db_query("jci",$query_log);


mysql_close();
?>
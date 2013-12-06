<?
include("../conexion.php");
$numero=$_REQUEST['n'];
$tabla="log";
session_start();
$ci = $_SESSION["ci"];

$tiempo = date("Y/m/d");
    $sacar = "SELECT junior.CI,juniorpass.usuario,junior.Nombre,junior.Apellido,junior.Email FROM junior, juniorpass WHERE (juniorpass.CI=junior.CI AND juniorpass.activo = 'no')";

    $resultado = mysql_db_query("jci",$sacar);
?>
<table border = "1" width = "100%">
<tr>
<th>CI</th>
<th>Usuario</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
<th>Activar</th>
</tr>
<?
while ($datos = mysql_fetch_array($resultado))
{

?>
<tr>
<td> <?=$datos["CI"]?> </td>
<td> <?=$datos["usuario"]?> </td>
<td> <?=$datos["Nombre"]?> </td>
<td> <?=$datos["Apellido"]?> </td>
<td> <?=$datos["Email"]?> </td>
<td> <?echo "<center><h2><a href=\"activar.php?id=".$datos["CI"]."\">Activar cuenta</a></h2></center>";?><td>
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
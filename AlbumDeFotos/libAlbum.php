<?php
function crearSelect(){

$bd = mysql_select_db ("carpetas");
$query="SELECT `Nombre` FROM `carpetas`";  
$res = mysql_query($query);

  $res = mysql_db_query("jci",$query);
echo '<select name="carpetas" onChange="probar();">';
for($i = 0; ($row=mysql_fetch_array($res)); $i++)
{
	echo '<option value="'.$row["Nombre"].'">'.$row["Nombre"].'</option>';
}
mysql_close();
echo '</select>';
}
?>
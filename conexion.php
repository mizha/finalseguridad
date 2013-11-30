<? 
// conexion.php
// en este archivo se realiza la conexion con la base de datos
$hostname="localhost";
$username="root";
$password="";
$dbname="jci";
mysql_connect($hostname,$username, $password) OR DIE ("<html><script language='JavaScript'>window.location.href = 'error.php?err=bd1'</script></html>");
@mysql_select_db($dbname) or DIE ("<html><script language='JavaScript'>window.location.href = 'error.php?err=bd'</script></html>");
?>

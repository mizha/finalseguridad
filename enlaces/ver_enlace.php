<?
include("../conexion.php");
$numero=$_REQUEST['n'];
$tabla="enlace";
    $sacar = "SELECT * FROM ".$tabla." WHERE (IdEnlace=$numero)" ;
    $resultado = mysql_db_query("jci",$sacar);
while ($registro = mysql_fetch_array($resultado))
{
            $tipo_foto=$registro['formato'];
			header("Content-type: $tipo_foto");
            echo $registro['imagen'];
}
mysql_close();
?>

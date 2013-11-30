<?
include("../conexion.php");
$numero=$_REQUEST['n'];
$tabla="imagen";
    $sacar = "SELECT * FROM ".$tabla." WHERE (IdImagen=$numero)" ;
    $resultado = mysql_db_query("jci",$sacar);
while ($registro = mysql_fetch_array($resultado))
{
            $tipo_foto=$registro['formato'];
			//echo $tipo_foto;
			header("Content-type: $tipo_foto");
            echo $registro['imagen'];
}
mysql_close();
?>

<?
include("../conexion.php");
$numero=$_REQUEST['n'];
    $sacar = "SELECT * FROM junior WHERE CI='".$numero."'" ;
    $resultado = mysql_db_query("jci",$sacar);
	while ($registro = mysql_fetch_array($resultado))
	{
            $tipo_formato=$registro['formato'];
			header("Content-type: $tipo_formato");
            echo $registro['foto'];
	}

?>

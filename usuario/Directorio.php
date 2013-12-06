<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");
include("libUsuario.php");
$tabla=$_GET["tab"];

session_start();
    $ci = $_SESSION["ci"];
    $tiempo = date("Y/m/d");
    $query_log = "INSERT INTO log VALUES ('','$ci','Mostrar','Ingrreso al directorio $tabla','$tiempo')";
    mysql_db_query("jci",$query_log);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Directorio <? echo strtoupper($tabla);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido">
		<? 
			$sql="SELECT * FROM ".$tabla."junior WHERE anio='".date("Y")."'";
			$res=mysql_db_query("jci",$sql);
			if(mysql_affected_rows()!=0)
			{
				while($row=mysql_fetch_array($res))
				{
					mostrarPerfil($row["CI"]);
				}
			}
			else{
				echo "No este disponible el directorio de este a�o<br>";
			}
		?>
	</div> 
<div class="corte"></div> 
</div>
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>

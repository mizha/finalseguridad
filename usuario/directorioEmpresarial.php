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
    $query_log = "INSERT INTO log VALUES ('','$ci','Mostrar','Ingreso al directorio empresarial','$tiempo')";
    mysql_db_query("jci",$query_log);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Directorio Empresarial</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="../estilos/menu.css" type="text/css">
<style type="text/css">
<!--
.style1 {font-size: 200%}
-->
</style>
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido">
		<center><h1 class="style1">Nuestros Emprendedores</h1>
		</center>
		<br><br>
		<? 
			$sql="SELECT * FROM empresas";
			$res=mysql_db_query("jci",$sql);
			while($row=mysql_fetch_array($res))
			{
				mostrarPerfilEmpresa($row["CI"]);
				echo "<br>";
			}
			$tiempo = date("Y/m/d");
            $query_log = "INSERT INTO log VALUES ('','$ci','ver','Los directores empresariales','$tiempo')";
            mysql_db_query("jci",$query_log);

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
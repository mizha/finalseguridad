<?
include("../libSesion.php");
include("../libPrincipal2.php");
include("../conexion.php"); 
include("../libPermisos.php");
include("../funciones.php");

if($regis=="SI" OR $regis=="NO") 
 {
 	if(permitir($tipo,"publicarblog"))
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>BackUP</title>
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
<?php 


$host= 'localhost';
$user = 'root';
$pass = "";
$name = 'jci';
$tables = '*';


	$return="";
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);	

	if ($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while ($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
			
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
	foreach($tables as $table)
	{
		
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
	
		for ($i = 0; $i <$num_fields;$i++)
		{
			while($row = mysql_fetch_row($result))
			{
			
				$return.= 'INSERT INTO '.$table.' VALUES (';
				for ($j = 0 ; $j<$num_fields;$j++)
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = preg_replace('/\n/','/\\n/',$row[$j]);
					if (isset($row[$j])){$return.= '"'.$row[$j].'"';}
					if($j < ($num_fields-1)){$return.= ','; }
				}
				$return.= ");\n"; 
			} 
		}
		$return.="\n\n\n";  
	}
	$handle = fopen('../recovery/db-back-up - '.time().' - '.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	?>
    <SCRIPT LANGUAGE="javascript">
	alert("Se creo correctamente el backup");
	location.href = "../index.php";
	</SCRIPT>
    <?
	fclose($handle);
?>

<!-- <img src="imagenes/Pagina Dia.jpg"> -->
</div> 
<div class="corte"></div> 
</div>
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>
<?php }
	else{
//	echo "No tienes acceso a esta pagina";
?>
<SCRIPT LANGUAGE="javascript">
alert("No tienes acceso a esta pagina");
location.href = "../index.php";
</SCRIPT>
<?
	}
 }
 else{
// echo "El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area";
 ?>
<SCRIPT LANGUAGE="javascript">
alert("El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area");
location.href = "../iniciarsesion.php";
</SCRIPT>
<?
 }
?> 

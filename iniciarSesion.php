<?php include("libSesion.php");?>
<?php include("conexion.php")?>
<?php include("libPrincipal.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JCI COCHABAMBA - Iniciar Sesion</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="estilos/pagina.css" type="text/css">
<link rel="stylesheet" href="estilos/menu.css" type="text/css">
</head>
<? echo '<br>';?>
<body background="<? echo fondo();?>">
<div id="all">
<!-- <img src="imagenes/Pagina Dia.jpg"> -->
<div id="cont_cabecera"><? cabecera($regis,$nombre,$ci);?></div> 
<div id="centro">
	<div id="cont_lat_izq"><? menu($regis,$nombre,$tipo);?></div>
	<div id="cont_lat_der"></div> 
	<div id="cont_contenido">
<? if($regis=="NO"){ 
echo '<center>';
echo '<form action="validar.php" method="POST">';
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<h2>Login:</h2>';
echo '</td>';
echo '<td>';
echo '<input type="text" name="usuario"><br>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '<h2>Contraseña:</h2>';
echo '</td>';
echo '<td>';
echo '<input type="password" name="pass"><br>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '</td>';
echo '<td>';
echo '<input type="submit" value="Entrar">';
echo '</td>';
echo '</table>';
echo '</form>';
echo '</center>';
 }?>
<? if($regis=="SI"){echo'<center><h1>Ya iniciaste Sesion </h1></center>';
}?>
</div> 
<div class="corte"></div> 
</div> 
<div id="pie_div"><? pie();?></div> 
<div class="corte"><br /> 
</div>
</div>
</body>
</html>

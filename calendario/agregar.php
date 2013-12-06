<link href="estilo.css" rel="stylesheet" type="text/css">
<?php
include_once("funciones.php");
include("../conexion.php");
//$fecha = $_POST['fecha'];
function color(){
	$hora=date("H");
	
	if(($hora >= "7" && $hora<= "12") || ( $hora>="13" && $hora <="18"))
	{
		return "#000000";
	}
	elseif(($hora >= "00" && $hora <="06") || ($hora >="19" && $hora <="23"))
	{
		return "#FFFFFF";
	}
}
	/*else {echo "<script>alert('son las $hora')</script>";}*/
$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];
$h=$_POST["hora"];
$minutos=$_POST["minutos"];
$evento = $_POST['evento'];

if($dia[0]!=0 && $dia<=9){$fecha="0".$dia;}
else{$fecha=$dia;}
if($mes[0]!=0 && $mes<=9){$fecha=$fecha."/0".$mes;}
else{$fecha=$mes."-".$fecha;}
$fecha=$anio."-".$fecha;

if($h[0]!=0 && $h<=9){$hora="0".$h;}
else{$hora=$h;}
if($minutos[0]!=0 && $minutos<=9){$hora=$hora.":0".$minutos;}
else{$hora=$hora.":".$minutos;}


if($fecha != "" && $evento != "" && $hora != ""){
    //$conexion = conectar();
    $sql = "insert into eventos(fecha,hora,evento) values('$fecha','$hora','$evento')";
    $res = mysql_db_query("jci",$sql);
    if($res){
        echo "<font color=\"".color()."\">Evento grabado</font>";
        redireccionar('3','mostrar.php');
    }else{
        echo "<font color=\"".color()."\">Error al grabar evento: ".mysql_error($res)."</font>";
    }
    desconectar();
}else{
?>

<form action="agregar.php" method="post" name="f1">
<table border=0 cellspacing="0">
<tr><td colspan="2"><font color="<? echo color(); ?>">[AGREGAR EVENTO]</font></td></tr>
<tr><td><font color="<? echo color(); ?>">Fecha</font></td><td><select name="dia">
	    <? 
	for($i=01;$i<=31;$i++)
	{
		if(date("d") == $i){echo '<option value="'.$i.'" selected>'.$i.'</option>';}	
		else {echo '<option value="'.$i.'">'.$i.'</option>';}
	}
	?>
	    </select>/
		<select name="mes">
	    	<option value="01" <? if(date("m")=="01"){echo "selected";}?>>Enero</option>
			<option value="02" <? if(date("m")=="02"){echo "selected";}?>>Febrero</option>
			<option value="03" <? if(date("m")=="03"){echo "selected";}?>>Marzo</option>
			<option value="04" <? if(date("m")=="04"){echo "selected";}?>>Abril</option>
			<option value="05" <? if(date("m")=="05"){echo "selected";}?>>Mayo</option>
			<option value="06" <? if(date("m")=="06"){echo "selected";}?>>Junio</option>
			<option value="07" <? if(date("m")=="07"){echo "selected";}?>>Julio</option>
			<option value="08" <? if(date("m")=="08"){echo "selected";}?>>Agosto</option>
			<option value="09" <? if(date("m")=="09"){echo "selected";}?>>Septiembre</option>
			<option value="10" <? if(date("m")=="10"){echo "selected";}?>>Octubre</option>
			<option value="11" <? if(date("m")=="11"){echo "selected";}?>>Noviembre</option>
			<option value="12" <? if(date("m")=="12"){echo "selected";}?>>Diciembre</option>
	    </select>/
		<select name="anio">
	    <? 
	for($i=2008;$i<=date("Y")+10;$i++)
	{
		if(date("Y") == $i){echo '<option value="'.$i.'" selected>'.$i.'</option>';}	
		else {echo '<option value="'.$i.'">'.$i.'</option>';}
	}
	?>
	    </select>
	  </div></td></td></tr>
	  <tr><td><font color="<? echo color(); ?>">Hora</font></td><td>
	  	<select name="hora">
		<? 
			for($i=0;$i<=24;$i++)
			{
				if(date("H") == $i){echo '<option value="'.$i.'" selected>'.$i.'</option>';}	
				else {echo '<option value="'.$i.'">'.$i.'</option>';}
			}
		?>
		</select>:<select name="minutos">
			<? 
			for($i=00;$i<=59;$i++)
			{
				if(date("i") == $i){echo '<option value="'.$i.'" selected>'.$i.'</option>';}	
				else {echo '<option value="'.$i.'">'.$i.'</option>';}
			}
			?>
		</select></td></tr>
<tr><td valign="TOP"><font color="<? echo color(); ?>">Evento</font></td><td><TEXTAREA rows="5" cols="20" name="evento">
Ingrese aqui su evento</TEXTAREA></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Enviar"></td></tr>
</table>
</form>
<? }
?></font>
<!---->
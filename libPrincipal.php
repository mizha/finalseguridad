<?
//libreria Principal
// Esta libreria tiene las funciones Principales para la plantilla
// en otras palabras esta libreria tiene todo lo que se repite en cada pagina

function fondo()
{
	$hora=date("H");
	if($hora == 00){return "imagenes/Pagina Noche.jpg\" text=\"#FFFFFF";}
	if(($hora >= "7" && $hora<= "12") || ( $hora>="13" && $hora <="18"))
	{
		return "imagenes/Pagina Dia.jpg\" text=\"#000000";
	}
	if(($hora >= "00" && $hora <="06") || ($hora >="19" && $hora <="23"))
	{
		return "imagenes/Pagina Noche.jpg\" text=\"#FFFFFF";
	}
	/*else {echo "<script>alert('son las $hora')</script>";}*/
}

function cabecera($regis,$nombre,$ci)
{
	if($regis=="SI"){ 
		echo '<h5>Bienvenido &nbsp;<a href="usuario/perfil.php?id='.$ci.'">'.$nombre.'</a>&nbsp;,&nbsp;<a href="logout.php">Salir</a></h5>';
	}
	else{
		echo '<h5><a href="iniciarSesion.php">Iniciar Sesion</a>&nbsp;o&nbsp;<a href="Registro/registro.php">Registrate</a></h5>';
	}
}?>

<? function menu($regis,$nombre,$tipo){?>
<div id="menu"> 
<ul> 
  <li class="nivel1 primera"><a href="index.php" class="nivel1">Principal</a>
<!--[if lte IE 6]><a href="index.php" class="nivel1ie">Principal<table class="falsa"><tr><td><![endif]--> 
  	<ul>
	  <li class="primera"><a href="index2.php?id=5">Sobre JCI</a> </li> 
	  <li><a href="index2.php?id=6">Nosotros</a> </li>
	  <li><a href="usuario/galeriadepresidentes.php">Galeria de Presidentes</a> </li>
	</ul>
  </li> 
<!--[if lte IE 6]></td></tr></table></a><![endif]--> 
  <li class="nivel1"><a href="#" class="nivel1">Programas</a> 
<!--[if lte IE 6]><a href="#" class="nivel1ie">Programas<table class="falsa"><tr><td><![endif]--> 
	<ul> 
		<li class="primera"><a href="#">Planificaci�n Estrategica</a></li>
		<li><a href="index2.php?id=7">Miembro individual</a></li> 
		<li><a href="index2.php?id=16">Reina del Carnaval</a></li> 
		<li><a href="index2.php?id=15">Comerciales</a></li>
		<li><a href="index2.php?id=13">Administrativas</a></li>
		<li><a href="index2.php?id=14">Internacionalismo</a></li> 
	</ul> 
<!--[if lte IE 6]></td></tr></table></a><![endif]--> 
</li> 
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
<li class="nivel1"><a href="#" class="nivel1">Juventud y Desarrollo</a> 
<!--[if lte IE 6]><a href="#" class="nivel1ie">Juventud y Desarrollo<table class="falsa"><tr><td><![endif]--> 
	<ul> 
		<li class="primera"><a href="index2.php?id=8">Juventud y Desarrollo</a></li> 
		<li><a href="enlaces/enlaces.php">Enlaces De Interes</a></li>
			<? // si esta registrado 
	if($regis=="SI"){ ?>
		<li><a href="enlaces/nuevoenlace.php">Nuevo Enlace</a></li> <? }?>
		<li><a href="index2.php?id=10">Publicaciones</a></li>
		<li><a href="index2.php?id=9">Red de Juventud(UNESCO)</a></li>
		<li><a href="index2.php?id=11">Redes y Politicas</a></li>
	</ul> 
<!--[if lte IE 6]></td></tr></table></a><![endif]--> 
</li> 
  <li class="nivel1"><a href="index2.php?id=12" class="nivel1">Capacitaciones</a> 
<!--[if lte IE 6]><a href="index2.php?id=12#" class="nivel1ie">Capacitaciones<table class="falsa"><tr><td><![endif]--> 
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
 <li class="nivel1"><a href="#" class="nivel1">Eventos</a>
 <!--[if lte IE 6]><a href="#" class="nivel1ie">Eventos<table class="falsa"><tr><td><![endif]--> 
	<ul>
		<li class="primera"><a href="calendario/index.php">Calendario de Eventos</a> </li>
		<li><a href="#">Eventos Locales</a></li>
		<li><a href="#">Eventos Nacionales</a></li>
		<li><a href="#">Eventos Internacionales</a></li>
	</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
 <li class="nivel1"><a href="#" class="nivel1">Directorios</a>
  <!--[if lte IE 6]><a href="#" class="nivel1ie">Directorios<table class="falsa"><tr><td><![endif]--> 
	<ul>
		<li class="primera"><a href="usuario/directorioEmpresarial.php">Directorio Empresarial</a></li>
		<li><a href="usuario/directorio.php?tab=cel">Directorio CEL</a></li>
		<li><a href="usuario/directorio.php?tab=jdl">Directorio JDL</a></li>
	</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li> 
 <li class="nivel1"><a href="blog.php" class="nivel1">Blog</a>
  <!--[if lte IE 6]><a href="blog.php" class="nivel1ie">Blog<table class="falsa"><tr><td><![endif]--> 
	<? // si esta registrado 
	if($regis=="SI"){ ?>
		<ul>
			<li class="primera"><a href="Blog/publicar.php">Publicar</a></li>
			<li><a href="Blog/modificar.php">Modificar</a></li>
			<li><a href="Blog/Buscar.php">Buscar</a></li>
		</ul>
	<? }?>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
<li class="nivel1"><a href="#" class="nivel1">Album de Fotos</a>
  <!--[if lte IE 6]><a href="#" class="nivel1ie">Album de Fotos<table class="falsa"><tr><td><![endif]--> 
	<ul><? // si esta registrado 
	if($regis=="SI"){ ?>
			<li class="primera"><a href="albumdefotos/subir_fotos.php">Subir Fotos</a></li>
			<? }?>
			<li><a href="Albumfotos.php">Album</a></li>
		</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
 <li class="nivel1"><a href="video.php" class="nivel1">Video</a>
<!--[if lte IE 6]><a href="video.php" class="nivel1ie">Video<table class="falsa"><tr><td><![endif]--> 
	<? // si esta registrado 
	if($regis=="SI"){ ?>
		<ul>
			<li  class="primera"><a href="Video/nuevovideo.php">Nuevo Video</a></li>
		</ul>
	<? }?>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
<? // si esta registrado y es el presi 
	if($regis=="SI" AND $tipo==5){ ?>
	 <li class="nivel1"><a href="#" class="nivel1">Zona Presidente</a>
 <!--[if lte IE 6]><a href="#" class="nivel1ie">Zona Presidente<table class="falsa"><tr><td><![endif]--> 
	<ul>
		<li  class="primera"><a href="reportes/aexcel.php">Base de Datos a Excel</a></li>
		 <li><a href="BackUp/CrearBack.php"> BackUp total de la BD</a></li>  
        <li><a href="usuario/ver_activos.php">Validar registros</a></li>
        <li><a href="Blog/Eliminar.php">Eliminar Blog</a></li>
		<li><a href="Video/nuevaCategoria">Nuevo Categoria Video</a></li>
		<li><a href="albumdefotos/nuevacarpeta.php">Nueva Carpeta de Imagenes</a></li>
		<li><a href="celjdl/formarCEL.php">Formar CEL</a></li>
		<li><a href="celjdl/formarJDL.php">Formar JDL</a></li>
		<li><a href="celjdl/nuevoCargo.php">Crear Cargo en CEL o JDL</a></li>
		<li><a href="usuario/nombrar.php">Nombrar Nuevo Presidente</a></li>
	</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
<? }?>
</ul></div> 
<div align="center"><br>
    <br>
    <a href="#" target="_blank"><img src="imagenes/YouTube.png" alt="Venos en YOUTUBE!!!" align="middle"></a>
    <br>
    <br>
    <!-- <a href="#" target="_blank"><img src="imagenes/Facebook.png" alt="Se nuestro amigo en Facebook" align="middle"></a> -->
	<!-- Facebook Badge START --><a href="http://es-es.facebook.com/people/Jci-Cochabamba/1725148342" title="Jci Cochabamba" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;">JCI Cochabamba</a><br/><a href="http://es-es.facebook.com/people/Jci-Cochabamba/1725148342" title="JCI Cochabamba" target="_TOP"><img src="http://badge.facebook.com/badge/1725148342.402.2146574270.png" width="120" height="80" style="border: 0px;" /></a><br/><a href="http://es-es.facebook.com/facebook-widgets/" title="Make your own badge!" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;"></a><!-- Facebook Badge END -->
</div><br>
<br>
<?  //SI encuesta esta activada mostrarla 
	//else{
		echo ultimosBlogs();
	//}
?>
<? }?>
<? function pie()
{
echo 'Dise�o Por <a href="http://www.gdrpc.com.bo" target="_blank">Raul Clavijo</a> y Programaci�n por <a href="#">Marieta Gonzales</a>';
}
?>
<? function ultimosBlogs()
	{
		$sql = "SELECT * from blog Where visible='Si' Order By IdBlog DESC Limit 0 , 5";
		$res=mysql_query($sql);
	$final='<MARQUEE onmouseover=this.stop() style="WIDTH: 136px; HEIGHT: 100px" onmouseout=this.start() scrollAmount=2 direction=up>';
		while($row=mysql_fetch_array($res))
		{
			$final.="<a href=\"Blog/mostrar_Blog.php?blogid=".$row["IdBlog"]." \" target=\"_blank\">".$row["Titulo"]."</a><br><br>";
		}
		$final.='</marquee>';
		return $final;
	}
?>
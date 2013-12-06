<link href="estilo.css" rel="stylesheet" type="text/css">
<table border=0 cellpacing=0>
<?
include_once("funciones.php");
$eventoid = $_GET['id'];
$act = $_GET['act'];
if($act == ""){
    if($eventoid != ""){
        echo "<tr><td>Esta seguro que desea borrar este evento?</td></tr>";
        echo "<tr><td align='center'><a href='borrar.php?id=$eventoid&act=del'>[SI]</a> - <a href='<javascript: function(   void){history.back}>'>[NO]</a></td></tr>";
    }else{
        echo "<tr><td>Evento invalido</td></tr>";
    }
}else{
    //$conexion = conectar();
    $sql = "delete from eventos where eventoid = $eventoid";
    $res = mysql_db_query("jci",$sql);
    session_start();
    $ci = $_SESSION["ci"];
    $tiempo = date("Y/m/d");
    $query_log = "INSERT INTO log VALUES ('','$ci','Borrar evento','Evento borrado','$tiempo')";
    mysql_db_query("jci",$query_log);

    if($res){
        echo "Evento borrado.";
        redireccionar('3','mostrar.php');
    }else{
        echo "Error al eliminar el evento,";
    }
    desconectar();
}
?>
</table>

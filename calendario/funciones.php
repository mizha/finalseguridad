<?php
include("../conexion.php");
$datos;
$mes[1] = "Enero";
$mes[2] = "Febrero";
$mes[3] = "Marzo";
$mes[4] = "Abril";
$mes[5] = "Mayo";
$mes[6] = "Junio";
$mes[7] = "Julio";
$mes[8] = "Agosto";
$mes[9] = "Septiembre";
$mes[10] = "Octubre";
$mes[11] = "Noviembre";
$mes[12] = "Diciembre";
$mes_num[1] = "01";
$mes_num[2] = "02";
$mes_num[3] = "03";
$mes_num[4] = "04";
$mes_num[5] = "05";
$mes_num[6] = "06";
$mes_num[7] = "07";
$mes_num[8] = "08";
$mes_num[9] = "09";
$mes_num[10] = "10";
$mes_num[11] = "11";
$mes_num[12] = "12";
$dias[0] = "0";
/*function conectar(){
    $host = "localhost";
    $usuariodb = "root";
    $pwddb = "";
    $db = "jci";
    $enlace = mysql_connect($host,$usuariodb,$pwddb);// or die("No pudo conectarse : " . mysql_error());
    if (!$enlace) {
        die('No conectado : ' . mysql_error());
    }
    $seldb = mysql_select_db($db,$enlace);
    if (!$seldb) {
        die ('No se puede usar eventos: ' . mysql_error());
    }
    return $enlace;
}*/

function desconectar(){
    mysql_close();
}

function query($sql){
    $res = mysql_query($sql) or die (mysql_error());
    return $res;
}

function buscareventos($ultimo,$mess,$anio){
    //$conexion = conectar();
    $desde = $anio."-".$mess."-01";
    $hasta = $anio."-".$mess."-".$ultimo;
    $sql = "select * from eventos where fecha BETWEEN '$desde' and '$hasta'";
    $res = mysql_db_query("jci",$sql);
    if(mysql_num_rows($res) > 0){
        echo "<tr><th>FECHA</th><th>EVENTO</th></tr>";
        while($fila = mysql_fetch_array($res)){
            echo "<tr><td class='tdfecha'>".$fila['fecha']."</td><td class='tdevento'>".$fila['evento']."</td></tr>";
        }
    }else{
        echo "<tr><td class='tdno'>No se encuentran eventos cargado en este mes.</td></tr>";
    }
    desconectar();
}

function cargarmatriz($ultimo,$mess,$anio){
    $i = 0;
   // $conexion = conectar();
    $desde = $anio."-".$mess."-01";
    $hasta = $anio."-".$mess."-".$ultimo;
//    $sql = "select * from eventos where fecha BETWEEN '$desde' and '$hasta' order by fecha";
    $sql = "select distinct fecha from eventos where fecha BETWEEN '$desde' and '$hasta' order by fecha";
    $res = mysql_db_query("jci",$sql);
    if(mysql_num_rows($res) > 0){
        while($fila = mysql_fetch_array($res)){
            $fecha = $fila['fecha'];
            $dia = explode("-", $fecha);
            //if($dias[$i-1] != $dia[2]){
                $dias[$i] = $dia[2];
            //}
            $i++;
        }
    }else{
        $dias[0] = "0";
    }
    desconectar();
    return $dias;
}

function redireccionar($time,$url){
    print "<meta http-equiv=Refresh content=\"$time ; url=$url\">";
}

?>


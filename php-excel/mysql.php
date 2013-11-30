<?php
require_once("excel.php"); 
require_once("excel-ext.php"); 
include("../conexion.php");


mysql_select_db("jci");
$queEmp = "SELECT * FROM junior";
$resEmp = mysql_db_query("jci",$queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$data[] = $datatmp; 
}  
createExcel("excel-mysql.xls", $data);
exit;
?>
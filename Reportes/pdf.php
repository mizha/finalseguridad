<script language="javascript">
	function abrirVentana(nombre)
	{
		MiVentana=open(nombre,"MiPropiaVentana","toolbar=no,directories=no,menubar=no,status=yes");
		//MiVentana.document.write("<meta http-equiv=\"refresh\" content=\"0;URL=primer.pdf\">");
	}
</script>
<?php
require('fpdf153-1/fpdf.php');
include("../conexion.php");
class PDF extends FPDF
{
//Cabecera de página
function Header()
{
  	  //Logo
  	  //$this->Image("hp.jpg",150,8,40);
    
	//Arial bold 15
 	   $this->SetFont('Helvetica','B',12);
    
	//Movernos a la derecha
    	$this->Cell(2);
    
	//Título
    	$this->Cell(80,10,'Miembros JCI-Cochabamba',1,0,'C');
    
	//Salto de línea
   	 $this->Ln(20);
	 
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
  	  $this->SetFont('Helvetica','I',8);
  	  //Número de página
  	  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

//Tabla coloreada
function FancyTable($header,$data)
{
    //Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Cabecera
    $w=array(40,35);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    //Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Datos
    $fill=false;
    foreach($data as $key=>$value)
    {
        $this->Cell($w[0],6,$key,'LR',0,'L',$fill);
		$this->Cell($w[1],6,$value,'LR',0,'L',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','B');
}
//Tabla coloreada
function FancyTable1($header,$nombres,$apellidos,$mails,$tipos,$casas)
{
    //Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Cabecera
    $w=array(25,33,50,55,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    //Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Datos
    $fill=false;
    for($i=0;$i<count($nombres);$i++)
    {
        $this->Cell($w[0],6,$nombres[$i],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$apellidos[$i],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$mails[$i],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$tipos[$i],'LR',0,'L',$fill);
		$this->Cell($w[4],6,$casas[$i],'LR',0,'L',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
//Tabla coloreada
function FancyTable2($header,$nombres,$apellidos,$mails,$tipos)
{
    //Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Cabecera
    $w=array(25,33,60,55);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    //Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Datos
    $fill=false;
    for($i=0;$i<count($nombres);$i++)
    {
        $this->Cell($w[0],6,$nombres[$i],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$apellidos[$i],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$mails[$i],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$tipos[$i],'LR',0,'L',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}

}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$hora=date("H:i");
$fecha=date("d/m/Y");
$pdf->Cell(60);
$pdf->Cell(80,10,'Reporte De Miembros',0,1,'C');
$casa=$_GET["op"];
$pdf->SetFont('Helvetica','B',12);
$cualcasa=queCasa($casa);
$pdf->Cell(0,10,$cualcasa,0,1);
$pdf->SetFont('Helvetica','',12);

function queCasa($c)
	{
		switch ($c)
		{
			case "0":{return "Todas las Casas";}
	  		case "1":{return "Ravenclaw";}
	   		case "2":{return "Hufflepuff";}
			case "3":{return "Gryffindor";}
		  	case "4":{return "Slytherin";}
		}
	}
function quePuesto($op)
{
	switch($op)
	{
		case "1":{return "Presidente / Administrador";}
		case "2":{return "Jefe De Casa";}
		case "3":{return "Jefe De Prefecto";}
		case "4":{return "Prefecto";}
		case "5":{return "Jefe Profeta";}
		case "6":{return "Reportero";}
		case "7":{return "Alumno";}
	}
}
function valores($tipo)
{
	$cadena=strpos($tipo,",");
		if($cadena == NULL){
			return quePuesto($tipo);
			}
		if($cadena == 1){
			$aux=split(",",$tipo);
			$tipo1=$aux[0];
			$tipo2=$aux[1];
			$resp1 = quePuesto($tipo1);
			$resp2 = quePuesto($tipo2);
			return $resp1." / ".$resp2;
			}
}
if($casa==0)
{
	$query="SELECT * FROM `alumno` , usuario WHERE alumno.IdUsuario = usuario.IdUsuario ORDER BY alumno.Apellido ASC";
}
else{
	$query="SELECT * FROM `alumno` , usuario WHERE alumno.IdUsuario = usuario.IdUsuario AND alumno.casa=".$casa." ORDER BY alumno.Apellido ASC";
}
$res=mysql_db_query("club",$query);
$nombres=array();
$apellidos=array();
$mails=array();
$tipos=array();
$casas=array();
$i=0;
while($row=mysql_fetch_array($res))
{
	$nombres[$i]=$row["Nombre"];
	$apellidos[$i]=$row["Apellido"];
	$mails[$i]=$row["Mail"];
	$tipos[$i]= valores($row["Tipo"]);
	if($casa==0)
	{
		$casas[$i]=queCasa($row["Casa"]);
	}
	$i++;
}

if($casa==0)
{
	$header=array('Nombre','Apellido','Mail','Tipo','Casa');
	$pdf->FancyTable1($header,$nombres,$apellidos,$mails,$tipos,$casas);
}
else{
	$header=array('Nombre','Apellido','Mail','Tipo');
	$pdf->FancyTable2($header,$nombres,$apellidos,$mails,$tipos);}
$nombre=$_GET["op"].queCasa($_GET["op"]).".pdf";
$pdf->Output($nombre,'');
echo '<center><input name="Abrir PDF" type="button" value="Abrir PDF" onClick="abrirVentana(\''.$nombre.'\');"></center>';
?>

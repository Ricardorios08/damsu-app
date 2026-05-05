<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");



$hoy=date("d/m/y");

class PDF2 extends FPDF
{

 function Header()
{
	 
$titulo = "ASOC. COOP. HOSPITAL CENTRAL / PROGRAMA ONOCOLOGICO";
$titulo1= "Drogas Autorizadas por PROFE / Pacientes autorizados PROFE";


 
$this->Cell(200,5,$titulo,0,0,C);
$this->SetFont('ARIAL','',11);
$this->ln();
$this->Cell(200,5,$titulo1,0,0,C);;
$this->ln();
$this->ln();

$this->ln();

}



function setFecha($nrofec) {
    $this->nroFec = $nrofec;
}
function getFecha() {
    return $this->nroFec;
}


function setFactura($nrofac) {
    $this->nroFac = $nrofac;
}
function getFactura() {
    return $this->nroFac;
}


function setNeto($nronet) {
    $this->nroNet = $nronet;
}
function getNeto() {
    return $this->nroNet;
}




var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'R';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
//		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,5,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

}



$hoja = "A4";

$pdf=new PDF2('P','mm',$hoja); 
$pdf->SetDisplayMode(85,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',10);




$pdf->AddPage();
$titulo2= "PERIODO: ".$mes."-".$anio;
$pdf->Cell(200,5,$titulo2,0,0,C);
$pdf->ln();
$pdf->ln();

$pdf->SetFont('ARIAL','',10);
include ("../../../conexiones/config_pro.php");




$sql1 = "delete FROM profe_detalle";
$result1 = $db->Execute($sql1);

$sql1 = "delete FROM profe_detalle_1";
$result1 = $db->Execute($sql1);

$sql1 = "delete FROM profe_detalle_2";
$result1 = $db->Execute($sql1);


$sql1 = "SELECT *  FROM drogas_profe_coope  order by cod_droga";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 $cod_droga=$result1->fields["cod_droga"];

$sql = "INSERT into profe_detalle SELECT * FROM `tr_ventas_detalle` where cod_droga = '$cod_droga' and fecha > '2014-12-31'";
mysql_query($sql);


   $result1->MoveNext();
	}





$sql1 = "SELECT *  FROM profe_detalle  order by cod_droga";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 $tipo_fact=$result1->fields["tipo_fact"];
  $nro_factura=$result1->fields["nro_factura"];
$cod_detalle=$result1->fields["cod_detalle"];

 $sql = "SELECT * FROM tr_ventas_encabezado where tipo_fact = '$tipo_fact' and nro_factura = '$nro_factura'";
$result = $db->Execute($sql);
  $documento=$result->fields["documento"];
  $nro_os=$result->fields["nro_os"];

 $sql = "UPDATE `profe_detalle` SET `documento` = '$documento' WHERE `cod_detalle` = '$cod_detalle'";
mysql_query($sql);


   $result1->MoveNext();
	}


$sql1 = "SELECT *  FROM pacientes where autorizados_profe = 1  order by documento";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 $documento=$result1->fields["documento"];

$sql = "INSERT into profe_detalle_1 SELECT * FROM profe_detalle where documento = '$documento' and nro_os = 10";
mysql_query($sql);


   $result1->MoveNext();
	}

$sql1 = "SELECT *  FROM drogas_profe_coope  order by cod_droga";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 $cod_droga=$result1->fields["cod_droga"];

 $sql = "SELECT * FROM drogas where cod_droga = '$cod_droga'";
$result = $db->Execute($sql);
  $nombre_droga=$result->fields["droga"];

$desde1  =$anio."-".$mes."-01";
$hasta1  =$anio."-".$mes."-31";

$sql11 = "SELECT *  FROM profe_detalle_1 where fecha between '$desde1' and '$hasta1' and cod_droga = '$cod_droga'";
$result111 = $db->Execute($sql11);

 $cod_detalle1=$result111->fields["cod_detalle"];


if ($cod_detalle1 != ''){

$pdf->SetFont('ARIAL','bI',11);
$pdf->Cell(100,5,'DROGA: '.$nombre_droga,0); 
$pdf->ln();
$pdf->SetFont('ARIAL','',9);
$pdf->Cell(70,5,'PACIENTE',1,0,C); 
$pdf->Cell(50,5,'NOMBRE COMERCIAL',1,0,C);  
$pdf->Cell(20,5,'COMPROB.',1,0,C); 
$pdf->Cell(20,5,'FECHA',1,0,C); 
$pdf->Cell(30,5,'CONSUMO',1,0,C); 
$pdf->ln();
include ("meses_aut1.php");
}

  
if ($total_droga > 0){
$pdf->ln();
}

$total_droga = "";

$result1->MoveNext();

}


$pdf->Output();



//408005384
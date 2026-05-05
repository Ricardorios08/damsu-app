<?php 

function resta($inicio, $fin)
  {
  $dif=date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio) );
  return $dif;
  }


  $hora_inicial="12:45";
$hora_final="13:00";
$diferencia=resta($hora_inicial,$hora_final);
echo "La diferencia es $diferencia";



<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");
include ("arregla_grupo.php");

$hoy=date("d/m/y");

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];

$prov_papo1 = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";

$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";


class PDF2 extends FPDF
{

    var $nroPac;
//Page header
function Header()
{

   /*
$this->SetY(16);
$this->SetX(155);
 $this->SetFont('Arial','',11);
$this->Cell(50,5,$this->getFecha());  

$this->SetY(23);
$this->SetX(155);

   $this->SetFont('Arial','',13);
$this->Cell(50,5,$this->getFactura());

*/
   
	
	
$this->SetFillColor(224,235,255);
$this->SetTextColor(0);
$this->SetFont('');
$titulo = "PROGRAMA ONCOLOGICO - TIEMPO UTILIZADO EN EXPEDICION - PERIODO NOVIEMBRE 2012 ".$mes." ".$anio;
$this->Cell(210,5,$titulo,0,0,'C'); 
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
$this->SetX(0);
$this->ln();
$this->Cell(25,5,'COMPROBANTE',0,0,'C',true); 
$this->Cell(20,5,'FECHA',0,0,'C',true); 
$this->Cell(100,5,'PACIENTE',0,0,'C',true); 
$this->SetX(150);
$this->Cell(20,5,"PAPO 1",0,0,'R',true); 
$this->Cell(20,5,"PAPO 2",0,0,'R',true); 
$this->Cell(20,5,"PAPO MONO",0,0,'R',true); 
$this->Cell(20,5,"ACE 1",0,0,'R',true); 
$this->Cell(20,5,"ACE 2",0,0,'R',true); 
$this->Cell(20,5,"MONO",0,0,'R',true); 
$this->Cell(20,5,'TOTAL',0,0,'R',true); 

 $this->ln();


}

function Footer()
{
	


$this->SetY(-10);

$this->SetFont('Arial','I',8);

$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');


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

$pdf=new PDF2('L','mm',$hoja); 
$pdf->SetDisplayMode(real,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',8);

$pdf->AddPage();

 

include ("entregas.php");



$total_prov_papo_programa1 = $total_prov_papo1;
$total_prov_papo_programa2 = $total_prov_papo2;
$total_prov_mono_programa = $total_prov_mono;

$total_grupo1_programa = $total_grupo1;
$total_grupo2_programa = $total_grupo2;
$total_grupo3_programa = $total_grupo3;






$total_general_programa = $total_prov_papo_programa + $total_prov_mono_programa + $total_grupo1_programa + $total_grupo2_programa + $total_grupo3_programa;

include ("devoluciones.php");



 $total_general = $total_prov_papo1 + $total_prov_papo2 + $total_prov_mono + $total_grupo1 + $total_grupo2 + $total_grupo3;



 $pdf->ln();
 $pdf->ln();

$papo_1 = $total_prov_papo1 - $total_dev1;
$papo_2 = $total_prov_papo2 - $total_dev2;
$papo_3 = $total_prov_mono - $total_dev3;

$ace_1 = $total_grupo1;
$ace_2 = $total_grupo2;
$ace_3 = $total_grupo3;

$total_general = $papo1 + $papo2 + $papo3 + $ace_1 + $ace_2 + $ace_3;


$total_unico = $papo_1 + $papo_2 + $papo_3;
$total_ace = $ace_1 + $ace_2;
$total_gastado = $total_unico + $total_ace + $ace_3;
$monoclonales = $papo_3 + $total_grupo3;




$pdf->Cell(20,5,"PAPO 1",0,0,'R');
$pdf->Cell(20,5,"PAPO 2",0,0,'R'); 
$pdf->Cell(20,5,"MONO",0,0,'R'); 
$pdf->Cell(20,5,"ACE 1",0,0,'R'); 
$pdf->Cell(20,5,"ACE 2",0,0,'R'); 
$pdf->Cell(20,5,"MONO",0,0,'R'); 

 $pdf->ln();

 $pdf->Cell(20,5,number_format($total_prov_papo1,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_prov_papo2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_prov_mono,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_grupo1,2),0,0,'R');  
$pdf->Cell(20,5,number_format($total_grupo2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_grupo3,2),0,0,'R'); 
$pdf->Cell(20,5,"ENTREGAS",0,0,'C');

  $pdf->ln();

$pdf->Cell(20,5,"-".number_format($total_dev1,2),0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($total_dev2,2),0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($total_dev3,2),0,0,'R'); 
$pdf->Cell(20,5,'',0,0,'R'); 
$pdf->Cell(20,5,'',0,0,'R'); 
$pdf->Cell(20,5,'',0,0,'R'); 
$pdf->Cell(20,5,"DEVOLUCIONES",0,0,'C'); 



 $pdf->ln();

$pdf->Cell(20,5,number_format($papo_1,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($papo_2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($papo_3,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_grupo1,2),0,0,'R');  
$pdf->Cell(20,5,number_format($total_grupo2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_grupo3,2),0,0,'R'); 

  $pdf->ln();
    $pdf->ln();


$pdf->ln();
$pdf->Cell(30,5,"TOTAL UNICO: ",0,0,'C'); 
$pdf->Cell(30,5,number_format($total_unico,2),0,0,'R'); 

$pdf->ln();
$pdf->Cell(30,5,"TOTAL ACE: ",0,0,'C'); 
$pdf->Cell(30,5,number_format($total_ace,2),0,0,'R'); 

$pdf->ln();
$pdf->Cell(30,5,"TOTAL GASTADO: ",0,0,'C'); 
$pdf->Cell(30,5,number_format($total_gastado,2),0,0,'R'); 


$pdf->ln();
$pdf->Cell(30,5,"MONOCLONALES: ",0,0,'C'); 
$pdf->Cell(30,5,number_format($monoclonales,2),0,0,'R'); 

$pdf->Output();




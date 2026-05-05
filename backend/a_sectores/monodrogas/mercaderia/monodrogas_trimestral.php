<?php 

require('../../../drivers/fpdf/fpdf.php');
include("../../../conexiones/config_pro.php");

$anio = 2016;



class PDF2 extends FPDF
{

    var $nroPac;

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

function Header()
{

$hoy = date("d/m/Y");
   $titulo1 = "ASOC. COOP. HOSPITAL CENTRAL";
$titulo = "LISTA COMPLEMENTARIA ".$anio;

//$this->Image('../../../imagenes/logo_coope1.jpg',10,5,180, 'C');


 $this->Cell(280,5,$titulo1,0,0,'C'); 
$this->ln();
 $this->SetFont('Arial','',11);
$this->Cell(280,5,$titulo,0,0,'C'); 
 $this->SetFont('Arial','',10);

$this->ln();


$this->Cell(90,5,'MEDICAMENTO',1,0,'C');  
$this->Cell(40,5,'PRESENTACION',1,0,'C'); ; 
$this->Cell(36,5,"1º TRIMESTRE",1,0,'C');  
$this->Cell(36,5,"2º TRIMESTRE",1,0,'C');  
$this->Cell(36,5,"3º TRIMESTRE",1,0,'C');  
$this->Cell(36,5,"4º TRIMESTRE",1,0,'C');  

$this->ln();


}

function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Pag: '.$this->PageNo(),0,0,'R');
}


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
$pdf->SetDisplayMode(80,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',8);











$titulo = "ASOC. COOP. HOSPITAL CENTRAL - INVENTARIO DE MEDICAMENTOS AL ".$hoy;

$pdf->AddPage();
//$pdf->Cell(70,5,$titulo,0);

//$pdf->ln();

$sql = "SELECT * FROM monodrogas INNER JOIN drogas ON monodrogas.cod_droga=drogas.cod_droga group by cod_barra ORDER BY nombre_comercial, `drogas`.`droga` ASC";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 
$cod_droga=strtoupper($result->fields["cod_droga"]);
$troquel=strtoupper($result->fields["troquel"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$grupo=strtoupper($result->fields["grupo"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
$frio=strtoupper($result->fields["frio"]);
$grupo=strtoupper($result->fields["grupo"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 $droga=strtoupper($result->fields["droga"]);

 
$mes1 = "01";
$mes2 = "03";
$desde1 = $anio."-".$mes1."-01";
$hasta1= $anio."-".$mes2."-31";

$sql1="select count(cod_mercaderia) as total from tr_ventas_detalle where cod_mercaderia = '$cod_barra' and fecha between '$desde1' and '$hasta1'";	  
$result1 = $db->Execute($sql1);
$primer_tri=$result1->fields["total"];

$mes1 = "04";
$mes2 = "06";
$desde1 = $anio."-".$mes1."-01";
$hasta1= $anio."-".$mes2."-31";

 $sql2="select count(cod_mercaderia) as total from tr_ventas_detalle where cod_mercaderia = '$cod_barra' and fecha between '$desde1' and '$hasta1'";		  
$result1 = $db->Execute($sql2);
$segundo_tri=$result1->fields["total"];

$mes1 = "07";
$mes2 = "09";
$desde1 = $anio."-".$mes1."-01";
$hasta1= $anio."-".$mes2."-31";

 $sql3="select count(cod_mercaderia) as total from tr_ventas_detalle where cod_mercaderia = '$cod_barra' and fecha between '$desde1' and '$hasta1'";	  
$result1 = $db->Execute($sql3);
$tercer_tri=$result1->fields["total"];

$mes1 = 10;
$mes2 = 12;
$desde1 = $anio."-".$mes1."-01";
$hasta1= $anio."-".$mes2."-31";

 $sql4="select count(cod_mercaderia) as total from tr_ventas_detalle where cod_mercaderia = '$cod_barra' and fecha between '$desde1' and '$hasta1'";	  
$result1 = $db->Execute($sql4);
$cuarto_tri=$result1->fields["total"];



//$pdf->Cell(20,5,$troquel,1,0,'L'); 	  

$total_1 = $total_1 + $primer_tri;
$total_2 = $total_2 + $segundo_tri;
$total_3 = $total_3 + $tercer_tri;
$total_4 = $total_4 + $cuarto_tri;

if ($primer_tri == 0){$primer_tri = "-";}
if ($segundo_tri == 0){$segundo_tri = "-";}
if ($tercer_tri == 0){$tercer_tri = "-";}
if ($cuarto_tri == 0){$cuarto_tri = "-";}


$pdf->Cell(25,5,$cod_barra,1,0,'L'); 
 
$pdf->Cell(65,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(40,5,$presentacion,1,0,'L');  
$pdf->Cell(36,5,$primer_tri,1,0,'C');  
$pdf->Cell(36,5,$segundo_tri,1,0,'C');  
$pdf->Cell(36,5,$tercer_tri,1,0,'C');  
$pdf->Cell(36,5,$cuarto_tri,1,0,'C');  
$pdf->ln();

$result->MoveNext();
	}


$pdf->ln();

$pdf->Cell(130,5,"TOTALES: ",1,0,'L'); 
$pdf->Cell(36,5,$total_1,1,0,'C');  
$pdf->Cell(36,5,$total_2,1,0,'C');  
$pdf->Cell(36,5,$total_3,1,0,'C');  
$pdf->Cell(36,5,$total_4,1,0,'C');  
$pdf->ln();


$pdf->Output();



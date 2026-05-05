<?php 

require('../../../../drivers/fpdf/fpdf.php');


$anio = $_REQUEST['anio'];
 $anio = "2014";




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
$titulo = "CAMBIO DE PRECIOS setiembre 2014";
$this->Cell(210,5,$titulo,0,0,'C'); 
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
$this->SetX(0);
$this->ln();
$this->Cell(30,5,'COD BARRA',0,0,'C',true); 
$this->Cell(15,5,'TROQUEL',0,0,'C',true); 
$this->Cell(45,5,'NOMBRE COMERCIAL',0,0,'C',true); 
$this->Cell(75,5,'PRESENTACION',0,0,'C',true); 

$this->SetX(165);
$this->Cell(20,5,"ACTUAL",0,0,'R',true); 
$this->Cell(20,5,"CONVENIO",0,0,'R',true); 
 

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

$pdf=new PDF2('P','mm',$hoja); 
$pdf->SetDisplayMode(real,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',8);

$pdf->AddPage();

 



$sql11 = "SELECT * FROM cambio_precio where anio = $anio AND cod_mercaderia = 0 order by cod_mercaderia";
$result = $db->Execute($sql11);


if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$troquel=$result->fields["troquel"];
$cod_mercaderia=$result->fields["cod_mercaderia"];
$precio_anterior=$result->fields["precio_anterior"];
$precio_convenio=$result->fields["precio_convenio"];
$nombre_comercial=$result->fields["nombre_comercial"];



 $pdf->Cell(30,5,$cod_mercaderia,0); 
$pdf->Cell(15,5,$troquel,0); 
$pdf->Cell(45,5,$nombre_comercial,0); 
$pdf->Cell(45,5,'',0); 
$pdf->SetX(165);
$pdf->Cell(20,5,number_format($precio_anterior,2),0,0,'R');
$pdf->Cell(20,5,number_format($precio_convenio,2),0,0,'R');
  
$pdf->ln();

 
	 $result->MoveNext();

				}



$sql11 = "SELECT * FROM cambio_precio where anio = $anio and cod_mercaderia > 0 order by nombre_comercial";
$result = $db->Execute($sql11);


if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$troquel=$result->fields["troquel"];
$cod_mercaderia=$result->fields["cod_mercaderia"];
$precio_anterior=$result->fields["precio_anterior"];
$precio_convenio=$result->fields["precio_convenio"];
$nombre_comercial=$result->fields["nombre_comercial"];

 

  $sql2="select * from monodrogas where cod_barra = $cod_mercaderia";
$result2 = $db->Execute($sql2);
$presentacion=strtoupper($result2->fields["presentacion"]);


 
 //descomentar esto para cambiar precios existencia y monodrogas
 /*
 $sql1 = "UPDATE `tr_existencias` SET precio_unitario = '$precio_convenio' WHERE proveedor = 110 and cod_mercaderia = $cod_mercaderia and cantidad_ingresada - cantidad_salida > 0";
$result1 = $db->Execute($sql1);

 $sql1 = "UPDATE `monodrogas` SET precio_actualizado = '$precio_convenio' WHERE cod_barra = $cod_mercaderia";
$result1 = $db->Execute($sql1);
*/




 // no va $sql = "UPDATE `tr_stock` SET precio_unitario = '$precio_convenio' WHERE cuenta = 110 and cod_movimiento = 1 and cod_mercaderia = $cod_mercaderia";


/* no va
 $sql1 = "UPDATE `tr_existencias` SET precio_unitario = '$precio_convenio' WHERE cod_mercaderia = $cod_mercaderia and cantidad_ingresada - cantidad_salida > 0";
//$result1 = $db->Execute($sql1);

*/







 $pdf->Cell(30,5,$cod_mercaderia,0); 
$pdf->Cell(15,5,$troquel,0); 
$pdf->Cell(45,5,$nombre_comercial,0); 
$pdf->Cell(45,5,$presentacion,0); 
$pdf->SetX(165);
$pdf->Cell(20,5,number_format($precio_anterior,2),0,0,'R');
$pdf->Cell(20,5,number_format($precio_convenio,2),0,0,'R');
  
$pdf->ln();

 
	 $result->MoveNext();

				}

$pdf->Output();




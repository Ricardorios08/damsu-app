<?php 

require('../../drivers/fpdf/fpdf.php');
include ("../../conexiones/config_pro.php");


$hoy=date("d/m/y");

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

$mes = 02;
$anio = 14;

$titulo = "COMPARATIVO META - PROGRAMA ".$mes."-".$anio;
$pdf->AddPage();
$pdf->Cell(70,5,$titulo,0);
$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE FACTURAS",1,0,'C'); 	  

$pdf->ln();

$pdf->Cell(20,5,"META",1,0,'L'); 
$pdf->Cell(20,5,"PO",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(100,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(20,5,"CANT.PO",1,0,'C'); 
	
$pdf->Cell(20,5,"PREC. META",1,0,'C'); 
$pdf->Cell(20,5,"PRECIO PO",1,0,'C');
$pdf->ln();




$sql1="select * from archivo_meta where mes = '$mes' and anio = '$anio' and nro_fact = 0 order by nro_factura, cod_mercaderia";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 
$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$troquel=strtoupper($result1->fields["troquel"]);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);

$cod_droga=strtoupper($result1->fields["cod_droga"]);
$drogas=strtoupper($result1->fields["drogas"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$documento=strtoupper($result1->fields["documento"]);
$cantidad_programa=strtoupper($result1->fields["cantidad_programa"]);
$nro_fact=strtoupper($result1->fields["nro_fact"]);
$precio_programa=strtoupper($result1->fields["precio_programa"]);
$fecha_factura=strtoupper($result1->fields["fecha_factura"]);

$pdf->Cell(20,5,$nro_factura,1,0,'L'); 	  
$pdf->Cell(20,5,$nro_fact,1,0,'L'); 	  
$pdf->Cell(30,5,$cod_mercaderia,1,0,'L'); 
$pdf->Cell(20,5,$troquel,1,0,'L'); 
$pdf->Cell(50,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(25,5,$documento,1,0,'L'); 
$pdf->Cell(25,5,$fecha_factura,1,0,'L'); 
$pdf->Cell(20,5,$cantidad,1,0,'C'); 
$pdf->Cell(20,5,$cantidad_programa,1,0,'C'); 
$pdf->Cell(20,5,$precio_unitario,1,0,'C'); 
$pdf->Cell(20,5,$precio_programa,1,0,'C');
$pdf->ln();

///$todo = $todo + $cantidad;

$contame = $contame + 1;

if ($contame == 32){
$pdf->AddPage();
$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE FACTURAS",1,0,'C'); 	  
$pdf->ln();

$pdf->Cell(20,5,"META",1,0,'L'); 
$pdf->Cell(20,5,"PO",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(100,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(20,5,"CANT.PO",1,0,'C'); 
	
$pdf->Cell(20,5,"PREC. META",1,0,'C'); 
$pdf->Cell(20,5,"PRECIO PO",1,0,'C');
$pdf->ln();


$contame = 0;
}

$result1->MoveNext();
	}



$contame = 0;
$pdf->AddPage();
$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE PRECIOS",1,0,'C'); 	  
$pdf->ln();

$pdf->Cell(20,5,"COMP",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(50,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"FECHA",1,0,'C'); 
$pdf->Cell(25,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(25,5,"CANT.PO",1,0,'C'); 
	
$pdf->Cell(20,5,"PREC. META",1,0,'C'); 
$pdf->Cell(20,5,"PRECIO PO",1,0,'C');
$pdf->Cell(20,5,"N/D",1,0,'C'); 
$pdf->Cell(20,5,"N/C",1,0,'C');
$pdf->ln();





$sql1="select * from archivo_meta where mes = '$mes' and anio = '$anio' and precio_unitario != precio_programa order by nro_factura, cod_mercaderia";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 
$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$troquel=strtoupper($result1->fields["troquel"]);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);

$cod_droga=strtoupper($result1->fields["cod_droga"]);
$drogas=strtoupper($result1->fields["drogas"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$documento=strtoupper($result1->fields["documento"]);
$cantidad_programa=strtoupper($result1->fields["cantidad_programa"]);
$nro_fact=strtoupper($result1->fields["nro_fact"]);
$precio_programa=strtoupper($result1->fields["precio_programa"]);
$fecha_factura=strtoupper($result1->fields["fecha_factura"]);

if ($precio_unitario > $precio_programa){$nota_debito = round($precio_unitario - $precio_programa,2);
$todo_nota_debito = $todo_nota_debito + $nota_debito;

$pdf->Cell(20,5,$nro_factura,1,0,'L'); 	  
$pdf->Cell(30,5,$cod_mercaderia,1,0,'L'); 	  
$pdf->Cell(20,5,$troquel,1,0,'L'); 
$pdf->Cell(50,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(20,5,$fecha_factura,1,0,'C'); 
$pdf->Cell(25,5,$cantidad,1,0,'C'); 
$pdf->Cell(25,5,$cantidad_programa,1,0,'C'); 
$pdf->Cell(20,5,$precio_unitario,1,0,'R'); 
$pdf->Cell(20,5,$precio_programa,1,0,'R'); 
$pdf->Cell(20,5,$nota_debito,1,0,'R'); 
$pdf->Cell(20,5,'',1,0,'C');
$pdf->ln();
}else{
	$nota_credito = round($precio_programa - $precio_unitario,2);
	$todo_nota_credito = $todo_nota_credito + $nota_credito;
$pdf->Cell(20,5,$nro_factura,1,0,'L'); 	  
$pdf->Cell(30,5,$cod_mercaderia,1,0,'L'); 	  
$pdf->Cell(20,5,$troquel,1,0,'L'); 
$pdf->Cell(50,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(20,5,$fecha_factura,1,0,'C'); 
$pdf->Cell(25,5,$cantidad,1,0,'C'); 
$pdf->Cell(25,5,$cantidad_programa,1,0,'C'); 
$pdf->Cell(20,5,$precio_unitario,1,0,'R'); 
$pdf->Cell(20,5,$precio_programa,1,0,'R'); 
$pdf->Cell(20,5,'',1,0,'R'); 
$pdf->Cell(20,5,$nota_credito,1,0,'R');
$pdf->ln();
	}











$todo_ace = $todo_ace + $precio_unitario;
$todo_po = $todo_po + $precio_programa;

///$todo = $todo + $cantidad;

$contame = $contame + 1;

if ($contame == 32){
$pdf->AddPage();

$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE PRECIOS",1,0,'C'); 	  
   
$pdf->ln();

$pdf->Cell(20,5,"COMP",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(50,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"FECHA",1,0,'C'); 
$pdf->Cell(25,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(25,5,"CANT.PO",1,0,'C'); 
	
$pdf->Cell(20,5,"PREC. META",1,0,'C'); 
$pdf->Cell(20,5,"PRECIO PO",1,0,'C');
$pdf->Cell(20,5,"N/D",1,0,'C'); 
$pdf->Cell(20,5,"N/C",1,0,'C');
$pdf->ln();



$contame = 0;
}

$result1->MoveNext();
	}


$pdf->Cell(20,5,'',1,0,'L'); 	  
$pdf->Cell(30,5,'',1,0,'L'); 	  
$pdf->Cell(20,5,'',1,0,'L'); 
$pdf->Cell(50,5,'',1,0,'L'); 
$pdf->Cell(20,5,'',1,0,'C'); 
$pdf->Cell(25,5,'',1,0,'C'); 
$pdf->Cell(25,5,'',1,0,'C'); 
$pdf->Cell(20,5,$todo_ace,1,0,'R'); 
$pdf->Cell(20,5,$todo_po,1,0,'R'); 
$pdf->Cell(20,5,$todo_nota_debito,1,0,'R'); 
$pdf->Cell(20,5,$todo_nota_credito,1,0,'R');
$pdf->ln();



$contame = 0;
$pdf->AddPage();
$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE CANTIDADES",1,0,'C'); 	  

$pdf->ln();

$pdf->Cell(20,5,"META",1,0,'L'); 
$pdf->Cell(20,5,"PO",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(100,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(20,5,"CANT.PO",1,0,'C'); 
	
 
$pdf->ln();



$sql1="select * from archivo_meta where mes = '$mes' and anio = '$anio' and cantidad != cantidad_programa order by nro_factura, cod_mercaderia";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 
$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$troquel=strtoupper($result1->fields["troquel"]);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);

$cod_droga=strtoupper($result1->fields["cod_droga"]);
$drogas=strtoupper($result1->fields["drogas"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$documento=strtoupper($result1->fields["documento"]);
$cantidad_programa=strtoupper($result1->fields["cantidad_programa"]);
$nro_fact=strtoupper($result1->fields["nro_fact"]);
$precio_programa=strtoupper($result1->fields["precio_programa"]);
$fecha_factura=strtoupper($result1->fields["fecha_factura"]);

$pdf->Cell(20,5,$nro_factura,1,0,'L'); 	  
$pdf->Cell(20,5,$nro_fact,1,0,'L'); 	  
$pdf->Cell(30,5,$cod_mercaderia,1,0,'L'); 

$pdf->Cell(20,5,$troquel,1,0,'L'); 
$pdf->Cell(50,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(25,5,$documento,1,0,'L'); 
$pdf->Cell(25,5,$fecha_factura,1,0,'L'); 


$pdf->Cell(20,5,$cantidad,1,0,'C'); 
$pdf->Cell(20,5,$cantidad_programa,1,0,'C'); 
 
$pdf->ln();

///$todo = $todo + $cantidad;

$contame = $contame + 1;

if ($contame == 32){
$pdf->AddPage();

$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE CANTIDADES",1,0,'C'); 	  
$pdf->ln();

$pdf->Cell(20,5,"META",1,0,'L'); 
$pdf->Cell(20,5,"PO",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(100,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(20,5,"CANT.PO",1,0,'C'); 
	
 

$pdf->ln();

$contame = 0;
}

$result1->MoveNext();
	}


$contame = 0;
$pdf->AddPage();
$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE MEDICAMENTOS",1,0,'C'); 	  

$pdf->ln();

$pdf->Cell(20,5,"META",1,0,'L'); 
$pdf->Cell(20,5,"PO",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(100,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(20,5,"CANT.PO",1,0,'C'); 
	
 
$pdf->ln();



$sql1="select * from archivo_meta where mes = '$mes' and anio = '$anio' and cantidad != cantidad_programa order by nro_factura, cod_mercaderia";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 
$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$troquel=strtoupper($result1->fields["troquel"]);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);

$cod_droga=strtoupper($result1->fields["cod_droga"]);
$drogas=strtoupper($result1->fields["drogas"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$precio_unitario=strtoupper($result1->fields["precio_unitario"]);

$documento=strtoupper($result1->fields["documento"]);
$cantidad_programa=strtoupper($result1->fields["cantidad_programa"]);
$nro_fact=strtoupper($result1->fields["nro_fact"]);
$precio_programa=strtoupper($result1->fields["precio_programa"]);
$fecha_factura=strtoupper($result1->fields["fecha_factura"]);

$pdf->Cell(20,5,$nro_factura,1,0,'L'); 	  
$pdf->Cell(20,5,$nro_fact,1,0,'L'); 	  
$pdf->Cell(30,5,$cod_mercaderia,1,0,'L'); 

$pdf->Cell(20,5,$troquel,1,0,'L'); 
$pdf->Cell(50,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(25,5,$documento,1,0,'L'); 
$pdf->Cell(25,5,$fecha_factura,1,0,'L'); 


$pdf->Cell(20,5,$cantidad,1,0,'C'); 
$pdf->Cell(20,5,$cantidad_programa,1,0,'C'); 
$pdf->Cell(20,5,$precio_unitario,1,0,'C'); 
$pdf->Cell(20,5,$precio_programa,1,0,'C');
$pdf->ln();

///$todo = $todo + $cantidad;

$contame = $contame + 1;

if ($contame == 32){
$pdf->AddPage();

$pdf->ln();
$pdf->Cell(270,5,"DIFERENCIA DE MEDICAMENTOS",1,0,'C'); 	  
$pdf->ln();

$pdf->Cell(20,5,"META",1,0,'L'); 
$pdf->Cell(20,5,"PO",1,0,'L'); 
$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 

$pdf->Cell(20,5,"TROQUEL",1,0,'L'); 

$pdf->Cell(100,5,"NOMBRE COMERCIAL",1,0,'C'); 

$pdf->Cell(20,5,"CANT.ME",1,0,'C'); 
$pdf->Cell(20,5,"CANT.PO",1,0,'C'); 
	
 

$pdf->ln();

$contame = 0;
}

$result1->MoveNext();
	}

$pdf->Output();


// 428-7755

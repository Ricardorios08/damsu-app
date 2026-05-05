<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");


$hoy=date("d/m/y");
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];
class PDF2 extends FPDF
{

    var $nroPac;
//Page header
/*function Header()
{

   
$this->Image('../../../imagenes/logo_coope1.jpg',10,5,180, 'C');


$this->SetY(16);
$this->SetX(155);
 $this->SetFont('Arial','',11);
$this->Cell(50,5,$this->getFecha());  

$this->SetY(23);
$this->SetX(155);

   $this->SetFont('Arial','',11);
$this->Cell(50,5,$this->getFactura());


}

function Footer()
{
	


$this->SetY(-35);
$this->SetX(120);  

    //Select Arial italic 8
  
    $this->SetFont('Arial','I',10);
    //Print centered page number


 $this->Cell(80,6,"TOTAL GENERAL $ ".$this->getNeto(),1,0,'C');
 $this->Ln();

$this->Image('../../../imagenes/logo_abajo.jpg',10,270,180, 'C');


}
*/


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


$titulo = "ASOC. COOP. HOSPITAL CENTRAL - INVENTARIO DE MEDICAMENTOS UNICO AL 31-".$mes."-".$anio;
$pdf->AddPage();
$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



IF ($por == 1){
$pdf->Cell(10,5,'DROGA',0); 
}else{
$pdf->Cell(10,5,'NOMBRE COMERCIAL',0); 
}
 $pdf->SetX(100);
 
$pdf->Cell(100,5,'PRESENTACION',0); 
 $pdf->SetX(150);
$pdf->Cell(50,5,'CANT X CAJA',0); 
 $pdf->SetX(175);
$pdf->Cell(50,5,'LABORATORIO',0); 

$pdf->SetX(220);

$pdf->Cell(30,5,"EXISTENCIA",0); 
$pdf->Cell(20,5,"UNITARIO",0); 
$pdf->Cell(20,5,"VALOR",0); 




$pdf->ln();

 $sql1="select * from tr_stock_temp_provisorio1 where mes = '$mes' and anio = '$anio' order by drogas, laboratorio";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 
$fecha=strtoupper($result1->fields["fecha"]);
$cod_movimiento=strtoupper($result1->fields["cod_movimiento"]);
$tipo_fact=strtoupper($result1->fields["tipo_fact"]);
$nro_comprobante=strtoupper($result1->fields["nro_comprobante"]);

$precio_unitario=strtoupper($result1->fields["precio_unitario"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cuenta=strtoupper($result1->fields["cuenta"]);
$tipo_cuenta=strtoupper($result1->fields["tipo_cuenta"]);
$observaciones=strtoupper($result1->fields["observaciones"]);
$documento=strtoupper($result1->fields["documento"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);
$nro_os=strtoupper($result1->fields["nro_os"]);
$gtin=strtoupper($result1->fields["gtin"]);
$transaccion=strtoupper($result1->fields["transaccion"]);
$nro_serie=strtoupper($result1->fields["nro_serie"]);
 $drogas=strtoupper($result1->fields["drogas"]);
$grupo=strtoupper($result1->fields["grupo"]);
$laboratorio=strtoupper($result1->fields["laboratorio"]);
$anterior=strtoupper($result1->fields["anterior"]);
$cantidad=strtoupper($result1->fields["anterior"]);
$salida=strtoupper($result1->fields["salida"]);
$cod_barra=strtoupper($result1->fields["cod_mercaderia"]);

$precio_anterior =strtoupper($result1->fields["precio_anterior"]);
$precio_ingreso=strtoupper($result1->fields["precio_ingreso"]);
$precio_egreso=strtoupper($result1->fields["precio_egreso"]);

$saldo = $precio_ingreso - $precio_egreso;



  $sql="select * from laboratorios where cod_laboratorio = $laboratorio";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);

$sql="select * from stock_inventario1 where cod_mercaderia = $cod_barra";
$result = $db->Execute($sql);
$cant=strtoupper($result->fields["cantidad"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);



$suma_saldo = $suma_saldo + $saldo;
$suma_ingresos = $suma_ingresos + $precio_unitario;
$suma_egresos = $suma_egresos + $precio_egreso;



if ($laboratorio == ""){
$laboratorio = "UNICO";
}

if ($por == 1){
$nombre_comercial = $drogas;
}else
	  {

$nombre_comercial = $nombre_comercial;
	  }

$pdf->Cell(20,5,$troquel,1,0,'L'); 



$precio_uni = round($saldo / $anterior,2);

$pdf->Cell(70,5,$nombre_comercial,1,0,'L'); 
 $pdf->SetX(100);
$pdf->Cell(55,5,$presentacion,1,0,'L'); 

 $pdf->SetX(155);
$pdf->Cell(10,5,$cant_caja,1,0,'C'); 

 
 
 $pdf->SetX(165);

IF ($laboratorio == "UNICO"){
 $pdf->SetTextColor(5,0,255);
$pdf->Cell(50,5,$laboratorio,1,0,'C'); 
 $pdf->SetTextColor(0);
}
else
	  {
 $pdf->SetTextColor(0);
$pdf->Cell(50,5,$laboratorio,1,0,'C'); 
 $pdf->SetTextColor(0);
	  }

$tot = $anterior * $precio_unitario;
$sum_tot = $sum_tot + $tot;
$pdf->SetX(215);
$pdf->Cell(30,5,$anterior,1,0,'C'); 
$pdf->Cell(20,5,$precio_unitario,1,0,'R'); 
//$pdf->Cell(20,5,number_format($saldo,2),0); 
$pdf->Cell(20,5,number_format($tot,2),1,0,'R'); 

$pdf->ln();


$todo = $todo + $cantidad;

$contame = $contame + 1;









if ($contame == 33){
$pdf->AddPage();

$pdf->Cell(70,5,$titulo,0);
$pdf->ln();



IF ($por == 1){
$pdf->Cell(10,5,'DROGA',0); 
}else{
$pdf->Cell(10,5,'NOMBRE COMERCIAL',0); 
}
 $pdf->SetX(100);
 
$pdf->Cell(100,5,'PRESENTACION',0); 
 $pdf->SetX(150);
$pdf->Cell(50,5,'CANT X CAJA',0); 
 $pdf->SetX(175);
$pdf->Cell(50,5,'LABORATORIO',0); 

$pdf->SetX(220);

$pdf->Cell(30,5,"EXISTENCIA",0); 
$pdf->Cell(20,5,"UNITARIO",0); 
$pdf->Cell(20,5,"VALOR",0); 






$pdf->ln();
$contame = 0;
}

$result1->MoveNext();
	}









$pdf->SetX(100);
$pdf->Cell(50,5,"TOTAL: ",0); 
$pdf->Cell(50,5,number_format($sum_tot,2),0);  

$pdf->ln();


$pdf->SetX(100);
$pdf->Cell(50,5,"Cantidad: ",0); 
$pdf->Cell(50,5,$todo,0);  
$pdf->Output();


// 428-7755

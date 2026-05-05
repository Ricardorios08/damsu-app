<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");


$hoy=date("d/m/y");

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
$pdf->SetDisplayMode(85,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',8);


$titulo = "ASOC. COOP. HOSPITAL CENTRAL - INVENTARIO DE MEDICAMENTOS AL 27-".$mes."-".$anio;
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

$pdf->Cell(30,5,"EXISTENCIA - INV",0); 
$pdf->Cell(20,5,"UNITARIO",0); 
$pdf->Cell(20,5,"VALOR",0); 

  


$pdf->ln();

$sql1="select * from tr_stock_temp_provisorio where mes = '$mes' and anio = '$anio' order by drogas";
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
$cantidad=strtoupper($result1->fields["cantidad"]);
$salida=strtoupper($result1->fields["salida"]);
$cod_barra=strtoupper($result1->fields["cod_mercaderia"]);

$precio_anterior =strtoupper($result1->fields["precio_anterior"]);
$precio_ingreso=strtoupper($result1->fields["precio_ingreso"]);
$precio_egreso=strtoupper($result1->fields["precio_egreso"]);

$saldo = $precio_anterior + $precio_ingreso - $precio_egreso;

$suma_saldo = $suma_saldo + $saldo;
$suma_ingresos = $suma_ingresos + $precio_ingreso;
$suma_ingresos = $suma_ingresos + $precio_ingreso;
$suma_egresos = $suma_egresos + $precio_egreso;

$todo = $anterior + $cantidad - $salida;



  $sql="select * from laboratorios where cod_laboratorio = $laboratorio";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);

$sql="select * from inventario_agrupado where cod_mercaderia = $cod_barra";
$result = $db->Execute($sql);
$cantidad_agrupado=strtoupper($result->fields["cantidad"]);


  $sql="select sum(cantidad_ingresada - cantidad_salida) as existe from `tr_existencias_30022015` where cod_mercaderia = $cod_barra";
$result = $db->Execute($sql);
$existe=strtoupper($result->fields["existe"]);

  $sql="select * from drogas where cod_droga = $cod_droga";
$result = $db->Execute($sql);
$drogas=strtoupper($result->fields["droga"]);






if ($todo > 0){

if ($laboratorio == ""){
$laboratorio = "UNICO";
}

if ($por == 1){
$nombre_comercial = $nombre_comercial;
}else
	  {
$nombre_comercial = $drogas;
	  }

$pdf->Cell(20,5,$troquel,1,0,'L'); 


$precio_uni = round($saldo / $todo,2);


//$precio_uni = round($saldo,2);
	  


$pdf->Cell(70,5,$drogas,1,0,'L'); 
 $pdf->SetX(100);
$pdf->Cell(50,5,$presentacion,1,0,'L'); 
$pdf->Cell(5,5,$existe,1,0,''); 


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

$total_inv = $todo - $cantidad_agrupado;


$to_exi = $to_exi + $todo;
$to_inv = $to_inv + $total_inv;
$to_saldo = $to_saldo + $saldo;
$to_ingresos = $to_ingresos + $cantidad_agrupado;


if ($total_inv == 0){
$total_inv = "OK";
}else{

$acum = $acum + $total_inv;
}


$pdf->SetX(215);
//$pdf->Cell(30,5,$anterior,1,0,'C'); 
$pdf->Cell(10,5,$todo,1,0,'C'); 
$pdf->Cell(10,5,$cantidad_agrupado,1,0,'L'); 



if ($total_inv != "OK"){
	$pdf->SetFillColor(255,255,140);
 
$pdf->Cell(10,5,$total_inv,0,0,'C',true);


 $pdf->SetTextColor(0);
}
else
	  {
 $pdf->SetTextColor(0);
$pdf->Cell(10,5,$total_inv,1,0,'L',0); 
 $pdf->SetTextColor(0);
	  }


if ($todo != $existe){
$pdf->Cell(5,5,"*",1,0,''); 
}

 $total_precio = $todo * $precio_actualizado;


$pdf->Cell(20,5,$precio_actualizado,1,0,'R'); 
//$pdf->Cell(20,5,number_format($saldo,2),0); 
$pdf->Cell(20,5,number_format($total_precio,2),1,0,'R'); 

if ($todo != $existe){
$pdf->Cell(5,5,"*",1,0,''); 
}

$pdf->ln();
}



$todo = $todo + $cantidad;

$contame = $contame + 1;








/*
if ($contame == 32){
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

*/


$result1->MoveNext();
	}

 


$pdf->ln();
$pdf->SetX(100);
$pdf->Cell(50,5,"EXISTENCIA: ",0); 
$pdf->Cell(50,5,$to_exi,0);  

$pdf->ln();
$pdf->SetX(100);
$pdf->Cell(50,5,"INVENTARIO: ",0); 
$pdf->Cell(50,5,$to_ingresos,0);  

$pdf->ln();
$pdf->SetX(100);
$pdf->Cell(50,5,"TOTAL: ",0); 
$pdf->Cell(50,5,number_format($to_saldo,2),0);  

$pdf->ln();
$pdf->SetX(100);
$pdf->Cell(50,5,"DIF: ",0); 
$pdf->Cell(50,5,number_format($acum,2),0);  


$pdf->Output();


// 428-7755

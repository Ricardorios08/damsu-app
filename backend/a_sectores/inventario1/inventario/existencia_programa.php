<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");


$hoy=date("d/m/y");
$nro_factura= $_REQUEST['nro_factura'];

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



$pdf->AddPage();


$pdf->ln();
$pdf->ln();

$pdf->Cell(30,5,'COD BARRA',0); 
$pdf->Cell(60,5,'NOMBRE COMERCIAL',0); 
$pdf->Cell(80,5,'PRESENTACION',0);  
$pdf->SetX(140);
$pdf->Cell(60,5,'DROGA',0);  
$pdf->SetX(190);
$pdf->Cell(50,5,'LOTE',0); 
$pdf->SetX(210);
$pdf->Cell(50,5,'SERIE',0); 
$pdf->SetX(230);
$pdf->Cell(10,5,"ING. ",0); 
$pdf->Cell(10,5,"EGR. ",0); 
$pdf->Cell(50,5,'FECHA',0);
$pdf->ln();

$sql1="select * from tr_stock where cod_movimiento = 1 and fecha = '2012-10-31' order by cod_droga";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$cod_mer = $cod_merca;
$cod_dro = $cod_droga;

  $cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result1->fields["cod_mercaderia"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);
$cod_drog=strtoupper($result1->fields["cod_droga"]);
$gtin=strtoupper($result1->fields["gtin"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}

if ($cod_dro == ""){
$cod_dro = $cod_drog;
}


$sql="select * from tr_existencias where gtin = '$gtin'";
$result = $db->Execute($sql);

$cantidad_ingresada=strtoupper($result->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result->fields["cantidad_salida"]);
$lote=strtoupper($result->fields["lote"]);
$nro_serie=$result->fields["nro_serie"];
$fecha_ultimo_mov=strtoupper($result->fields["fecha_ultimo_mov"]);



if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
	$to_ingre = $to_ingre + $cantidad_ingresada;
	$to_salida = $to_salida + $cantidad_salida;

}

if ($cod_dro == $cod_drog){
	$cant_droga = $cant_droga + 1;
	$total_droga = $total_droga + 1;

}



if ($cod_mer != $cod_merca){
$pdf->SetX(230);
$pdf->Cell(10,5,$to_ingre,1); 
$pdf->Cell(10,5,$to_salida,1); 
$saldo = $to_ingre - $to_salida;

$pdf->SetX(250);
$pdf->Cell(20,5,$saldo,1); 
$todo = $todo + $canti;

$total_saldo = $total_saldo + $saldo;
$total_ingresado = $total_ingresado + $to_ingre;
$total_salida = $total_salida + $to_salida;

$pdf->ln();
$pdf->ln();
$contame = $contame + 3;
$canti = 1;
$to_ingre = "1";
$to_salida = "1";
$saldo = 1;
}


if ($cod_dro != $cod_drog){

$pdf->SetX(250);

$pdf->Cell(20,5,"Cant Dro.: ".$cant_droga,1); 
$pdf->ln();
$contame = $contame + 1;
$cant_droga = 1;
$total_droga = $total_droga + 1;
}




$dia1 = substr($fecha_ultimo_mov,8,2);
$mes1 = substr($fecha_ultimo_mov,5,2);
$anio1 = substr($fecha_ultimo_mov,0,4);

$fecha_ultimo_mov = $dia1."-".$mes1."-".$anio1;

$sql="select * from monodrogas where cod_barra = $cod_mercaderia ";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$sql="select * from drogas where cod_droga = $cod_droga ";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);


$vto_lote = $mes_lote." - ".$anio_lote;



$cantidad_existente = $cantidad_ingresada - $cantidad_salida;
	
$mes = $mes_lote;
$anio = $anio_lote;

if ($anio == ""){
	$anio = $anio_actual;
}
else
		  {
$estado = "-";
		  }



if (($anio != "00") && ($mes != "00") or ($anio != "00") or ($mes != "00") ){

if ($anio < $anio_actual){
$estado = "VENCIDO";
}
else{

if ($anio > $anio_actual){
$estado = "-";}
else{

if ($mes < $mes_actual){
$estado = "VENCIDO";
}
else{
	$estado ="-";
}
}
}
}




$cont = $cont + 1;



$pdf->Cell(30,5,$cod_mercaderia,0); 



$pdf->Cell(60,5,$nombre_comercial,0); 
$pdf->Cell(80,5,$presentacion,0);  
$pdf->SetX(140);
$pdf->Cell(60,5,$droga,0);  

$pdf->SetX(190);
$pdf->Cell(50,5,$lote,0); 
$pdf->SetX(210);
$pdf->Cell(50,5,$nro_serie,0); 
$pdf->SetX(230);

$pdf->Cell(10,5,$cantidad_ingresada,0); 
$pdf->Cell(10,5,$cantidad_salida,0); 
$pdf->Cell(50,5,$fecha_ultimo_mov,0);

$pdf->ln();



/*
//IF ($tipo_factura != "PO"){
		$pdf->SetX(16);
$pdf->Cell(70,5,"Comercial: ".$nombre_comercial,0); 

		$pdf->SetX(100);
$pdf->Cell(50,5,"GTIN: ".$gtin,0); 
$pdf->ln();
//}
*/

$contame = $contame + 1;

if ($contame == 29){
$pdf->AddPage();
$pdf->ln();
$pdf->ln();
$pdf->Cell(30,5,'COD BARRA',0); 
$pdf->Cell(60,5,'NOMBRE COMERCIAL',0); 
$pdf->Cell(80,5,'PRESENTACION',0);  
$pdf->SetX(140);
$pdf->Cell(60,5,'DROGA',0);  
$pdf->SetX(190);
$pdf->Cell(50,5,'LOTE',0); 
$pdf->SetX(210);
$pdf->Cell(50,5,'SERIE',0); 
$pdf->SetX(230);
$pdf->Cell(10,5,"ING. ",0); 
$pdf->Cell(10,5,"EGR. ",0); 
$pdf->Cell(50,5,'FECHA',0);
$pdf->ln();
$contame = 0;
}

$result1->MoveNext();
	}
$pdf->ln();
$pdf->SetX(230);
$pdf->Cell(10,5,$to_ingre,1); 
$pdf->Cell(10,5,$to_salida,1); 
$saldo = $to_ingre - $to_salida;

$pdf->SetX(250);
$pdf->Cell(20,5,$saldo,1); 
$todo = $todo + $canti;
$pdf->ln();
$pdf->SetX(250);

$pdf->Cell(20,5,"Cant Dro.: ".$cant_droga,1); 
$pdf->ln();

$total_ingresado = $total_ingresado + $to_ingre;
$total_salida = $total_salida + $to_salida;
$total_saldo = $total_saldo + $saldo;

$sql = "SELECT count(cantidad_salida) as total_salida FROM `tr_existencias` WHERE `cantidad_salida` = 1";
$result = $db->Execute($sql);

$total_salida=$result->fields["total_salida"];

$total_saldo = $total_ingresado - $total_salida;


$pdf->AddPage();
$pdf->ln();
$pdf->ln();

$pdf->SetX(200);
$pdf->Cell(30,5,"INGRESOS",0); 
$pdf->Cell(30,5,"EGRESOS",0); 
$pdf->Cell(30,5,'SALDO',0);
$pdf->ln();
$pdf->SetX(200);
$pdf->Cell(30,5,$total_ingresado,0); 
$pdf->Cell(30,5,$total_salida,0); 
$pdf->Cell(30,5,$total_saldo,0);

 

  
 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;



$pdf->Output();


// 428-7755

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


$titulo = "LISTADO DE MEDICAMENTOS VENCIDOS";
$pdf->AddPage();
$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 
$pdf->Cell(60,5,"NOMBRE COMERCIAL",1,0,'L'); 
$pdf->Cell(60,5,"PRESENTACION",1,0,'L'); 
$pdf->Cell(80,5,"GTIN",1,0,'L'); 


$pdf->Cell(30,5,"LOTE" ,1,0,'C'); 
$pdf->Cell(10,5,"MES" ,1,0,'C'); 
$pdf->Cell(10,5,"AÑO",1,0,'L'); 



  
$anio_actual = date("y");


$pdf->ln();

 $sql1="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and anio_lote < $anio_actual order by anio_lote, mes_lote";
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
$gtin=strtoupper($result1->fields["gtin"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$lote=strtoupper($result1->fields["lote"]);
 
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 

 


  

$pdf->Cell(30,5,$cod_barra,1,0,'L'); 
$pdf->Cell(60,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(60,5,$presentacion,1,0,'L'); 
$pdf->Cell(80,5,$gtin,1,0,'L'); 
 

$pdf->Cell(30,5,$lote,1,0,'C');
$pdf->Cell(10,5,$mes_lote,1,0,'C'); 
$pdf->Cell(10,5,$anio_lote,1,0,'L'); 


$pdf->ln();










$result1->MoveNext();
	}

 
 $pdf->ln();



$titulo = "LISTADO DE MEDICAMENTOS PROXIMOS A VENCER EN ESTE MES";

$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 
$pdf->Cell(60,5,"NOMBRE COMERCIAL",1,0,'L'); 
$pdf->Cell(60,5,"PRESENTACION",1,0,'L'); 
$pdf->Cell(80,5,"GTIN",1,0,'L'); 



$pdf->Cell(30,5,"LOTE" ,1,0,'C'); 
$pdf->Cell(10,5,"MES" ,1,0,'C'); 
$pdf->Cell(10,5,"AÑO",1,0,'L'); 


  
$anio_actual = date("y");
$mes_siguiente= date("m");


$pdf->ln();

 $sql1="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and anio_lote = $anio_actual and mes_lote = $mes_siguiente order by anio_lote, mes_lote";
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
$gtin=strtoupper($result1->fields["gtin"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$lote=strtoupper($result1->fields["lote"]);
 
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 

 


  

$pdf->Cell(30,5,$cod_barra,1,0,'L'); 
$pdf->Cell(60,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(60,5,$presentacion,1,0,'L'); 
$pdf->Cell(80,5,$gtin,1,0,'L'); 
 

$pdf->Cell(30,5,$lote,1,0,'C');
$pdf->Cell(10,5,$mes_lote,1,0,'C'); 
$pdf->Cell(10,5,$anio_lote,1,0,'L'); 


$pdf->ln();










$result1->MoveNext();
	}

 

$pdf->ln();

 
$titulo = "LISTADO DE MEDICAMENTOS A VENCER EL MES QUE VIENE";

$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 
$pdf->Cell(60,5,"NOMBRE COMERCIAL",1,0,'L'); 
$pdf->Cell(60,5,"PRESENTACION",1,0,'L'); 
$pdf->Cell(80,5,"GTIN",1,0,'L'); 



 

$pdf->Cell(30,5,"LOTE" ,1,0,'C'); 
$pdf->Cell(10,5,"MES" ,1,0,'C'); 
$pdf->Cell(10,5,"AÑO",1,0,'L'); 


  
$anio_actual = date("y");
$mes_siguiente= date("m")+1;


$pdf->ln();

 $sql1="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and anio_lote = $anio_actual and mes_lote = $mes_siguiente order by anio_lote, mes_lote";
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
$gtin=strtoupper($result1->fields["gtin"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$lote=strtoupper($result1->fields["lote"]);
 
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 

 


  

$pdf->Cell(30,5,$cod_barra,1,0,'L'); 
$pdf->Cell(60,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(60,5,$presentacion,1,0,'L'); 
$pdf->Cell(80,5,$gtin,1,0,'L'); 
 

$pdf->Cell(30,5,$lote,1,0,'C');
$pdf->Cell(10,5,$mes_lote,1,0,'C'); 
$pdf->Cell(10,5,$anio_lote,1,0,'L'); 


$pdf->ln();










$result1->MoveNext();
	}


$pdf->ln();

$pdf->AddPage();
 
$titulo = "LISTADO DE MEDICAMENTOS A VENCER EL MES QUE VIENE";

$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 
$pdf->Cell(60,5,"NOMBRE COMERCIAL",1,0,'L'); 
$pdf->Cell(60,5,"PRESENTACION",1,0,'L'); 
$pdf->Cell(80,5,"GTIN",1,0,'L'); 



 

$pdf->Cell(30,5,"LOTE" ,1,0,'C'); 
$pdf->Cell(10,5,"MES" ,1,0,'C'); 
$pdf->Cell(10,5,"AÑO",1,0,'L'); 


  
$anio_actual = date("y");
$mes_siguiente= date("m")+2;


$pdf->ln();


 $sql1="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and anio_lote = $anio_actual and mes_lote = $mes_siguiente order by anio_lote, mes_lote";
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
$gtin=strtoupper($result1->fields["gtin"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$lote=strtoupper($result1->fields["lote"]);
 
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 

 


  

$pdf->Cell(30,5,$cod_barra,1,0,'L'); 
$pdf->Cell(60,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(60,5,$presentacion,1,0,'L'); 
$pdf->Cell(80,5,$gtin,1,0,'L'); 
 

$pdf->Cell(30,5,$lote,1,0,'C');
$pdf->Cell(10,5,$mes_lote,1,0,'C'); 
$pdf->Cell(10,5,$anio_lote,1,0,'L'); 


$pdf->ln();










$result1->MoveNext();
	}


$pdf->AddPage();
 
$titulo = "LISTADO DE MEDICAMENTOS A VENCER EL MES QUE VIENE";

$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 
$pdf->Cell(60,5,"NOMBRE COMERCIAL",1,0,'L'); 
$pdf->Cell(60,5,"PRESENTACION",1,0,'L'); 
$pdf->Cell(80,5,"GTIN",1,0,'L'); 



 

$pdf->Cell(30,5,"LOTE" ,1,0,'C'); 
$pdf->Cell(10,5,"MES" ,1,0,'C'); 
$pdf->Cell(10,5,"AÑO",1,0,'L'); 


  
$anio_actual = date("y");
$mes_siguiente= date("m")+3;


$pdf->ln();


 $sql1="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and anio_lote = $anio_actual and mes_lote = $mes_siguiente order by anio_lote, mes_lote";
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
$gtin=strtoupper($result1->fields["gtin"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$lote=strtoupper($result1->fields["lote"]);
 
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 

 


  

$pdf->Cell(30,5,$cod_barra,1,0,'L'); 
$pdf->Cell(60,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(60,5,$presentacion,1,0,'L'); 
$pdf->Cell(80,5,$gtin,1,0,'L'); 
 

$pdf->Cell(30,5,$lote,1,0,'C');
$pdf->Cell(10,5,$mes_lote,1,0,'C'); 
$pdf->Cell(10,5,$anio_lote,1,0,'L'); 


$pdf->ln();










$result1->MoveNext();
	}


$pdf->AddPage();
 
$titulo = "LISTADO DE MEDICAMENTOS A VENCER EL MES QUE VIENE";

$pdf->Cell(70,5,$titulo,0);

$pdf->ln();



$pdf->Cell(30,5,"COD BARRA",1,0,'L'); 
$pdf->Cell(60,5,"NOMBRE COMERCIAL",1,0,'L'); 
$pdf->Cell(60,5,"PRESENTACION",1,0,'L'); 
$pdf->Cell(80,5,"GTIN",1,0,'L'); 



 

$pdf->Cell(30,5,"LOTE" ,1,0,'C'); 
$pdf->Cell(10,5,"MES" ,1,0,'C'); 
$pdf->Cell(10,5,"AÑO",1,0,'L'); 


  
$anio_actual = date("y");
$mes_siguiente= date("m")+4;


$pdf->ln();


 $sql1="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and anio_lote = $anio_actual and mes_lote = $mes_siguiente order by anio_lote, mes_lote";
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
$gtin=strtoupper($result1->fields["gtin"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$lote=strtoupper($result1->fields["lote"]);
 
$sql="select * from monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
 

 


  

$pdf->Cell(30,5,$cod_barra,1,0,'L'); 
$pdf->Cell(60,5,$nombre_comercial,1,0,'L'); 
$pdf->Cell(60,5,$presentacion,1,0,'L'); 
$pdf->Cell(80,5,$gtin,1,0,'L'); 
 

$pdf->Cell(30,5,$lote,1,0,'C');
$pdf->Cell(10,5,$mes_lote,1,0,'C'); 
$pdf->Cell(10,5,$anio_lote,1,0,'L'); 


$pdf->ln();










$result1->MoveNext();
	}



$pdf->Output();


// 428-7755

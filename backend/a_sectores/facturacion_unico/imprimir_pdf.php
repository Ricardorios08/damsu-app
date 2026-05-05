<?php 

require('../../drivers/fpdf/fpdf.php');
include ("../../conexiones/config_pro.php");


$hoy=date("d/m/y");
$nro_factura= $_REQUEST['nro_factura'];

class PDF2 extends FPDF
{

    var $nroPac;
//Page header
function Header()
{

   
   
$this->Image('../../imagenes/logo_coope_nc.jpg',10,5,180, 'C');


$this->SetY(16);
$this->SetX(155);
 $this->SetFont('Arial','',11);
$this->Cell(50,5,$this->getFecha());  
$this->SetX(180);
  $this->SetFont('Arial','',11);

   
	$this->Cell(0,5,'Pag '.$this->PageNo().'/{nb}',0,0,'C');


$this->SetY(23);
$this->SetX(155);

   $this->SetFont('Arial','',13);
$this->Cell(50,5,$this->getFactura());


}

function Footer()
{
	


$this->SetY(-35);
$this->SetX(120);  

    //Select Arial italic 8
  
    $this->SetFont('Arial','I',10);
    //Print centered page number


 //this->Cell(80,6,"TOTAL GENERAL $ ".$this->getNeto(),1,0,'C');
 //$this->Ln();

$this->Image('../../imagenes/logo_abajo.jpg',10,270,180, 'C');


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








 $sql = "SELECT * FROM compras_encabezado where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$fecha=$result->fields["fecha"];
$tipo=$result->fields["tipo"];

$observaciones=$result->fields["observaciones"];
$nro_comprobante_afectado=$result->fields["nro_comprobante_afectado"];


switch ($tipo){

case "1":{$tipo = "Fraccionamiento";BREAK;}
case "2":{$tipo = "Cambio Tratamiento";BREAK;}
case "3":{$tipo = "Fallecimiento";BREAK;}
case "4":{$tipo = "Donación";BREAK;}
case "5":{$tipo = "No Corresponde";BREAK;}
case "6":{$tipo = "Devolución";BREAK;}
case "7":{$tipo = "Finalizó Tratamiento";BREAK;}
case "8":{$tipo = "No corresponde Paciente";BREAK;}
case "9":{$tipo = "Diferencia de Precios";BREAK;}
}
 
        
$nro_fact = str_pad($nro_factura, 10, "0", STR_PAD_LEFT);

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $dia."/".$mes."/".$anio;

 

 $pdf->setFecha($fecha);
$pdf->setFactura($nro_fact);


 $nro_receta=$result->fields["nro_receta"];
 $documento=$result->fields["documento"];
 $tipo_doc=$result->fields["tipo_doc"];
 $plan_completo=$result->fields["plan_completo"];
 $operador=$result->fields["operador"];
 $denominacion=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $neto=$result->fields["total"];

$pdf->setNeto($neto);


$pdf->AddPage();



$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

if ($nro_os == 1){
$nombre_os="";
}


$sql7="select * from pacientes where documento = $documento and tipo_doc = '$tipo_doc'";
$result7 = $db->Execute($sql7);

$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;
$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero
$nombre_completo = $apellido.", ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc' order by nro_ficha desc";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 
$nro_ficha=strtoupper($result->fields["nro_ficha"]); 

$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

if ($tipo == 0){
$tipo = "";
}

$observaciones = $tipo."  ".$observaciones;

$pdf->ln();
$pdf->ln();
$pdf->ln();


$pdf->Cell(18,5,"Paciente: ",0); 
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(50,5,$nombre_completo,0); 
$pdf->SetFont('ARIAL','',8);

$pdf->SetFont('ARIAL','B',12);
$pdf->SetX(140);
$pdf->Cell(50,5,$tipo_factura1,0); 
$pdf->SetFont('ARIAL','',8);

$pdf->ln();
$pdf->Cell(18,5,"Documento: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(50,5,$documento,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->SetX(80);
$pdf->Cell(50,5,"Registro de Tumor: ".$nro_ficha,0); 
$pdf->ln();

$pdf->Cell(15.5,5,"Domicilio: ",0); 
$pdf->Cell(50,5,$direccion,0); 


$pdf->SetFont('ARIAL','B',12);
$pdf->SetX(120);

$pdf->Cell(50,5,$nombre_os,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();
$pdf->Cell(15.5,5,"Motivo: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(150,5,$observaciones,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();
$pdf->ln();
$pdf->SetX(14);
$pdf->Cell(12,5,"CANT",0); 
$pdf->Cell(60,5,"DROGA",0); 
$pdf->SetX(80); 
$pdf->Cell(100,5,"PRESENTACION",0); 

$pdf->SetX(130);
$pdf->Cell(50,5,"LOTE",0); 
$pdf->SetX(150);
$pdf->Cell(50,5,"VTO",0); 
$pdf->SetX(165);
$pdf->Cell(50,5,"UNITARIO",0); 
$pdf->SetX(190);
$pdf->Cell(50,5,"TOTAL",0,1,'L'); 



 $sql3 = "SELECT * FROM compras_detalle  WHERE  nro_factura = $nro_factura order by cod_mercaderia, cod_detalle desc";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;

 $cod_mer = $cod_mercaderia;



 $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["cantidad"]);



 if ($cod_mer == ""){
$cod_mer = $cod_mercaderia;
}


if ($cod_mer == $cod_mercaderia){
	$canti = $cantidad;
}

if ($cod_mer != $cod_mercaderia){

 
   $sql4 = "SELECT sum(cantidad) as cantid FROM compras_detalle  WHERE  nro_factura = $nro_factura and cod_mercaderia = $cod_mer";
$result4= $db->Execute($sql4);
$canti=strtoupper($result4->fields["cantid"]);

$pdf->SetX(190);
$pdf->Cell(50,5,"Tot: ".$canti,0); 
$pdf->ln();
$pdf->ln();
 
$canti = "";

}



$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];


$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);

 $sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);

//echo $sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' and tipo = 1";
  $sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga'";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga." ".$presentacion;

$cont = $cont + 1;

$tot = NUMBER_FORMAT($cantidad * $precio_unitario,2);
$tot1 =  $cantidad * $precio_unitario;
$tot_transporte = $tot_transporte + $tot1;
$tot = str_pad($tot, 12, " ", STR_PAD_LEFT); 

$pdf->SetX(14);

$pdf->Cell(12,5,$cantidad,0); 
$pdf->Cell(60,5,$droga,0); 
$pdf->SetX(80); 
$pdf->Cell(100,5,$presentacion,0); 

$pdf->SetX(130);
$pdf->Cell(50,5,$lote1,0); 
$pdf->SetX(150);
$pdf->Cell(50,5,$vto_lote,0); 
$pdf->SetX(165);
$pdf->Cell(50,5,$precio_unitario,0); 
$pdf->SetX(185);
$pdf->Cell(50,5,"$". $tot,0,1,'L'); 

//$pdf->Cell(50,5,$tot,0,R); 
$pdf->ln();



$contame = $contame + 1;


if ($contame == 12){

 // $tot_transporte = $tot_transporte + $tot1;

$pdf->SetY(260);
$pdf->SetX(120);
 IF ($tot_transporte > 0){$tot_transporte = number_format($tot_transporte,2);}
$pdf->Cell(80,5,"Transporte: $ ".$tot_transporte,1,0,'R'); 


$pdf->AddPage();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(50,5,"Paciente: ".$nombre_completo,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();
$pdf->Cell(50,5,"Domicilio: ".$direccion,0); 
$pdf->ln();
$pdf->Cell(50,5,"Documento: ".$documento,0); 
$pdf->SetX(80);
$pdf->Cell(50,5,"Registro de Tumor: ".$nro_ficha,0); 
$pdf->ln();

$pdf->SetFont('ARIAL','B',12);
$pdf->SetX(120);

$pdf->Cell(50,5,$nombre_os,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();
$pdf->Image('../../imagenes/linea.jpg',10,60,180, 'C');

$pdf->ln();
$pdf->SetFont('ARIAL','I',8);
$pdf->SetX(120);
$pdf->Cell(80,5,"Transporte: $ ".$tot_transporte,1,0,'R'); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();

$pdf->ln();


$pdf->Cell(50,5,"CANT    DROGA                 PRESENTACION                                                                             LOTE        VTO               UNITARIO             TOTAL ",0); 
$pdf->ln();

$contame = 1;
}




	 $result3->MoveNext();
				}



 //$pdf->Ln();

 $sql4 = "SELECT sum(cantidad) as cantid FROM compras_detalle  WHERE  nro_factura = $nro_factura and cod_mercaderia = $cod_mercaderia";
$result4= $db->Execute($sql4);
$canti=strtoupper($result4->fields["cantid"]);

$pdf->SetX(190);
$pdf->Cell(50,5,"Tot: ".$canti,0); 
$pdf->ln();
$pdf->ln();
 
$canti = "";

 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;

$pdf->SetY(260);
$pdf->SetX(120);
$pdf->Cell(80,6,"TOTAL GENERAL $ ".$neto,1,0,'R');

$pdf->Output();


// 428-7755

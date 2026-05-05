<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");

$nro_factura= $_REQUEST['nro_factura'];




$hoy=date("d/m/y");


class PDF2 extends FPDF
{

function TextWithDirection($x, $y, $txt, $direction='R')
{
    if ($direction=='R')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',1,0,0,1,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    elseif ($direction=='L')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',-1,0,0,-1,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    elseif ($direction=='U')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',0,1,-1,0,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    elseif ($direction=='D')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',0,-1,1,0,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    else
        $s=sprintf('BT %.2F %.2F Td (%s) Tj ET',$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}

function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
{
    $font_angle+=90+$txt_angle;
    $txt_angle*=M_PI/180;
    $font_angle*=M_PI/180;

    $txt_dx=cos($txt_angle);
    $txt_dy=sin($txt_angle);
    $font_dx=cos($font_angle);
    $font_dy=sin($font_angle);

    $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}


    var $nroPac;
//Page header
function Header()
{

   
$this->Image('../../../imagenes/logo_coope2.jpg',10,5,180, 'C');

$this->SetY(9);
$this->SetX(160);
 $this->SetFont('Arial','B',13);
$this->Cell(50,5,$this->getTipo());  
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


// $this->Cell(80,6,"TOTAL GENERAL $ ".$this->getNeto(),1,0,'C');
// $this->Ln();

$this->Image('../../../imagenes/logo_abajo.jpg',10,270,180, 'C');


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

function setTipo($nrotip) {
    $this->nroTip = $nrotip;
}
function getTipo() {
    return $this->nroTip;
}


function setNetos($nronet) {
    $this->nroNets = $nronet;
}
function getNetos() {
    return $this->nroNets;
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








  $sql = "SELECT * FROM `tr_ventas_encabezado` where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$fecha=$result->fields["fecha"];
 
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
 $neto=$result->fields["neto"];
  $tipo_factura=$result->fields["tipo_factura"];
    $observaciones=$result->fields["observaciones"];
 $cod_movimiento=$result->fields["cod_movimiento"];



if ($documento < 1000){
$tipo_comprobante = "AJUSTE";
}ELSE{
$tipo_comprobante = "ENTREGA";
}

IF ($cod_movimiento == 3){
$tipo_comprobante = "DEVOLUCION PO";
}


$pdf->setTipo($tipo_comprobante);

$pdf->setNeto($neto);


$pdf->AddPage();

IF ($cod_movimiento == 6){

$pdf->SetX(50);
$pdf->SetFont('ARIAL','B',50);
  

$pdf->SetY(100);
$pdf->SetFont('Arial','',40);
$pdf->TextWithRotation(80,100,'ANULADA',30,-30);
 
$pdf->Output();
 exit;
}

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
$cod_fuente=strtoupper($result->fields["cod_fuente"]); 

$sql="select * from fuentes where nro_fuente = '$cod_fuente'";
$result = $db->Execute($sql);
$fuente=strtoupper($result->fields["nombre_fuente"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

if ($tipo_fact == "002"){
$tipo_factura1 = "PO";
}

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(18,5,"Paciente: ",0); 
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(50,5,$nombre_completo,0); 
$pdf->SetFont('ARIAL','',8);

$pdf->SetFont('ARIAL','B',12);

$pdf->SetFont('ARIAL','',8);

$pdf->SetFont('ARIAL','B',10);
$pdf->SetX(130);
$pdf->Cell(50,5,'',0); 
$pdf->SetFont('ARIAL','',8);



$pdf->ln();
$pdf->Cell(18,5,"Documento: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(50,5,$documento,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->SetX(80);
$pdf->Cell(50,5,"Registro de Tumor: ".$nro_ficha,0); 
$pdf->SetX(145);
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(50,5,$tipo_factura1,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();

$pdf->Cell(15.5,5,"Domicilio: ",0); 
$pdf->Cell(50,5,$direccion,0); 


$pdf->SetFont('ARIAL','B',12);
$pdf->SetX(120);

$pdf->Cell(50,5,$nombre_os,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();
$pdf->Cell(15.5,5,"Nota: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(150,5,$observaciones,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();

$pdf->Image('../../../imagenes/linea.jpg',10,60,180, 'C');

$pdf->ln();



$pdf->Cell(50,5,"CANT    DROGA                 PRESENTACION                                                                             LOTE              VTO                    UNIT      TOTAL ",0); 
$pdf->ln();

if (($neto == 0) or ($neto == 0.00)){
$leyenda = "Factura sin importe. Error de actualización. Conectarse con sistemas";
//include ("../../../alertas/campo_informacion.php");
//exit;

$pdf->ln();

$pdf->SetX(50);
$pdf->SetFont('ARIAL','B',50);
  

$pdf->SetY(100);
$pdf->SetFont('Arial','',40);
$pdf->TextWithRotation(80,100,'ANULADA',30,-30);


}




 $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  nro_factura = $nro_factura order by  cod_detalle desc";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}




if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}

if ($cod_mer != $cod_merca){

if ($tipo_fact == '001'){
$pdf->SetX(190);
$pdf->Cell(50,5,"Tot: ".$canti,0); 
$pdf->ln();
$pdf->ln();
}
$canti = 1;

}

$cantidad=strtoupper($result3->fields["cantidad"]);
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
$laboratorio=strtoupper($result->fields["laboratorio"]);


if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);
} 


$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;

$cont = $cont + 1;

$precio_unitario = str_pad($precio_unitario, 12, " ", STR_PAD_LEFT); 

$tot = NUMBER_FORMAT($cantidad * $precio_unitario,2);
$tot1 =  $cantidad * $precio_unitario;
$tot_transporte = $tot_transporte + $tot1;
$sub_total = $sub_total + $tot1;
$tot = str_pad($tot, 12, " ", STR_PAD_LEFT); 

$pdf->Cell(5,5,$cantidad,0); 
$pdf->Cell(100,5,$nombre_remedio,0); 
 IF ($tipo_fact == "002"){

$pdf->Cell(50,5,$laboratorio,0); 
}
$pdf->SetX(130);
$pdf->Cell(50,5,$lote1,0); 
$pdf->SetX(150);
$pdf->Cell(50,5,$vto_lote,0); 


$pdf->SetX(160);
$pdf->Cell(50,5,$precio_unitario,0); 

$to = $precio_unitario * $cantidad;

$pdf->SetX(180);
$pdf->Cell(50,5,$to,0); 
$pdf->ln();


$subtotal = $subtotal + $to;

IF ($tipo_fact == "001"){
	$pdf->SetX(12);
$pdf->Cell(45,5,$nombre_comercial,0); 
$pdf->Cell(100,5,"GTIN: ".$gtin,0); 
$pdf->Cell(70,5,$laboratorio,0); 
$pdf->ln();
$contame = $contame + 1;
}else
	 {
$contame = $contame + 1;
	 }




//$contame = $contame + 1;

if ($contame == 12){



$pdf->SetY(260);
$pdf->SetX(120);
$tot_transporte = $sub_total;
 IF ($tot_transporte > 0){$tot_transporte = number_format($tot_transporte,2);}

$pdf->Cell(80,5,"Sub-Total: $ ".number_format($sub_total,2),1,0,'R'); 

$pdf->AddPage();
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
$pdf->Cell(15.5,5,"Nota: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(150,5,$observaciones,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();

$pdf->Image('../../../imagenes/linea.jpg',10,60,180, 'C');

$pdf->ln();
$pdf->SetFont('ARIAL','I',8);
$pdf->SetX(120);
$pdf->Cell(80,5,"Transporte: $ ".$tot_transporte,1,0,'R'); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();

$pdf->ln();

$pdf->Cell(50,5,"CANT    DROGA                 PRESENTACION                                                                             LOTE              VTO                    UNIT      TOTAL ",0); 
$pdf->ln();

$contame = 1;
}


	 $result3->MoveNext();

				}
if ($tipo_fact == '001'){
$pdf->SetX(190);
$pdf->Cell(50,5,"Tot: ".$canti,0); 
$pdf->ln();
}

 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;


$pdf->SetY(260);
$pdf->SetX(120);
$pdf->Cell(80,6,"TOTAL GENERAL $ ".number_format($neto,2),1,0,'R');

$pdf->Output();


// 428-7755

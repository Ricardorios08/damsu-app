<?php 
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
ini_set('display_errors', 0);

if(!defined('FPDF_FONTPATH')) {
    define('FPDF_FONTPATH', realpath(__DIR__ . '/../../utils/fpdf186/font') . '/');
}

require('../../utils/fpdf186/fpdf.php');
include ("../../conexiones/config_pro.php");

$nro_factura = $_REQUEST['nro_factura'];
$hoy = date("d/m/y");

class PDF2 extends FPDF
{
    function TextWithDirection($x, $y, $txt, $direction='R')
    {
        if ($direction=='R')
            $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',1,0,0,1,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        else
            $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',0,1,-1,0,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        $this->_out($s);
    }

    function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle += 90 + $txt_angle;
        $txt_angle *= M_PI/180;
        $font_angle *= M_PI/180;

        $txt_dx = cos($txt_angle);
        $txt_dy = sin($txt_angle);
        $font_dx = cos($font_angle);
        $font_dy = sin($font_angle);

        $s = sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', $txt_dx, $txt_dy, $font_dx, $font_dy, $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
        $this->_out($s);
    }

    function Header()
    {
        $this->Image('../../imagenes/logo_coope2.jpg',10,5,180, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->Image('../../imagenes/logo_abajo.jpg',10,270,180, 'C');
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Obtener datos del encabezado
$sql = "SELECT * FROM tr_ventas_encabezado WHERE nro_factura = $nro_factura";
$result = $db->Execute($sql);
$documento = $result->fields["documento"];
$neto = $result->fields["neto"];
$fecha = $result->fields["fecha"];
$observaciones = $result->fields["observaciones"];
$nombre_os = $result->fields["nombre_os"];
$enviar_a = $result->fields["enviar_a"];
$nombre_prestador = $result->fields["nombre_prestador"];

// Datos del paciente
$sql = "SELECT * FROM pacientes WHERE documento = '$documento'";
$result = $db->Execute($sql);
$calle = $result->fields["calle"];
$puerta = $result->fields["puerta"];
$localidad = $result->fields["localidad"];
$apellido = $result->fields["apellido"];
$nombre = $result->fields["nombre"];
$direccion = $calle." ".$puerta." - ".$localidad;
$nombre_completo = $apellido.", ".$nombre;

$hoja = "A4";
$pdf = new PDF2('P','mm',$hoja);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetDisplayMode('real','default'); 
$pdf->SetFont('Arial','',8);

// Titulo Paciente
$pdf->SetY(35);
$pdf->Cell(18,5,"Paciente: ",0); 
$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,5,utf8_decode($nombre_completo),0); 
$pdf->SetFont('Arial','',8);

$pdf->SetX(140);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,"FECHA: ".$fecha,0);
$pdf->SetFont('Arial','',8);

$pdf->Ln();
$pdf->Cell(18,5,"Documento: ",0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,$documento,0); 
$pdf->SetFont('Arial','',8);

$pdf->Ln();
$pdf->Cell(18,5,"Domicilio: ",0); 
$pdf->Cell(100,5,utf8_decode($direccion),0); 

$pdf->Ln();
$pdf->Cell(18,5,"Obra Social: ",0); 
$pdf->SetFont('Arial','B',9);
$pdf->Cell(100,5,utf8_decode($nombre_os),0); 
$pdf->SetFont('Arial','',8);

$pdf->Ln();
$pdf->Cell(18,5,"Nota: ",0); 
$pdf->Cell(150,5,utf8_decode($observaciones),0); 

$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,"CANT",0);
$pdf->Cell(100,5,"DROGA / PRESENTACION",0);
$pdf->Cell(30,5,"LOTE / VTO",0);
$pdf->Cell(25,5,"UNITARIO",0);
$pdf->Cell(25,5,"TOTAL",0);
$pdf->Ln();
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(2);
$pdf->SetFont('Arial','',8);

// Detalles
$sql3 = "SELECT * FROM `tr_ventas_detalle` WHERE nro_factura = $nro_factura ORDER BY cod_detalle ASC";
$result3 = $db->Execute($sql3);

while (!$result3->EOF) {
    $cantidad = $result3->fields["cantidad"];
    $descripcion = $result3->fields["descripcion"];
    $precio_unitario = $result3->fields["precio_unitario"];
    $gtin = $result3->fields["gtin"];
    $lote = $result3->fields["lote"];
    $vto = $result3->fields["mes_lote"]."/".$result3->fields["anio_lote"];
    $total_item = $cantidad * $precio_unitario;

    $pdf->Cell(10,5,$cantidad,0);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(100,5,utf8_decode($descripcion),0);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,5,$lote." (".$vto.")",0);
    $pdf->Cell(25,5,"$ ".number_format($precio_unitario,2),0,0,'R');
    $pdf->Cell(25,5,"$ ".number_format($total_item,2),0,0,'R');
    $pdf->Ln();
    
    if($gtin) {
        $pdf->SetX(20);
        $pdf->SetFont('Arial','I',7);
        $pdf->Cell(100,4,"GTIN: ".$gtin,0);
        $pdf->Ln();
        $pdf->SetFont('Arial','',8);
    }

    $result3->MoveNext();
}

$pdf->SetY(260);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,"TOTAL GENERAL $ ".number_format($neto,2),1,0,'R');

$pdf->Output();
?>

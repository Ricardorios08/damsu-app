<?php 
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
ini_set('display_errors', 0);

// Manejo de CORS centralizado
require_once __DIR__ . '/../cors_header.inc.php';

if(!defined('FPDF_FONTPATH')) {
    $fontPath = realpath(__DIR__ . '/../../utils/fpdf186/font');
    if (!$fontPath) {
        $fontPath = '../../utils/fpdf186/font'; // Fallback
    }
    define('FPDF_FONTPATH', $fontPath . '/');
}

require_once('../../utils/fpdf186/fpdf.php');
include_once("../../conexiones/config_pro.php");

$nro_factura = isset($_REQUEST['nro_factura']) ? $_REQUEST['nro_factura'] : '';
if (empty($nro_factura)) {
    die("Error: nro_factura is required");
}


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
        // Left text
        $this->SetFont('Arial', '', 7);
        $this->SetTextColor(100);
        $this->Text(15, 12, utf8_decode("TRAZABILIDAD"));
        $this->Text(15, 15, utf8_decode("DE MEDICAMENTOS"));

        // Main Center Logo
        $this->Image('../../imagenes/header_logo_solo.jpg', 50, 8, 80);
        
        // Right side info
        $this->SetTextColor(0);

        $this->SetFont('Arial', '', 9);
        $this->Text(140, 12, "COMPROBANTE");
        $this->SetFont('Arial', 'B', 14);
        $this->Text(170, 12, "ENTREGA");
        
        $this->SetFont('Arial', '', 10);
        $this->Text(145, 22, "FECHA:");
        $this->Text(170, 22, $GLOBALS['fecha_vta']);
        $this->Text(145, 30, "N" . chr(176) . ":");
        $this->Text(170, 30, str_pad($GLOBALS['nro_factura_vta'], 8, '0', STR_PAD_LEFT));

        $this->SetY(45);
        $this->Line(10, 40, 200, 40);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->Image('../../imagenes/logo_abajo.jpg', 15, 275, 180);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pag ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
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
$enviar_a = isset($result->fields["enviar_a"]) ? $result->fields["enviar_a"] : '';
$nro_ficha = isset($result->fields["nro_ficha"]) ? $result->fields["nro_ficha"] : 'N/A';

$GLOBALS['fecha_vta'] = $fecha;
$GLOBALS['nro_factura_vta'] = $nro_factura;

// Datos del paciente
$sql = "SELECT * FROM pacientes WHERE documento = '$documento'";
$result = $db->Execute($sql);
$calle = $result->fields["calle"];
$puerta = $result->fields["puerta"];
$localidad = $result->fields["localidad"];
$apellido = $result->fields["apellido"];
$nombre = $result->fields["nombre"];
$direccion = $calle . " " . $puerta . " - " . $localidad;
$nombre_completo = $apellido . ", " . $nombre;

$hoja = "A4";
$pdf = new PDF2('P', 'mm', $hoja);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('Arial', '', 8);

// Titulo Paciente
$pdf->SetY(45);
$pdf->Cell(20, 6, "Paciente: ", 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 6, utf8_decode($nombre_completo), 0);
$pdf->SetFont('Arial', '', 9);

// Registro de Tumor / Enviar A
$pdf->SetX(120);
$pdf->Cell(35, 6, "Registro de Tumor: ", 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, "ENVIAR A: " . utf8_decode($enviar_a), 0);
$pdf->SetFont('Arial', '', 8);

$pdf->Ln();
$pdf->Cell(20, 5, "Documento: ", 0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 5, $documento, 0);
$pdf->SetFont('Arial', '', 8);

$pdf->Ln();
$pdf->Cell(20, 5, "Domicilio: ", 0);
$pdf->Cell(100, 5, utf8_decode($direccion), 0);

$pdf->Ln();
$pdf->Cell(20, 5, "Nota: ", 0);
$pdf->Cell(150, 5, utf8_decode($observaciones), 0);

$pdf->Ln(5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 5, "CANT", 0);
$pdf->Cell(100, 5, "DROGA / PRESENTACION", 0);
$pdf->Cell(30, 5, "LOTE / VTO", 0);
$pdf->Cell(25, 5, "UNITARIO", 0);
$pdf->Cell(25, 5, "TOTAL", 0);
$pdf->Ln();
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 8);

// Detalles
$sql3 = "SELECT * FROM `tr_ventas_detalle` WHERE nro_factura = $nro_factura ORDER BY cod_detalle ASC";
$result3 = $db->Execute($sql3);

while (!$result3->EOF) {
    $cantidad = $result3->fields["cantidad"];
    $descripcion = $result3->fields["descripcion"];
    $precio_unitario = $result3->fields["precio_unitario"];
    $gtin = $result3->fields["gtin"];
    $lote = $result3->fields["lote"];
    $vto = $result3->fields["mes_lote"] . "/" . $result3->fields["anio_lote"];
    $cod_mercaderia = $result3->fields["cod_mercaderia"];
    
    // Obtener info extendida de la mercaderia/droga
    $sql_mono = "SELECT m.*, d.droga as nombre_droga, l.laboratorio as nombre_laboratorio
                 FROM monodrogas m
                 LEFT JOIN drogas d ON m.cod_droga = d.cod_droga
                 LEFT JOIN laboratorios l ON m.laboratorio = l.cod_laboratorio
                 WHERE m.cod_barra = '$cod_mercaderia' OR m.troquel = '$cod_mercaderia'
                 LIMIT 1";
    $res_mono = $db->Execute($sql_mono);
    
    $nombre_mostrar = $descripcion;
    $laboratorio = "";
    
    if ($res_mono && !$res_mono->EOF) {
        $nombre_droga = $res_mono->fields['nombre_droga'];
        $nombre_comercial = $res_mono->fields['nombre_comercial'];
        $laboratorio = $res_mono->fields['nombre_laboratorio'];
        
        if (empty($nombre_mostrar)) {
            $nombre_mostrar = $nombre_droga . " (" . $nombre_comercial . ")";
        }
    }

    $total_item = $cantidad * $precio_unitario;

    $pdf->Cell(10, 5, $cantidad, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(100, 5, utf8_decode($nombre_mostrar), 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(30, 5, $lote, 0);
    $pdf->Cell(25, 5, "$ " . number_format($precio_unitario, 2), 0, 0, 'R');
    $pdf->Cell(25, 5, "$ " . number_format($total_item, 2), 0, 0, 'R');
    $pdf->Ln();

    // Secondary line with GTIN and Laboratorio
    $pdf->SetX(20);
    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Cell(100, 4, "GTIN: " . $gtin, 0);
    $pdf->SetX(140);
    $pdf->Cell(30, 4, $vto, 0);
    $pdf->SetX(170);
    $pdf->Cell(30, 4, utf8_decode($laboratorio), 0);
    $pdf->Ln();

    
    // Tot line like in the image
    $pdf->SetX(190);
    $pdf->Cell(10, 4, "Tot: " . $cantidad, 0, 0, 'R');
    $pdf->Ln();

    $result3->MoveNext();
}

$pdf->SetY(260);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, "TOTAL GENERAL $ " . number_format($neto, 2), 1, 0, 'R');

$pdf->Output();
?>

<?php 
include ("../../../conexiones/config_pro.php");
////////////////////////////////
$mes = "01";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$ene_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$ene_facturas=$result->fields["total"];
$ene_neto=$result->fields["neto"];


if ($ene_neto > 0){
$ene_consumo_receta = round($ene_neto / $ene_recetas,2);
$ene_consumo_entrega = round($ene_neto / $ene_facturas,2);
}

////////////////////////////////
$mes = "02";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$feb_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$feb_facturas=$result->fields["total"];
$feb_neto=$result->fields["neto"];


if ($feb_neto > 0){
$feb_consumo_receta = round($feb_neto / $feb_recetas,2);
$feb_consumo_entrega = round($feb_neto / $feb_facturas,2);
}
 ////////////////////////////////////

 $mes = "03";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$mar_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$mar_facturas=$result->fields["total"];
$mar_neto=$result->fields["neto"];

if ($mar_neto > 0){
$mar_consumo_receta = round($mar_neto / $mar_recetas,2);
$mar_consumo_entrega = round($mar_neto / $mar_facturas,2);
}
 ////////////////////////////////////

////////////////////////////////
$mes = "04";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$abr_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$abr_facturas=$result->fields["total"];
$abr_neto=$result->fields["neto"];


if ($abr_neto > 0){
$abr_consumo_receta = round($abr_neto / $abr_recetas,2);
$abr_consumo_entrega = round($abr_neto / $abr_facturas,2);
}
////////////////////////////////
$mes = "05";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$may_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$may_facturas=$result->fields["total"];
$may_neto=$result->fields["neto"];


if ($may_neto > 0){
$may_consumo_receta = round($may_neto / $may_recetas,2);
$may_consumo_entrega = round($may_neto / $may_facturas,2);
}
 ////////////////////////////////////

$mes = "06";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$jun_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$jun_facturas=$result->fields["total"];
$jun_neto=$result->fields["neto"];

 
 




if ($jun_neto > 0){
$jun_consumo_receta = round($jun_neto / $jun_recetas,2);
$jun_consumo_entrega = round($jun_neto / $jun_facturas,2);
}
 ////////////////////////////////////

 ////////////////////////////////
$mes = "07";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$jul_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$jul_facturas=$result->fields["total"];
$jul_neto=$result->fields["neto"];


if ($jul_neto > 0){
$jul_consumo_receta = round($jul_neto / $jul_recetas,2);
$jul_consumo_entrega = round($jul_neto / $jul_facturas,2);
}

////////////////////////////////
$mes = "08";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$ago_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$ago_facturas=$result->fields["total"];
$ago_neto=$result->fields["neto"];


if ($ago_neto > 0){
$ago_consumo_receta = round($ago_neto / $ago_recetas,2);
$ago_consumo_entrega = round($ago_neto / $ago_facturas,2);
}

 ////////////////////////////////////

 $mes = "09";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$set_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$set_facturas=$result->fields["total"];
$set_neto=$result->fields["neto"];


if ($set_neto > 0){
$set_consumo_receta = round($set_neto / $set_recetas,2);
$set_consumo_entrega = round($set_neto / $set_facturas,2);
}
 ////////////////////////////////////

 ////////////////////////////////
$mes = "10";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$oct_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$oct_facturas=$result->fields["total"];
$oct_neto=$result->fields["neto"];


if ($oct_neto > 0){
$oct_consumo_receta = round($oct_neto / $oct_recetas,2);
$oct_consumo_entrega = round($oct_neto / $oct_facturas,2);
}

////////////////////////////////

$mes = "11";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$nov_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$nov_facturas=$result->fields["total"];
$nov_neto=$result->fields["neto"];


if ($nov_neto > 0){
$nov_consumo_receta = round($nov_neto / $nov_recetas,2);
$nov_consumo_entrega = round($nov_neto / $nov_facturas,2);
}
 ////////////////////////////////////

 $mes = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$dic_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$dic_facturas=$result->fields["total"];
$dic_neto=$result->fields["neto"];


if ($dic_neto > 0){
$dic_consumo_receta = round($dic_neto / $dic_recetas,2);
$dic_consumo_entrega = round($dic_neto / $dic_facturas,2);
}
 ////////////////////////////////////





$pdf->ln();
$pdf->Cell(50,5,'CONSUMO POR PACIENTE',0,0,'C',true);
$pdf->ln();

$pdf->Cell(50,5,'MES',0,0,'C',true); 
$pdf->Cell(50,5,'RECETAS',0,0,'C',true); 
$pdf->Cell(20,5,'COSTO',0,0,'C',true); 
$pdf->Cell(50,5,'PACIENTES',0,0,'C',true); 
$pdf->Cell(20,5,"COSTO 1",0,0,'C',true); 
$pdf->Cell(50,5,'CONSUMO',0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'CONSUMO POR PACIENTE',0,0,'C',true);

$pdf->ln();
$pdf->Cell(50,5,'ENERO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$ene_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$ene_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$ene_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$ene_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$ene_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'FEBRERO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$feb_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$feb_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$feb_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$feb_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$feb_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'MARZO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$mar_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$mar_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$mar_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$mar_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$mar_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'ABRIL'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$abr_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$abr_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$abr_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$abr_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$abr_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'MAYO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$may_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$may_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$may_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$may_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$may_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'JUNIO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$jun_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$jun_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$jun_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$jun_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$jun_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'JULIO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$jul_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$jul_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$jul_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$jul_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$jul_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'AGOSTO'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$ago_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$ago_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$ago_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$ene_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$ago_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'SETIEMBRE'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$set_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$set_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$set_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$set_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$set_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'OCTUBRE'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$oct_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$oct_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$oct_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$oct_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$oct_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'NOVIEMBRE'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$nov_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$nov_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$nov_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$nov_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$nov_neto,0,0,'C',true); 

$pdf->ln();
$pdf->Cell(50,5,'DICIEMBRE'.$anio,0,0,'C',true); 
$pdf->Cell(50,5,$dic_facturas,0,0,'C',true); 
$pdf->Cell(20,5,$dic_consumo_entrega,0,0,'C',true); 
$pdf->Cell(50,5,$dic_recetas,0,0,'C',true); 
$pdf->Cell(20,5,$dic_consumo_receta,0,0,'C',true); 
$pdf->Cell(50,5,$dic_neto,0,0,'C',true); 




?>


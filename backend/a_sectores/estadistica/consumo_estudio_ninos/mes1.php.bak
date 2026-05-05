<?php
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3  and nro_os = 10 group by documento ";
$result = $db->Execute($sql);
$recetas = $result->RecordCount(); 

$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and  cod_movimiento = 3 and nro_os = 10 group by documento ";
$result = $db->Execute($sql);
$recetas_nc = $result->RecordCount(); 

$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3  and nro_os = 10";
$result = $db->Execute($sql);
$facturas=$result->fields["total"];
$neto=$result->fields["neto"];

$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento = 3 and nro_os = 10";
$result = $db->Execute($sql);
$facturas_nc=$result->fields["total"];
$neto_nc=$result->fields["neto"];


$neto = $neto - $neto_nc;
$recetas = $recetas - $recetas_nc;

?>
<?php
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and departamento = '$departamento'   group by documento ";
$result = $db->Execute($sql);
$recetas_pro = $result->RecordCount(); 

$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and  cod_movimiento = 3  and departamento = '$departamento' group by documento ";
$result = $db->Execute($sql);
$recetas_nc_pro = $result->RecordCount(); 

$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3  ";
$result = $db->Execute($sql);
$facturas_pro=$result->fields["total"];
$neto_pro=$result->fields["neto"];

$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento = 3 and departamento = '$departamento' ";
$result = $db->Execute($sql);
$facturas_nc_pro=$result->fields["total"];
$neto_nc_pro=$result->fields["neto"];


$neto_pro = $neto_pro - $neto_nc_pro;
$recetas_pro = $recetas_pro - $recetas_nc_pro;

?>
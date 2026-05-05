<?php 
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql1 = "SELECT sum(cantidad) as cant, sum(precio_unitario * cantidad) as tot  FROM `tr_stock` WHERE  `fecha` between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1 and cod_mercaderia = $cod_mercaderia";
$result1 = $db->Execute($sql1);
$tot=$result1->fields["tot"];
$cant=$result1->fields["cant"];



if ($tot > 0){
$tot = number_format($tot, 2, ',', '.');
}

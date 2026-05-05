<?php
/////////////////

$mes = 01;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)) ALIAS";

$result10 = $db->Execute($sql);
$cant_depto_ene=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_ene=$result10->fields["suma"];

 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_ene_dev=$result10->fields["suma_dev"];

$suma_ene = $suma_ene - $suma_ene_dev;

//// NO MONOCLONALES

 $sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)) ALIAS";

$result10 = $db->Execute($sql);
$cant_depto_ene_no=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_ene_no=$result10->fields["suma"];

 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_ene_dev_no=$result10->fields["suma_dev"];

$suma_ene_no = $suma_ene_no - $suma_ene_dev_no;


/////////////////

$mes = 02;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_feb=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_feb=$result10->fields["suma"];

 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_feb_dev=$result10->fields["suma_dev"];

$suma_feb = $suma_feb - $suma_feb_dev;


//// NO MONOCLONALES

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)) ALIAS";

$result10 = $db->Execute($sql);
$cant_depto_feb_no=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_feb_no=$result10->fields["suma"];

 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_feb_dev_no=$result10->fields["suma_dev"];

$suma_feb_no = $suma_feb_no - $suma_feb_dev_no;

/////////////////

$mes = 03;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";


$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)) ALIAS";
$result10 = $db->Execute($sql);
 $cant_depto_mar=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
 $suma_mar=$result10->fields["suma"];


 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_mar_dev=$result10->fields["suma_dev"];

$suma_mar = $suma_mar - $suma_mar_dev;


//// NO MONOCLONALES

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)) ALIAS";

$result10 = $db->Execute($sql);
$cant_depto_mar_no=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_mar_no=$result10->fields["suma"];

 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_mar_dev_no=$result10->fields["suma_dev"];

$suma_mar_no = $suma_mar_no - $suma_mar_dev_no;

/////////////////

/////////////////

$mes = 04;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_abr=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_abr=$result10->fields["suma"];
/////////////////


 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo = 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_abr_dev=$result10->fields["suma_dev"];

$suma_abr = $suma_abr - $suma_abr_dev;


//// NO MONOCLONALES

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)) ALIAS";

$result10 = $db->Execute($sql);
$cant_depto_abr_no=$result10->fields["cant"];

$consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 1) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 2) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3 and cod_movimiento = 10)";

$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_abr_no=$result10->fields["suma"];

 $consulta1 = "(cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3) or (cod_diagnostico = '$cod_diagnostico' and fecha between '$desde' and '$hasta' and grupo != 3)";
 $sql2 = "SELECT sum(cantidad * precio_unitario) as suma_dev FROM `compras_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
  $suma_abr_dev_no=$result10->fields["suma_dev"];

$suma_abr_no = $suma_abr_no - $suma_abr_dev_no;

/////////////////

/*
$mes = 05;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_may=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_may=$result10->fields["suma"];
/////////////////


$mes = 06;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_jun=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_jun=$result10->fields["suma"];
/////////////////


$mes = 07;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_jul=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_jul=$result10->fields["suma"];
/////////////////

$mes = 08;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_ago=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_ago=$result10->fields["suma"];
/////////////////

$mes = 09;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_set=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_set=$result10->fields["suma"];
/////////////////

$mes = 10;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_oct=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_oct=$result10->fields["suma"];
/////////////////

$mes = 11;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_nov=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_nov=$result10->fields["suma"];
/////////////////


$mes = 12;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";

$sql = "select count(*) as cant from (select distinct documento from `tr_ventas_detalle_depto` where departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3) ALIAS";
$result10 = $db->Execute($sql);
$cant_depto_dic=$result10->fields["cant"];

$consulta1 = " departamento = '$zonas' and fecha between '$desde' and '$hasta' and grupo = 3";
$sql2 = "SELECT sum(cantidad * precio_unitario) as suma FROM `tr_ventas_detalle_depto` where $consulta1";
$result10 = $db->Execute($sql2);
$suma_dic=$result10->fields["suma"];
/////////////////

*/


$tot_ene = $tot_ene + $cant_depto_ene;


$total_cantidad = $cant_depto_ene_ent + $cant_depto_feb_ent + $cant_depto_mar_ent + $cant_depto_abr_ent + $cant_depto_may_ent + $cant_depto_jun_ent + $cant_depto_jul_ent + $cant_depto_ago_ent + $cant_depto_set_ent + $cant_depto_oct_ent + $cant_depto_nov_ent + $cant_depto_dic_ent;
?>
<?php 

$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$manual_es = $_REQUEST['manual_es'];
$fecha_a = $dia."/".$mes."/".$anio;
$fecha = $anio."-".$mes."-".$dia;

$detalle = $_REQUEST['detalle'];

if ($detalle == 1){
	include ("diario_vta_detallado.php");
	}else{

include ("diario_vta.php");
$total_total = 0;
?><br><?php
//include ("devoluciones.php");
}

?>

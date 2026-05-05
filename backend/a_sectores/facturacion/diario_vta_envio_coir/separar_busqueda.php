<?php 

$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$manual_es = $_REQUEST['manual_es'];
$fecha_a = $dia."/".$mes."/".$anio;
$fecha = $anio."-".$mes."-".$dia;

$fuente = $_REQUEST['fuente'];

$detalle = $_REQUEST['detalle'];

$anmat = $_REQUEST['anmat'];

if ($anmat == 1){

ECHO "ACA";
include ("diario_vta_detallado_anmat.php");


}else{
if ($detalle == 1){
	include ("diario_vta_detallado.php");
	}else{

include ("diario_vta.php");
	}

}


?>

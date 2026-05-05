<?php 
include ("../../../mobile/nav_header.php");
$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$manual_es = $_REQUEST['manual_es'];
$fecha_a = $dia."/".$mes."/".$anio;
$fecha = $anio."-".$mes."-".$dia;

  $detalle = $_REQUEST['detalle'];


switch ($detalle){
case "1":{include ("diario_vta_detallado_mobile.php");break;}
case "2":{include ("diario_vta_mobile.php");$total_total = 0;break;}
case "3":{include ("diario_vta_detallado_lector_separar_mobile.php");break;}

} 

?>

<?php 

$id = $_REQUEST['id'];
$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$manual_es = $_REQUEST['manual_es'];
$fecha_a = $dia."/".$mes."/".$anio;
$fecha = $anio."-".$mes."-".$dia;

  $detalle = $_REQUEST['detalle'];

  $fuente = $_REQUEST['fuente'];
  $fuente1 = $_REQUEST['fuente'];

switch ($detalle){
case "1":{include ("diario_vta_detallado.php");break;}
case "2":{include ("diario_vta.php");$total_total = 0;break;}
case "3":{include ("diario_vta_detallado_lector_separar.php");break;}

} 

?>

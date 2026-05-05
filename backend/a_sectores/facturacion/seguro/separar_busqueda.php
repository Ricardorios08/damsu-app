<?php 

$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];


$dia_h = $_REQUEST['dia_h'];
$mes_h = $_REQUEST['mes_h'];
$anio_h = $_REQUEST['anio_h'];




$manual_es = $_REQUEST['manual_es'];
$fecha_a = $dia."/".$mes."/".$anio;
$fecha = $anio."-".$mes."-".$dia;


$hasta_a = $dia_h."/".$mes_h."/".$anio_h;
$hasta = $anio_h."-".$mes_h."-".$dia_h;



$estadosa=$_POST["estados"];
for ($i=0;$i<count($estadosa);$i++)    
{     
$estados = $estadosa[$i];    
}


  $fuente = $_REQUEST['fuente'];
  $fuente1 = $_REQUEST['fuente']; 


  $estados;

 SWITCH ($estados){
case "ASIGNADO":{
$fecha_sel = 'fecha';
$estado = 'recibido_coir';
$valor = 1;
$titulo = "PACIENTES ASIGNADOS POR POR";
include ("diario_vta.php");
break;}

case "RECIBIDO":{
$fecha_sel = 'fecha_recibido';
$estado = 'recibido_coir';
$valor = 1;
$titulo = "MEDICAMENTOS RECIBIDOS POR COIR";
include ("diario_vta.php");
break;}

case "INDICADO":{
$fecha_sel = 'fecha_indicado';
$estado = 'indicado_coir';
$valor = 1;
$titulo = "MEDICAMENTOS INDICADOS POR COIR";
include ("diario_vta.php");
break;}

case "PREPARADO":{
$fecha_sel = 'fecha_preparado';
$estado = 'preparado_coir';
$valor = 1;
$titulo = "PLANILLA DE SEGURO";
include ("diario_vta_prep.php");
break;}
}




 

?>

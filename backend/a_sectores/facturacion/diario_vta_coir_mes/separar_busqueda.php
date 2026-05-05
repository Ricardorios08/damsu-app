<?php 

$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$manual_es = $_REQUEST['manual_es'];
$fecha_a = $dia."/".$mes."/".$anio;
$fecha = $anio."-".$mes."-".$dia;
$hasta = $anio."-".$mes."-".$dia;

$dia2 = $_REQUEST['dia2'];
$mes2 = $_REQUEST['mes2'];
$anio2 = $_REQUEST['anio2'];
$desde_a = $dia2."/".$mes2."/".$anio2;
$desde = $anio2."-".$mes2."-".$dia2;

 $estadoss=$_POST["estados"];
for ($i=0;$i<count($estadoss);$i++)    
{     
$estados = $estadoss[$i];    
}


echo "///".$estados;

include ("diario_vta.php");
$total_total = 0;
 
?>

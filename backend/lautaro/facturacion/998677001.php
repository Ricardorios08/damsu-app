<?
include ("../../conexiones/config_pr.php");

$sql677 = "SELECT valor FROM `convenio_practica` WHERE `cod_practica` = 677 AND `nro_os` = 5073";
$result = $db->Execute($sql677);
 $valor_677 = $result->fields["valor"];

$sql = "SELECT * FROM `convenio_practica` WHERE nro_os = 5073 and cod_practica = 998";
$result1 = $db->Execute($sql);
$valor_998 = $result1->fields["valor"];

//echo $sql =  "SELECT valor FROM `convenio_practica` where WHERE `cod_practica` = 677 AND `nro_os` = 5073 UNION SELECT valor FROM `convenio_practica` WHERE `cod_practica` = 998 AND `nro_os` = 5073";
//$result = $db->Execute($sql);
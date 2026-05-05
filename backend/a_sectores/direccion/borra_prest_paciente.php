<?php

include ("../../conexiones/config_usu.php");

$cod_operacion = $_REQUEST['cod_operacion'];
$documento = $_REQUEST['documento'];

$SQL="Delete From prestaciones_pacientes where cod_operacion = '$cod_operacion'";
$db->Execute($SQL);

$leyenda = "LA PRESTACION SE HA ELIMINADO DEL SISTEMA";
//include ("../../alertas/campo_informacion.php");


$band = 1;

include ("registrar_prestaciones2.php");
?>






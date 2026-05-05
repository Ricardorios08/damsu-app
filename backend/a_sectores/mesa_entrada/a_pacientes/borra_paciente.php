<?php

include ("../../../conexiones/config_usu.php");

$a = $_GET['id'];
$nombre_completo = $_GET['nombre_completo'];

$SQL="Delete From pacientes where documento = '$a'";
$db->Execute($SQL);
$SQL="Delete From afiliaciones where documento = '$a'";
$db->Execute($SQL);
$SQL="Delete From paciente_diagnostico where documento = '$a'";
$db->Execute($SQL);
$SQL="Delete From prestaciones_pacientes where documento = '$a'";
$db->Execute($SQL);
$SQL="Delete From vivienda where documento = '$a'";
$db->Execute($SQL);

echo $leyenda = "El Paciente ".$nombre_completo." con documento (".$a.") ha sido eliminado del Sistema";
include ("../../../alertas/campo_informacion.php");
?>






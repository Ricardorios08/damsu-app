<?php

include ("../../../conexiones/config_usu.php");

$a = $_GET['id'];

$SQL="Delete From diagnostico where nro_diagnostico = '$a'";
$db->Execute($SQL);

$leyenda = "EL DIAGNOSTICO SE HA ELIMINADO DEL SISTEMA";
include ("../../../alertas/campo_informacion.php");
?>






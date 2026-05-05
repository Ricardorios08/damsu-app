<?php

include ("../../../conexiones/config_usu.php");

$a = $_GET['id'];

$SQL="Delete From fuentes where nro_fuente = '$a'";
$db->Execute($SQL);

$leyenda = "LA FUENTE SE HA ELIMINADO DEL SISTEMA";
include ("../../../alertas/campo_informacion.php");
?>






<?php

include ("../../../conexiones/config_usu.php");

$cod_operacion = $_REQUEST['cod_operacion'];



echo $sql="Delete From afiliaciones where cod_operacion = $cod_operacion";
$db->Execute($sql);

$leyenda = "LA AFILIACION SE HA ELIMINADO DEL SISTEMA";
include ("../../../alertas/campo_informacion.php");
?>






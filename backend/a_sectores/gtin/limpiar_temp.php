<?php

include ("../../conexiones/config_pro.php");

$gtin = $_REQUEST['gtin'];
$seguridad= $_REQUEST['seguridad'];



if ($seguridad == 'coir'){

 $sql = "delete FROM `tr_ventas1_deta_temp` where gtin like '$gtin'";
$result = $db->Execute($sql);

//echo $sql = "delete FROM `tr_ventas1_encab_temp` ";
//$result = $db->Execute($sql);

$leyenda = "SE LIMPIO TEMPORAL";
include ("../../alertas/campo_informacion.php");


}ELSE{

$leyenda = "CONTRASEÑA INCORRECTA";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

include ("limpiar_temporal.php");



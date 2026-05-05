<?php

include ("../../conexiones/config_pro.php");

$nro_comprobante = $_REQUEST['nro_comprobante'];
$seguridad= $_REQUEST['seguridad'];

$sql="select * from `tr_ventas_encabezado` where nro_factura =  '$nro_comprobante'";
$result = $db->Execute($sql);

$nro_fac=strtoupper($result->fields["nro_factura"]);


if ($nro_comprobante == ""){
$leyenda = "NO INGRESO COMPRONBATE";
include ("../../alertas/campo_informacion2.php");
exit;
}



if ($nro_fac == ""){
$leyenda = "NO EXISTE COMPROBANTE CON ESE NUMERO";
include ("../../alertas/campo_informacion2.php");
exit;
}




if ($seguridad == 'papo2012'){

ECHO $sql = "UPDATE `tr_ventas_encabezado` SET `denominacion` = 'ANULADA', `cod_movimiento` = '6' , `neto` = '0' WHERE `nro_factura` = $nro_comprobante";
$result = $db->Execute($sql);

echo $sql="delete from `tr_ventas_detalle` where nro_factura =  '$nro_comprobante'";
$result = $db->Execute($sql);

echo $sql = "DELETE FROM `tr_stock` WHERE `nro_comprobante` =  '$nro_comprobante'";
$result = $db->Execute($sql);

$leyenda = "SE ANULO COMPROBANTE DUPLICADO";
include ("../../alertas/campo_informacion.php");


}ELSE{

$leyenda = "CONTRASEÑA INCORRECTA";
include ("../../alertas/campo_informacion2.php");
EXIT;
}

include ("duplicada.php");
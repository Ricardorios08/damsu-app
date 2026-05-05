<?php 

include ("../../../../conexiones/config_usu.php");


$cod_mercaderia = $_REQUEST['mes'];
$precio_convenio= $_REQUEST['anio'];


$contra= $_REQUEST['contra'];

if ($contra == "papo2012"){
$sql1 = "UPDATE `tr_existencias` SET precio_unitario = '$precio_convenio' WHERE proveedor = 110 and cod_mercaderia = $cod_mercaderia and cantidad_ingresada - cantidad_salida > 0";
$result1 = $db->Execute($sql1);

$sql1 = "UPDATE `monodrogas` SET precio_actualizado = '$precio_convenio' WHERE cod_barra = $cod_mercaderia";
$result1 = $db->Execute($sql1);

$leyenda = "SE MODIFICO CORRECTAMENTE";
include ("../../../../alertas/campo_informacion.php");
}
else
{
$leyenda = "CONTRASEÑA DE SEGURIDAD INCORRECTA";
include ("../../../../alertas/campo_informacion2.php");
exit;
}





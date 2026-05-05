<?php

include ("../../../conexiones/config_pro.php");

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$cod_barra = $_REQUEST['cod_barra'];
$troquel = $_REQUEST['troquel'];
$seguridad= $_REQUEST['seguridad'];


if ($mes == ''){
$leyenda = "NO INGRESO MES";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if ($anio == ''){
$leyenda = "NO INGRESO AÑO";
include ("../../../alertas/campo_informacion2.php");
exit;
}


if (($troquel != "") and ($cod_barra == "")){


$sql = "SELECT * FROM monodrogas where troquel= $troquel";
$result = $db->Execute($sql);
$cod_barra=$result->fields["cod_barra"];

if ($cod_barra == ''){
$leyenda = "NO EXISTE MONODROGA";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if (($seguridad == 'S') OR ($seguridad == 's')){
ECHO $sql = "UPDATE `tr_stock_temp_provisorio` SET `ace` = '1' WHERE `cod_mercaderia` = '$cod_barra' and `mes` = '$mes' AND `anio` = '$anio'  LIMIT 1";
$result = $db->Execute($sql);
$band = 4;
include ("inventario_ace-noace.php");
}ELSE{
$leyenda = "CONTRASEÑA INCORRECTA";
include ("../../../alertas/campo_informacion2.php");
}

}ELSEIF (($troquel == "") and ($cod_barra != "")){

$sql = "SELECT * FROM monodrogas where cod_barra= $cod_barra";
$result = $db->Execute($sql);
$cod_barra1=$result->fields["cod_barra"];

if ($cod_barra1 == ''){
$leyenda = "NO EXISTE MONODROGA";
include ("../../../alertas/campo_informacion2.php");
exit;
}

if (($seguridad == 'S') OR ($seguridad == 's')){
echo $sql = "UPDATE `tr_stock_temp_provisorio` SET `ace` = '1' WHERE `cod_mercaderia` = '$cod_barra' and `mes` = '$mes' AND `anio` = '$anio'  LIMIT 1";
$result = $db->Execute($sql);

$band = 4;
include ("inventario_ace-noace.php");
}ELSE{
$leyenda = "CONTRASEÑA INCORRECTA";
include ("../../../alertas/campo_informacion2.php");
}


}ELSEIF (($troquel == "") and ($cod_barra == "")){

$leyenda = "NO INGRESO NI TROQUEL NI CODIGO BARRA";
include ("../../../alertas/campo_informacion2.php");
exit;
}





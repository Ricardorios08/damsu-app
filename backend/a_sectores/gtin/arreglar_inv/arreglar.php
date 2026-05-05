<?php
include ("../../../conexiones/config_pro.php");
$anio= $_REQUEST['anio'];
$mes= $_REQUEST['mes'];
$cod_unico= $_REQUEST['cod_unico'];

$cantidad= $_REQUEST['cantidad'];
$salida= $_REQUEST['salida'];
$anterior= $_REQUEST['anterior'];

 $contra= $_REQUEST['contra'];




if ($contra == "11"){
 echo $sql = "UPDATE tr_stock_temp_provisorio1 SET `cantidad` = '$cantidad' , `salida` = '$salida'  , `anterior` = '$anterior'  WHERE `cod_mercaderia` ='$cod_unico'  AND `mes` = '$mes' AND `anio` = '$anio'";
mysql_query($sql);

 


include ("arreglar_gtin.php");


}else{

$leyenda = "CONTRASEÑA DE SEGURIDAD INCORRECTA";
include ("../../../alertas/campo_informacion2.php");


}



//}
//else
//{
//$leyenda = "CONTRASEÑA DE SEGURIDAD INCORRECTA";
//include ("../../../alertas/campo_informacion2.php");
//exit;
//}




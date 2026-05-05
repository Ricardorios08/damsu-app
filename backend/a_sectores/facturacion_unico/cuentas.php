<?php 



$precio_actualizado = round($precio_unitario_nuevo,2);



if ($cantidad == ""){
$leyenda = "NO INGRESO CANTIDAD";
include ("../../alertas/campo_vacio.php");
exit;
}


$sql9 = "SELECT sum(cantidad_ingresada - cantidad_salida) as cant_ingresada FROM existencias  WHERE  cod_mercaderia = $cod_mercaderia and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote  ='$anio_lote' ";
$total_ordenes = $db->Execute($sql9);
$cant_ingresada=$total_ordenes->fields["cant_ingresada"];

if ($cantidad > $cant_ingresada){
$leyenda = "DE ESTE LOTE NO PUEDE ENTREGAR MAS DE: ".$cant_ingresada;
include ("../../alertas/campo_informacion2.php");
exit;
}


$sql9 = "SELECT cantidad FROM un_ventas1_deta_temp  WHERE  cod_mercaderia = $cod_mercaderia and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote  ='$anio_lote' ";
$total_ordenes = $db->Execute($sql9);
 $cantidad_temp =$total_ordenes->fields["cantidad"];

if ($cantidad < $cantidad_temp){
$leyenda = "YA CARGO ESE LOTE";
include ("../../alertas/campo_informacion2.php");
exit;
}

$sql9 = "SELECT cod_detalle FROM un_ventas1_deta_temp  WHERE  cod_mercaderia = $cod_mercaderia and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote  ='$anio_lote' ";
$total_ordenes = $db->Execute($sql9);
 $cod_detalle =$total_ordenes->fields["cod_detalle"];

if (($cod_detalle != "") and ($cantidad_temp <= $cantidad)){

$leyenda = "YA CARGO ESE LOTE";
include ("../../alertas/campo_informacion2.php");
exit;
}



if ($cod_mercaderia== ""){
$leyenda = "NO INGRESO MERCADERIA";
include ("../../alertas/campo_informacion2.php");
exit;
}


$total = round($precio_actualizado * $cantidad);
//$total = $cantidad * $precio_unitario;

$sql9 = "SELECT count(*) as total FROM `un_ventas1_encab_temp`  WHERE  `nro_factura` = $nro_factura and tipo_fact = '$fact'";
$total_ordenes = $db->Execute($sql9);
$items=$total_ordenes->fields["total"];


 $sql = "SELECT * FROM existencias  WHERE    cod_mercaderia = $cod_mercaderia and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote  ='$anio_lote' ";
$result = $db->Execute($sql);

$cod_detalle1=$result->fields["cod_detalle"];



if ($cod_detalle == ""){

if ($items < 18){
 if ($band== "SI"){
$sql = "INSERT INTO `un_ventas1_deta_temp` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador`, `gtin` , `resultado` , `transaccion`)  VALUES ('$tipo_fact' , '$nro_factura' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$dif' , '$precio_unitario' , '$total' , '$proveedor' , '' , '' , '$nd' , '$cod_detalle1')";
mysql_query($sql);}
else
	{ 
 $sql = "INSERT INTO `un_ventas1_deta_temp` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` ,  `gtin` , `resultado` , `transaccion`)  VALUES ('$tipo_fact' ,'$nro_factura' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_unitario' , '$total' , '$proveedor' , '$operador' ,  '' , '$nd' , '$cod_detalle1')";
mysql_query($sql);
	}
}
else{
	echo "CANTIDAD DE ITEMS COMPLETOS, POR FAVOR PROCEDA A FACTURA";
}
}else{

$cant = $cantidad_temp  + $cantidad;
 $sql = "UPDATE `un_ventas1_deta_temp` SET `cantidad` = '$cant' WHERE `cod_detalle` = $cod_detalle";
mysql_query($sql);
}
?>
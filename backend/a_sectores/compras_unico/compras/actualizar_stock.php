<?php 	

include("../../../conexiones/config_pro.php");


$id = $_REQUEST['id'];

 $sql1 = "SELECT * FROM `tr_compras1_deta_temp` where operador = '$id'";
$result1 = $db->Execute($sql1);



if (!$result1) die("fallo".$db->ErrorMsg());
 while (!$result1->EOF) {

$nro_factura=$result1->fields["nro_factura"];
$cod_detalle=$result1->fields["cod_detalle"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$presentacion=strtoupper($result1->fields["presentacion"]);
 $lote=$result1->fields["lote"];
$mes_lote=$result1->fields["mes_lote"];
$anio_lote=$result1->fields["anio_lote"];
$gtin=$result1->fields["gtin"];
$precio_unitario=$result1->fields["precio_unitario"];

$resultado=$result1->fields["resultado"];
$transaccion=$result1->fields["transaccion"];

$nro_serie=$result1->fields["nro_serie"];


$cod_movimiento=$result1->fields["cod_movimiento"];

$cantidad_ingresada=1;

$total = $total + $precio_unitario;

$fecha_ultimo_mov = date("y-m-d");




 $sql = "INSERT INTO `tr_existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` , `gtin` , `transaccion` , `nro_serie` )  VALUES ('$nro_factura' , '' ,'$cod_mercaderia' , '$lote' , '$mes_lote' , '$anio_lote', '$cantidad_ingresada' , '$precio_unitario' , '' , '$fecha_ultimo_mov' ,  '$cuenta' , '$gtin' , '$transaccion' , '$nro_serie')";
mysql_query($sql);


$sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` , `gtin` , `transaccion` , `nro_serie` ) VALUES ('$cod_mercaderia' , '$fecha_ultimo_mov' , '1' ,  'A' , '$nro_factura' , '$cantidad_ingresada' , '$precio_unitario' , '$lote1' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '$gtin' , '$transaccion' , '$nro_serie')";
mysql_query($sql);




$sql = "UPDATE `monodrogas` SET `precio_actualizado` = '$precio_unitario' WHERE `troquel` = '$cod_mercaderia'";
mysql_query($sql);





 $sql = "INSERT INTO `tr_compras_detalle` (`nro_factura`, `cod_detalle`, `cod_mercaderia`, `presentacion`, `lote`, `mes_lote`, `anio_lote`, `gtin`, `precio_unitario`, `precio_nuevo`, `total`, `cod_movimiento`, `operador` , `proveedor` , `resultado` , `transaccion` , `nro_serie`) VALUES ('$nro_factura', NULL, '$cod_mercaderia', '$presentacion', '$lote1', '$mes_lote', '$anio_lote' , '$gtin', '$precio_unitario' , '$precio_unitario' , '$precio_unitario' , '1', '$id' , '$nro_proveedor' , '$resultado' , '$transaccion' , '$nro_serie' );";
mysql_query($sql);

$result1->MoveNext();
				}




$sql = "TRUNCATE TABLE `tr_compras1_deta_temp` where operador = $id";
mysql_query($sql);


$sql3 = "SELECT * FROM `tr_compras1_encab_temp` where operador = $id";
$result3 = $db->Execute($sql3);
$nro_factura=strtoupper($result3->fields["nro_factura"]);
$cod_operacion=strtoupper($result3->fields["cod_operacion"]);
$nro_proveedor=strtoupper($result3->fields["nro_proveedor"]);
$denominacion=strtoupper($result3->fields["denominacion"]);
$fecha=strtoupper($result3->fields["fecha"]);
$descuento=strtoupper($result3->fields["descuento"]);
$bonificacion=strtoupper($result3->fields["bonificacion"]);
$periodo=strtoupper($result3->fields["periodo"]);
$anio=strtoupper($result3->fields["anio"]);
$operador=strtoupper($result3->fields["operador"]);


$total_compra = $total_neto;

if ($nro_factura != ""){


 $sql = "INSERT INTO tr_compras_encab (`nro_factura`, `cod_operacion`, `nro_proveedor`, `denominacion`, `fecha`, `descuento`, `bonificacion`, `periodo`, `anio`, `operador`, `cod_movimiento` , `total`) VALUES ('$nro_factura', '$cod_operacion', '$nro_proveedor', '$denominacion', '$fecha', '$descuento', '$bonificacion', '$periodo', '$anio', '$operador', '$cod_movimiento' , '$total');";
mysql_query($sql);

}


$sql = "TRUNCATE TABLE `tr_compras1_encab_temp` where operador = $id";
mysql_query($sql);

$leyenda = "SE ACTUALIZO EL STOCK, SE GUARDO EL MAYOR Y FACTURA COMPRA";
include ("../../../alertas/campo_informacion.php");

include ("pagina1.php");
exit;
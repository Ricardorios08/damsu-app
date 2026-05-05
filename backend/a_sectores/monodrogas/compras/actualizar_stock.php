<?php 	

include("../../../conexiones/config_pro.php");


$id = $_REQUEST['id'];

$sql3 = "SELECT * FROM `compras1_encab_temp` where operador = $id";
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

$documento=strtoupper($result3->fields["documento"]);
$tipo_doc=strtoupper($result3->fields["tipo_doc"]);

$observaciones=strtoupper($result3->fields["observaciones"]);
$nro_comprobante_afectado=strtoupper($result3->fields["nro_comprobante_afectado"]);


$tipo=strtoupper($result3->fields["cod_movimiento"]);


$sql = "INSERT INTO `compras_encabezado` ( `nro_factura`, `cod_operacion`, `nro_proveedor`, `fecha`, `total`, `periodo`, `anio`, `operador`, `tipo_doc`, `documento`, `nro_receta`, `tipo` , `nro_comprobante_afectado` , `observaciones`)  VALUES ( '' , '2' , '$nro_proveedor' , '$fecha' , '$total_compra' , '$periodo' , '$anio' ,  '$operador' , '$tipo_doc', '$documento' , '' , '$tipo' , '$nro_comprobante_afectado' , '$observaciones')";
mysql_query($sql);



 $idgenerado = mysql_insert_id();



$sql1 = "SELECT * FROM `compras1_deta_temp` where operador = '$id'";
$result1 = $db->Execute($sql1);



if (!$result1) die("fallo".$db->ErrorMsg());
 while (!$result1->EOF) {

$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_detalle=strtoupper($result1->fields["cod_detalle"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);


$cod_movimiento=strtoupper($result1->fields["cod_movimiento"]);

$cuenta=strtoupper($result1->fields["cuenta"]);


$sql2 = "SELECT * FROM `existencias` where cod_mercaderia = '$cod_mercaderia' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' and lote = '$lote'";
$result2 = $db->Execute($sql2);
$cod_merca=strtoupper($result2->fields["cod_mercaderia"]);

$cantidad_existente=strtoupper($result2->fields["cantidad_ingresada"]);
$cod_deta=strtoupper($result2->fields["cod_detalle"]);


$presentacion=strtoupper($result1->fields["presentacion"]);
//$lote=strtoupper($result1->fields["lote"]);
$lote1=strtoupper($result1->fields["lote"]);
$mes_lote1=strtoupper($result1->fields["mes_lote"]);
$anio_lote1=strtoupper($result1->fields["anio_lote"]);




$cantidad_ingresada=strtoupper($result1->fields["cantidad"]);
$precio_unitario=strtoupper($result1->fields["precio_unitario"]);
$precio_nuevo=strtoupper($result1->fields["precio_nuevo"]);



$total=strtoupper($result1->fields["total"]);


$total_neto =$total_neto + $total;



$fecha_ultimo_mov = date("y-m-d");

$cuenta = 900;

if ($cod_merca == ""){
 $sql = "INSERT INTO `existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` )  VALUES ('$idgenerado' , '' ,'$cod_mercaderia' , '$lote1' , '$mes_lote' , '$anio_lote', '$cantidad_ingresada' , '$precio_unitario' , '' , '$fecha_ultimo_mov' ,  '$cuenta')";
mysql_query($sql);

 $sql = "INSERT INTO `stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ) VALUES ('$cod_mercaderia' , '$fecha_ultimo_mov' , '3' ,  'X' , '$idgenerado' , '$cantidad_ingresada' , '$precio_unitario' , '$lote1' , '$mes_lote', '$anio_lote' , '$cuenta' , '')";
mysql_query($sql);

}
elseif (($lote == $lote1) and ($cod_mercaderia == $cod_merca) and ($anio_lote == $anio_lote) and ($mes_lote == $mes_lote1)) {

$cantidad = $cantidad_ingresada + $cantidad_existente;


 $sql = "UPDATE `existencias` SET `cantidad_ingresada` = '$cantidad', `precio_unitario` = '$precio_unitario' , `fecha_ultimo_mov` = '$fecha_ultimo_mov' WHERE cod_mercaderia = '$cod_mercaderia' and lote = '$lote1' and mes_lote = '$mes_lote' and anio_lote= '$anio_lote' and cod_detalle = '$cod_deta'";
mysql_query($sql);

 $sql = "INSERT INTO `stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ) VALUES ('$cod_mercaderia' , '$fecha_ultimo_mov' , '3' ,  'x' , '$idgenerado' , '$cantidad_ingresada' , '$precio_unitario' , '$lote1' , '$mes_lote', '$anio_lote' , '$cuenta' , '')";
mysql_query($sql);
}
else {

 $sql = "INSERT INTO `existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` )  VALUES ('$idgenerado' , '' ,'$cod_mercaderia' , '$lote1' , '$mes_lote' , '$anio_lote', '$cantidad_ingresada' , '$precio_unitario' , '' , '$fecha_ultimo_mov' ,  '$cuenta'";
mysql_query($sql);

 $sql = "INSERT INTO `stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ) VALUES ('$cod_mercaderia' , '$fecha_ultimo_mov' , '3' ,  'X' , '$idgenerado' , '$cantidad_ingresada' , '$precio_unitario' , '$lote1' , '$mes_lote', '$anio_lote' , '$cuenta' , '')";
mysql_query($sql);

}



$precio_actualizado = $precio_nuevo;


$sql = "UPDATE `monodrogas` SET `precio_actualizado` = '$precio_unitario' WHERE `troquel` = '$cod_mercaderia'";
mysql_query($sql);
//}

$sql = "INSERT INTO `compras_detalle` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `presentacion` , `lote` , `mes_lote` ,  `anio_lote` , `cantidad` , `precio_unitario` , `total` )  VALUES ('$idgenerado' , '' ,'$cod_mercaderia' ,'$presentacion' , '$lote1' , '$mes_lote' , '$anio_lote' , '$cantidad_ingresada' , '$precio_unitario' , '$total')";
mysql_query($sql);

 $sql = "UPDATE `compras_detalle` SET fecha = '$fecha' , grupo = $grupo WHERE `nro_factura` = $idgenerado";
mysql_query($sql);


$total_final = $total_final + $total;

$result1->MoveNext();
				}


 $sql = "UPDATE `compras_encabezado` SET `total` = '$total_final' WHERE `nro_factura` = $idgenerado";
mysql_query($sql);



$hor = time();
 
date_default_timezone_set("America/Argentina/Mendoza");
$hora = date("H:i:s",$hor);





$sql = "DELETE FROM TABLE `compras1_deta_temp` where operador = $id";
mysql_query($sql);


$sql = "DELETE FROM TABLE `compras1_encab_temp` where operador = $id";
mysql_query($sql);

$leyenda = "SE ACTUALIZO EL STOCK, SE GUARDO EL MAYOR Y DEVOLUCION MERCADERIA";
include ("../../../alertas/campo_informacion.php");






include ("pagina1.php");
exit;
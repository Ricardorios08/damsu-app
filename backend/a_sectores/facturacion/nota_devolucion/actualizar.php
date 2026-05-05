<?php 

include("../../../conexiones/config_pro.php");
$id = $_REQUEST["id1"];


$sql = "SELECT * FROM nota_ajuste_encab  WHERE  `operador` = $id ";
$result3 = $db->Execute($sql);

 $tipo_fact=strtoupper($result3->fields["tipo_fact"]);
$nro_factura=strtoupper($result3->fields["nro_factura"]);
$nro_receta=strtoupper($result3->fields["nro_receta"]);
$documento=strtoupper($result3->fields["documento"]);
$tipo_doc=strtoupper($result3->fields["tipo_doc"]);
$plan=strtoupper($result3->fields["plan"]);
$denominacion=strtoupper($result3->fields["denominacion"]);
$fecha=strtoupper($result3->fields["fecha"]);
$forma_pago=strtoupper($result3->fields["forma_pago"]);
$porc_dto=strtoupper($result3->fields["porc_dto"]);
$nro_os=strtoupper($result3->fields["nro_os"]);
$nombre_os=strtoupper($result3->fields["nombre_os"]);
$neto=strtoupper($result3->fields["neto"]);
$observaciones=strtoupper($result3->fields["observaciones"]);
$cod_movimiento=3;
$tipo_factura=strtoupper($result3->fields["tipo_factura"]);



$observaciones = $observaciones." AFECTADA: (".$nro_factura.")";

 $sql = "INSERT INTO `tr_ventas_encabezado` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura` , `observaciones`) VALUES ( '003'  , '' , '$nro_factura' , '$documento' , '$tipo_doc' , '' , '$operador' , '$denominacion' , '$fecha' , '' , '' , '$nombre_operador' , '$nro_os' , '', '$neto' , '3' , '' , '$observaciones' )";
mysql_query($sql);


 $idgenerado = mysql_insert_id();





 $sql3 = "SELECT * FROM nota_ajuste_detalle  WHERE  `operador` = $id  order by cod_detalle desc";
$result3 = $db->Execute($sql3);


if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


$tipo_fact=strtoupper($result3->fields["tipo_fact"]);
$nro_factura=strtoupper($result3->fields["nro_factura"]);
$cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$lote=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$cantidad=strtoupper($result3->fields["cantidad"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);
$total=strtoupper($result3->fields["total"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$gtin=strtoupper($result3->fields["gtin"]);

$nro_serie=strtoupper($result3->fields["nro_serie"]);

$cod_droga=strtoupper($result3->fields["cod_droga"]);
$grupo=strtoupper($result3->fields["grupo"]);
$laboratorio=strtoupper($result3->fields["laboratorio"]);

$programa=strtoupper($result3->fields["programa"]);
 
$sql2 = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = $cod_mercaderia";
$result2 = $db->Execute($sql2);
 $cod_droga=strtoupper($result2->fields["cod_droga"]);

$sql2 = "SELECT * FROM `drogas`  WHERE  cod_droga = $cod_droga";
$result2 = $db->Execute($sql2);
 $drogas=strtoupper($result2->fields["droga"]);

$sql2 = "SELECT * FROM tr_stock  WHERE  gtin = '$gtin'";
$result2 = $db->Execute($sql2);
$laboratorio=strtoupper($result2->fields["laboratorio"]);
$cantidad_ingresada=strtoupper($result2->fields["cantidad"]);

$sql2 = "SELECT * FROM tr_existencias  WHERE  gtin = '$gtin'";
$result2 = $db->Execute($sql2);
$proveedor=strtoupper($result2->fields["proveedor"]);


// $transaccion=strtoupper($result2->fields["transaccion"]);


$gtin_anterior = "E-".$gtin;


 $sql = "UPDATE tr_existencias SET `gtin` = '$gtin_anterior' WHERE gtin = '$gtin' LIMIT 1 ";
$result = $db->Execute($sql);

  $sql = "UPDATE tr_stock SET `gtin` = '$gtin_anterior' WHERE gtin = '$gtin'  LIMIT 2 ";
$result = $db->Execute($sql);

  $sql = "UPDATE tr_compras_detalle SET `gtin` = '$gtin_anterior' WHERE gtin = '$gtin'  LIMIT 1 ";
$result = $db->Execute($sql);

 
//echo $sql = "INSERT INTO `tr_existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` , `gtin` , `transaccion` , `nro_serie` , `cod_droga`  , `grupo`  , `laboratorio` ,`nro_receta` ,`documento` ,	`cod_droga` ,	`nombre_droga` ,	`nro_os`  )  VALUES ('$idgenerado' , '' ,'$cod_mercaderia' , '$lote' , '$mes_lote' , '$anio_lote', '$cantidad_ingresada' , '$precio_unitario' , '' , '$fecha' ,  '$proveedor' , '$gtin' , '$transaccion' , '$nro_serie' , '$cod_droga' , '$grupo' , '$laboratorio' , '$nro_receta' ,'$documento' ,	'$cod_droga' ,	'$nombre_droga' ,	'$nro_os' )";

 $sql = "INSERT INTO `tr_existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` , `gtin` , `transaccion` , `nro_serie` , `cod_droga`  , `grupo`  , `laboratorio`   )  VALUES ('$idgenerado' , '' ,'$cod_mercaderia' , '$lote' , '$mes_lote' , '$anio_lote', '$cantidad_ingresada' , '$precio_unitario' , '' , '$fecha' ,  '$proveedor' , '$gtin' , '$transaccion' , '$nro_serie' , '$cod_droga' , '$grupo' , '$laboratorio')";
$result = $db->Execute($sql);


  $sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ,  `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie` , `drogas` , `grupo` , `laboratorio`) VALUES ('$cod_mercaderia' , '$fecha' , '1' ,  'A' , '$idgenerado' , '$cantidad_ingresada' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '' , '', '' , '$cod_droga' , '' ,  '$gtin' , '$transaccion' , '$nro_serie' , '$drogas' , '$grupo' , '$laboratorio')";
$result = $db->Execute($sql);


  $sql = "INSERT INTO  tr_ventas_detalle  (`tipo_fact`, `nro_factura`, `cod_detalle`, `cod_mercaderia`, `descripcion`, `presentacion`, `lote`, `mes_lote`, `anio_lote`, `cantidad`, `precio_unitario`, `total`, `proveedor`, `operador`, `gtin`, `resultado`, `transaccion`, `nro_serie`, `programa`, `grupo`, `fecha`, `afectada`, `nro_receta`, `cod_droga`, `documento`, `nombre_droga`, `nro_os`) VALUES ('001', '$idgenerado', '', '$cod_mercaderia', '$descripcion', '$presentacion', '$lote', '$mes_lote', '$anio_lote', '$cantidad', '$precio_unitario', '$total', '$proveedor', '$operador', '$gtin', '', '', '$nro_serie', '$programa', '$grupo', '$fecha', '$nro_factura' , '$nro_receta' ,   '$cod_droga' ,   	'$documento' ,		'$nombre_droga' ,	'$nro_os')";
$result = $db->Execute($sql);

 
 

$total_factura = $total_factura + $total;





	 $result3->MoveNext();
				}
	 

  $sql = "UPDATE `tr_ventas_encabezado` SET neto = '$total_factura' WHERE nro_factura = '$nro_factura' LIMIT 1 ";
$result = $db->Execute($sql);



echo "LISTO..............";

$sql = "DELETE from `nota_ajuste`";
$result = $db->Execute($sql);
$sql = "DELETE from `nota_ajuste_detalle`";
$result = $db->Execute($sql);
 
//$result = $db->Execute($sql);

//include ("imprimir.php");


// 428-7755

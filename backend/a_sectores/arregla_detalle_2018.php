<?php 

include ("../conexiones/config_pro.php");

echo $sql1 = "SELECT * FROM `tr_stock` WHERE `nro_comprobante` between '181553' and '181580'";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$fecha=$result1->fields["fecha"];
$cod_movimiento=$result1->fields["cod_movimiento"];

$nro_comprobante=$result1->fields["nro_comprobante"];
$cantidad=$result1->fields["cantidad"]; 
$precio_unitario=$result1->fields["precio_unitario"];
$lote=$result1->fields["lote"];
$mes_lote=$result1->fields["mes_lote"];
$anio_lote=$result1->fields["anio_lote"];
$cuenta=$result1->fields["cuenta"];
$tipo_cuenta=$result1->fields["tipo_cuenta"];
$cod_operacion=$result1->fields["cod_operacion"]; $observaciones=$result1->fields["observaciones"];
$documento=$result1->fields["documento"];
$cod_droga=$result1->fields["cod_droga"]; 
$nro_os=$result1->fields["nro_os"];
$gtin=$result1->fields["gtin"];
$transaccion=$result1->fields["transaccion"];
$nro_serie=$result1->fields["nro_serie"];
$drogas=$result1->fields["drogas"];
$grupo=$result1->fields["grupo"];
$laboratorio=$result1->fields["laboratorio"];
$departamento=$result1->fields["departamento"];


  $sql10 = "SELECT * FROM `tr_ventas_encabezado` WHERE `nro_factura` = '$nro_comprobante'";
$result10 = $db->Execute($sql10);
$tipo_fact=$result10->fields["tipo_fact"]; 

  $sql10 = "SELECT * FROM monodrogas WHERE cod_barra = '$cod_mercaderia'";
$result10 = $db->Execute($sql10);
$descripcion=$result10->fields["nombre_comercial"]; 
$presentacion=$result10->fields["presentacion"]; 

 
echo $sql4 = "INSERT INTO `tr_ventas_detalle` (`tipo_fact`, `nro_factura`, `cod_detalle`, `cod_mercaderia`, `descripcion`, `presentacion`, `lote`, `mes_lote`, `anio_lote`, `cantidad`, `precio_unitario`, `total`, `proveedor`, `operador`, `gtin`, `resultado`, `transaccion`, `nro_serie`, `programa`, `grupo`, `fecha`, `afectada`, `nro_receta`, `cod_droga`, `documento`, `nombre_droga`, `nro_os`, `cod_movimiento`, `no_profe`, `manual`, `tratamiento`) VALUES ('$tipo_fact', '$nro_comprobante', '$cod_detalle', '$cod_mercaderia', '$descripcion', '$presentacion', '$lote', '$mes_lote', '$anio_lote', '$cantidad', '$precio_unitario', '$total', '$proveedor', '$operador', '$gtin', '$resultado', '$transaccion', '$nro_serie', '$programa', '$grupo', '$fecha', '$afectada', '$nro_receta', '$cod_droga', '$documento', '$nombre_droga', '$nro_os', '$cod_movimiento', '$no_profe', '$manual', '$tratamiento')";
//mysql_query($sql4);

echo "<br>";
echo "<br>";
   $result1->MoveNext();
	}




INSERT INTO `tr_stock` (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `departamento`) VALUES ('7798083951298', '2018-01-01', '1', 'M', '999', '1', '0.00', 'Migracion', '01', '17', '', '0', '0', '', '0', '225', '0', '', '0', '', 'SUTENT 12.5 MG', '1', '10', '')

<?php 
 
$sql = "DELETE FROM `stock_temp`";
mysql_query($sql);


$sql = "INSERT into stock_temp SELECT * FROM `stock_30-11-2012` where ( fecha > '$fecha_anterior')";
mysql_query($sql);

  $sql="select * from stock_temp group by cod_mercaderia order by cod_mercaderia";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);

$fecha=strtoupper($result1->fields["fecha"]);
$cod_movimiento=strtoupper($result1->fields["cod_movimiento"]);
$tipo_fact=strtoupper($result1->fields["tipo_fact"]);
$nro_comprobante=strtoupper($result1->fields["nro_comprobante"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$precio_unitario=strtoupper($result1->fields["precio_unitario"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cuenta=strtoupper($result1->fields["cuenta"]);
$tipo_cuenta=strtoupper($result1->fields["tipo_cuenta"]);
$observaciones=strtoupper($result1->fields["observaciones"]);
$documento=strtoupper($result1->fields["documento"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);
$nro_os=strtoupper($result1->fields["nro_os"]);
$gtin=strtoupper($result1->fields["gtin"]);
$transaccion=strtoupper($result1->fields["transaccion"]);
$nro_serie=strtoupper($result1->fields["nro_serie"]);
$drogas=strtoupper($result1->fields["drogas"]);
$grupo=strtoupper($result1->fields["grupo"]);
$laboratorio=strtoupper($result1->fields["laboratorio"]);


$sql="select * from drogas where cod_droga = $cod_droga ";
$result = $db->Execute($sql);
$drogas=strtoupper($result->fields["droga"]);


   $sql2="select sum(cantidad) as ingresada  from stock_temp where (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 2 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 3 and  fecha > '$fecha_anterior')  ";
$result2 = $db->Execute($sql2);
$ingresada=strtoupper($result2->fields["ingresada"]);

    $sql2="select sum(cantidad) as salida  from stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 6 and   fecha > '$fecha_anterior'";
$result2 = $db->Execute($sql2);
$salida=strtoupper($result2->fields["salida"]);


 $sql2="select *  from tr_stock_temp_provisorio1 where  cod_mercaderia = $cod_mercaderia   and mes = '$mes_anterior' and anio = $anio_anterior";
$result2 = $db->Execute($sql2);
$anterior=strtoupper($result2->fields["anterior"]);


    $sql2="select sum(precio_unitario * cantidad) as precio_ingreso  from stock_temp where (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 2 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 3 and  fecha > '$fecha_anterior')";
$result2 = $db->Execute($sql2);
$precio_ingreso=strtoupper($result2->fields["precio_ingreso"]);

 



   $sql2="select sum(precio_unitario * cantidad) as precio_egreso  from stock_temp where (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 6 and  fecha > '$fecha_anterior')";
$result2 = $db->Execute($sql2);
$precio_egreso=strtoupper($result2->fields["precio_egreso"]);



$sql8="select * from monodrogas where cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql8);
$nombre_comercial=strtoupper($result8->fields["nombre_comercial"]);
$presentacion=strtoupper($result8->fields["presentacion"]);
$troquel=strtoupper($result8->fields["troquel"]);


  $sql2="select *  from tr_stock_temp_provisorio1 where cod_mercaderia = $cod_mercaderia  and mes = '$mes_anterior' and anio = $anio_anterior";
$result2 = $db->Execute($sql2);
$precio_anterior=strtoupper($result2->fields["precio_anterior"]);

$exit = $anterior + $ingresada - $salida;

echo "<br>";
echo $cod_mercaderia;
echo "<br>";
echo $precio_anterior;
echo "<br>";
echo $precio_ingreso;
echo "<br>";
echo $precio_egreso;
echo "<br>";


echo "uni".$unit = $precio_anterior + $precio_ingreso - $precio_egreso;
echo "<br>";
echo "aaa".$unitario = round($unit / $exit,2);
echo "<br>";

//echo $precio_unitario = $precio_ingreso - $precio_egreso;

  $sql3 = "INSERT INTO tr_stock_temp_provisorio1 (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `fecha_inventario`, `mes`, `anio` , `salida` , `anterior` , `precio_ingreso`, `precio_egreso` , `nombre_comercial` , `precio_anterior`) VALUES ('$cod_mercaderia', '$fecha', '$cod_movimiento', '$tipo_fact', '$nro_comprobante', '$ingresada', '$unitario', '$lote', '$mes_lote', '$anio_lote', '$cuenta', '$tipo_cuenta', '$cod_operacion', '$observaciones', '$documento', '$cod_droga', '$nro_os', '$gtin', '$transaccion', '$nro_serie', '$drogas', '$grupo', '$laboratorio', '$fecha_inventario', '$mes', '$anio' , '$salida' , '$anterior' , '$precio_ingreso' , '$precio_egreso', '$nombre_comercial' , '$precio_anterior');";
mysql_query($sql3);



echo "<br>";

$result1->MoveNext();
	}


<?php 
 
$sql = "DELETE FROM `stock_temp`";
mysql_query($sql);


 $sql = "INSERT into stock_temp SELECT * FROM `stock`";
mysql_query($sql);


  $sql="select * from existencias group by cod_mercaderia order by cod_mercaderia";
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


$sql="select * from drogas where cod_droga = $cod_mercaderia";
$result = $db->Execute($sql);
$drogas=strtoupper($result->fields["droga"]);

$sql2="select fecha  from stock where (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 2 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 3 and  fecha > '$fecha_anterior')  ";
$result2 = $db->Execute($sql2);
$fecha=strtoupper($result2->fields["fecha"]);

/*
echo    $sql2="select sum(cantidad) as ingresada  from stock_temp where (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 2 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 3 and  fecha > '$fecha_anterior')  ";
$result2 = $db->Execute($sql2);
$ingresada=strtoupper($result2->fields["ingresada"]);

    $sql2="select sum(cantidad) as salida  from stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 6 and   fecha > '$fecha_anterior'";
$result2 = $db->Execute($sql2);
$salida=strtoupper($result2->fields["salida"]);

 */

    $sql2="select sum(cantidad) as ingresada  from stock where (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 2 and  fecha > '$fecha_anterior') or (cod_mercaderia = $cod_mercaderia  and cod_movimiento = 3 and  fecha > '$fecha_anterior')  ";
$result2 = $db->Execute($sql2);
$ingresada=strtoupper($result2->fields["ingresada"]);

    $sql2="select sum(cantidad) as salida  from stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 6 and   fecha > '$fecha_anterior'";
$result2 = $db->Execute($sql2);
$salida=strtoupper($result2->fields["salida"]);



 $sql2="select *, sum(cantidad_ingresada) as cantidad_ingresada, sum(cantidad_salida) as cantidad_salida from existencias where cod_mercaderia = '$cod_mercaderia' ";
$result2 = $db->Execute($sql2);
//echo "----".$salida=strtoupper($result2->fields["cantidad_salida"]);

$stock_exi = $ingresada - $salida;


$sql2="select * from tr_stock_temp_provisorio1 where  cod_mercaderia = $cod_mercaderia   order by anio, mes";
$result2 = $db->Execute($sql2);

 $result2->MoveLast();

$anterior=strtoupper($result2->fields["anterior"]);
$anterior1=strtoupper($result2->fields["anterior"]);

$cantidad=strtoupper($result2->fields["cantidad"]);
 $salida1=strtoupper($result2->fields["salida"]);
$unitario=strtoupper($result2->fields["mes"]);
$me=strtoupper($result2->fields["precio_unitario"]);

/*if ($mes == 10){
$cantidad  =$anterior;
}
*/

$cantidad;
$salida1;

$anterior = $anterior + $cantidad - $salida1;


$final = $stock_exi - $anterior;
 $salida_final = $salida - $salida1;
 



 
/////////////////////////////////////////////////////////// VALORES 

$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";

 $sql="select sum(precio_unitario * cantidad) as entradas_valor from stock where cod_mercaderia = $cod_barra and fecha between '$desde' and '$hasta' and cod_movimiento = 3";
$result = $db->Execute($sql);
$entradas_valor=strtoupper($result->fields["entradas_valor"]);

  $sql="select sum(precio_unitario * cantidad) as salidas_valor from stock where cod_mercaderia = $cod_barra and fecha between '$desde' and '$hasta' and cod_movimiento = 6";
$result = $db->Execute($sql);
$salidas_valor=strtoupper($result->fields["salidas_valor"]);


$sql="select sum(precio_unitario * cantidad) as anterior_entrada_valor from stock where cod_mercaderia = $cod_barra and fecha < '$desde' and cod_movimiento = 3";
$result = $db->Execute($sql);
$anterior_entrada_valor=strtoupper($result->fields["anterior_entrada_valor"]);


$sql="select sum(precio_unitario * cantidad) as anterior_salida_valor from stock where cod_mercaderia = $cod_barra and fecha < '$desde' and cod_movimiento = 6";
$result = $db->Execute($sql);
$anterior_salida_valor=strtoupper($result->fields["anterior_salida_valor"]);


$anterior_valor = $anterior_entrada_valor - $anterior_salida_valor;
$saldo_valor = $anterior_valor + $entradas_valor - $salidas_valor;


///////////////////////////





$sql8="select * from monodrogas where cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql8);
$nombre_comercial=strtoupper($result8->fields["nombre_comercial"]);
$presentacion=strtoupper($result8->fields["presentacion"]);
$troquel=strtoupper($result8->fields["troquel"]);
$precio_actualizado=strtoupper($result8->fields["precio_actualizado"]);

  $sql2="select *  from tr_stock_temp_provisorio1 where cod_mercaderia = $cod_mercaderia  and mes = '$mes_anterior' and anio = $anio_anterior";
$result2 = $db->Execute($sql2);
$precio_anterior=strtoupper($result2->fields["precio_anterior"]);

$exit = $anterior + $ingresada - $salida;


$unit = $precio_anterior + $precio_ingreso - $precio_egreso;

//$unitario = round($unit / $exit,2);


//echo $precio_unitario = $precio_ingreso - $precio_egreso;
if ($anterior < 0){
$anterior = $anterior * -1;
}



   $sql3 = "INSERT INTO tr_stock_temp_provisorio1 (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `fecha_inventario`, `mes`, `anio` , `salida` , `anterior` , `precio_ingreso`, `precio_egreso` , `nombre_comercial` , `precio_anterior`) VALUES ('$cod_mercaderia', '$fecha', '$cod_movimiento', '$tipo_fact', '$nro_comprobante', '$ingresada', '$precio_actualizado', '$lote', '$mes_lote', '$anio_lote', '$cuenta', '$tipo_cuenta', '$cod_operacion', '$observaciones', '$documento', '$cod_droga', '$nro_os', '$gtin', '$transaccion', '$nro_serie', '$drogas', '$grupo', '$laboratorio', '$fecha_inventario', '$mes', '$anio' , '$salida' , '$anterior' , '$entradas_valor' , '$salidas_valor', '$nombre_comercial' , '$anterior_entrada_valor');";
mysql_query($sql3);



$result1->MoveNext();
	}


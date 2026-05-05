<?php 
include ("../../../../conexiones/config_usu.php");
:
 
$mes=10;
$anio=12;

$dia= date("d");

$fecha_inventario = $anio."-".$mes."-".$dia;


$sql = "DELETE FROM `stock_temp`";
mysql_query($sql);


$sql = "INSERT into stock_temp SELECT * FROM `stock_30-11-2012` where cod_movimiento = 1 and fecha = '2012-10-31'";
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
$total=strtoupper($result1->fields["total"]);

$sql="select * from drogas where cod_droga = $cod_droga ";
$result = $db->Execute($sql);
$drogas=strtoupper($result->fields["droga"]);


   $sql2="select sum(cantidad) as ingresada  from stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and fecha = '2012-10-31'";
$result2 = $db->Execute($sql2);
$ingresada=strtoupper($result2->fields["ingresada"]);

   $sql2="select sum(cantidad) as salida  from stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 6 and fecha = '2012-10-31'";
$result2 = $db->Execute($sql2);
//$salida=strtoupper($result2->fields["salida"]);


   $sql2="select sum(cantidad) as anterior  from tr_stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and fecha = '2012-10-31'";
$result2 = $db->Execute($sql2);
//$anterior=strtoupper($result2->fields["anterior"]);


   $sql2="select sum(precio_unitario) as precio_unitario  from stock_temp where cod_mercaderia = $cod_mercaderia and cod_movimiento = 1 and fecha = '2012-10-31'";
$result2 = $db->Execute($sql2);
$precio_unitario=strtoupper($result2->fields["precio_unitario"]);

 $sql8="select * from monodrogas where cod_barra = $cod_droga";
$result8 = $db->Execute($sql8);
$nombre_comercial=strtoupper($result8->fields["nombre_comercial"]);
$presentacion=strtoupper($result8->fields["presentacion"]);
$troquel=strtoupper($result8->fields["troquel"]);



    $sql2="select sum(precio_unitario * cantidad) as precio_entrada  from stock_temp where (cod_mercaderia = $cod_mercaderia and laboratorio = $laboratorio and cod_movimiento = 1 and fecha = '2012-10-31') or (cod_mercaderia = $cod_mercaderia and laboratorio = $laboratorio and cod_movimiento = 2 and fecha = '2012-10-31') or (cod_mercaderia = $cod_mercaderia and laboratorio = $laboratorio and cod_movimiento = 3 and fecha = '2012-10-31')";
$result2 = $db->Execute($sql2);
$precio_entrada=strtoupper($result2->fields["precio_entrada"]);

   $sql2="select sum(precio_unitario * cantidad) as precio_salida  from stock_temp where cod_mercaderia = $cod_mercaderia and laboratorio = $laboratorio and cod_movimiento = 6 and fecha = '2012-10-31'";
$result2 = $db->Execute($sql2);
$precio_salida=strtoupper($result2->fields["precio_salida"]);


 echo $sql3 = "INSERT INTO tr_stock_temp_provisorio1 (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `fecha_inventario`, `mes`, `anio` , `salida` , `anterior` , `precio_ingreso`, `precio_egreso` , `nombre_comercial`  , `precio_anterior`) VALUES ('$cod_mercaderia', '$fecha', '$cod_movimiento', '$tipo_fact', '$nro_comprobante', '$ingresada1', '$precio_unitario', '$lote', '$mes_lote', '$anio_lote', '$cuenta', '$tipo_cuenta', '$cod_operacion', '$observaciones', '$documento', '$cod_droga', '$nro_os', '$gtin', '$transaccion', '$nro_serie', '$drogas', '$grupo', '$laboratorio', '$fecha_inventario', '$mes', '$anio' , '$salida1' , '$ingresada'  , '$precio_entrada' , '$precio_salida', '$nombre_comercial' ,'$precio_entrada' );";
mysql_query($sql3);

echo "<br>";

$result1->MoveNext();
	}


<?php 
include ("../../../../conexiones/config_usu.php");

 
$mes=$_POST["mes"];
$anio=$_POST["anio"];

$mes_anterior = $mes - 1;

$mes_anterior =  str_pad($mes_anterior, 2, "0", STR_PAD_LEFT);

if ($mes == 01){
$anio_anterior = $anio - 1;
$mes_anterior = 12;
}else{
$anio_anterior = $anio;
}


 $fecha_anterior = $anio_anterior."-".$mes_anterior."-31";
$dia= date("d");

$fecha_inventario = $anio."-".$mes."-".$dia;

 $sql1 = "select * from tr_exis_inv where mes = '$mes' and anio = '$anio'";
$result1 = $db->Execute($sql1);
  $mes_ce=$result1->fields["mes"];



if ($mes_ce == ""){

$monodrogas = "monodrogas_30".$mes."20".$anio;
$tr_existencias1= "tr_existencias_30".$mes."20".$anio;

 $sql = "CREATE TABLE $monodrogas ( `troquel` int( 6 ) NOT NULL DEFAULT '0',
`grupo` varchar( 10 ) NOT NULL DEFAULT '',
`nombre_comercial` varchar( 35 ) NOT NULL DEFAULT '',
`cod_droga` int( 4 ) NOT NULL DEFAULT '0',
`presentacion` varchar( 35 ) NOT NULL DEFAULT '0',
`laboratorio` varchar( 20 ) NOT NULL DEFAULT '0',
`cadena_frio` char( 2 ) NOT NULL DEFAULT '',
`cod_barra` bigint( 30 ) NOT NULL DEFAULT '0',
`porcentaje_diferencial` decimal( 4, 2 ) NOT NULL DEFAULT '0.00',
`precio_actualizado` decimal( 10, 2 ) NOT NULL ,
`observaciones` varchar( 35 ) NOT NULL ,
`cant_caja` int( 4 ) NOT NULL ,
`informar` varchar( 2 ) NOT NULL ,
KEY `troquel` ( `troquel` ) ,
KEY `cod_barra` ( `cod_barra` ) ) ENGINE = MyISAM DEFAULT CHARSET = latin1;";
mysql_query($sql);

 $sql = "INSERT INTO $monodrogas SELECT * FROM `monodrogas`";
mysql_query($sql);



  $sql = "CREATE TABLE IF NOT EXISTS $tr_existencias1 (
  `nro_factura` varchar(20) NOT NULL DEFAULT '0',
  `cod_detalle` int(6) NOT NULL AUTO_INCREMENT,
  `cod_mercaderia` bigint(40) NOT NULL DEFAULT '0',
  `lote` varchar(10) NOT NULL DEFAULT '',
  `mes_lote` char(2) NOT NULL DEFAULT '',
  `anio_lote` char(2) NOT NULL DEFAULT '',
  `cantidad_ingresada` int(6) NOT NULL DEFAULT '0',
  `precio_unitario` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad_salida` int(6) NOT NULL DEFAULT '0',
  `fecha_ultimo_mov` date NOT NULL DEFAULT '0000-00-00',
  `proveedor` int(4) NOT NULL DEFAULT '0',
  `gtin` varchar(70) NOT NULL,
  `transaccion` int(20) NOT NULL,
  `nro_serie` varchar(50) NOT NULL,
  `cod_droga` int(10) NOT NULL,
  `grupo` int(2) NOT NULL,
  `laboratorio` int(4) NOT NULL,
  UNIQUE KEY `cod_detalle` (`cod_detalle`)
) ENGINE=MyISAM;";
mysql_query($sql);
/////////////////////////////////////////

 $sql = "INSERT INTO $tr_existencias1 SELECT * FROM `tr_existencias`";
mysql_query($sql);

$sql = "INSERT INTO `tr_exis_inv` (`mes`, `anio`) VALUES ('$mes', '$anio')";
mysql_query($sql);

$sql = "DELETE FROM `tr_stock_temp`";
mysql_query($sql);
 
$tr_stock = "tr_stock";

  $sql = "INSERT into tr_stock_temp SELECT * FROM `tr_stock` where fecha > '$fecha_anterior'";
mysql_query($sql);




 $sql1 = "select * from tr_existencias where laboratorio = 0";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 

 $cod_mercaderia=$result1->fields["cod_mercaderia"];
 $cod_detalle=$result1->fields["cod_detalle"];



 $sql = "select * from monodrogas where cod_barra = '$cod_mercaderia'";
$result = $db->Execute($sql);
$laboratorio=$result->fields["laboratorio"];

 $sql = "UPDATE tr_existencias SET laboratorio = '$laboratorio' WHERE cod_detalle = '$cod_detalle'";
$result = $db->Execute($sql);

   $result1->MoveNext();
	}




    $sql="select * from tr_existencias group by cod_mercaderia order by cod_mercaderia";
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
	$conta = $conta + 1;

 $cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);




$fecha=strtoupper($result->fields["fecha"]);
$cod_movimiento=strtoupper($result->fields["cod_movimiento"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$nro_comprobante=strtoupper($result->fields["nro_comprobante"]);
$cantidad=strtoupper($result->fields["cantidad"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);
$lote=strtoupper($result->fields["lote"]);
$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$cuenta=strtoupper($result->fields["cuenta"]);
$tipo_cuenta=strtoupper($result->fields["tipo_cuenta"]);
$observaciones=strtoupper($result->fields["observaciones"]);
$documento=strtoupper($result->fields["documento"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$gtin=strtoupper($result->fields["gtin"]);
$transaccion=strtoupper($result->fields["transaccion"]);
$nro_serie=strtoupper($result->fields["nro_serie"]);
$drogas=strtoupper($result->fields["drogas"]);
$grupo=strtoupper($result->fields["grupo"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$cant = $cant + 1;

if ($cod_mercaderia == 7795376002538){

}


  //   $sql2="select sum(cantidad) as ingresada  from tr_stock_temp where cod_mercaderia = $cod_mercaderia and laboratorio = $laboratorio and cod_movimiento = 1 and fecha > '$fecha_anterior'";
  echo   $sql2="select sum(cantidad) as ingresada  from tr_stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 1 and fecha > '$fecha_anterior'";
$result2 = $db->Execute($sql2);
$ingresada=strtoupper($result2->fields["ingresada"]);

 //  $sql2="select sum(cantidad) as salida  from tr_stock_temp where cod_mercaderia = $cod_mercaderia and laboratorio = $laboratorio and cod_movimiento = 6 and fecha > '$fecha_anterior'";
 echo  $sql2="select sum(cantidad) as salida  from tr_stock_temp where cod_mercaderia = $cod_mercaderia  and cod_movimiento = 6 and fecha > '$fecha_anterior'";

$result2 = $db->Execute($sql2);
$salida=strtoupper($result2->fields["salida"]);

///////////////////////

echo $sql2="select * from tr_stock_temp_provisorio where  cod_mercaderia = $cod_mercaderia order by anio, mes";
$result2 = $db->Execute($sql2);

 $result2->MoveLast();

$anterior=strtoupper($result2->fields["anterior"]);
$cantidad=strtoupper($result2->fields["cantidad"]);
$salida1=strtoupper($result2->fields["salida"]);
$unitario=strtoupper($result2->fields["mes"]);

 
$anterior = $anterior + $cantidad - $salida1;






/////////////////////////////////////////////////////////// VALORES 

$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";

  $sql="select sum(precio_unitario) as entradas_valor from tr_stock where cod_mercaderia = $cod_barra and fecha between '$desde' and '$hasta' and cod_movimiento = 1";
$result1 = $db->Execute($sql);
$entradas_valor=strtoupper($result1->fields["entradas_valor"]);

  $sql="select sum(precio_unitario) as salidas_valor from tr_stock where cod_mercaderia = $cod_barra and fecha between '$desde' and '$hasta' and cod_movimiento = 6";
$result1 = $db->Execute($sql);
$salidas_valor=strtoupper($result1->fields["salidas_valor"]);


  $sql="select sum(precio_unitario) as anterior_entrada_valor from tr_stock where cod_mercaderia = $cod_barra and fecha < '$desde' and cod_movimiento = 1";
$result1 = $db->Execute($sql);
$anterior_entrada_valor=strtoupper($result1->fields["anterior_entrada_valor"]);


 $sql="select sum(precio_unitario) as anterior_salida_valor from tr_stock where cod_mercaderia = $cod_barra and fecha < '$desde' and cod_movimiento = 6";
$result1 = $db->Execute($sql);
$anterior_salida_valor=strtoupper($result1->fields["anterior_salida_valor"]);


$anterior_valor = $anterior_entrada_valor - $anterior_salida_valor;
$saldo_valor = $anterior_valor + $entradas_valor - $salidas_valor;


///////////////////////////

 $sql8="select * from monodrogas where cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql8);
$nombre_comercial=strtoupper($result8->fields["nombre_comercial"]);
$presentacion=strtoupper($result8->fields["presentacion"]);
$troquel=strtoupper($result8->fields["troquel"]);
$precio_actualizado=strtoupper($result8->fields["precio_actualizado"]);


$sql4="select * from drogas where cod_droga = $cod_droga";
$result4 = $db->Execute($sql4);
$drogas=strtoupper($result4->fields["droga"]);


//$precio_unitario = $precio_anterior + $precio_ingreso - $precio_egreso;


$exis = $anterior + $ingresada - $salida;

if ($cod_mercaderia == 7795376002538){



  $sql3 = "INSERT INTO tr_stock_temp_provisorio (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `fecha_inventario`, `mes`, `anio` , `salida` , `anterior` , `precio_ingreso`, `precio_egreso` , `nombre_comercial` , `precio_anterior` ) VALUES ('$cod_mercaderia', '$fecha', '$cod_movimiento', '$tipo_fact', '$nro_comprobante', '$ingresada', '$precio_actualizado', '$lote', '$mes_lote', '$anio_lote', '$cuenta', '$tipo_cuenta', '$cod_operacion', '$observaciones', '$documento', '$cod_droga', '$nro_os', '$gtin', '$transaccion', '$nro_serie', '$drogas', '$grupo', '$laboratorio', '$fecha_inventario', '$mes', '$anio' , '$salida' , '$anterior'  , '$entradas_valor' , '$salidas_valor', '$nombre_comercial' , '$anterior_valor');";
}



    $sql3 = "INSERT INTO tr_stock_temp_provisorio (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `fecha_inventario`, `mes`, `anio` , `salida` , `anterior` , `precio_ingreso`, `precio_egreso` , `nombre_comercial` , `precio_anterior` ) VALUES ('$cod_mercaderia', '$fecha', '$cod_movimiento', '$tipo_fact', '$nro_comprobante', '$ingresada', '$precio_actualizado', '$lote', '$mes_lote', '$anio_lote', '$cuenta', '$tipo_cuenta', '$cod_operacion', '$observaciones', '$documento', '$cod_droga', '$nro_os', '$gtin', '$transaccion', '$nro_serie', '$drogas', '$grupo', '$laboratorio', '$fecha_inventario', '$mes', '$anio' , '$salida' , '$anterior'  , '$entradas_valor' , '$salidas_valor', '$nombre_comercial' , '$anterior_valor');";
mysql_query($sql3);



 

	$result->MoveNext();
	}

include ("genera_unico.php");

ECHO "SE GENERO MES DE INVENTARIO";
echo "<br>";
echo $conta;
echo "<br>";
echo $cant;

} else{
echo "ESTE MES YA FUE CERRADO";
}
/*
delete FROM `tr_stock_temp_provisorio` WHERE mes = 01;
delete FROM `tr_stock_temp_provisorio1` WHERE mes = 01;


INSERT INTO tr_stock_temp_provisorio1 (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `fecha_inventario`, `mes`, `anio` , `salida` , `anterior` , `precio_ingreso`, `precio_egreso` , `nombre_comercial` , `precio_anterior`) VALUES ('252', '', '', '', '', '', '12', 'B2119B01', '09', '14', '', '', '', '', '', '', '', '', '', '', 'TARCEVA 100 MG. ', '', '', '13-01-30', '01', '13' , '' , '60' , '' , '', 'TARCEVA ' , '0.00');


*/
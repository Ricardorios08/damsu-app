<?php 	

$fecha = $anio."-".$mes."-".$dia;
include("../../../../conexiones/config_usu.php");

$periodo = date("m"); 
$anio1 = date("y"); 



 $sql = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result = $db->Execute($sql);
 $descripcion=strtoupper($result->fields["nombre_comercial"]);
 $presentacion=strtoupper($result->fields["presentacion"]);
 $grupo =$result->fields["grupo"];
  $precio_actualizado =$result->fields["precio_actualizado"];
    $cod_droga =$result->fields["cod_droga"];

  $sql2 = "SELECT * FROM `tr_existencias`  WHERE  `cod_mercaderia` = $cod_mercaderia and lote = $lote and mes_lote = $mes_lote and anio_lote = $anio_lote and serie = '$nro_serie'";
$result2 = $db->Execute($sql2);
$cod_merca=strtoupper($result2->fields["cod_merca"]);
 $presentacion=strtoupper($result2->fields["presentacion"]);


  $sql2 = "SELECT gtin FROM `tr_existencias`  WHERE  gtin = '$gtin'";
$result2 = $db->Execute($sql2);
$gt=$result2->fields["gtin"];

if ($gt != ""){
$leyenda ="YA CARGO ESE GTIN";
include ("../../../../alertas/campo_vacio.php");
	exit;
}

if ($precio_unitario == ""){
$precio_unitario = $precio_actualizado;
$precio_nuevo = $precio_actualizado;
}

if ($descripcion != ""){





if ($gtin == ""){
$leyenda ="NO INGRESO GTIN";
include ("../../../../alertas/campo_vacio.php");
	exit;
}

if ($cod_mercaderia== ""){

$leyenda ="NO INGRESO MERCADERIA";
include ("../../../../alertas/campo_vacio.php");
	exit;
}

if ($descripcion == ""){

	$leyenda ="PRODUCTO INEXISTENTE";
	include ("../../../../alertas/campo_vacio.php");
		exit;
}



$total = $cantidad * $precio_unitario;


$fecha = "2012-10-31";
  $sql = "INSERT INTO `tr_existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` , `gtin` , `transaccion` , `nro_serie` )  VALUES ('$nro_factura' , '' ,'$cod_mercaderia' , '$lote' , '$mes_lote' , '$anio_lote', '1' , '$precio_unitario' , '' , '$fecha' ,  '$cuenta' , '$gtin' , '$transaccion' , '$nro_serie')";
mysql_query($sql);


// echo $sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` , `gtin` , `transaccion` , `nro_serie` ) VALUES ('$cod_mercaderia' , '$fecha' , '1' ,  'A' , '$nro_factura' , '1' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '$gtin' , '$transaccion' , '$nro_serie')";
//mysql_query($sql);

echo $sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ,  `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie` ) VALUES ('$cod_mercaderia' , '$fecha' , '1' ,  'A' , '$nro_factura' , '1' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$nro_proveedor' , '1' , '' , '', '' , '$cod_droga' , '' ,  '$gtin' , '$transaccion' , '$nro_serie')";
mysql_query($sql);

}

include ("refrescar_detalle.php");//$refrescar = "NO";



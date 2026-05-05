<?php 
$sql = "SELECT * FROM `tr_ventas1_encab_temp` where operador = $operador";
$result = $db->Execute($sql);

 $tipo_fact=$result->fields["tipo_fact"];

 $nro_receta=$result->fields["nro_receta"];
 $documento=$result->fields["documento"];
 $tipo_doc=$result->fields["tipo_doc"];
 $plan_completo=$result->fields["plan_completo"];
 $operador=$result->fields["operador"];
 $denominacion=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];

$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);


$sql7="select * from pacientes where documento = $documento and tipo_doc = '$tipo_doc'";
$result7 = $db->Execute($sql7);

$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;
$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero
$nombre_completo = $apellido.", ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 

$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 



$dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $anio."-".$mes."-".$dia;


$sql = "SELECT * FROM `compras_encabezado` ORDER BY nro_factura desc";
$result = $db->Execute($sql);

$nro_factura=$result->fields["nro_factura"] + 1;





 $sql = "INSERT INTO `compras_encabezado` ( `nro_factura` , `cod_operacion` , `nro_proveedor` , `fecha` , `total` , `periodo` , `anio` , `operador` , `tipo_doc` , `documento` , `nro_receta` )  VALUES ( '$nro_factura' , '2' , '900' , '$fecha' , '$total_compra' , '$periodo' , '$anio' ,  '$operador' , '$tipo_doc' ,  '$documento' , '$nro_receta')";
mysql_query($sql);

 $idgenerado = mysql_insert_id();



$sql3 = "SELECT * FROM `tr_ventas1_deta_temp`  WHERE  operador = $operador order by cod_detalle desc";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;
 $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["devuelve"]);
$cant=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$lote1=strtoupper($result3->fields["lote"]);

$lote=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;
$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);
$devuelve=strtoupper($result3->fields["devuelve"]);

$sql = "SELECT * FROM `tr_existencias`  WHERE  `gtin` = '$gtin'";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);


 $sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);

$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);

// $cod_mercaderia = $cod_droga;


$precio_u = round($precio_unitario / $cant_caja,2);


$cod_mercaderia = $cod_droga;

$sql2 = "SELECT * FROM `existencias` where cod_mercaderia = '$cod_mercaderia' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' and lote = '$lote'";
$result2 = $db->Execute($sql2);
$cod_merca=strtoupper($result2->fields["cod_mercaderia"]);


$cantidad_ingresada=strtoupper($result2->fields["cantidad_ingresada"]);
$cod_deta=strtoupper($result2->fields["cod_detalle"]);
$presentacion=strtoupper($result1->fields["presentacion"]);
//$lote=strtoupper($result1->fields["lote"]);
$lote1=strtoupper($result1->fields["lote"]);
$mes_lote1=strtoupper($result1->fields["mes_lote"]);
$anio_lote1=strtoupper($result1->fields["anio_lote"]);
$precio_nuevo=strtoupper($result1->fields["precio_nuevo"]);
//$total=strtoupper($result1->fields["total"]);

$total = round($precio_u * $cantidad,2);
 $total1 = round($precio_u * $cantidad,2);


// 
if ($devuelve > 0){

if ($cod_merca == ""){
$cant = $cantidad;
  $sql = "INSERT INTO `existencias` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `lote` ,  `mes_lote` , `anio_lote` , `cantidad_ingresada` , `precio_unitario` , `cantidad_salida` , `fecha_ultimo_mov` , `proveedor` )  VALUES ('$nro_factura' , '' ,'$cod_mercaderia' , '$lote' , '$mes_lote' , '$anio_lote', '$cant' , '$precio_u' , '' , '$fecha' ,  '$cuenta')";
mysql_query($sql);


  $sql = "INSERT INTO stock (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `tipo_doc`, `documento`, `cod_droga`, `nro_os`) VALUES ('$cod_mercaderia'  , '$fecha' , '3' , 'X' , '$idgenerado' , '$cantidad' , '$precio_u' , '$lote' , '$mes_lote', '$anio_lote' , '900' , '' , '' , '' , '$tipo_doc' ,'$documento' , '$cod_droga' , '$nro_os')";
mysql_query($sql);

}
else {

$cant = $cantidad_ingresada + $cantidad;
 $sql = "UPDATE `existencias` SET `cantidad_ingresada` = '$cant', `precio_unitario` = '$precio_u' , `fecha_ultimo_mov` = '$fecha' WHERE cod_mercaderia = '$cod_mercaderia' and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote= '$anio_lote' and cod_detalle = '$cod_deta'";
mysql_query($sql);

$sql = "INSERT INTO stock (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `tipo_doc`, `documento`, `cod_droga`, `nro_os`) VALUES ('$cod_mercaderia'  , '$fecha' , '2' , 'X' , '$idgenerado' , '$cantidad' , '$precio_u' , '$lote' , '$mes_lote', '$anio_lote' , '900' , '' , '' , '' , '$tipo_doc' ,'$documento' , '$cod_droga' , '$nro_os')";
mysql_query($sql);
}


$total_neto =$total_neto + $total;


 $sql = "INSERT INTO `compras_detalle` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `presentacion` , `lote` , `mes_lote` ,  `anio_lote` , `cantidad` , `precio_unitario` , `total` )  VALUES ('$idgenerado' , '' ,'$cod_mercaderia' ,'$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_u' , '$total')";
mysql_query($sql);






$cont = $cont + 1;

 }
//////////////////

	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;


 $sql = "UPDATE compras_encabezado SET `total` = '$total_neto' WHERE `nro_factura` = $idgenerado";
mysql_query($sql);


$sumatoria = $cont;
		$cont = 0;

$desc_factura1= 0;
$subtotal= 0;

$total_factura = 0;
$neto = 0;
$iva = 0;
 


$total_factura = 0;
$neto = 0;
$iva = 0;

$leyenda  = "SE GENERO INGRESO AL UNICO POR N/CRE";
include ("../../alertas/campo_informacion.php");

?>
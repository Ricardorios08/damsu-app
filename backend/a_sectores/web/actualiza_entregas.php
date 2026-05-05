<?php

include ("../../conexiones/config_usu.php");
require_once("../../nusoap/lib/nusoap.php");


////////////////////// actualiza encabezado facturas
 $wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('variable1'=>$a); 
 $response= $client->call('entregas', $param1);




$sql1="select * from tr_ventas_encabezado where nro_factura > $response";
$result = $db->Execute($sql1);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$nro_receta=$result->fields["nro_receta"];
$documento=$result->fields["documento"];
$tipo_doc=$result->fields["tipo_doc"];
$plan=$result->fields["plan"];
$operador=$result->fields["operador"];
$denominacion=$result->fields["denominacion"];
$fecha=$result->fields["fecha"];
$forma_pago=$result->fields["forma_pago"];
$porc_dto=$result->fields["porc_dto"];
$nombre_operador=$result->fields["nombre_operador"];
$nro_os=$result->fields["nro_os"];
$nombre_os=$result->fields["nombre_os"];
$neto=$result->fields["neto"];
$cod_movimiento=$result->fields["cod_movimiento"];
$tipo_factura=$result->fields["tipo_factura"];
$observacionnes=$result->fields["observacionnes"];
$departamento=$result->fields["departamento"];

  
   $sql = "INSERT INTO `tr_ventas_encabezado` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura` , `observacionnes` , `departamento`) VALUES ('$tipo_fact', '$nro_factura', '$nro_receta', '$documento', '$tipo_doc', '$plan', '$operador', '$denominacion', '$fecha', '$forma_pago', '$porc_dto', '$nombre_operador', '$nro_os', '$nombre_os' , '$neto' , '$cod_movimiento' , '$tipo_factura' , '$observacionnes' , '$departamento' )";





if ($cont == ""){
$sql = "('$tipo_fact', '$nro_factura', '$nro_receta', '$documento', '$tipo_doc', '$plan', '$operador', '$denominacion', '$fecha', '$forma_pago', '$porc_dto', '$nombre_operador', '$nro_os', '$nombre_os' , '$neto' , '$cod_movimiento' , '$tipo_factura' , '$observacionnes' , '$departamento')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$tipo_fact', '$nro_factura', '$nro_receta', '$documento', '$tipo_doc', '$plan', '$operador', '$denominacion', '$fecha', '$forma_pago', '$porc_dto', '$nombre_operador', '$nro_os', '$nombre_os' , '$neto' , '$cod_movimiento' , '$tipo_factura' , '$observacionnes' , '$departamento')";
$sql1 = $sql1.",".$sql;
}
$result->MoveNext();
}

$sql1 = $sql1.";";


 $sql9 = "INSERT INTO `tr_ventas_encabezado` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura` , `observaciones` , `departamento`) VALUES ".$sql1;


$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql9); 
 echo $response= $client->call('pacientes', $param1);






////////////////////// actualiza encabezado facturas
 $wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('variable1'=>$a); 
 $response= $client->call('entregas_detalle', $param1);

 // ACTUALIZA DETALLE

 
$sql1="select * from tr_ventas_detalle where nro_factura > $response";
$result = $db->Execute($sql1);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$cod_detalle=$result->fields["cod_detalle"];
$cod_mercaderia=$result->fields["cod_mercaderia"];
$descripcion=$result->fields["descripcion"];
$presentacion=$result->fields["presentacion"];
$lote=$result->fields["lote"];
$mes_lote=$result->fields["mes_lote"];
$anio_lote=$result->fields["anio_lote"];
$cantidad=$result->fields["cantidad"];
$precio_unitario=$result->fields["precio_unitario"];
$total=$result->fields["total"];
$proveedor=$result->fields["proveedor"];
$operador=$result->fields["operador"];
$gtin=$result->fields["gtin"];
$resultado=$result->fields["resultado"];
$transaccion=$result->fields["transaccion"];
$nro_serie=$result->fields["nro_serie"];
$programa=$result->fields["programa"];
$grupo=$result->fields["grupo"];
$fecha=$result->fields["fecha"];
$afectada=$result->fields["afectada"];



if ($cont == ""){
$sql = "('$tipo_fact' , '$nro_factura' , '$cod_detalle' , '$cod_mercaderia' , '$descripcion' , '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_unitario' , '$total' , '$proveedor' , '$operador' , '$gtin' , '$resultado' , '$transaccion' , '$nro_serie' , '$programa' , '$grupo' , '$fecha' , '$afectada')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$tipo_fact' , '$nro_factura' , '$cod_detalle' , '$cod_mercaderia' , '$descripcion' , '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_unitario' , '$total' , '$proveedor' , '$operador' , '$gtin' , '$resultado' , '$transaccion' , '$nro_serie' , '$programa' , '$grupo' , '$fecha' , '$afectada')";
$sql1 = $sql1.",".$sql;
}
$result->MoveNext();
}

$sql1 = $sql1.";";


 $sql10 = "INSERT INTO `tr_ventas_detalle` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie` , `programa` , `grupo` , `fecha` , `afectada`)  VALUES ".$sql1;


$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql10); 
echo  $response= $client->call('pacientes', $param1);


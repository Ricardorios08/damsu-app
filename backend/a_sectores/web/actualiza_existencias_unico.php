<?php

include ("../../conexiones/config_usu.php");
require_once("../../nusoap/lib/nusoap.php");


//////////////////////// actualiza unico

$sql = "TRUNCATE existencias";

 $wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);


$sql1="select * from existencias where cantidad_ingresada - cantidad_salida > 0";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_detalle=strtoupper($result1->fields["cod_detalle"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);
$precio_unitario=$result1->fields["precio_unitario"];
$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);
$fecha_ultimo_mov=strtoupper($result1->fields["fecha_ultimo_mov"]);
$proveedor=strtoupper($result1->fields["proveedor"]);
$cod_interno=strtoupper($result1->fields["cod_interno"]);



if ($cont == ""){
$sql = "('$nro_factura', '$cod_detalle', '$cod_mercaderia', '$lote', '$mes_lote', '$anio_lote', '$cantidad_ingresada', '$precio_unitario', '$cantidad_salida', '$fecha_ultimo_mov', '$proveedor', '$cod_interno')";
$cont = $cont + 1;
$sql1 = $sql;
}else{
	$cont = $cont + 1;
$sql = "('$nro_factura', '$cod_detalle', '$cod_mercaderia', '$lote', '$mes_lote', '$anio_lote', '$cantidad_ingresada', '$precio_unitario', '$cantidad_salida', '$fecha_ultimo_mov', '$proveedor', '$cod_interno')";
$sql1 = $sql1.",".$sql;
}
$result1->MoveNext();
}

$sql1 = $sql1.";";




 $sql8 = "INSERT INTO `existencias` (`nro_factura`, `cod_detalle`, `cod_mercaderia`, `lote`, `mes_lote`, `anio_lote`, `cantidad_ingresada`, `precio_unitario`, `cantidad_salida`, `fecha_ultimo_mov`, `proveedor`, `cod_interno`) VALUES ".$sql1;


$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql8); 
echo  $response= $client->call('pacientes', $param1);


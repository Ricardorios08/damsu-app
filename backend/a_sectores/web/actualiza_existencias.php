<?php
include ("../../conexiones/config_usu.php");
require_once("../../nusoap/lib/nusoap.php");

//////////////////////// actualiza PO
/*
 $sql = "TRUNCATE tr_existencias"; // web existencias

 $wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql); 
echo $response= $client->call('pacientes', $param1);

*/
 



$cont = 0;

echo $sql100="select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 limit 10 ";
$result1 = $db->Execute($sql100);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$gtin=$result1->fields["gtin"];
$nro_serie=$result1->fields["nro_serie"];
$fecha_ultimo_mov=strtoupper($result1->fields["fecha_ultimo_mov"]);
$nro_factura=strtoupper($result1->fields["nro_factura"]);
$cod_detalle=strtoupper($result1->fields["cod_detalle"]);
$cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cantidad_ingresada=strtoupper($result1->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result1->fields["cantidad_salida"]);
$fecha_ultimo_mov=strtoupper($result1->fields["fecha_ultimo_mov"]);
$proveedor=strtoupper($result1->fields["proveedor"]);
$proveedor=strtoupper($result1->fields["proveedor"]);
$gtin=strtoupper($result1->fields["gtin"]);
$transaccion=strtoupper($result1->fields["transaccion"]);
$nro_serie=strtoupper($result1->fields["nro_serie"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);
$grupo=strtoupper($result1->fields["grupo"]);
$laboratorio=strtoupper($result1->fields["laboratorio"]);

if ($cont == ""){
$sql25 = "('$nro_factura', '$cod_detalle', '$cod_mercaderia', '$lote', '$mes_lote', '$anio_lote', '$cantidad_ingresada', '$precio_unitario', '$cantidad_salida', '$fecha_ultimo_mov', '$proveedor', '$gtin', '$transaccion', '$nro_serie', '$cod_droga', '$grupo', '$laboratorio')";
$cont = $cont + 1;
$sql10 = $sql25;
}else{
	$cont = $cont + 1;
$sql25 = "('$nro_factura', '$cod_detalle', '$cod_mercaderia', '$lote', '$mes_lote', '$anio_lote', '$cantidad_ingresada', '$precio_unitario', '$cantidad_salida', '$fecha_ultimo_mov', '$proveedor', '$gtin', '$transaccion', '$nro_serie', '$cod_droga', '$grupo', '$laboratorio')";
$sql10 = $sql10.",".$sql25;
}


$result1->MoveNext();
}

 $sql10 = $sql10.";";



 $sql9 = "INSERT INTO `tr_existencias` (`nro_factura`, `cod_detalle`, `cod_mercaderia`, `lote`, `mes_lote`, `anio_lote`, `cantidad_ingresada`, `precio_unitario`, `cantidad_salida`, `fecha_ultimo_mov`, `proveedor`, `gtin`, `transaccion`, `nro_serie`, `cod_droga`, `grupo`, `laboratorio`) VALUES ".$sql10;

/*
$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client1=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql9); 
 echo $response= $client1->call('pacientes', $param1);
*/

 

$wsdl='http://cooperadorahc.com/cooperadora/nusoap/lib/servicio_papo.php?wsdl';
$client1=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql9); 
 echo $response= $client1->call('pacientes', $param1);

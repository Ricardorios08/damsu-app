<?php 
include ("../../conexiones/config_usu.php");

$mes = "02";
$anio = "14";
$nro_archivo = "1";

  $sql1="delete from archivo_meta";
//$result1 = $db->Execute($sql1);

  $sql1="select * from archivo_meta_temp order by nro_factura, troquel";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo 1".$db->ErrorMsg());
  while (!$result1->EOF) {

$recetaid=strtoupper($result1->fields["recetaid"]);

$nro_factura=strtoupper($result1->fields["nro_factura"]);

$troquel=strtoupper($result1->fields["troquel"]);

 $sql="select * from monodrogas where troquel = $troquel";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$cod_mercaderia=strtoupper($result->fields["cod_barra"]);

$cantidad=strtoupper($result1->fields["cantidad"]);
$medicamento=strtoupper($result1->fields["medicamento"]);
$presentacion=strtoupper($result1->fields["presentacion"]);
$laboratorio=strtoupper($result1->fields["laboratorio"]);
$drogas=strtoupper($result1->fields["drogas"]);
$descuento=strtoupper($result1->fields["descuento"]);
$precio_interno=strtoupper($result1->fields["precio_interno"]);
$precio_interno_cant=strtoupper($result1->fields["precio_interno_cant"]);

$precio_conv_cant=strtoupper($result1->fields["precio_conv_cant"]);
$fecha_carga=strtoupper($result1->fields["fecha_carga"]);
$tipo_doc=strtoupper($result1->fields["tipo_doc"]);
$documento=strtoupper($result1->fields["documento"]);
$afiliado=strtoupper($result1->fields["afiliado"]);
$nombre_af=strtoupper($result1->fields["nombre_af"]);
$identificador=strtoupper($result1->fields["identificador"]);
$prescriptor=strtoupper($result1->fields["prescriptor"]);
$matricula=strtoupper($result1->fields["matricula"]);
$provincia=strtoupper($result1->fields["provincia"]);
$patologia=strtoupper($result1->fields["patologia"]);
$fecha_formula=strtoupper($result1->fields["fecha_formula"]);

$precio_conv=strtoupper($result1->fields["precio_conv_cant"]);



$pieces = explode(".", $precio_conv);
$pieces[0]; // piece1
$pieces[1]; // piece2
$precio_conv = $pieces[0]."".$pieces[1];

$pieces = explode(",", $precio_conv);
$pieces[0]; // piece1
$pieces[1]; // piece2
$precio_conv = $pieces[0].".".$pieces[1];

$sql="select * from tr_ventas_detalle where nro_factura = $nro_factura";
$result = $db->Execute($sql);
$nro_fact=strtoupper($result->fields["nro_factura"]);

$sql="select * from tr_ventas_encabezado where nro_factura = $nro_factura";
$result = $db->Execute($sql);
$fecha_factura=strtoupper($result->fields["fecha"]);


echo $sql="select sum(cantidad) as cantidad_programa from tr_ventas_detalle where cod_mercaderia = $cod_mercaderia and nro_factura = $nro_factura";
$result = $db->Execute($sql);
$cantidad_programa=strtoupper($result->fields["cantidad_programa"]);

echo $sql="select sum(precio_unitario) as precio_programa from tr_ventas_detalle where cod_mercaderia = $cod_mercaderia and nro_factura = $nro_factura";
$result = $db->Execute($sql);
$precio_programa=strtoupper($result->fields["precio_programa"]);

//$precio_programa = $precio_programa / $cantidad_programa;

echo $sql10 = "INSERT INTO archivo_meta (`mes`, `anio`, `nro_archivo`, `nro_factura`, `cod_mercaderia`, `troquel`, `nombre_comercial`, `cod_droga`, `drogas`, `cantidad`, `precio_unitario`, `documento` , `cantidad_programa` , `nro_fact` , `precio_programa` ,  `fecha_factura` ) VALUES ('$mes', '$anio', '$nro_archivo', '$nro_factura', '$cod_mercaderia', '$troquel', '$nombre_comercial', '$cod_droga', '$drogas', '$cantidad', '$precio_conv', '$documento' ,  '$cantidad_programa' ,  '$nro_fact' , '$precio_programa' , '$fecha_factura');";
//$result10 = $db->Execute($sql10);


$result1->MoveNext();
	}






	$fecha_desde = '2014-02-01';
	$fecha_hasta = '2014-02-31';

 $sql1="select * from tr_ventas_encabezado where fecha between '$fecha_desde' and '$fecha_hasta' order by nro_factura";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo 1".$db->ErrorMsg());
  while (!$result1->EOF) {


$nro_factura=strtoupper($result1->fields["nro_factura"]);

 $sql2="select * from archivo_meta where nro_factura = $nro_factura";
$result2 = $db->Execute($sql2);

$nro_fa=strtoupper($result2->fields["nro_factura"]);

if ($nro_fa == ''){
$nro_fa;

}


$sql10 = "INSERT INTO archivo_meta (`mes`, `anio`, `nro_archivo`, `nro_factura`, `cod_mercaderia`, `troquel`, `nombre_comercial`, `cod_droga`, `drogas`, `cantidad`, `precio_unitario`, `documento` , `cantidad_programa` , `nro_fact` , `precio_programa` ,  `fecha_factura` ) VALUES ('$mes', '$anio', '$nro_archivo', '$nro_factura', '$cod_mercaderia', '$troquel', '$nombre_comercial', '$cod_droga', '$drogas', '$cantidad', '$precio_conv', '$documento' ,  '$cantidad_programa' ,  '$nro_fact' , '$precio_programa' , '$fecha_factura');";
//-----------$result10 = $db->Execute($sql10);


$result1->MoveNext();
	}
<?php 
include ("../../conexiones/config_usu.php");

$mes = "04";
$anio = "2013";
$nro_archivo = "2";

  $sql1="delete from archivo_papo_resumen";
$result1 = $db->Execute($sql1);

  $sql1="select * from archivo_papo group by nro_factura";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo 1".$db->ErrorMsg());
  while (!$result1->EOF) {


$nro_factura=strtoupper($result1->fields["nro_factura"]);


  $sql11="select * from archivo_papo where nro_factura =  $nro_factura group by cod_mercaderia";
$result11 = $db->Execute($sql1);

 if (!$result11) die("fallo 1".$db->ErrorMsg());
  while (!$result11->EOF) {


$presentacion=strtoupper($result11->fields["presentacion"]);

$cod_mercaderia=strtoupper($result11->fields["cod_mercaderia"]);


$sql21="select * from monodrogas where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
$troquel=strtoupper($result21->fields["troquel"]);
$nombre_comercial=strtoupper($result21->fields["nombre_comercial"]);
$cod_droga=strtoupper($result21->fields["cod_droga"]);

$sql21="select * from drogas where cod_droga = $cod_droga";
$result21 = $db->Execute($sql21);
$drogas=strtoupper($result21->fields["drogas"]);


$documento=strtoupper($result11->fields["documento"]);
 
$nro_fact=strtoupper($result11->fields["nro_fact"]);
 
$fecha_factura=strtoupper($result11->fields["fecha_factura"]);


 $sql="select sum(cantidad) as cantidad_programa from tr_ventas_detalle where cod_mercaderia = $cod_mercaderia and nro_factura = $nro_factura";
$result = $db->Execute($sql);
$cantidad_programa=strtoupper($result->fields["cantidad_programa"]);

 $sql="select sum(precio_unitario) as precio_programa from tr_ventas_detalle where cod_mercaderia = $cod_mercaderia and nro_factura = $nro_factura";
$result = $db->Execute($sql);
$precio_programa=strtoupper($result->fields["precio_programa"]);


echo $sql10 = "INSERT INTO archivo_papo_resumen (`mes`, `anio`, `nro_archivo`, `nro_factura`, `cod_mercaderia`, `troquel`, `nombre_comercial`, `cod_droga`, `drogas`, `cantidad`, `precio_unitario`, `documento` , `cantidad_programa`, `nro_fact`, `precio_programa`, `fecha_factura`, `troquel_po`) VALUES ('$mes', '$anio', '$nro_archivo', '$nro_factura', '$cod_mercaderia', '$troquel', '$nombre_comercial', '$cod_droga', '$drogas', '$cantidad', '$precio_programa', '$documento' , '$cantidad_programa' , '' , '$precio_programa' , '' , '');";
$result10 = $db->Execute($sql10);
 

$result11->MoveNext();
	}

	$result1->MoveNext();
	}

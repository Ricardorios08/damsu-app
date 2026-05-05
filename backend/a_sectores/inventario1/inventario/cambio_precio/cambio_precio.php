<?php 
include ("../../../../conexiones/config_usu.php");

 
$anio = "2014";
 

  $sql1="delete from cambio_precio where anio = $anio";
$result1 = $db->Execute($sql1);

  $sql1="select * from cambio_precio_temp1 order by troquel";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo 1".$db->ErrorMsg());
  while (!$result1->EOF) {

$precio_convenio=strtoupper($result1->fields["precio_convenio"]);
$troquel=strtoupper($result1->fields["troquel"]);
$medicamento=strtoupper($result1->fields["medicamento"]);
$presentacion_ace=strtoupper($result1->fields["presentacion"]);


 $sql="select * from monodrogas where troquel = $troquel";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_mercaderia=strtoupper($result->fields["cod_barra"]);
$precio_anterior=strtoupper($result->fields["precio_actualizado"]);
$presentacion=strtoupper($result->fields["presentacion"]);


$pieces = explode(".", $precio_convenio);
$pieces[0]; // piece1
$pieces[1]; // piece2
 $precio_convenio = $pieces[0]."".$pieces[1];



$pieces = explode(",", $precio_convenio);
$pieces[0]; // piece1
$pieces[1]; // piece2


 $precio_convenio = $pieces[0].".".$pieces[1];



if ($cod_mercaderia == 0){
$nombre_comercial = "NO EXISTE EN BASE ".$medicamento;
$presentacion = $presentacion_ace;
}

 $sql10 = "INSERT INTO cambio_precio (`troquel`, `cod_mercaderia`, `nombre_comercial`, `precio_anterior`, `precio_convenio`, `anio` , `presentacion`) VALUES ('$troquel', '$cod_mercaderia', '$nombre_comercial', '$precio_anterior', '$precio_convenio', '$anio' , '$presentacion')";
$result10 = $db->Execute($sql10);


$result1->MoveNext();
	}

	

include ("ver_cambio.php");




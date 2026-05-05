<?php 
include ("../../../conexiones/config_pro.php");

 $sql="select * from tr_ventas_encabezado where `fecha` between '$desde' and '$hasta' ORDER by nro_factura, fecha desc";
$result8 = $db->Execute($sql);

  if (!$result8) die("fallo".$db->ErrorMsg());
  while (!$result8->EOF) {

 
$nro_factura=strtoupper($result8->fields["nro_factura"]);


$documento=strtoupper($result8->fields["documento"]);


$sql1="select * from paciente_diagnostico where documento = '$documento'";
$result1 = $db->Execute($sql1);

$cod_fuente=strtoupper($result1->fields["cod_fuente"]);

$sql1="select * from fuentes where nro_fuente = '$cod_fuente'";
$result1 = $db->Execute($sql1);

$nombre_fuente=strtoupper($result1->fields["nombre_fuente"]);

  $sql1 = "UPDATE `tr_ventas_encabezado` SET nombre_fuente = '$nombre_fuente' , fuente = '$cod_fuente' WHERE `nro_factura` = $nro_factura";
$result1 = $db->Execute($sql1);
 
 

	$result8->MoveNext();
	}


	?>
 
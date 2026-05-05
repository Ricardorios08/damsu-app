<?php 



include ("est_detalle_mono.php");

  include ("../../../conexiones/config_pro.php");

 $sql="select * from tr_ventas_encabezado where fecha between '$desde' and '$hasta' and nro_os = 10 ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
$nro_factura=strtoupper($result->fields["nro_factura"]);
$neto2=strtoupper($result->fields["neto"]);
$cod_movimiento=$result->fields["cod_movimiento"];

 $sql8 = "SELECT * FROM tr_ventas_estadistica where nro_factura = $nro_factura";
$result8 = $db->Execute($sql8);
$nro_fac=$result8->fields["nro_factura"];

if ($nro_factura == $nro_fac){

if ($cod_movimiento == 3){
$total_total2 = $total_total2 - $neto2;
}else{
$total_total2 = $total_total2 + $neto2;
}

$cuenta = "";
	
}

	$result->MoveNext();
	}

$total_total2;


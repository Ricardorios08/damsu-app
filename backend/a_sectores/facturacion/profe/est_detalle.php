<?php 


include ("../../../conexiones/config_pro.php");

 $sql8 = "delete  FROM tr_ventas_estadistica";
$result8 = $db->Execute($sql8);


 $sql="select * from tr_ventas_detalle where fecha between '$fecha_desde' and '$fecha_hasta' and nro_os = 10 and nro_factura != 165057   ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cuent = $cuenta;


 $nro_factura=strtoupper($result->fields["nro_factura"]);
 $cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
  $cantidad=strtoupper($result->fields["cantidad"]);
 $precio_unitario=strtoupper($result->fields["precio_unitario"]);
$neto = $cantidad * $precio_unitario;


$sql8 = "SELECT * FROM monodrogas where cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql8);
$nombre_comercial=$result8->fields["nombre_comercial"];
$cod_droga=$result8->fields["cod_droga"];


$sql11 = "SELECT *  FROM drogas WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $droga=$result11->fields["droga"];

 $sql11 = "SELECT *  FROM drogas_profe WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $drogas_profe=$result11->fields["cod_droga"];


 $sql3="select * from tr_ventas_encabezado where  nro_factura = '$nro_factura'";
$result3 = $db->Execute($sql3);

$cuenta=strtoupper($result3->fields["documento"]);

 $cod_movimiento=strtoupper($result3->fields["cod_movimiento"]);
$forma_pago=strtoupper($result3->fields["forma_pago"]);
$nro_factura=strtoupper($result3->fields["nro_factura"]);

$denominacion=strtoupper($result3->fields["denominacion"]);
$tipo_fact=strtoupper($result3->fields["tipo_fact"]);

$fecha=strtoupper($result3->fields["fecha"]);
$descuento=strtoupper($result3->fields["descuento"]);

$bonificacion=strtoupper($result3->fields["bonificacion"]);
$subtotal=strtoupper($result3->fields["subtotal"]);
$iva=strtoupper($result3->fields["iva"]);
$total=strtoupper($result3->fields["total"]);
$periodo=strtoupper($result3->fields["periodo"]);
$anio=strtoupper($result3->fields["anio"]);
$nro_receta=strtoupper($result3->fields["nro_receta"]);


$documento=strtoupper($result3->fields["documento"]);



$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);

$fecha = $dia."/".$mes."/".$anio;





SWITCH ($cod_movimiento){

case "1":{
$entrada = $precio_renglon;
$movimiento = "N/Entrega";
BREAK;
}

case "2":{
$entrada = $precio_renglon;
$movimiento = "NOTA DE DEBITO";
BREAK;
}

case "3":{
$salida = $precio_renglon;
$movimiento = "DEV. PO";


BREAK;
}

case "4":{
$salida = $precio_renglon;
$movimiento = "PAGO POR CAJA";
BREAK;
}


CASE "5":{
$salida = $precio_renglon;
$movimiento = "DESC X LIQUIDACION";
BREAK;
}

CASE "6":{
$salida = ($precio_renglon * -1);
$movimiento = "ANULADA";
BREAK;
}

}







if ($drogas_profe != ""){

	if ($cod_movimiento == 3){
		//$total_total = $total_total - $neto;
	
	}
	else{
//$total_total = $total_total + $neto;

	}

if ($nro_factura != '164412'){
$sql3 = "INSERT INTO `tr_ventas_estadistica` (`nro_factura`) VALUES ('$nro_factura')";
$result3 = $db->Execute($sql3);
}


 


if ($nro_factura == '165057'){
$sql3 = "INSERT INTO `tr_ventas_estadistica` (`nro_factura`) VALUES ('$nro_factura')";
$result3 = $db->Execute($sql3);
}


$cant = $cant + 1;


}


$cuenta = "";
	

	$result->MoveNext();
	}


 $sql3 = "INSERT INTO `tr_ventas_estadistica` (`nro_factura`) VALUES ('167497')";
$result3 = $db->Execute($sql3);
	?>


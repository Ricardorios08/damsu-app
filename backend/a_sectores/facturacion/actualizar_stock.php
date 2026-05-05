<?php 	

include("../../../conexiones/config_pro.php");


$id = $_REQUEST['id'];



$sql3 = "SELECT * FROM `tr_compras1_encab_temp` where operador = $id";
$result3 = $db->Execute($sql3);
$nro_factura=strtoupper($result3->fields["nro_factura"]);
$cod_operacion=strtoupper($result3->fields["cod_operacion"]);
$nro_proveedor=strtoupper($result3->fields["nro_proveedor"]);
$denominacion=strtoupper($result3->fields["denominacion"]);
$fecha=strtoupper($result3->fields["fecha"]);
$descuento=strtoupper($result3->fields["descuento"]);
$bonificacion=strtoupper($result3->fields["bonificacion"]);
$periodo=strtoupper($result3->fields["periodo"]);
$anio=strtoupper($result3->fields["anio"]);
$operador=strtoupper($result3->fields["operador"]);


$total_compra = $total_neto;

{


 echo $sql = "INSERT INTO tr_compras_encab (`nro_factura`, `cod_operacion`, `nro_proveedor`, `denominacion`, `fecha`, `descuento`, `bonificacion`, `periodo`, `anio`, `operador`, `cod_movimiento` , `total`) VALUES ('$nro_factura', '$cod_operacion', '$nro_proveedor', '$denominacion', '$fecha', '$descuento', '$bonificacion', '$periodo', '$anio', '$operador', '$cod_movimiento' , '$total');";
//mysql_query($sql);
echo "<br>";
echo "<br>";

  echo  $sql = "INSERT INTO `tr_ventas_encabezado` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura`, 	`observaciones`,`departamento`,`cod_diagnostico`,`cod_agrupado` , `enviar` , `estado` , `fecha_coir` , `fecha_farmacia` , `fecha_servicio` , `fuente` , `nombre_fuente`) VALUES ( '001'  , '' , '$nro_receta' , '$documento' , '$tipo_doc' , '' , '$operador' , '$nombre_completo' , '$fecha' , '$forma_pago' , '' , '$nombre_operador' , '$nro_os' , '$sigla', '' , '1' , '$tipo_factura' , '$observaciones' , '$departamento' , 	'$cod_diagnostico' , 	'$cod_agrupado' , '$enviar' , 'ASIGNADO' , '' , '' , '' , '$cod_fuente' , '$nombre_fuente' )";
//mysql_query($sql);

echo "<br>";
echo "<br>";
 $idgenerado = mysql_insert_id();


$sql1 = "SELECT * FROM `tr_compras1_deta_temp` where operador = '$id'";
$result1 = $db->Execute($sql1);



if (!$result1) die("fallo".$db->ErrorMsg());
 while (!$result1->EOF) {

$nro_factura=$result1->fields["nro_factura"];
$cod_detalle=$result1->fields["cod_detalle"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$presentacion=strtoupper($result1->fields["presentacion"]);
 $lote=$result1->fields["lote"];
$mes_lote=$result1->fields["mes_lote"];
$anio_lote=$result1->fields["anio_lote"];
$gtin=$result1->fields["gtin"];
$precio_unitario=$result1->fields["precio_unitario"];
 
$resultado=$result1->fields["resultado"];
$transaccion=$result1->fields["transaccion"];

$nro_serie=$result1->fields["nro_serie"];


$cod_movimiento=$result1->fields["cod_movimiento"];

$cantidad_ingresada=1;

$total = $total + $precio_unitario;

$fecha_ultimo_mov = date("y-m-d");

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);

$cod_droga=strtoupper($result->fields["cod_droga"]);
$grupo=strtoupper($result->fields["grupo"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);


$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);


  $sql = "INSERT INTO `tr_compras_detalle` (`nro_factura`, `cod_detalle`, `cod_mercaderia`, `presentacion`, `lote`, `mes_lote`, `anio_lote`, `gtin`, `precio_unitario`, `precio_nuevo`, `total`, `cod_movimiento`, `operador` , `proveedor` , `resultado` , `transaccion` , `nro_serie`) VALUES ('$nro_factura', NULL, '$cod_mercaderia', '$presentacion', '$lote1', '$mes_lote', '$anio_lote' , '$gtin', '$precio_unitario' , '$precio_unitario' , '$precio_unitario' , '1', '$id' , '$nro_proveedor' , '$resultado' , '$transaccion' , '$nro_serie' );";
//mysql_query($sql);

echo $sql = "INSERT INTO `tr_ventas_detalle` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie`)  VALUES ('001' , '$idgenerado' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote1' , '$mes_lote' , '$anio_lote' , '1' , '$precio_unitario' , '$precio_unitario' , '$proveedor' , '$operador' , '$gtin' , '$resultado' , '' , '$nro_serie')";
mysql_query($sql);
echo "<br>";
echo "<br>";

 echo  $sql = "UPDATE `tr_ventas_detalle` SET `grupo` = '$grupo' , `fecha` = '$fecha',  `nro_receta` = '$nro_receta' ,  `cod_droga` = '$cod_droga' , `nro_os` = '$nro_os' ,  `manual` = '$manual' WHERE `nro_factura` = '$idgenerado' and cod_mercaderia = $cod_mercaderia";
mysql_query($sql);
echo "<br>";
echo "<br>";


$result1->MoveNext();
				}




$sql = "TRUNCATE TABLE `tr_compras1_deta_temp` where operador = $id";
mysql_query($sql);



 


 $sql = "DELETE FROM tr_compras1_encab_temp where operador = $id";
$result = $db->Execute($sql);

 $sql = "DELETE FROM tr_compras1_deta_temp where operador = $id";
$result = $db->Execute($sql);



$leyenda = "SE ACTUALIZO EL STOCK, SE GUARDO EL MAYOR Y FACTURA COMPRA";
include ("../../../alertas/campo_informacion.php");

include ("pagina1.php");
exit;
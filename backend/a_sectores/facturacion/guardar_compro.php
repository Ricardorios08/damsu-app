<?php 

//echo "Guardar_factura.php";

include ("../../conexiones/config_pro.php");

$operador= $_REQUEST['operador'];


 $sql = "SELECT * FROM `tr_ventas1_encab_temp` where operador = $operador";
$result = $db->Execute($sql);

 $tipo_fact=$result->fields["tipo_fact"];
 $nro_factura=$result->fields["nro_factura"];

if ($nro_factura == ""){
exit;
}



$sql = "SELECT * FROM tr_ventas1_deta_temp where operador = $operador";
$result = $db->Execute($sql);

$cod_mercade=$result->fields["cod_mercaderia"];

if ($cod_mercade == ""){
$leyenda = "NO INGRESO NINGUN PRODUCTO";
include ("../../alertas/campo_informacion2.php");
exit;
}








$sql = "SELECT * FROM `tr_ventas1_encab_temp` where operador = $operador";
$result = $db->Execute($sql);

 $tipo_fact=$result->fields["tipo_fact"];
 $nro_factura=$result->fields["nro_factura"];
 $nro_receta=$result->fields["nro_receta"];
 $documento=$result->fields["documento"];
 $tipo_doc=$result->fields["tipo_doc"];
 $plan_completo=$result->fields["plan_completo"];
 $operador=$result->fields["operador"];
 $nombre_completo=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $observaciones=$result->fields["observaciones"];
 $nro_os=$result->fields["nro_os"];

 $departamento=$result->fields["departamento"];
 $cod_diagnostico=$result->fields["cod_diagnostico"];
 $enviar=$result->fields["enviar"];

/*
$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by fecha desc";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];

$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);
*/

/*
$sql7="select * from pacientes where documento = $documento and tipo_doc = '$tipo_doc'";
$result7 = $db->Execute($sql7);

$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;
$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero
$nombre_completo = $apellido.", ".$nombre;
*/





$dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $anio."-".$mes."-".$dia;



 


   $sql = "INSERT INTO `tr_ventas_encabezado` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura`, 	`observaciones`,`departamento`,`cod_diagnostico`,`cod_agrupado` , `enviar`) VALUES ( '001'  , '' , '$nro_receta' , '$documento' , '$tipo_doc' , '' , '$operador' , '$nombre_completo' , '$fecha' , '' , '' , '$nombre_operador' , '$nro_os' , '$sigla', '' , '1' , '$tipo_factura' , '$observaciones' , '$departamento' , 	'$cod_diagnostico' , 	'$cod_agrupado' , '$enviar'  )";
mysql_query($sql);

 $idgenerado = mysql_insert_id();

$nro_factura = $idgenerado;



  $sql3 = "SELECT * FROM tr_ventas1_deta_temp  WHERE  operador = $operador order by cod_detalle desc";
$result3 = $db->Execute($sql3);


if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;
$cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$devuelve= $result3->fields["devuelve"];
$manual= $result3->fields["manual"];
$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;
$nro_serie=strtoupper($result3->fields["nro_serie"]);


$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);

$presentacion=strtoupper($result3->fields["presentacion"]);
$nombre_comercial=strtoupper($result3->fields["nombre_comercial"]);

$sql7="select * from monodrogas where cod_barra = $cod_mercaderia";
$result7 = $db->Execute($sql7);
$grupo=strtoupper($result7->fields["grupo"]);
$cod_droga= $result7->fields["cod_droga"];
$laboratorio= $result7->fields["laboratorio"];



$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);

if ($grupo == 3){
$tipo_producto = "MONOCLONAL";
}

$total_factura = $total_factura + $precio_unitario;


$cont = $cont + 1;


$sql7="select count(gtin) as cant_gt from `tr_stock` where gtin = $gtin";
$result7 = $db->Execute($sql7);
$cant_gt=strtoupper($result7->fields["cant_gt"]);

if ($cant_gt < 2){
echo "aca guarda";
}


  $sql = "UPDATE `tr_existencias` SET `cantidad_salida` = '1' , `fecha_ultimo_mov` = '$fecha' WHERE gtin = '$gtin'";
mysql_query($sql);


$sql = "INSERT INTO `tr_ventas_detalle` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie`)  VALUES ('001' , '$idgenerado' , '' ,'$cod_mercaderia' , '$nombre_comercial', '$presentacion' , '$lote1' , '$mes_lote' , '$anio_lote' , '1' , '$precio_unitario' , '$precio_unitario' , '$proveedor' , '$operador' , '$gtin' , '' , '' , '$nro_serie')";
mysql_query($sql);

   $sql = "UPDATE `tr_ventas_detalle` SET `grupo` = '$grupo' , `fecha` = '$fecha',  `nro_receta` = '$nro_receta' ,  `cod_droga` = '$cod_droga' , `nro_os` = '$nro_os' ,  `manual` = '$manual' WHERE `nro_factura` = '$idgenerado' and cod_mercaderia = $cod_mercaderia";
mysql_query($sql);

$sql = "INSERT INTO `tr_stock` (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion` , `nro_serie` , `drogas` , `grupo` , `laboratorio` , `departamento` ) VALUES ('$cod_mercaderia' , '$fecha' , '6' , '$tipo_doc' , '$nro_factura' , '1' , '$precio_unitario' , '$lote1' , '$mes_lote' , '$anio_lote' , '$proveedor' ,  '$tipo_doc' , '' , '' , '$documento' , '$cod_droga' , '$nro_os' , '$gtin' , '$transaccion' ,'$nro_serie' , '$drogas' , '$grupo' , '$laboratorio' , '$departamento')" ;
mysql_query($sql);

  $sql = "UPDATE receta_detalle SET estado = '6' , fecha_modificacion = '$fecha'  WHERE nro_receta = $nro_receta and cod_droga = '$cod_droga'";
mysql_query($sql);



	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;

if ($grupo == 3){
$grupo = "MONOCLONAL";
}


if ($proveedor != 110){
$tipo_factura  ="PO ".$grupo;
}else
{
$tipo_factura  =$grupo;
}

if (($tipo_factura == 1) or ($tipo_factura == 2)){
$tipo_factura = "";
}


 $sql = "UPDATE tr_ventas_encabezado SET `neto` = '$total_factura' , tipo_factura = '$tipo_factura' , observaciones = '$observaciones'  , departamento = '$departamento' WHERE `nro_factura` = $idgenerado";
mysql_query($sql);



$hor = time();
date_default_timezone_set("America/Argentina/Mendoza");
$hora = date("H:i:s",$hor);



 $sql = "UPDATE receta SET `hora_facturacion` = '$hora' , fecha_factura = '$fecha'  WHERE nro_receta = $nro_receta";
mysql_query($sql);


$sumatoria = $cont;
		$cont = 0;

$desc_factura1= 0;
$subtotal= 0;

$total_factura = 0;
$neto = 0;
$iva = 0;
 


 $sql = "SELECT sum(devuelve) as cantidad FROM `tr_ventas1_deta_temp` WHERE  `operador` = '$operador'";
$result = $db->Execute($sql);
 $cantidad=$result->fields["cantidad"];

if ($cantidad >= 1){
include ("guardar_nc.php");
}


 $sql = "delete from tr_ventas1_deta_temp where operador = $operador";
mysql_query($sql);
 $sql = "delete from tr_ventas1_encab_temp where operador = $operador";
mysql_query($sql);

$total_factura = 0;
$neto = 0;
$iva = 0;

$leyenda  = "SE ACTUALIZO EL STOCK, EXISTENCIA Y FACTURA DE VENTA";
include ("../../alertas/campo_informacion.php");

?>
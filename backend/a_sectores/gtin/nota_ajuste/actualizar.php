<?php 

include("../../../conexiones/config_pro.php");
$id = $_REQUEST["id1"];


 $sql = "SELECT * FROM nota_ajuste  WHERE  `operador` = $id ";
$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$operador=strtoupper($result->fields["operador"]);
$fecha=strtoupper($result->fields["fecha"]);
$nro_factura_afectada=strtoupper($result->fields["nro_factura_afectada"]);
$importe=strtoupper($result->fields["importe"]);
$observaciones=strtoupper($result->fields["observaciones"]);

$observaciones = $observaciones." AFECTADA: (".$nro_factura_afectada.")";


$sql2 = "SELECT * FROM tr_ventas_detalle  WHERE  `nro_factura` = $nro_factura_afectada";
$result2 = $db->Execute($sql2);
 $proveedor=strtoupper($result2->fields["proveedor"]);


   $sql = "INSERT INTO `tr_ventas_encabezado15` (`tipo_fact`, `nro_factura`, `nro_receta`, `documento`, `tipo_doc`, `plan`, `operador`, `denominacion`, `fecha`, `forma_pago`, `porc_dto`, `nombre_operador`, `nro_os`, `nombre_os` , `neto` , `cod_movimiento` , `tipo_factura` , `observaciones`) VALUES ( '003'  , '' , '$nro_factura_afectada' , '132' , '1' , '' , '$operador' , 'NOTA AJUSTE PRECIO' , '$fecha' , '' , '' , '$nombre_operador' , '' , '', '$importe' , '3' , '' , '$observaciones' )";
mysql_query($sql);


 $idgenerado = mysql_insert_id();

$sql = "INSERT INTO `tr_ventas_detalle15` ( `tipo_fact` , `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `proveedor` , `operador` , `gtin` , `resultado` , `transaccion` , `nro_serie`)  VALUES ('003' , '$idgenerado' , '' ,'0' , 'NOTA AJUSTE PRECIO', '' , '' , '' , '' , '1' , '$importe' , '$importe' , '$proveedor' , '$operador' , '' , '' , '' , '')";
mysql_query($sql);




	 $result->MoveNext();
				}



$sql = "DELETE from `nota_ajuste` where operador = $id";
$result = $db->Execute($sql);

include ("imprimir.php");


// 428-7755

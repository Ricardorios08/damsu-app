<?php 	


include("../../../conexiones/config_usu.php");

$periodo = date("m"); 
$anio1 = date("y"); 



$sql = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result = $db->Execute($sql);
 $descripcion=strtoupper($result->fields["nombre_comercial"]);
 $presentacion=strtoupper($result->fields["presentacion"]);
 $grupo =$result->fields["grupo"];
  $precio_actualizado =$result->fields["precio_actualizado"];

$sql2 = "SELECT * FROM `existencias`  WHERE  `cod_mercaderia` = $cod_mercaderia and lote = $lote and mes_lote = $mes_lote and anio_lote = $anio_lote";
$result2 = $db->Execute($sql2);
 $cod_merca=strtoupper($result2->fields["cod_merca"]);
 $presentacion=strtoupper($result2->fields["presentacion"]);




if ($precio_unitario == ""){
$precio_unitario = $precio_actualizado;
$precio_nuevo = $precio_actualizado;
}


if ($descripcion != ""){

if ($cantidad == ""){
$leyenda ="NO INGRESO CANTIDAD";
include ("../../../alertas/campo_vacio.php");
	exit;
}

if ($cod_mercaderia== ""){

$leyenda ="NO INGRESO MERCADERIA";
include ("../../../alertas/campo_vacio.php");
	exit;
}

if ($descripcion == ""){

	$leyenda ="PRODUCTO INEXISTENTE";
	include ("../../../alertas/campo_vacio.php");
		exit;
}



$total = $cantidad * $precio_unitario;



$sql = "INSERT INTO `compras1_deta_temp` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `presentacion` , `lote` , `mes_lote` ,  `anio_lote` , `cantidad` , `precio_unitario` , `precio_nuevo` , `total` , `cod_movimiento` , `operador` )  VALUES ('$nro_factura' , '' ,'$cod_mercaderia' ,'$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_unitario' , '$precio_nuevo', '$total' , '$cod_movimiento' , '$id')";
mysql_query($sql);


}

include ("refrescar_detalle.php");//$refrescar = "NO";



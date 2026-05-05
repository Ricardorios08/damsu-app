<?php 	

$fecha = $anio."-".$mes."-".$dia;
include("../../../../conexiones/config_usu.php");

$periodo = date("m"); 
$anio1 = date("y"); 


$gtin= $_REQUEST['gtin'];
$cantidad= $_REQUEST['cantidad'];
$precio_unitario= $_REQUEST['precio_unitario'];

if ($precio_unitario == ""){
$leyenda ="NO INGRESO precio_unitario";
include ("../../../../alertas/campo_informacion2.php");
	exit;
}



if ($cantidad == ""){
$leyenda ="NO INGRESO CANTIDAD";
include ("../../../../alertas/campo_informacion2.php");
	exit;
}


if ($gtin == ""){
$leyenda ="NO INGRESO DROGA";
include ("../../../../alertas/campo_informacion2.php");
	exit;
}

$sql = "SELECT * FROM stock_inventario where cod_mercaderia = '$gtin'";
$result = $db->Execute($sql);
$gt=strtoupper($result->fields["gtin"]);

if ($gt != ""){
$leyenda ="YA CARGO ESE ARTICULO";
include ("../../../../alertas/campo_informacion2.php");
	exit;
}



/*

 $sql = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result = $db->Execute($sql);
 $descripcion=strtoupper($result->fields["nombre_comercial"]);
 $presentacion=strtoupper($result->fields["presentacion"]);
 $grupo =$result->fields["grupo"];
  $precio_actualizado =$result->fields["precio_actualizado"];
    $cod_droga =$result->fields["cod_droga"];

  $sql2 = "SELECT * FROM `tr_existencias`  WHERE  `cod_mercaderia` = $cod_mercaderia and lote = $lote and mes_lote = $mes_lote and anio_lote = $anio_lote and serie = '$nro_serie'";
$result2 = $db->Execute($sql2);
$cod_merca=strtoupper($result2->fields["cod_merca"]);
 $presentacion=strtoupper($result2->fields["presentacion"]);


  $sql2 = "SELECT gtin FROM `tr_existencias`  WHERE  gtin = '$gtin'";
$result2 = $db->Execute($sql2);
$gt=$result2->fields["gtin"];

if ($gt != ""){
$leyenda ="YA CARGO ESE GTIN";
include ("../../../../alertas/campo_vacio.php");
	exit;
}

if ($precio_unitario == ""){
$precio_unitario = $precio_actualizado;
$precio_nuevo = $precio_actualizado;
}

if ($descripcion != ""){





if ($gtin == ""){
$leyenda ="NO INGRESO GTIN";
include ("../../../../alertas/campo_vacio.php");
	exit;
}

if ($cod_mercaderia== ""){

$leyenda ="NO INGRESO MERCADERIA";
include ("../../../../alertas/campo_vacio.php");
	exit;
}

if ($descripcion == ""){

	$leyenda ="PRODUCTO INEXISTENTE";
	include ("../../../../alertas/campo_vacio.php");
		exit;
}

*/

$total = $cantidad * $precio_unitario;


$sql = "INSERT INTO stock_inventario1 ( `cod_mercaderia` , `cantidad` , `cod_operacion` , `precio_unitario` )  VALUES ('$gtin' , '$cantidad' , '' , '$precio_unitario')";
mysql_query($sql);

//}

include ("refrescar_detalle.php");//$refrescar = "NO";



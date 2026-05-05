<?php

include("../../../conexiones/config_pro.php");


 $sql = "SELECT * FROM `compras1_encab_temp`  WHERE operador = $id";
$result8 = $db->Execute($sql);

$nro_proveedor=$result8->fields["nro_proveedor"];
$fecha=$result8->fields["fecha"];
$cod_movimiento=$result8->fields["cod_movimiento"];
$nro_factura=$result8->fields["nro_factura"];
$porcentaje_boni=$result8->fields["porcentaje_boni"];
$porcentaje_dto=$result8->fields["porcentaje_dto"];

$sql="select * from proveedores where cod_proveedor = $nro_proveedor";
$result8 = $db->Execute($sql);
$denominacion=strtoupper($result8->fields["denominacion"]);

?>
<?php

include("../../../conexiones/config_pro.php");


 $sql = "SELECT * FROM `tr_compras1_encab_temp`  WHERE operador = $id";
$result8 = $db->Execute($sql);

$nro_proveedor=$result8->fields["nro_proveedor"];
$fecha=$result8->fields["fecha"];
$cod_movimiento=$result8->fields["cod_movimiento"];
$nro_factura=$result8->fields["nro_factura"];
$porcentaje_boni=$result8->fields["porcentaje_boni"];
$porcentaje_dto=$result8->fields["porcentaje_dto"];
$gln=$result8->fields["gln_proveedor"];
 

 $sql="select * from pacientes where documento = $nro_proveedor";
$result8 = $db->Execute($sql);
$apellido=$result8->fields["apellido"];
$nombre=$result8->fields["nombre"];
$denominacion=$apellido." ".$nombre;


    $sql="select * from usuario where id = '$gln' ";
$result = $db->Execute($sql);
  $nombre_prestador=strtoupper($result->fields["nombre_usuario"]);
 
 

?>
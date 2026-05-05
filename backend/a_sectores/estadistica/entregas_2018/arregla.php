<?php

include ("../../../conexiones/config_pro.php");


$sql5 = "SELECT * FROM `tr_ventas_detalle_entregas`  WHERE  proveedor = 0";
$result5 = $db->Execute($sql5);



if (!$result5) die("fallo".$db->ErrorMsg());

 while (!$result5->EOF) {


 $cod_mercaderia=$result5->fields["cod_mercaderia"];
 $gtin=$result5->fields["gtin"];



$sql = "SELECT * FROM tr_stock where gtin = '$gtin'";
$result9 = $db->Execute($sql);

$proveedor=$result9->fields["cuenta"];



 $result5->MoveNext();

				}
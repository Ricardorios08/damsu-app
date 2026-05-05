<?php

include("../../../../conexiones/config_pro.php");
 

$sql="select * from proveedores where cod_proveedor = $nro_proveedor";
$result8 = $db->Execute($sql);
$denominacion=strtoupper($result8->fields["denominacion"]);

?>
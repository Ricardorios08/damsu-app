<?php 
include ("../conexiones/config_pro.php");

$sql1 = "select * from tr_ventas_detalle where   `fecha` = '0000-00-00' group by nro_factura";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$nro_factura=$result1->fields["nro_factura"];
$cod_detalle=$result1->fields["cod_detalle"];

$sql = "SELECT * FROM `tr_ventas_encabezado`  WHERE  nro_factura = '$nro_factura'";
$result8 = $db->Execute($sql);
$fecha=strtoupper($result8->fields["fecha"]);

if ($fecha > '2018-06-31'){
echo $nro_factura."---";
echo "<br>";
echo $sql = "UPDATE tr_ventas_detalle SET fecha = '$fecha' WHERE nro_factura = '$nro_factura'";
$result = $db->Execute($sql);
echo "<br>";
$cont = $cont + 1;
}

$result1->MoveNext();
}
echo "<br>"; 
echo $cont;
?>
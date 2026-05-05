<?php 

include ("../conexiones/config_pro.php");

/*$sql = "SELECT nro_comprobante, gtin, COUNT(*) FROM tr_stock where cod_movimiento = 6 GROUP BY gtin HAVING COUNT(*)>1";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

echo $nro_factura=$result1->fields["nro_factura"];
echo " - ";
echo $gtin=$result1->fields["gtin"];
echo "<br>";
   $result1->MoveNext();
	}


*/


$sql1 = "select * from tr_ventas_detalle where tipo_fact = '001' order by proveedor";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
  $precio_unitario=$result1->fields["precio_unitario"];
  $cantidad=$result1->fields["cantidad"];
$cod_operacion=$result1->fields["cod_detalle"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$nro_factura=$result1->fields["nro_factura"];
 
 $sql1="select * from monodrogas where cod_barra = $cod_mercaderia";			  
$result3 = $db->Execute($sql1);
$grupo=$result3->fields["grupo"];

 $sql1="select * from tr_ventas_encabezado where nro_factura = $nro_factura";			  
$result3 = $db->Execute($sql1);
$fecha=$result3->fields["fecha"];


$precio = round($precio_unitario * $cantidad,2);


 $sql1="select * from tr_stock where nro_comprobante = $nro_factura and cod_movimiento = 6";			  
$result3 = $db->Execute($sql1);
$cuenta=$result3->fields["cuenta"];

if ($cuenta != ""){
 echo $sql = "UPDATE tr_ventas_detalle SET proveedor = '$cuenta'  WHERE cod_detalle = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";
}


  $sql = "UPDATE tr_ventas_detalle SET grupo = '$grupo'  WHERE cod_detalle = '$cod_operacion'";
//$result = $db->Execute($sql);
  $sql = "UPDATE tr_ventas_detalle SET fecha = '$fecha'  WHERE cod_detalle = '$cod_operacion'";
//$result = $db->Execute($sql);






   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;

exit;

$sql1 = "select * from compras_detalle";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
  $precio_unitario=$result1->fields["precio_unitario"];
  $cantidad=$result1->fields["cantidad"];
$cod_operacion=$result1->fields["cod_detalle"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];
$nro_factura=$result1->fields["nro_factura"];
 
 $sql1="select * from monodrogas where cod_barra = $cod_mercaderia";			  
$result3 = $db->Execute($sql1);
$grupo=$result3->fields["grupo"];

 $sql1="select * from compras_encabezado where nro_factura = $nro_factura";			  
$result3 = $db->Execute($sql1);
$fecha=$result3->fields["fecha"];


$precio = round($precio_unitario * $cantidad,2);

echo  $sql = "UPDATE compras_detalle SET grupo = '$grupo'  WHERE cod_detalle = '$cod_operacion'";
$result = $db->Execute($sql);
 echo $sql = "UPDATE compras_detalle SET fecha = '$fecha'  WHERE cod_detalle = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";


   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;

?>
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


$sql1 = "select * from compras_detalle";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
  $precio_unitario=$result1->fields["precio_unitario"];
  $cantidad=$result1->fields["cantidad"];
$cod_operacion=$result1->fields["cod_operacion"];
 


$precio = round($precio_unitario * $cantidad,2);

 echo $sql = "UPDATE compras_detalle SET total = '$precio'  WHERE cod_operacion = '$cod_operacion'";
//$result = $db->Execute($sql);
echo "<br>";


   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>
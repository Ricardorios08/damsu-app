<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from tr_compras_encab";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
 $nro_factura=$result1->fields["nro_factura"];
$nro_proveedor=$result1->fields["nro_proveedor"];


echo $sql = "UPDATE `tr_compras_detalle` SET proveedor = '$nro_proveedor' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);

echo "<br>";

 

   $result1->MoveNext();
	}

echo "<br>";
	$sql = "SELECT nro_factura, gtin, COUNT(*) FROM tr_compras_detalle GROUP BY gtin HAVING COUNT(*)>1";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

echo $nro_factura=$result1->fields["nro_factura"];
echo " - ";
echo $gtin=$result1->fields["gtin"];
echo "<br>";
   $result1->MoveNext();
	}


?>
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



$sql1 = "select * from tr_ventas_detalle where   `fecha` between '2018-09-01' and '2018-09-31' and proveedor = 0";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


  $nro_factura=$result1->fields["nro_factura"];
  $cod_detalle=$result1->fields["cod_detalle"];

 $sql = "SELECT * FROM `tr_stock`  WHERE  nro_comprobante = '$nro_factura'";
$result8 = $db->Execute($sql);

$cuenta=strtoupper($result8->fields["cuenta"]);

echo $nro_factura."---";
echo "<br>";


echo $sql = "UPDATE tr_ventas_detalle SET proveedor = '$cuenta' WHERE cod_detalle = '$cod_detalle'";
$result = $db->Execute($sql);
echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>
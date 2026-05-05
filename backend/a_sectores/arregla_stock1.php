<?php 

include ("../conexiones/config_pro.php");

  $sql1 = "select * from compras_detalle order by nro_factura, cod_mercaderia";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
echo $cod_mercaderia=$result1->fields["cod_mercaderia"];
echo "<br>";


 echo " cant comp- ".$cantidad=$result1->fields["cantidad"];
 echo " compr - ".$nro_factura=$result1->fields["nro_factura"];
 

$cont = $cont + 1;
echo $sql = "select * from stock where cod_mercaderia = '$cod_mercaderia' and cod_movimiento = 2 and nro_comprobante = $nro_factura";
$result = $db->Execute($sql);
 echo " - stock".$cant=$result->fields["cantidad"];

echo "<br>";
echo $sql = "UPDATE `stock` SET  cantidad = '$cantidad' WHERE cod_mercaderia = '$cod_mercaderia' and cod_movimiento = 2 and nro_comprobante = $nro_factura";
$result = $db->Execute($sql);


echo "<br>";
echo "<br>";
 

   $result1->MoveNext();

	
	}
echo "<br>";

	echo $cont;


?>
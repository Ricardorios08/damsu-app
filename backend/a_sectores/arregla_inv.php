<?php 

include ("../conexiones/config_pro.php");

 

echo $sql1 = "select * from `stock` where cod_movimiento = 6";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

echo "---".$cantidad=$result1->fields["cantidad"];
echo "---".$precio_unitario=$result1->fields["precio_unitario"];
 $cod_operacion=$result1->fields["cod_operacion"];


$unitario = round($precio_unitario / $cantidad,2);

echo $sql = "UPDATE `stock` SET total = '$precio_unitario' , precio_unitario = '$unitario'   WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;


 


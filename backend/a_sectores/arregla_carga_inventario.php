<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from inventario where cod_mercaderia = 0";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


 $gtin=$result1->fields["gtin"];

  $sql2 = "SELECT cod_mercaderia FROM `tr_existencias`  WHERE  gtin = '$gtin'";
$result2 = $db->Execute($sql2);
$cod_mercaderia=$result2->fields["cod_mercaderia"];




echo $sql = "UPDATE `inventario` SET cod_mercaderia = '$cod_mercaderia' WHERE gtin = '$gtin'";
//$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;

/////////////////////

<?php 

include ("../conexiones/config_pro.php");


$sql1 = "select * from tr_stock where cod_movimiento = 6 and cuenta = 0";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

 $gtin=$result1->fields["gtin"];




$sql = "SELECT * FROM tr_stock  WHERE  `gtin` = '$gtin'";
$result8 = $db->Execute($sql);

$cuenta=strtoupper($result8->fields["cuenta"]);

$cont = $cont + 1;


echo $sql = "UPDATE tr_stock SET cuenta = '$cuenta'  WHERE gtin = '$gtin' and cod_movimiento = 6";
//$result = $db->Execute($sql);
echo "<br>";



   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>
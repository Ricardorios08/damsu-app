<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from tr_existencias where proveedor = 0";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$cod_detalle=$result1->fields["cod_detalle"];
$gtin=$result1->fields["gtin"];



$sql = "select * from tr_stock where gtin = '$gtin'";
$result = $db->Execute($sql);
$cuenta=$result->fields["cuenta"];



echo $sql = "UPDATE tr_existencias SET proveedor = '$cuenta' WHERE cod_detalle= '$cod_detalle'";
$result = $db->Execute($sql);




echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;


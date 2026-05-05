<?php 

include ("../conexiones/config_pro.php");

 


 $sql1 = "SELECT * FROM `tr_stock` WHERE laboratorio = '0'";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


 $cod_mercaderia=$result1->fields["cod_mercaderia"];
 


echo $sql = "select * from `monodrogas` where cod_barra = $cod_mercaderia";
$result = $db->Execute($sql);
$laboratorio=$result->fields["laboratorio"];




echo $sql = "UPDATE tr_stock SET laboratorio = '$laboratorio' WHERE cod_barra = '$cod_mercaderia'";
//$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;


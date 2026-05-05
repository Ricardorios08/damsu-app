<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from stock";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
 $cod_operacion=$result1->fields["cod_operacion"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];

 $sql = "select * from monodrogas where cod_barra = $cod_mercaderia";
$result = $db->Execute($sql);
$grupo=$result->fields["grupo"];


echo $sql = "UPDATE stock SET grupo = '$grupo' WHERE cod_operacion = '$cod_operacion'";
//$result = $db->Execute($sql);

echo "<br>";

 

   $result1->MoveNext();
	}




?>
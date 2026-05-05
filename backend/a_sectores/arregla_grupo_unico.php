<?php 

include ("../conexiones/config_pro.php");

$sql1 = "select * from stock where laboratorio = 0 or laboratorio = ''";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


 echo $cod_mercaderia=$result1->fields["cod_mercaderia"];
 $cod_operacion=$result1->fields["cod_operacion"];


echo  $sql = "select * from monodrogas where cod_barra = $cod_mercaderia";
$result = $db->Execute($sql);
$grupo=$result->fields["grupo"];
$laboratorio=$result->fields["laboratorio"];



echo $sql = "UPDATE `stock` SET laboratorio = '$laboratorio' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;

?>
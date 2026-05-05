<?php 

include ("../conexiones/config_pro.php");

 


 $sql1 = "SELECT cod_barra, laboratorio FROM `monodrogas` WHERE laboratorio = ''";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


 $cod_barra=$result1->fields["cod_barra"];
 


 $sql = "select * from `monodrogas_migrada` where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$laboratorio=$result->fields["laboratorio"];




echo $sql = "UPDATE `monodrogas` SET laboratorio = '$laboratorio' WHERE cod_barra = '$cod_barra'";
$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;


<?php 

include ("../conexiones/config_pro.php");



 
 
	$sql = "SELECT cod_droga, tipo, cod_droga_nuevo , cod_operacion , COUNT(*) FROM drogas_1  GROUP BY cod_droga HAVING COUNT(*)>1";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

echo $tipo=$result1->fields["tipo"];
echo " - ";
echo $cod_droga=$result1->fields["cod_droga"];
echo " - ";
echo $cod_droga_nuevo=$result1->fields["cod_droga_nuevo"];
echo $cod_operacion=$result1->fields["cod_operacion"];


echo "<br>";
   $result1->MoveNext();
	}


?>
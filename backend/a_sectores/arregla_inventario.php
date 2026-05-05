<?php 

include ("../conexiones/config_pro.php");



$sql1 = "select * from tr_stock_temp_provisorio1 where laboratorio = ''";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


  $cod_mercaderia=$result1->fields["cod_mercaderia"];
  $cod_operacion=$result1->fields["cod_operacion"];

$sql="select * from drogas where cod_droga = $cod_mercaderia ";
$result = $db->Execute($sql);
$drogas=strtoupper($result->fields["droga"]);

$sql="select * from monodrogas where cod_barra = $cod_mercaderia ";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);


 $sql = "UPDATE tr_stock_temp_provisorio1 SET cuenta = '900'  WHERE cod_operacion = '$cod_operacion'";
//$result = $db->Execute($sql);

 $sql = "UPDATE tr_stock_temp_provisorio1 SET cod_droga = '$cod_mercaderia' , drogas = '$drogas' WHERE cod_operacion = '$cod_operacion'";
//$result = $db->Execute($sql);.

 echo $sql = "UPDATE tr_stock_temp_provisorio1 SET laboratorio = '$laboratorio'  WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);
echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>
<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from tr_stock where laboratorio = 0 or laboratorio = ''";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


 $cod_mercaderia=$result1->fields["cod_mercaderia"];
 $cod_operacion=$result1->fields["cod_operacion"];


 $sql = "select * from monodrogas where cod_barra = $cod_mercaderia";
$result = $db->Execute($sql);
$laboratorio=$result->fields["laboratorio"];




echo $sql = "UPDATE `tr_stock` SET laboratorio = '$laboratorio' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;

/////////////////////

$sql1 = "select * from tr_stock where grupo = 0 or grupo = ''";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


 echo $cod_mercaderia=$result1->fields["cod_mercaderia"];
 $cod_operacion=$result1->fields["cod_operacion"];


 $sql = "select * from monodrogas where cod_barra = $cod_mercaderia";
$result = $db->Execute($sql);
$grupo=$result->fields["grupo"];




echo $sql = "UPDATE `tr_stock` SET grupo = '$grupo' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;


/////////////////////

echo $sql1 = "select * from tr_stock where drogas like ''";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


echo "---".$cod_droga=$result1->fields["cod_droga"];
 $cod_operacion=$result1->fields["cod_operacion"];


echo  $sql = "select * from drogas where cod_droga = $cod_droga";
$result = $db->Execute($sql);
$drogas=$result->fields["droga"];




echo $sql = "UPDATE `tr_stock` SET drogas = '$drogas' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);

echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;

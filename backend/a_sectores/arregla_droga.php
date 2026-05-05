<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "SELECT * FROM `tr_ventas_detalle` WHERE `fecha` between '2018-07-01' and '2018-07-31' and descripcion = ''"; 

$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$cod_barra=$result1->fields["cod_barra"];
$grupo=$result1->fields["grupo"];



echo $sql = "UPDATE monodrogas SET grupo = '$grupo' WHERE cod_barra = '$cod_barra'";
//$result = $db->Execute($sql);




echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;


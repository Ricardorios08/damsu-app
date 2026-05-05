<?php 
include ("../conexiones/config_pro.php");

 echo $sql1 = "select * from laboratorios  order by codigo_anterior";
$result1 = $db->Execute($sql1);
echo "<br>";

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$cod_laboratorio=$result1->fields["cod_laboratorio"];
$laboratorio=$result1->fields["laboratorio"];
$nuevo_codigo=$result1->fields["nuevo_codigo"];
$codigo_anterior=$result1->fields["codigo_anterior"];


 echo $sql12 = "select * from monodrogas8 where laboratorio = $codigo_anterior";
$result12 = $db->Execute($sql12);
echo "<br>";
 if (!$result12) die("fallo".$db->ErrorMsg());
  while (!$result12->EOF) {

$cod_barra=$result12->fields["cod_barra"];
echo "<br>";
echo $sql = "UPDATE monodrogas8 SET lab = '$nuevo_codigo' WHERE cod_barra = '$cod_barra'  ";
$result = $db->Execute($sql);

/*echo $sql = "UPDATE stock SET laboratorio = '$nuevo_codigo' WHERE laboratorio= '$cod_laboratorio'";
$result = $db->Execute($sql);

echo $sql = "UPDATE tr_existencias SET laboratorio = '$nuevo_codigo' WHERE laboratorio= '$cod_laboratorio'";
$result = $db->Execute($sql);

echo $sql = "UPDATE tr_stock SET laboratorio = '$nuevo_codigo' WHERE laboratorio= '$cod_laboratorio'";
$result = $db->Execute($sql);

echo $sql = "UPDATE laboratorios_nuevos SET codigo_anterior = '$codigo_anterior' , laboratorio = '$laboratorio' WHERE laboratorio= '$cod_laboratorio'";
$result = $db->Execute($sql);

echo $sql = "UPDATE laboratorios_nuevos SET codigo_anterior = '$codigo_anterior' , laboratorio = '$laboratorio' WHERE laboratorio= '$cod_laboratorio'";
$result = $db->Execute($sql);
*/


echo "<br>";
$cont = $cont + 1;


 $result12->MoveNext();
	}



   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
	echo $cont;

//monodrogas - stock - tr_existencias -  tr_stock - laboratorios

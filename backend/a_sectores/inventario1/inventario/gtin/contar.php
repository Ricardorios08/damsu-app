<?php 

include("../../../../conexiones/config_pro.php");


 $sql = "SELECT * FROM inventario group by operador";
$result = $db->Execute($sql);

 while (!$result->EOF) {


echo $operador=strtoupper($result->fields["operador"]);

echo " ";
$sql3= "select * from usuario where id = '$operador'" ;
$result3 = $db->Execute($sql3);

 
echo $nombre_usuario=strtoupper($result3->fields["nombre_usuario"]);



echo " - ";

  $sql2 = "SELECT count(gtin) as cantidad FROM inventario where operador = '$operador'";
$result2 = $db->Execute($sql2);
echo $cantidad=strtoupper($result2->fields["cantidad"]);
echo "<br>";





	 $result->MoveNext();
				}


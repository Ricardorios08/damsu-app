<?php 
include ("../conexiones/config_pro.php");

/* echo $sql1 = "select * from tr_ventas_encabezado where fecha between '2014-09-01' and '2014-09-31' and nro_os = 10";
$result1 = $db->Execute($sql1);
echo "<br>";

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	  $nro_factura=$result1->fields["nro_factura"];

	  echo "<br>";
echo $sql = "UPDATE tr_ventas_detalle SET nro_os = '10' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);


$cont = $cont + 1;


   $result1->MoveNext();
	}


	  echo "<br>";
echo $cont;

*/

 echo $sql1 = "select * from tr_ventas_detalle where fecha between '2014-09-01' and '2014-09-31' and nro_os = 10 group by cod_droga";
$result1 = $db->Execute($sql1);
echo "<br>";

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	   $nro_factura=$result1->fields["nro_factura"];
   $cod_droga=$result1->fields["cod_droga"];



 $sql12="select count(cod_droga) as cant from tr_ventas_detalle where cod_droga = $cod_droga and fecha between '2014-09-01' and '2014-09-31' and nro_os = 10";			  
$result12 = $db->Execute($sql12);
 echo $cant=strtoupper($result12->fields["cant"]);



  $sql12="select SUM(total) as cant from tr_ventas_detalle where cod_droga = $cod_droga and fecha between '2014-09-01' and '2014-09-31' and nro_os = 10";			  
$result12 = $db->Execute($sql12);
 $cant=strtoupper($result12->fields["cant"]);


 $sql12="select * from drogas where cod_droga = $cod_droga";			  
$result12 = $db->Execute($sql12);
$frio=strtoupper($result12->fields["frio"]);
  $droga=strtoupper($result12->fields["droga"]);






  echo "<br>";

$cont = $cont + 1;


   $result1->MoveNext();
	}


	  echo "<br>";
echo $cont;



<table width="200" border="1">
<?php 
 
 include ("../../../../conexiones/config_usu.php");


  $sql="select * from tr_stock_temp_provisorio1 where anio = '19' and mes = '07' order by cod_mercaderia";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
 $cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);

 

$cod_operacion=$result1->fields["cod_operacion"];
 

   echo  $sql11="select sum(cantidad) as cantidad  from stock where (cod_mercaderia = '$cod_mercaderia' and cod_movimiento = 1  and fecha < '2019-08-01' ) or (cod_mercaderia = '$cod_mercaderia' and cod_movimiento = 2 and fecha < '2019-08-01' ) or (cod_mercaderia = '$cod_mercaderia' and cod_movimiento = 3 and fecha < '2019-08-01' )  order by cod_mercaderia";
$result11 = $db->Execute($sql11);
 
  $cantidad1=strtoupper($result11->fields["cantidad"]);
 
echo "<br>";
  echo  $sql11="select sum(cantidad) as salida from stock where cod_mercaderia = '$cod_mercaderia' and cod_movimiento = 6 and fecha < '2019-08-01'  order by cod_mercaderia";
$result11 = $db->Execute($sql11);
$salida1=strtoupper($result11->fields["salida"]);

    $total = $cantidad1 - $salida1;
 
 
echo "<br>";

echo $cod_mercaderia;
 echo  " * ".$sql11="UPDATE `tr_stock_temp_provisorio1` SET `cantidad` = '0' , `salida` = '0' ,`anterior` = '$total' WHERE `cod_operacion` = '$cod_operacion'";
$result11 = $db->Execute($sql11);

echo "<br>";
$total = 0;
$total1 = 0;
$cantidad1 = 0;
$salida1 = 0;

$result1->MoveNext();
	}


?>
</table>
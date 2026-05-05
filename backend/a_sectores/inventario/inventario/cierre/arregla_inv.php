
<table width="200" border="1">
<?php 
 
 include ("../../../../conexiones/config_usu.php");


  $sql="select * from tr_stock_temp_provisorio where anio = '19' and mes = '07' order by cod_mercaderia";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
 $cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);

 

$cod_operacion=$result1->fields["cod_operacion"];
 

 echo $sql11="select sum(cantidad_ingresada) as cantidad, sum(cantidad_salida) as salida  from tr_existencias_30072019 where cod_mercaderia = $cod_mercaderia order by cod_mercaderia";
$result11 = $db->Execute($sql11);

$cantidad1=strtoupper($result11->fields["cantidad"]);
$salida1=strtoupper($result11->fields["salida"]);

  $total = $cantidad1 - $salida1;
 




  ?><tr>
    <td><?php echo $cod_mercaderia;?></td>
    <td><?php echo $cantidad;?></td>
    <td><?php echo $total1;?></td>
    <td><?php echo $salida;?></td>
    <td><?php echo $total;?></td>
  </tr>
  
  <?php

 echo  $sql11="UPDATE `tr_stock_temp_provisorio` SET `cantidad` = '0' , `salida` = '0' ,`anterior` = '$total' WHERE `cod_operacion` = '$cod_operacion'";
$result11 = $db->Execute($sql11);

echo "<br>";
$total = 0;
$total1 = 0;

$result1->MoveNext();
	}
?>
</table>
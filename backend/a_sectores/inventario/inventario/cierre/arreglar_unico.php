
<table width="200" border="1">
<?php 
 
 include ("../../../../conexiones/config_usu.php");


  $sql="select * from tr_stock_temp_provisorio1 where anio = 17 and mes = 06 order by cod_mercaderia";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
 $cod_mercaderia=strtoupper($result1->fields["cod_mercaderia"]);

$cantidad=strtoupper($result1->fields["cantidad"]);
$anterior=strtoupper($result1->fields["anterior"]);
$salida=strtoupper($result1->fields["salida"]);
$cod_operacion=$result1->fields["cod_operacion"];
 

  $sql11="select * from tr_stock_temp_provisorio1 where anio = 17 and mes = 05 and cod_mercaderia = $cod_mercaderia order by cod_mercaderia";
$result11 = $db->Execute($sql11);

$cantidad1=strtoupper($result11->fields["cantidad"]);
$anterior1=strtoupper($result11->fields["anterior"]);
$salida1=strtoupper($result11->fields["salida"]);

  $total1 = $cantidad1 + $anterior1 - $salida1;
 $total = $cantidad + $total1 - $salida;




  ?><tr>
    <td><?php echo $cod_mercaderia;?></td>
    <td><?php echo $cantidad;?></td>
    <td><?php echo $total1;?></td>
    <td><?php echo $salida;?></td>
    <td><?php echo $total;?></td>
  </tr>
  
  <?php

 echo  $sql11="UPDATE `oncologico`.`tr_stock_temp_provisorio1` SET `anterior` = '$total1' WHERE `tr_stock_temp_provisorio1`.`cod_operacion` = '$cod_operacion'";
$result11 = $db->Execute($sql11);

$total = 0;
$total1 = 0;

$result1->MoveNext();
	}
?>
</table>
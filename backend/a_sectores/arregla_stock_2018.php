<?php 

include ("../conexiones/config_pro.php");

$fecha_desde = '2018-01-01';
$sql1 = "select * from tr_stock group by cod_mercaderia";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

 $cod_barra=$result1->fields["cod_mercaderia"];
 $cod_droga=$result1->fields["cod_droga"];
 $drogas=$result1->fields["drogas"];
$grupo=$result1->fields["grupo"];
$laboratorio=$result1->fields["laboratorio"];
 



  $sql3="select sum(cantidad) as entrada from tr_stock_20072018 where (cod_mercaderia = $cod_barra and cod_movimiento = 1 and fecha < '$fecha_desde') or  (cod_mercaderia = $cod_barra and cod_movimiento = 2 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 3 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 4 and fecha < '$fecha_desde')  order by fecha, cod_movimiento, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $entrada1=strtoupper($result3->fields["entrada"]);

 $sql3="select sum(cantidad) as salida from tr_stock_20072018 where (cod_mercaderia = $cod_barra and cod_movimiento = 5 and fecha < $fecha_desde) or  (cod_mercaderia = $cod_barra and cod_movimiento = 6 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 7 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 8 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 9 and fecha < '$fecha_desde')  order by fecha, cod_movimiento desc, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $salida1=strtoupper($result3->fields["salida"]);


  $acumula_saldo = $entrada1 - $salida1;
 $saldo_inicial = $entrada1 - $salida1;

?>
<table>
<tr>
	<td><?php echo $cod_barra;?></td>
	<td><?php echo $acumula_saldo;?></td>
	<td><?php 
	


?></td>

</tr>
</table>
<?php


 

echo $sql4 = "INSERT INTO `tr_stock` (`cod_mercaderia`, `fecha`, `cod_movimiento`, `tipo_fact`, `nro_comprobante`, `cantidad`, `precio_unitario`, `lote`, `mes_lote`, `anio_lote`, `cuenta`, `tipo_cuenta`, `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie`, `drogas`, `grupo`, `laboratorio`, `departamento`) VALUES ('$cod_barra', '$fecha_desde', '1', 'M', '999', '$acumula_saldo', '0', 'Migracion', '01', '17', '', '', '', '', '', '$cod_droga', '', '', '', '', '$drogas', '$grupo', '$laboratorio', '$departamento')";
//mysql_query($sql4);




 

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>
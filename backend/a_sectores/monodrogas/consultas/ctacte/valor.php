<?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


	

$cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
$fecha=strtoupper($result->fields["fecha"]);
$nro_comprobante=strtoupper($result->fields["nro_comprobante"]);
$cantidad=strtoupper($result->fields["cantidad"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);
$cod_movimiento=strtoupper($result->fields["cod_movimiento"]);


$precio_renglon =  $precio_unitario * $cantidad;

SWITCH ($cod_movimiento){
case "INGRESOS":{
$entrada = $precio_renglon;
BREAK;
}

CASE "EGRESOS":{
$salida = $precio_renglon;
BREAK;
}

}


 $saldo = $entrada - $salida;
$acumula_saldo = $acumula_saldo + $saldo;

if ($B == 1) {

?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <?php 

			}




?>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$fecha");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$cod_movimiento");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$nro_comprobante");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php echo $cantidad;?></font></div></td>

<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php echo number_format($entrada,2);?></font></div></td>
<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php echo number_format($salida,2);?></font></div></td>

	<td bgcolor="#E8DCFC"><div align="center"><font size="2"> <?php echo number_format($acumula_saldo,2);?></font></div></td>
</tr>
  
<?php 
	 $entrada = "";
	$salida = "";
	$saldo = "";
$result->MoveNext();
	}
  

?>
</table>

<?php
$user = 'PAPO';
//$pass = 'Papo2012';
//$pass = 'Papo2012';
$pass = 'Sanjuan813';


//$gln_proveedor = 7798138690004;
require_once("wsFunctions.php");

$fecha = date("d/m/Y");
 $vencimiento = "01/".$mes_lote."/20".$anio_lote;
$nro_serie;

$cod_mercaderia;


function hora_local($zona_horaria = 0)
{
	if ($zona_horaria > -12.1 and $zona_horaria < 12.1)
	{
		$hora_local = time() + ($zona_horaria * 3600);
		return $hora_local;
	}
	return 'error';
}


$gln_proveedor;


$hora =  gmdate('H:i', hora_local(-3));

$args[0]["f_evento"] = "$fecha";
$args[0]["h_evento"] = "$hora";
$args[0]["gln_origen"] = "$gln_proveedor";
$args[0]["cuit_origen"] = "20259171289";
$args[0]["gln_destino"] = "9992004800001";
$args[0]["cuit_destino"] = "";
$args[0]["n_remito"] = "$nro_factura";
$args[0]["n_factura"] = "";
$args[0]["vencimiento"] = "$vencimiento";
$args[0]["gtin"] = "$cod_mercaderia";
$args[0]["lote"] = "$lote";
$args[0]["numero_serial"] = "$nro_serie";
$args[0]["id_evento"] = "74";
$args[0]["n_postal"] = "5500";
$args[0]["telefono"] = "02614239972";



$response = SendMedicamentos($args,$user,$pass);

?><table width="800" border="0" cellspacing="0">
  <tr bgcolor="#000099">
    <td colspan="3" bgcolor="#FF8282"><div align="center"><font color="#000000" face="Trebuchet MS">VALIDACION ULTIMA TRANSACCION ANMAT </font></div>      
      <div align="right"><font color="#000000" face="Trebuchet MS"><font size="2"></font></font></div></td>
  </tr>
  <tr bgcolor="#000099">
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS">RESULTADO</font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS">TRANS. N&deg;</font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS">ERRORES</font></div></td>
  </tr>
  <tr bgcolor="#000099">
    <td width="133" bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS"><?php echo $response['resultado'];?></font></div></td>
    <td width="133" bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS"><?php echo $response['codigoTransaccion'];?></font></div></td>
    <td width="528" bgcolor="#EDEDED"><?PHP $errores = $response['errores'];
print_r($errores);
$i=0;
while (isset($errores[$i])){
	
	print_r($errores[$i]);
	echo "<br>";
	$i++;
}?></td>
  </tr>
  
</table>
<?PHP 




$resultado = $response['resultado'];
$transaccion = $response['codigoTransaccion'];



if ($resultado == "true"){



  $sql = "INSERT INTO `tr_compras1_deta_temp` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `presentacion` , `lote` , `mes_lote` ,  `anio_lote` , `gtin` , `precio_unitario` , `precio_nuevo` , `total` , `cod_movimiento` , `operador` , `resultado` , `transaccion` , `nro_serie` )  VALUES ('$nro_factura' , '' ,'$cod_mercaderia' ,'$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$gtin' , '$precio_unitario' , '$precio_nuevo', '$total' , '$cod_movimiento' , '$id' , '$resultado' , '$transaccion' , '$nro_serie')";
mysql_query($sql);

}


/*echo "<br>--------------------------------------------------------------------------------------------------------------------------------------<br>";

$args[0]["f_evento"] = "01/05/2011" ;
$args[0]["h_evento"] = "23:59";
$args[0]["gln_origen"] = "123";
$args[0]["cuit_origen"] = "20259171289";
$args[0]["gln_destino"] = "GLN";
$args[0]["cuit_destino"] = "20259171289";
$args[0]["n_remito"] = "1";
$args[0]["n_factura"] = "1";
$args[0]["vencimiento"] = "01/05/2011";
$args[0]["gtin"] = "1";
$args[0]["lote"] = "1";
$args[0]["numero_serial"] = "1";
$args[0]["id_evento"] = "1";
$args[0]["n_postal"] = "1416";
$args[0]["telefono"] = "45880712";
$args[0]["desde_numero_serial"] = "1500";
$args[0]["hasta_numero_serial"] = "1510";

$args[1]["f_evento"] = "02/05/2011";
$args[1]["h_evento"] = "23:59";
$args[1]["gln_origen"] = "123";
$args[1]["cuit_origen"] = "20259171289";
$args[1]["gln_destino"] = "GLN";
$args[1]["cuit_destino"] = "20259171289";
$args[1]["n_remito"] = "2";
$args[1]["n_factura"] = "2";
$args[1]["vencimiento"] = "02/05/2011";
$args[1]["gtin"] = "1";
$args[1]["lote"] = "2";
$args[1]["numero_serial"] = "2";
$args[1]["id_evento"] = "2";
$args[1]["n_postal"] = "1416";
$args[1]["telefono"] = "45880712";
$args[1]["desde_numero_serial"] = "1600";
$args[1]["hasta_numero_serial"] = "1610";

$user = 'ROCHE';
$pass = '1234';

$response = SendMedicamentosDHSerie($args,$user,$pass);

echo "resultado: ".$response['resultado']."<br>";
echo "codigoTransaccion: ".$response['codigoTransaccion']."<br>";

$errores = $response['errores'];
print_r($errores);
$i=0;
while (isset($errores[$i]))
{
	//echo "Error ".$i." : ".$errores[$i];
	print_r($errores[$i]);
	
	echo "<br>";
	$i++;
}

echo "<br>--------------------------------------------------------------------------------------------------------------------------------------<br>";

$user = 'ROCHE';
$pass = '1234';
$args = 1000;
$response = SendCancMedicamentos($args,$user,$pass);

echo "resultado: ".$response['resultado']."<br>";
echo "codigoTransaccion: ".$response['codigoTransaccion']."<br>";

$errores = $response['errores'];
print_r($errores);
echo "<br>";
*/
?>



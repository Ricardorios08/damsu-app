<?php
$user = '9992004800001';
$pass = 'Papo2012';

exit;
 $sql7="select * from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);
$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;

$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero



require_once("wsFunctions.php");

$fecha = date("d/m/Y");
 $vencimiento = "01/".$mes_lote."/20".$anio_lote;
$nro_serie = 9872075031;
$lote = "a";

function hora_local($zona_horaria = 0)
{
	if ($zona_horaria > -12.1 and $zona_horaria < 12.1)
	{
		$hora_local = time() + ($zona_horaria * 3600);
		return $hora_local;
	}
	return 'error';
}

$hora =  gmdate('H:i', hora_local(-3));

$args[0]["f_evento"] = "$fecha";
$args[0]["h_evento"] = "$hora";
$args[0]["gln_origen"] = "$user";
$args[0]["vencimiento"] = "$vencimiento";
$args[0]["numero_serial"] = "$nro_serie";
$args[0]["lote"] = "$lote";
$args[0]["n_remito"] = "1234";
$args[0]["gtin"] = "$gtin";
$args[0]["id_evento"] = "84";
$args[0]["Tipo_documento"] = "96";
$args[0]["sexo"] = "M";
$args[0]["apellido"] = "$apellido";
$args[0]["nombres"] = "$nombre";
$args[0]["n_documento"] = "$documento";

$args[0]["direccion"] = "$calle";
$args[0]["localidad"] = "$localidad";
$args[0]["numero"] = "$puerta";
//$args[0]["piso"] = "";
//$args[0]["dpto"] = "";
$args[0]["direccion"] = "$calle";
$args[0]["n_postal"] = "5500";
$args[0]["telefono"] = "0261-4322572";

 




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
$sql = "INSERT INTO tr_ventas1_deta_temp (`tipo_fact`, `nro_factura`, `cod_detalle`, `cod_mercaderia`, `descripcion`, `presentacion`, `lote`, `mes_lote`, `anio_lote`, `cantidad`, `precio_unitario`, `total`, `proveedor`, `operador`, `gtin`, `resultado`, `transaccion`) VALUES ( 'x', '$operador', '$cod_detalle', '$cod_mercaderia', '$descripcion', '$presentacion', '$lote', '$mes_lote', '$anio_lote', '1', '$precio_unitario', '$precio_unitario', '200', '$operador', '$gtin', '$resultado', '$transaccion');";
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
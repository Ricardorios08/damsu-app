<?php 
global $buscador_rapido;
include("../../../../conexiones/config_grabacion.php");
if ($borrar != 1){
$buscador_rapido=$_POST["buscador_rapido"];
}

$hoy = date("d/m/Y");
 include("adodb.inc.php");
 $db = NewADOConnection('mysql');
 $db->Connect("localhost", "root", "", "proveeduria");

$B = 1;


$palabra=$_POST["busca"];


$sql="select * from resumen_cta_vta where cuenta like '$palabra' and tipo_cuenta = $tipo order by fecha";
$result = $db_pro->Execute($sql);

$tipo_cuenta=strtoupper($result->fields["tipo_cuenta"]);

if ($tipo_cuenta == '2'){

 
$sql3="select * from clientes where cuenta like '$palabra'";
$result3 = $db_pro->Execute($sql3);
$denominacion=strtoupper($result3->fields["denominacion"]);


}elseif ($tipo_cuenta == "1"){
	

$sql4="select * from datos_laboratorio where nro_laboratorio like '$palabra'";
$result4=$db_bq->Execute($sql4);

$denominacion=strtoupper($result4->fields["nombre_laboratorio"]);
	

}


?>
<table width="103%" height="58" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#000099">
    <td colspan="12"><div align="right"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong> CUENTA CORRIENTE VENTAS</strong> <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td colspan="8"><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><?php print("$palabra");?> - <?php print("$denominacion");?></font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

	<td width="11%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FECHA</font></div></td>
    <td width="25%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">MOVIMIENTO</font></div></td>

    <td width="8%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">TIPO</font></div></td>
    <td width="13%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">COMPROBANTE</font></div></td>


	<td width="16%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">DEBITOS</font></div></td>
    <td width="13%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">CREDITOS</font></div></td>
<td width="14%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
</tr>

  <?php 



$anio_actual = date("y");
$mes_actual = date ("m");



  if (!$result) die("fallo".$db_pro->ErrorMsg());
  while (!$result->EOF) {


	


$fecha=strtoupper($result->fields["fecha"]);
$nro_comprobante=strtoupper($result->fields["comprobante"]);
$precio=strtoupper($result->fields["importe"]);
$cod_movimiento=strtoupper($result->fields["cod_movimiento"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$afectacion=strtoupper($result->fields["afectacion"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);
$precio_renglon =  $precio;

SWITCH ($cod_movimiento){

case "1":{
$entrada = $precio_renglon;
$movimiento = "FACTURA";
BREAK;
}

case "2":{
$entrada = $precio_renglon;
$movimiento = "NOTA DE DEBITO";
BREAK;
}

case "3":{
$salida = $precio_renglon;
$movimiento = "N/C (Afec. ".$afectacion.")";
BREAK;
}

case "4":{
$salida = $precio_renglon;
$movimiento = "PAGO POR CAJA";
BREAK;
}


CASE "5":{
$salida = $precio_renglon;
$movimiento = "DESC X LIQUIDACION";
BREAK;
}


}


/*if ($tipo_fact == 0){
$tipo_fact = 'X';
}
*/
if ($entrada == 0.00){
$entrada = "-";
}

if ($salida== 0.00){
$salida = "-";
}

//1 FACTURA  - DEBE
// 2 NOTA DE DEBITO - DEBE 
// 3 NOTA DE CREDITO- HABER
// 4 PAGO POR CAJA - HABER
// 5 DESCUENTO POR LIQUIDACION - HABER

 $saldo = $entrada - $salida;
$acumula_saldo = $acumula_saldo + $saldo;

if ($B == 1) {

?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <?php 

			}




?>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$fecha");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$movimiento");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$tipo_fact");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$nro_comprobante");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2">$ <?php echo number_format($entrada,2);?></font></div></td>
<td bgcolor="#E8DCFC"><div align="center"><font size="2">$ <?php echo number_format($salida,2);?></font></div></td>

	<td bgcolor="#E8DCFC"><div align="center"><font size="2"> <?php echo number_format($acumula_saldo,2);?></font></div></td>
</tr>
 
  
<?php 
	 $entrada = "";
	$salida = "";
	$saldo = "";
$result->MoveNext();
	}
  
  ?>
 <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <td colspan="7" bgcolor="#E8DCFC"><div align="right"><strong><font size="4" face="Arial, Helvetica, sans-serif">TOTAL $ <?php echo number_format($acumula_saldo,2);?></font></strong></div></td>
  </tr>
</table>

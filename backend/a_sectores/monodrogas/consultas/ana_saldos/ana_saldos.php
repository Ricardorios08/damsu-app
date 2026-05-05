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

if ($palabra == ""){

include ("ana_saldos_todos.php");
}else
{

$sql="select * from composicion_saldos where cuenta like '$palabra' and tipo_cuenta = $tipo";
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
:::

?>
<table width="800" height="137" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#000099">
    <td colspan="12"><div align="right"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong> DETALLE COMPOSICION DE SALDO </strong> <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6">
    <td colspan="8"><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><?php print("$palabra");?> - <?php print("$denominacion");?></font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

	<td width="10%" height="19"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FECHA DE EMISION </font></div></td>
    <td width="15%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">MOVIMIENTO</font></div></td>

    <td width="6%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">TIPO</font></div></td>
    <td width="10%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">COMPROBANTE</font></div></td>


	<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">IMPORTE ORIGINAL </font></div></td>
    <td width="16%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FECHA DE PAGO </font></div></td>

<td width="19%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">SALDO</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">AC. SALDO</font></div></td>
</tr>

  <?php 



$anio_actual = date("y");
$mes_actual = date ("m");



  if (!$result) die("fallo".$db_pro->ErrorMsg());
  while (!$result->EOF) {


	


$fecha_emision=strtoupper($result->fields["fecha_emision"]);
$comprobante=strtoupper($result->fields["comprobante"]);
$precio=strtoupper($result->fields["importe"]);
$cod_movimiento=strtoupper($result->fields["cod_movimiento"]);
$importe_original=strtoupper($result->fields["importe_original"]);
$fecha_pago=strtoupper($result->fields["fecha_pago"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$saldo=strtoupper($result->fields["saldo"]);

if ($fecha_pago == '0000-00-00'){

$fecha_pago = 'Sin Descontar';
}

$vencimiento=strtoupper($result->fields["vencimiento"]);
$cuotas=strtoupper($result->fields["cuotas"]);
$cuotas_pagadas=strtoupper($result->fields["cuotas_pagadas"]);

$saldo_acumulado = $saldo + $saldo_acumulado;

?>
    <tr><td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$fecha_emision");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$cod_movimiento");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$tipo_fact");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$comprobante");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2">$ <?php echo number_format($importe_original,2);?></font></div></td>
<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php echo $fecha_pago;?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"> $ <?php echo number_format($saldo,2);?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"> $ <?php echo number_format($saldo_acumulado,2);?></font></div></td>
</tr>   
  
<?php 
	
	
$result->MoveNext();
	}
  

?>
<tr bgcolor="#C4D7E6">
  <td colspan="8"><hr noshade></td>
  </tr>
<tr bgcolor="#C4D7E6">
    <td colspan="8" bgcolor="#000099"><div align="right"><font color="#FFFFFF" size="3"><strong><font face="Arial, Helvetica, sans-serif">TOTAL $ <?php echo number_format($saldo_acumulado,2);?></font></strong></font></div></td>
  </tr>
</table>
<?php }?>
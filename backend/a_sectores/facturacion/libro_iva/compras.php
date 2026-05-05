<?php $nro_factura;
$hoy = date("d/m/y");
?>
<style type="text/css">
<!--
.Estilo22 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.Estilo23 {font-size: 10px}
.Estilo62 {font-size: 12px}
.Estilo62 {font-family: Arial, Helvetica, sans-serif}
.Estilo64 {	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo64 {	color: #000000;
	font-weight: bold;
}
.Estilo65 {font-size: 12px}
.Estilo65 {font-family: Arial, Helvetica, sans-serif}
.Estilo66 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo66 {font-size: 9px; font-family: Arial, Helvetica, sans-serif; }
.Estilo72 {font-size: 18px}
.Estilo73 {font-size: 16px}
.Estilo74 {font-size: 12}
.Estilo75 {font-family: Arial, Helvetica, sans-serif; font-size: 12; }
.Estilo76 {font-size: 14px}
-->
</style>

 <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">  


   <!--DWLayoutTable-->

  <table width="850" border="1" cellspacing="0">
   <!--DWLayoutTable-->
   <tr valign="middle" bgcolor="#FFFFFF">
     <td colspan="7" valign="top"><div align="center" class="Estilo67 Estilo72"><strong>PROGRAMA INCAIMEN - </strong><strong><span class="Estilo3">INGRESOS PROGRAMA </span></strong></div>     </td>
    </tr>
   <tr valign="middle" bgcolor="#FFFFFF">
     <td colspan="7" valign="top"><div align="center" class="Estilo67 Estilo72"><strong> </strong></div>
       <div align="center" class="Estilo71 Estilo23"></div>
     <div align="center" class="Estilo71 Estilo23"> </div>       <div align="left"><span class="Estilo65"><span class="Estilo64"><span class="Estilo3"> </span><?php ECHO $perio;?> - <?php ECHO $anio;?></span> </span></div>     <div align="center"><span class="Estilo65"><span class="Estilo64"><span class="Estilo68"><BR>
     </span></span></span></div>     <div align="right" class="Estilo22">
        <div align="center"> </div>
     </div></td>
    </tr>
   <tr bgcolor="#FFFFFF">
     <td width="92" bgcolor="#B8B8B8"><div align="center" class="Estilo74">
       <div align="center"><span class="Estilo2 Estilo65">Fecha</span> </div>
     </div>
     <td width="80" bgcolor="#B8B8B8"><div align="center" class="Estilo75">
       <div align="center"><span class="Estilo2 Estilo65">N&deg; Ingreso </span> </div>
     </div>
     <td width="81" bgcolor="#B8B8B8">
       <div align="center" class="Estilo75">
         <div align="center"><span class="Estilo2 Estilo65">Comprobante</span></div>
       </div>
     <td width="323" bgcolor="#B8B8B8">     <div align="center"><span class="Estilo2 Estilo65">Denominaci&oacute;n</span></div>
     <td width="71" bgcolor="#B8B8B8"><div align="right" class="Estilo75">
       <div align="center"><span class="Estilo2 Estilo65">Total</span></div>
     </div></td>
     <td width="78" bgcolor="#B8B8B8"><div align="center"><span class="Estilo65">Modificar</span></div></td>
     <td width="78" bgcolor="#B8B8B8"><div align="center" class="Estilo65">Borrar</div></td>
   </tr>
   

   
     <?php 

include ("../../../conexiones/config_pro.php");



$fecha_desde = $anio."-".$mes."-01"; 
$fecha_hasta =$anio."-".$mes."-31";

if ($registro != ""){
$sql="select * from compras_encabezado where nro_factura = $registro";
}else
{

$sql="select * from compras_encabezado where fecha BETWEEN '$fecha_desde' and '$fecha_hasta' ORDER by $ordenar";
}
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$cuent = $cuenta;

$nro_proveedor=strtoupper($result->fields["nro_proveedor"]);

$contame = $contame +1;

$cod_operacion=strtoupper($result->fields["cod_operacion"]);

$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$nro_factura=strtoupper($result->fields["nro_factura"]);
$comprobante=strtoupper($result->fields["comprobante"]);

 $sql1="select * from proveedores where cod_proveedor = $nro_proveedor";
$result1 = $db->Execute($sql1);
$denominacion=strtoupper($result1->fields["denominacion"]);
$denominacion=substr($denominacion,0,35);
$cuit=strtoupper($result1->fields["cuit"]);



$fecha=strtoupper($result->fields["fecha"]);
$tipo_iva=strtoupper($result->fields["tipo_iva"]);



if ($nro_cliente != 0){
$sql1="select cuit from proveedores where cuenta = $nro_proveedor";
$result1 = $db->Execute($sql1);
$cuit=strtoupper($result1->fields["cuit"]);

}


if ($cod_operacion == 6){
	$cuit = "";
}


switch ($tipo_iva) {
	case "1":{
$condicion = "R.I.";
		break;
	}

	case "3":{
$condicion = "MON";
		break;
	}

	case "4":{
$condicion = "EXE";
		break;
	}

	case "0":{
$condicion = "MON";
		break;
	}

}



$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);

$fecha = $dia."/".$mes."/".$anio;

$bruto=strtoupper($result->fields["subtotal"]);
$descuento=strtoupper($result->fields["descuento"]);
$iva=strtoupper($result->fields["iva"]);
//$neto_gravado=strtoupper($result->fields["neto_gravado"]);


$neto_gravado =strtoupper($result->fields["neto_gravado"]);
$total=$result->fields["total"];






$net = round($neto_gravado + $iva,2);




$periodo=strtoupper($result->fields["periodo"]);
$anio=strtoupper($result->fields["anio"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);

$forma_pago=strtoupper($result->fields["forma_pago"]);
$forma_pago;


  $cod_movimiento=strtoupper($result->fields["cod_movimiento"]);


SWITCH ($cod_movimiento){

case "1":{
$entrada = $precio_renglon;
$movimiento = "N/E";
BREAK;
}

case "2":{
$entrada = $precio_renglon;
$movimiento = "FAC";
BREAK;
}

case "3":{
$salida = $precio_renglon;
$movimiento = "N/C";


BREAK;
}

case "4":{
$salida = $precio_renglon;
$movimiento = "PAGO";
BREAK;
}


CASE "5":{
$salida = $precio_renglon;
$movimiento = "LIQ";
BREAK;
}

CASE "6":{
$salida = ($precio_renglon * -1);
$movimiento = "ANU";
BREAK;
}

}







$total_fin = $total_fin + $total;

if ($total == 0.00){
	$total = "-";

}else {
$total = "$".number_format($total,2);
}




//$nro_factura = str_pad($nro_factura,10,'0',STR_PAD_LEFT);

if ($nro_proveedor == 1){
?>

 <tr bgcolor="#FF0000"><td><div align="center"><span class="Estilo65"><?php print("$fecha");?></span></div></td>
     <td class="Estilo65"> <div align="center" class="Estilo76"><a href="recibos_compra.php?nro_factura=<?php print("$nro_factura");?>"><?php print("$nro_factura");?></a></div></td>
     <td><div align="center"><span class="Estilo65"><?php print("$comprobante");?></span></div></td>
     <td><span class="Estilo65"><?php print("$nro_proveedor");?> - <?php print("$denominacion");?></span></td>
     <!-- <td><div align="center" class="Estilo6"><span class="Estilo4 Estilo5"><?php print("$proveedor");?></span></div></td> -->

     <td><div align="right" class="Estilo65"><?php echo $total;?></div></td>
     <td><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td><div align="center"></div></td>
     </tr>
<?php }else{?>

     <tr><td><div align="center"><span class="Estilo65"><?php print("$fecha");?></span></div></td>
     <td class="Estilo65"> <div align="center" class="Estilo76"><a href="recibos_compra.php?nro_factura=<?php print("$nro_factura");?>"><?php print("$nro_factura");?></a></div></td>
     <td><div align="center"><span class="Estilo65"><?php print("$comprobante");?></span></div></td>
     <td><span class="Estilo65"><?php print("$nro_proveedor");?> - <?php print("$denominacion");?></span></td>
     <!-- <td><div align="center" class="Estilo6"><span class="Estilo4 Estilo5"><?php print("$proveedor");?></span></div></td> -->

     <td><div align="right" class="Estilo65"><?php echo $total;?></div></td>
     <td><div align="center"><a href="modificar_orden.php?nro_factura=<?php print("$nro_factura");?>&&comprobante=<?php print("$comprobante");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Modificar la orden y sus RESULTADOS?');"><img src="../../../imagenes/office//009.ico" alt="Borrar" border = "0"></a></div></td>
     <td><div align="center"><a href="borra_orden.php?nro_factura=<?php print("$nro_factura");?>&&comprobante=<?php print("$comprobante");?>" onClick="return confirm('&iquest;Est&aacute; seguro de Borrar la orden y sus RESULTADOS?');"><img src="../../../imagenes/office//1047.ico" alt="Borrar" border = "0"></a></div></td>
     </tr>
<?php }


  $neto_gravado_ri= "";
$neto_gravado_mon= "";
$neto_gravado_ex= "";
$iva_ri= "";
$iva_mon= "";
$total = "";
$neto_nc = "";
$iva_nc = "";
$iva_mon_nc = "";
$mon_nc = "";
$ex_nc = "";

//$condicion = "";  

$cont = $cont +1;


	$result->MoveNext();
	}

	$condicion = "";  

$cuit = "";
$tipo = "";


?>    <tr>
     <td colspan="4" bgcolor="#B8B8B8"><div align="right" class="Estilo62"><strong>TOTALES</strong></div></td>
     <td bgcolor="#B8B8B8" class="Estilo62"><div align="right" class="Estilo66 Estilo73"><strong><?php echo $total_fin;?></strong></div></td>
     <td bgcolor="#B8B8B8" class="Estilo62"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td bgcolor="#B8B8B8" class="Estilo62"><!--DWLayoutEmptyCell-->&nbsp;</td>
     </tr>
</table>

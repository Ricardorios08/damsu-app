<?php $nro_factura;
$hoy = date("d/m/y");
?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo6 {font-size: 9px; font-family: Arial, Helvetica, sans-serif; }
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
.Estilo20 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">


   <!--DWLayoutTable-->

  <table width="800" border="1" cellspacing="0">
   <!--DWLayoutTable-->
   <tr valign="middle" bgcolor="#FFFFFF">
     <td height="95" colspan="4" valign="top"><div align="center" class="Estilo67 Estilo72"><strong>PROGRAMA ONCOLOGICO</strong></div>
       <div align="center" class="Estilo69 Estilo73"><strong>_________ <span class="Estilo3">ENTREGAS PROGRAMA </span> </strong></div>
       <div align="center" class="Estilo71 Estilo23">SAN JUAN Y DON BOSCO - 5500 MENDOZA </div>
     <div align="center" class="Estilo71 Estilo23">EXENTO </div>       <div align="left"><span class="Estilo65"><span class="Estilo64"><span class="Estilo3"> </span><?php ECHO $perio;?> - <?php ECHO $anio;?></span> </span></div></td>
     <td colspan="2" valign="top"><div align="center"><span class="Estilo65"><span class="Estilo64"><span class="Estilo68"><span class="Estilo3">ENTREGAS <strong>PROGRAMA</strong> </span><BR>
     </span></span></span></div>
       <div align="right" class="Estilo22">
         <div align="center">Registro N&ordm; <?php echo $registro;?> <span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span>HOJA N&ordm; <?php echo $hoja;?> </div>
     </div></td>
   </tr>
   
   <tr bgcolor="#FFFFFF">
     <td height="2" colspan="5">           
     <td width="126">        </tr>
   <tr bgcolor="#FFFFFF">
     <td width="67" bgcolor="#B8B8B8"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Fecha</span> </div>
     <td width="55" bgcolor="#B8B8B8"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Tipo</span></div>
     <td width="118" bgcolor="#B8B8B8"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Comprobante</span> </div>
     <td bgcolor="#B8B8B8">
       <div align="center"><span class="Estilo6 Estilo2  Estilo5">Denominaci&oacute;n</span></div>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo6 Estilo2  Estilo5">INV.</span> </div>
     <td bgcolor="#B8B8B8"><div align="right"><span class="Estilo6 Estilo2  Estilo5">Total</span></div></td>
    </tr>
   

   
     <?php 

include ("../../../conexiones/config_pro.php");



$fecha_desde = $anio."-".$mes."-01"; 
$fecha_hasta =$anio."-".$mes."-31";

$sql="select * from tr_ventas_encabezado where fecha BETWEEN '$fecha_desde' and '$fecha_hasta' ORDER by nro_factura";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$cuent = $cuenta;

$nro_cliente=strtoupper($result->fields["nro_cliente"]);
$nro_cuenta=strtoupper($result->fields["nro_cuenta"]);
$contame = $contame +1;

$cod_operacion=strtoupper($result->fields["cod_operacion"]);


$nro_factura=strtoupper($result->fields["nro_factura"]);

$denominacion=strtoupper($result->fields["denominacion"]);
$denominacion=substr($denominacion,0,25);

$fecha=strtoupper($result->fields["fecha"]);
$tipo_iva=strtoupper($result->fields["tipo_iva"]);






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


$total=($result->fields["neto"]);
$neto_gravado =strtoupper($result->fields["neto_gravado"]);
$periodo=strtoupper($result->fields["periodo"]);
$anio=strtoupper($result->fields["anio"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);
$cod_operacion=strtoupper($result->fields["cod_operacion"]);
$forma_pago=strtoupper($result->fields["forma_pago"]);
$tipo_factura=strtoupper($result->fields["tipo_factura"]);
$cod_movimiento=$result->fields["cod_movimiento"];

SWITCH ($cod_movimiento){

case "1":{
$movimiento = "ENT";
BREAK;
}

case "2":{
$entrada = $precio_renglon;
$movimiento = "N/D";
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
$movimiento = "DESC X LIQUIDACION";
BREAK;
}

CASE "6":{
$salida = $precio_renglon;
$movimiento = "ANU";
$denominacion = "ANULADA";
$condicion = " - ";
BREAK;
}

}

$total_fin = $total_fin + $total;
$nro_factura = str_pad($nro_factura,10,'0',STR_PAD_LEFT);

?>
     <tr><td><div align="center" class="Estilo20"><?php print("$fecha");?></div></td>
     <td>
       <div align="center" class="Estilo20">         
         <div align="center"><?php print("$movimiento");?></div>
         <div align="center"></div></div></td>
     <td><div align="center"><span class="Estilo20"><?php print("$nro_factura");?></span></div></td>
     <td><div align="left" class="Estilo20" > <?php print("$denominacion");?></div></td>
     <td><div align="center"><span class="Estilo20"><?php print("$tipo_factura");?></span></div></td>
     <!-- <td><div align="center" class="Estilo6"><span class="Estilo4 Estilo5"><?php print("$proveedor");?></span></div></td> -->

     <td><div align="right" class="Estilo20"><?php echo $total;?></div></td>
     </tr>
   <?php 

$cont = $cont +1;



if ($cont == 28){
$hoja = $hoja + 1;	
?>
   <tr valign="middle" bgcolor="#FFFFFF">
     <td height="95" colspan="4" valign="top"><div align="center" class="Estilo67 Estilo72">
       <div align="center" class="Estilo67 Estilo72"><strong>PROGRAMA ONCOLOGICO</strong></div>
        <div align="center" class="Estilo69 Estilo73"><strong>_________<span class="Estilo3">ENTREGAS</span><span class="Estilo3">PROGRAMA</span> </strong></div>
        <div align="center" class="Estilo71 Estilo23">SAN JUAN Y DON BOSCO - 5500 MENDOZA </div>
        <div align="center" class="Estilo71 Estilo23">EXENTO </div>
     </div>       <div align="left"><span class="Estilo65"><span class="Estilo64"><span class="Estilo3"> </span><?php ECHO $perio;?> - <?php ECHO $anio;?></span> </span></div></td>
     <td colspan="2" valign="top"><div align="center"><span class="Estilo65"><span class="Estilo64"><span class="Estilo68"><span class="Estilo3">ENTREGAS<strong>PROGRAMA</strong></span><BR>
     </span></span></span></div>
       <div align="right" class="Estilo22">
         <div align="center">Registro N&ordm; <?php echo $registro;?> <span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span><span class="Estilo71 Estilo65"><span class="Estilo71 Estilo23">&nbsp;</span></span>HOJA N&ordm; <?php echo $hoja;?> </div>
     </div></td>
   </tr>
   
   <tr bgcolor="#FFFFFF">
     <td height="2" colspan="5">             
     <td>        </tr>
   <tr bgcolor="#FFFFFF">
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Fecha</span> </div>
     <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Comprobante</span></div>
     <td colspan="2" bgcolor="#B8B8B8">
       <div align="center"><span class="Estilo6 Estilo2  Estilo5">Denominaci&oacute;n</span></div>
     <td bgcolor="#B8B8B8"><div align="right"><span class="Estilo6 Estilo2  Estilo5">Total</span></div></td>
    </tr>
   <tr>
     <td height="2" colspan="5"></td>
     <td></td>
   </tr>

     <?php 
$cont = 0;

}
	$result->MoveNext();
	}

	$condicion = "";  

$cuit = "";
$tipo = "";


?>    <tr>
     <td colspan="5" bgcolor="#B8B8B8"><div align="right" class="Estilo62"><strong>TOTALES</strong></div></td>
     <td bgcolor="#B8B8B8" class="Estilo62"><div align="right" class="Estilo66 Estilo73"><strong><?php echo number_format($total_fin,2);?></strong></div></td>
     </tr>
     <tr>
       <td height="5"></td>
       <td></td>
       <td></td>
       <td width="356"></td>
       <td width="52"></td>
       <td></td>
     </tr>
</table>

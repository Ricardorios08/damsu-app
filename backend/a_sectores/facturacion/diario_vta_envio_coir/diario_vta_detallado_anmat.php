<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo8 {font-size: 14px}
.Estilo74 {font-family: Arial, Helvetica, sans-serif}
.Estilo75 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->
</style>
 

<!-- 
<a href="imp_pendientes.php?a='excel'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a> -->


<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 



<?php 

// este mismo programa con seleccion de bioquimico corte por mes sera estadistica de venta

/*  mes    CONTADO   CTA CTE
	01         $5000
 	02                   $600
	03
*/


$nro_factura;




?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo70 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo72 {font-size: 12px}
.Estilo72 {font-family: Arial, Helvetica, sans-serif}
.Estilo74 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
</style>



<table width="800" height="145" border="0" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#B8B8B8">
    <td height="26" colspan="9"><div align="center" class="Estilo2">
      <div align="center">Diario de ENTREGAS AL COIR DIA PARA ANMAT: <?php ECHO $fecha_a;?></span> </span></div>
    </div></td>
  </tr>
   <tr bgcolor="#F0F0F0">
     <td width="10%" height="21"><div align="center"><span class="Estilo2">Movimiento</span>
     </div>
     <td width="12%"><div align="center"><span class="Estilo2">Comprobante</span></span></div></td>
     <!-- <td width="5%"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Proveedor</span></div></td> -->
<td width="32%" ><div align="center"><span class="Estilo2">Paciente</span></span></div></td>
<td width="7%" ><div align="center"><span class="Estilo2">OS</span></div></td>
<td width="9%" ><div align="center"><span class="Estilo2">Documento</span></div></td>
 
<td width="10%" ><div align="center"><span class="Estilo2">Fuente</span></div></td>
<td width="9%" ><div align="center"><span class="Estilo2">Total</span></div></td>
   </tr>
   

	 <?php 

include ("../../../conexiones/config_pro.php");

$sql="select * from tr_ventas_encabezado where fecha = '$fecha' and enviar = 'COIR' and fuente = '$fuente' ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cuent = $cuenta;

$cuenta=strtoupper($result->fields["documento"]);

 $cod_movimiento=strtoupper($result->fields["cod_movimiento"]);
$forma_pago=strtoupper($result->fields["forma_pago"]);
$nro_factura=strtoupper($result->fields["nro_factura"]);

$denominacion=strtoupper($result->fields["denominacion"]);
$tipo_fact=strtoupper($result->fields["tipo_fact"]);

$fecha=strtoupper($result->fields["fecha"]);
$descuento=strtoupper($result->fields["descuento"]);

$bonificacion=strtoupper($result->fields["bonificacion"]);
$subtotal=strtoupper($result->fields["subtotal"]);
$iva=strtoupper($result->fields["iva"]);
$total=strtoupper($result->fields["total"]);
$periodo=strtoupper($result->fields["periodo"]);
$anio=strtoupper($result->fields["anio"]);
$neto=strtoupper($result->fields["neto"]);
$estado=strtoupper($result->fields["estado"]);
$documento=strtoupper($result->fields["documento"]);
 $nro_os=strtoupper($result->fields["nro_os"]);

 if ($estado == ""){
$estado = "FACTURADO";
 }

$sql1="select * from paciente_diagnostico where documento = '$documento'";
$result1 = $db->Execute($sql1);

$cod_fuente=strtoupper($result1->fields["cod_fuente"]);

$sql1="select * from fuentes where nro_fuente = '$cod_fuente'";
$result1 = $db->Execute($sql1);

$nombre_fuente=strtoupper($result1->fields["nombre_fuente"]);


if ($nro_os == 10){
$sql1="select * from obrasocial where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);

$nombre_os=strtoupper($result1->fields["nombre_os"]);
}else{
$nombre_os="";
$nro_os = "";

}


if ($tipo_fact == '002'){
$modo = "UNI";
}
ELSE
	  {
$modo = "PO";
	  }
$nro_receta=strtoupper($result->fields["nro_receta"]);

SWITCH ($cod_movimiento){

case "1":{
$entrada = $precio_renglon;
$movimiento = "N/Entrega";
BREAK;
}

case "10":{
$entrada = $precio_renglon;
$movimiento = "N/Entrega";
BREAK;
}


case "2":{
$entrada = $precio_renglon;
$movimiento = "NOTA DE DEBITO";
BREAK;
}

case "3":{
$salida = $precio_renglon;
$movimiento = "NOTA DE CREDITO";


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

CASE "6":{
$salida = ($precio_renglon * -1);
$movimiento = "ANULADA";
BREAK;
}

}



if ($cod_movimiento == 3){
		$total_total = $total_total - $neto;
	
	}
	else{
$total_total = $total_total + $neto;

	}

$sql1="select * from paciente_diagnostico where documento = '$documento'";
$result1 = $db->Execute($sql1);

$cod_fuente=strtoupper($result1->fields["cod_fuente"]);

$sql1="select * from fuentes where nro_fuente = '$cod_fuente'";
$result1 = $db->Execute($sql1);

$nombre_fuente=strtoupper($result1->fields["nombre_fuente"]);

 $sql1 = "UPDATE `tr_ventas_encabezado` SET nombre_fuente = '$nombre_fuente' , fuente = '$cod_fuente' WHERE `nro_factura` = $nro_factura";
$result1 = $db->Execute($sql1);


?>
<tr bgcolor="#AEE4F7">
  <td height="21"><div align="center" class="Estilo70"><?php print("$movimiento");?></div></td>
<td><div align="center" class="Estilo5"> <?php print("$nro_factura");?></div></td>
<td><div align="center" class="Estilo5"> <div align="left"><?php print("$denominacion");?></div>
</div>    </td>



<td><div align="center"><span class="Estilo75"><?php print("$nombre_os");?></span></div></td>
<td><div align="center" class="Estilo75"><a href="../buscar_paciente_general_facturacion.php?documento=<?php print("$cuenta");?>&&bander=2&&busca=<?php print("$cuenta");?>" target = "central1"><?php print("$cuenta");?></a></div></td>
 
<td><div align="center"><span class="Estilo5"><?php print("$nombre_fuente");?></span></div></td>
<td><div align="center" class="Estilo5">



<?php if ($cod_movimiento == 3){?>
  <div align="right">(<?php echo $neto;?>)</div>

<?php } else {?>
  <div align="right"><?php echo $neto;?></div>
<?php

}?>


</div></td>
</tr>

   <tr bgcolor="#FFFFFF">
     <td height="21" colspan="6"><?php include ("detalle_factura_anmat.php");?></td>
     <td height="21"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
   <tr bgcolor="#FFFFFF">
     <td height="21"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21" colspan="5"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td height="21"><!--DWLayoutEmptyCell-->&nbsp;</td>
   </tr>


<?php 

$cuenta = "";
	

	$result->MoveNext();
	}


	?>


   <tr>
  <td height="21" colspan="9" bgcolor="#B8B8B8"><div align="center" class="Estilo74 Estilo72">
      <div align="right"><strong>TOTAL <span class="Estilo72">$ <?php echo number_format($total_total,2);?></span></strong></div>
  </div></td>
  </tr>
</table>





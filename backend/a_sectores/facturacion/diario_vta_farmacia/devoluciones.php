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



<table width="800" height="145" border="1" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#000099">
    <td height="26" colspan="7"><div align="center" class="Estilo2">
      <div align="center"><span class="Estilo5"><span class="Estilo8">DEVOLUCIONES (INGRESO AL UNICO)</span> </span></div>
    </div></td>
  </tr>
   <tr bgcolor="#DAFAFC">
     <td width="10%" height="21" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Movimiento</span>
     </div>
     <td width="12%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Comprobante</span></span></div></td>
     <!-- <td width="5%"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Proveedor</span></div></td> -->
<td width="41%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Paciente</span></span></div></td>
<td width="10%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Documento</span></div></td>
<td width="8%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Receta</span></div></td>
<td width="10%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">TOTAL</span></div></td>
   <td width="9%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">PDF</span></div></td>
   </tr>
   

	 <?php 

include ("../../../conexiones/config_pro.php");

$sql="select * from compras_encabezado where fecha = '$fecha' ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cuent = $cuenta;

$cuenta=strtoupper($result->fields["documento"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);

  $sql7="select * from pacientes where documento = $cuenta and tipo_doc = '$tipo_doc'";
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

 $denominacion = $apellido.", ".$nombre;



 $cod_movimiento=strtoupper($result->fields["cod_operacion"]);
$forma_pago=strtoupper($result->fields["forma_pago"]);
$nro_factura=strtoupper($result->fields["nro_factura"]);


$tipo_fact=strtoupper($result->fields["tipo_fact"]);

$fecha=strtoupper($result->fields["fecha"]);
$descuento=strtoupper($result->fields["descuento"]);

$bonificacion=strtoupper($result->fields["bonificacion"]);
$subtotal=strtoupper($result->fields["subtotal"]);
$iva=strtoupper($result->fields["iva"]);
$total=strtoupper($result->fields["total"]);
$periodo=strtoupper($result->fields["periodo"]);
$anio=strtoupper($result->fields["anio"]);
$neto=strtoupper($result->fields["total"]);

$nro_receta=strtoupper($result->fields["nro_receta"]);

SWITCH ($cod_movimiento){

case "1":{
$entrada = $precio_renglon;
$movimiento = "N/Entrega";
BREAK;
}

case "2":{
$entrada = $precio_renglon;
$movimiento = "N/Devolución";
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


$total_total = $total_total + $neto;



?>
<tr>
  <td height="21"><div align="center" class="Estilo70"><?php print("$movimiento");?></div></td>
<td><div align="center" class="Estilo5"><?php print("$nro_factura");?></div></td>
<td><div align="center" class="Estilo5"> <div align="left"><?php print("$denominacion");?></div>
</div>    </td>



<td><div align="center" class="Estilo75"><?php print("$cuenta");?></div></td>
<td><div align="center"><span class="Estilo5"><?php print("$nro_receta");?></span></div></td>
<td><div align="center" class="Estilo5">
  <div align="right"><?php echo $neto;?></div>
</div></td>
<td><div align="center"><a href="../imprimir_nc_pdf.php?nro_receta=<?php print("$nro_receta");?>" target = "central1"> <img src="../../../imagenes/logo Pdf.gif" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a> </div></td>
</tr>





<?php 

$cuenta = "";
	

	$result->MoveNext();
	}


	?>

   <tr>
  <td height="21" colspan="7" bgcolor="#B8B8B8"><div align="right"><strong>TOTAL <span class="Estilo72">$ <?php echo number_format($total_total,2);?></span></strong></div>
    <div align="center" class="Estilo74 Estilo72">
      <div align="right"></div>
    </div></td>
  </tr>
</table>





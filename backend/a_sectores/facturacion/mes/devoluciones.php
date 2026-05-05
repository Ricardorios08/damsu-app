<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo74 {font-family: Arial, Helvetica, sans-serif}
.Estilo75 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo76 {
	color: #000000;
	font-family: "Trebuchet MS";
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
 

<!-- 
<a href="imp_pendientes.php?a='excel'&&buscar_por=<?php print("$buscar_por");?>"><IMG SRC="../../imagenes/botones//btn_exportar.gif" alt="Exportar" border = "0"></a> -->


<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 



<?php 

$total_total = "";
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
  <?php if ($cod_fuente == ""){?>
    <td height="26" colspan="5" bgcolor="#CCCCCC"><div align="center">DEVOLUCIONES (Ingreso al Unico) </div></td>
	<?php }else{?>
 <td height="26" colspan="5" bgcolor="#CCCCCC"><div align="center">DEVOLUCIONES (Ingreso al Unico) <?PHP echo $nombre_fuente;?> </div></td>
  <?php }?>


  </tr>
  <tr valign="middle" bgcolor="#000099">
    <td height="26" colspan="5" bgcolor="#FFFFFF" >
      <div align="center" class="Estilo76"><?php ECHO $fecha_a;?></div>
      </div></td>
  </tr>
   <tr bgcolor="#DAFAFC">
     <td width="14%" height="21" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Fecha</span>
     </div>
     <td width="16%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Comprobante</span></span></div></td>
     <!-- <td width="5%"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Proveedor</span></div></td> -->
<td width="42%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Paciente</span></span></div></td>
<td width="16%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Documento</span></div></td>
<td width="12%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">TOTAL</span></div></td>
   </tr>
   

	 <?php 



include ("../../../conexiones/config_pro.php");


include ("../../../conexiones/config_pro.php");
if ($cod_fuente == ""){
 $sql="select * from compras_encabezado where fecha between '$fecha_desde' and '$fecha_hasta' ORDER by nro_factura, fecha desc";
}else{
 $sql="select * from compras_encabezado where fecha between '$fecha_desde' and '$fecha_hasta1' and cod_fuente = '$cod_fuente'  ORDER by nro_factura, fecha desc";
}


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


   $sql7 = "SELECT * FROM `afiliaciones` where documento = $cuenta";
$result7 = $db->Execute($sql7);
 $nro_os=$result7->fields["nro_os"];
 


$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);

$fecha = $dia."/".$mes."/".$anio;

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
  <td height="21"><div align="center" class="Estilo70"><?php print("$fecha");?></div></td>
<td><div align="center" class="Estilo5"><?php print("$nro_factura");?></div></td>
<td><div align="center" class="Estilo5"> <div align="left"><?php print("$denominacion");?></div>
</div>    </td>



<td><div align="center" class="Estilo75"><?php print("$cuenta");?></div></td>
<td><div align="center" class="Estilo5">
  <div align="right"><?php echo $neto;?></div>
</div></td>
</tr>





<?php 

$cuenta = "";
	

	$result->MoveNext();
	}

	?>

   <tr>
  <td height="21" colspan="5" bgcolor="#B8B8B8"><div align="right"><strong>TOTAL <span class="Estilo72">$ <?php echo number_format($total_total,2);?></span></strong></div>
    <div align="center" class="Estilo74 Estilo72">
      <div align="right"></div>
    </div></td>
  </tr>
</table>





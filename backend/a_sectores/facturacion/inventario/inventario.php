<style type="text/css">
<!--
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo6 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>


<?php 
 
include ("../../../conexiones/config_pro.php");

$hoy=date("d/m/y");
$id= $_REQUEST['id'];

 
?>



 

<table width="866">
  <!--DWLayoutTable-->
  <tr bgcolor="#FFFFFF">
    <td colspan="11"><div align="center" class="Estilo6">INVENTARIO ASIGNADO</div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
	<td width="40"><div align="center" class="Estilo1 Estilo2">PRESTADOR</div></td>
	<td colspan="2"><div align="center" class="Estilo3">DROGA</div></td>
	<td width="183"><div align="center" class="Estilo3">GTIN</div></td>
	<td width="38"><div align="center" class="Estilo3">LOTE</div></td>
	<td width="40"><div align="center" class="Estilo3">VTO</div></td>
	<td width="73"><div align="center" class="Estilo3">RECIBIDO</div></td>
	 
	<td width="53" bgcolor="#B8B8B8"><div align="center"><span class="Estilo1 Estilo2">CANT</span></div></td>
    <td width="55" bgcolor="#B8B8B8"><span class="Estilo4">INDICADO</span></td>
    <td width="55" bgcolor="#B8B8B8"><span class="Estilo4">PREPARADO</span></td>
    <td width="55" bgcolor="#B8B8B8"><div align="center"><span class="Estilo1 Estilo2">DIAS</span></div></td>
  </tr>



<?php

 
$hoy = date("Y-m-d");

///////////////
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$diferencia = $days;
//////////////////
//printf("%d years, %d months, %d days\n", $years, $months, $days);

 

  $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  recibido_coir = 1 and preparado_coir = 0 ";


   $sql3 = "SELECT tr_ventas_detalle.* , tr_ventas_encabezado.* FROM tr_ventas_detalle INNER JOIN tr_ventas_encabezado ON tr_ventas_detalle.nro_factura = tr_ventas_encabezado.nro_factura WHERE  recibido_coir = 1 and preparado_coir = 0 and enviar = '$id' ORDER BY tr_ventas_encabezado.fecha , tr_ventas_encabezado.documento, tr_ventas_encabezado.nro_factura, tr_ventas_detalle.cod_mercaderia";
$result3 = $db->Execute($sql3);


if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


$contame = $contame + 1;
$contame1 = $contame1 + 1;

$cod_merca = $cod_mercaderia;

$nro_fac = $nro_factura;


  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
 




///DETALLE///
$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$estado= $result3->fields["estado"];
 $recibido_coir= $result3->fields["recibido_coir"];
$recibido_farmacia= $result3->fields["recibido_farmacia"];
$recibido_servicio= $result3->fields["recibido_servicio"];
$aplicado_servicio= $result3->fields["aplicado_servicio"];

$enviar= $result3->fields["enviar"];
$nombre_prestador= $result3->fields["nombre_prestador"];


$fecha_recibido= $result3->fields["fecha_recibido"];
$fecha_indicado= $result3->fields["fecha_indicado"];

$fecha_preparado= $result3->fields["fecha_preparado"];


$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);



///ENCABEZADO///
 

$cod_movimiento=strtoupper($result3->fields["cod_movimiento"]);
$forma_pago=strtoupper($result3->fields["forma_pago"]);
$nro_factura=strtoupper($result3->fields["nro_factura"]);

 $denominacion=strtoupper($result3->fields["denominacion"]);
$tipo_fact=strtoupper($result3->fields["tipo_fact"]);

$fecha=strtoupper($result3->fields["fecha"]);
$descuento=strtoupper($result3->fields["descuento"]);

$bonificacion=strtoupper($result3->fields["bonificacion"]);
$subtotal=strtoupper($result3->fields["subtotal"]);
$iva=strtoupper($result3->fields["iva"]);
$total=strtoupper($result3->fields["total"]);
$periodo=strtoupper($result3->fields["periodo"]);
$anio=strtoupper($result3->fields["anio"]);
$neto=strtoupper($result3->fields["neto"]);
$estado=strtoupper($result3->fields["estado"]);
  $documento=strtoupper($result3->fields["documento"]);
 $nro_os=strtoupper($result3->fields["nro_os"]);



//////////////////
$diff = abs(strtotime($fecha_recibido) - strtotime($hoy));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$diferencia = $days;
//////////////////


$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);


if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);
} 



$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;

$cont = $cont + 1;




 
$di = substr($fecha_recibido,8,2);$me = substr($fecha_recibido,5,2);$an = substr($fecha_recibido,0,4);$fecha_recibido = $di."/".$me."/".$an;
 
$di = substr($fecha,8,2);$me = substr($fecha,5,2);$an = substr($fecha,0,4);$fecha = $di."/".$me."/".$an;
 
 $di = substr($fecha_indicado,8,2);$me = substr($fecha_indicado,5,2);$an = substr($fecha_indicado,0,4);$fecha_indicado = $di."/".$me."/".$an;
 $di = substr($fecha_preparado,8,2);$me = substr($fecha_preparado,5,2);$an = substr($fecha_preparado,0,4);$fecha_preparado = $di."/".$me."/".$an;

if ($fecha_indicado == '00/00/0000'){$fecha_indicado = "-";}
if ($fecha_preparado == '00/00/0000'){$fecha_preparado = "-";}

if ($nro_fac != $nro_factura){?>

<tr bgcolor="#AED0F9">
  <td height="21"><div align="center" class="Estilo70"><?php print("$nombre_prestador");?></div></td>
<td width="107"><div align="center" class="Estilo5"> <?php print("$nro_factura");?></div></td>
<td width="97"><div align="center"><span class="Estilo5"><?php print("$fecha");?></span></div></td>
<td><div align="center" class="Estilo5"> <div align="left"><?php print("$denominacion");?></div>
</div>    </td>



<td><div align="center"><span class="Estilo75"><?php print("$nombre_fuente");?></span></div></td>
<td><div align="center" class="Estilo75"></div></td>
 
<td><div align="center"></div></td>
<td valign="top"><div align="center" class="Estilo5"><span class="Estilo75"><?php print("$documento");?></span>
  

</div></td>
<td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
<td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
<td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
</tr>

 
<?php }




 $total = $total + $cantidad;
$total_total = $total_total + $cantidad;
 

if ($diferencia < 15){?>
<tr bgcolor="#F0F0F0">
<td colspan="3"><span class="Estilo4"> </span><span class="Estilo4"><?php echo $nombre_comercial;?></span></td>
<td><span class="Estilo4"><?php echo $gtin;?></span></td>
<td><div align="center" class="Estilo4"><?php echo $lote1;?></div></td>
<td><div align="center" class="Estilo4"><?php echo $vto_lote;?></div></td>
<td bgcolor="#F0F0F0"><div align="center"><span class="Estilo4"><?php echo $fecha_recibido;?></span></div></td>
<td bgcolor="#F0F0F0"><div align="center"><span class="Estilo4"><?php echo $cantidad;?></span></div></td>
<td bgcolor="#F0F0F0"><div align="center"><span class="Estilo4"><?php echo $fecha_indicado;?></span></div></td>
<td bgcolor="#F0F0F0"><div align="center"><span class="Estilo4"><?php echo $fecha_preparado;?></span></div></td>
<td bgcolor="#F0F0F0"><div align="center"><span class="Estilo4"><?php echo $diferencia;?></span></div></td>
<?php
}else{?>
<tr bgcolor="#F3AA98">
<td colspan="3"><span class="Estilo4"> </span><span class="Estilo4"><?php echo $nombre_comercial;?></span></td>
<td><span class="Estilo4"><?php echo $gtin;?></span></td>
<td><div align="center" class="Estilo4"><?php echo $lote1;?></div></td>
<td><div align="center" class="Estilo4"><?php echo $vto_lote;?></div></td>
<td><div align="center"><span class="Estilo4"><?php echo $fecha_recibido;?></span></div></td>
<td><div align="center"><span class="Estilo4"><?php echo $cantidad;?></span></div></td>
<td><!--DWLayoutEmptyCell-->&nbsp;</td>
<td><!--DWLayoutEmptyCell-->&nbsp;</td>
<td><div align="center"><span class="Estilo4"><?php echo $diferencia;?></span></div></td>
<?php
}





	 $result3->MoveNext();

				}

?>
</table>

 </FORM>
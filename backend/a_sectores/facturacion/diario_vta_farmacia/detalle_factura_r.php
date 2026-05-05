<style type="text/css">
<!--
.Estilo3 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 12px}
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>


<table width="850">
 
<tr bgcolor="#B8B8B8">
	<td width="46"><div align="center" class="Estilo1 Estilo2 Estilo3 Estilo4">CANT</div></td>
	<td colspan="2"><div align="center" class="Estilo5">DROGA</div></td>
	<td><div align="center"><span class="Estilo1 Estilo2 Estilo3 Estilo4">CONTROL</span></div></td>
	<td width="211"><div align="center" class="Estilo5">GTIN</div></td>
	<td width="42"><div align="center" class="Estilo5">LOTE</div></td>
	<td width="47"><div align="center" class="Estilo5">VTO</div></td>
	</tr>

<?php

  $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  nro_factura = $nro_factura AND preparado_coir = 1 order by  cod_detalle desc";
$result5 = $db->Execute($sql3);

if (!$result5) die("fallo".$db->ErrorMsg());

 while (!$result5->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result5->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result5->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}


if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}


$cantidad=strtoupper($result5->fields["cantidad"]);
$proveedor=strtoupper($result5->fields["proveedor"]);
$presentacion=strtoupper($result5->fields["presentacion"]);
$descripcion=strtoupper($result5->fields["descripcion"]);
$cod_detalle=strtoupper($result5->fields["cod_detalle"]);
$gtin = $result5->fields["gtin"];
$resultado= $result5->fields["resultado"];
$transaccion= $result5->fields["transaccion"];
$estado= $result5->fields["estado"];
 $recibido_coir= $result5->fields["recibido_coir"];
$recibido_farmacia= $result5->fields["recibido_farmacia"];
$recibido_servicio= $result5->fields["recibido_servicio"];
$fecha_recibido= $result5->fields["fecha_recibido"];
$fecha_preparado= $result5->fields["fecha_preparado"];

  $indicado_coir= $result5->fields["indicado_coir"];
 $preparado_coir= $result5->fields["preparado_coir"];

$dia2 = substr($fecha_preparado,8,2);
$mes2 = substr($fecha_preparado,5,2);
$anio2 = substr($fecha_preparado,0,4);
$fecha_preparado = $dia2."/".$mes2."/".$anio2;

$lote1=strtoupper($result5->fields["lote"]);
$mes_lote=strtoupper($result5->fields["mes_lote"]);
$anio_lote=strtoupper($result5->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result5->fields["gtin"]);
$precio_unitario=strtoupper($result5->fields["precio_unitario"]);

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result6 = $db->Execute($sql);
$cod_mercaderia=strtoupper($result6->fields["troquel"]);
$presentacion=strtoupper($result6->fields["presentacion"]);
$nombre_comercial=strtoupper($result6->fields["nombre_comercial"]);
$cod_droga=strtoupper($result6->fields["cod_droga"]);
$laboratorio=strtoupper($result6->fields["laboratorio"]);


/* if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result6 = $db->Execute($sql);
$laboratorio=strtoupper($result6->fields["laboratorio"]);
} */



/*$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result6 = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;*/

$cont = $cont + 1;

if ($estado == ""){$estado = "ASIGNADO";}

 if ($preparado_coir == 1){
?>
<tr bgcolor="#FFFFFF">
	<td><div align="center" class="Estilo5"><?php echo $cantidad;?> </div></td>
	<td width="319"><span class="Estilo5"><?php echo $nombre_comercial;?></span></td>

	<td width="90"><div align="center"><span class="Estilo5"><?php echo $fecha_preparado;?></span></div></td>
	<td width="63"><div align="center"><img src="tilde.jpg" width="18" height="20"></div></td>
	<td><span class="Estilo5"><?php echo $gtin;?></span></td>
	<td><div align="center" class="Estilo5"><?php echo $lote1;?></div></td>
	<td><div align="center" class="Estilo5"><?php echo $vto_lote;?></div></td>
	<?PHP
 }else{
?>
<tr bgcolor="#FFFFFF">
	<td><div align="center" class="Estilo5"><?php echo $cantidad;?> </div></td>
	<td colspan="2"><span class="Estilo5"><?php echo $nombre_comercial;?></span></td>

	<td width="63"><div align="center"> </div></td>
	<td><span class="Estilo5"><?php echo $gtin;?></span></td>
	<td><div align="center" class="Estilo5"><?php echo $lote1;?></div></td>
	<td><div align="center" class="Estilo5"><?php echo $vto_lote;?></div></td>
	<?PHP
	}



	 $result5->MoveNext();

				}

?>
  </tr>


	</table>
 
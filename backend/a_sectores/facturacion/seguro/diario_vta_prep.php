<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo16 {font-family: "Trebuchet MS"}
.Estilo17 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo18 {
	font-size: 24px;
	font-weight: bold;
}
.Estilo19 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
 

 


<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 


 


<table width="800" border="1" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#CEFFCE">
    <td height="45" colspan="12"><div align="center" class="Estilo2 Estilo18">
      <div align="center"><?php echo $titulo;?>. Dia: <?php ECHO $fecha_a;?> </div>
    </div></td>
  </tr>

  

	<tr bgcolor="#B8B8B8">
	  <td width="72"><span class="Estilo1 Estilo2 Estilo16 Estilo5">N&deg; ENTREGA </span></td>
	  <td width="161"><div align="center" class="Estilo1 Estilo2 Estilo16 Estilo5">PACIENTE</div></td>
	<td width="71"><div align="center" class="Estilo1 Estilo2 Estilo16 Estilo5">DOCUMENTO</div></td>
	<td width="38"><div align="center" class="Estilo1 Estilo2 Estilo16 Estilo5">CANT</div></td>
	<td width="142"><div align="center" class="Estilo3 Estilo16 Estilo5">DROGA</div></td>
	<td width="142"><div align="center"><span class="Estilo3 Estilo16 Estilo5">COMERCIAL</span></div></td>
	<td width="97"><div align="center" class="Estilo3 Estilo16 Estilo5">FUENTE</div></td>
	<td width="38"><div align="center" class="Estilo3 Estilo16 Estilo5">LOTE</div></td>
	<td width="31"><div align="center" class="Estilo3 Estilo16 Estilo5">VTO</div></td>
	<td width="56"><div align="center" class="Estilo3 Estilo16 Estilo5">UNITARIO</div></td>
	<td width="52"><div align="center" class="Estilo3 Estilo16 Estilo5">TOTAL</div></td>
   </tr>


	 <?php 

include ("../../../conexiones/config_pro.php");

   $sql3="select * from tr_ventas_detalle where $fecha_sel = '$fecha' and $estado = $valor";
$result3 = $db->Execute($sql3);

  if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
$cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);
//$documento= $result3->fields["documento"];
$estado_r= $result3->fields["estado"];
$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
$estado11= $result3->fields["estado"];
$recibido_coir= $result3->fields["recibido_coir"];
$recibido_farmacia= $result3->fields["recibido_farmacia"];
$recibido_servicio= $result3->fields["recibido_servicio"];
$total=$result3->fields["total"];
$precio_unitario=$result3->fields["precio_unitario"];

$nro_factura= $result3->fields["nro_factura"];


$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result3->fields["gtin"]);
 

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);


$sql = "SELECT * FROM tr_ventas_encabezado where    nro_factura = '$nro_factura' ";
$result = $db->Execute($sql);
$documento=strtoupper($result->fields["documento"]);
$fuente=strtoupper($result->fields["fuente"]);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);


$nombre_remedio = $droga."  ".$presentacion;

 

 $sql7="select * from pacientes where documento = '$documento'";
$result7 = $db->Execute($sql7);
 
$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero
$nombre_completo = $apellido.", ".$nombre;

$total_total = $total_total + $total;
$total_cant = $total_cant + $cantidad;
 
?>
<tr bgcolor="#F0F0F0">
  <td><div align="center"><span class="Estilo4 Estilo16 Estilo5"><?php echo $nro_factura;?></span></div></td>
  <td><span class="Estilo4 Estilo16 Estilo5"> <?php echo $nombre_completo;?></span></td>
<td><span class="Estilo4 Estilo16 Estilo5"> <?php echo $documento;?></span></td>

	<td><div align="center"><span class="Estilo4 Estilo16 Estilo5"> <?php echo $cantidad;?></span></div></td>
	<td><span class="Estilo4 Estilo16 Estilo5"><?php echo $droga;?></span></td>
	<td><span class="Estilo4 Estilo16 Estilo5"><?php echo $nombre_comercial;?></span></td>
	<td><span class="Estilo4 Estilo16 Estilo5"><?php echo $nombre_fuente;?></span></td>
	<td><div align="center" class="Estilo4 Estilo16 Estilo5"><?php echo $lote1;?></div></td>
	<td><div align="center" class="Estilo4 Estilo16 Estilo5"><?php echo $vto_lote;?></div></td>
	<td><div align="right"><span class="Estilo4 Estilo16 Estilo5"><?php echo $precio_unitario;?></span></div></td>
	<td> <div align="right"><span class="Estilo17"><span class="Estilo4 Estilo16 Estilo5"><?php echo $total;?></span>
    </span> </div></td>
<?php


	

	$result3->MoveNext();
	}


	?>

 
<tr bgcolor="#F0F0F0">
  <td colspan="8"><div align="right"><span class="Estilo16"></span></div>    
    <div align="right"><span class="Estilo16"><strong>CANT: </strong></span><span class="Estilo17"><span class="Estilo4 Estilo16 Estilo19"><?php echo $total_cant;?></span></span></div></td>
  <td colspan="3"><div align="right"><span class="Estilo16"><strong>TOTAL: </strong></span><span class="Estilo17"><span class="Estilo4 Estilo16 Estilo19"><?php echo $total_total;?></span></span></div></td>
</table>





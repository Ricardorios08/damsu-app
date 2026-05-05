<style type="text/css">
<!--
.Estilo7 {font-size: 12px}
.Estilo13 {font-family: "Trebuchet MS"}
.Estilo14 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo15 {
	color: #FF0000;
	font-size: 10px;
	font-family: "Trebuchet MS";
}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 16px; }
.Estilo18 {font-size: 16px}
-->
</style>

<form action="seleccionar.php" method="post">



<table width="850" border="0" cellspacing="0">
 
<?php 
include("../../../conexiones/config_pro.php");

$id = $operador;
$sql = "SELECT * FROM nota_ajuste_encab  WHERE  `operador` = $operador ";
$result = $db->Execute($sql);


$operador=strtoupper($result->fields["operador"]);
$fecha1=strtoupper($result->fields["fecha"]);
$nro_factura_afectada=strtoupper($result->fields["nro_factura"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$observaciones=strtoupper($result->fields["observaciones"]);



  
?><tr bgcolor="#FFFFFF" >
    <td width="26%" bgcolor="#CCCCCC" scope="col" onMouseOver="cambiar_color_over(this)" onMouseOut="cambiar_color_out(this)"><div align="right"><span class="Estilo28 Estilo13 Estilo7">NOTA ENTREGA AFECTADA </span></div></td>
    <td width="53%" bgcolor="#E0EDF3" scope="col" onMouseOver="cambiar_color_over(this)" onMouseOut="cambiar_color_out(this)"><div align="left" class="Estilo16"><span class="Estilo28 "><?php echo $nro_factura_afectada;?></span></div>
      <div align="left" class="Estilo13 Estilo18"></div>      <div align="center" class="Estilo16"></div></td>
    <td width="21%" bgcolor="#F0F0F0" scope="col" onMouseOver="cambiar_color_over(this)" onMouseOut="cambiar_color_out(this)"><div align="center" class="Estilo15">Presione actualizar para guardar la nota devoluci&oacute;n</div></td>
  </tr>
<?php 



$total_unitario = $precio_unitario + $total_unitario;
$total_item = $total_item + 1;

?>

<tr bgcolor="#E6E6E6">
  <td bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo28 Estilo13 Estilo7">FECHA</span></div></td>
  <td bgcolor="#E0EDF3" scope="col"><span class="Estilo28 Estilo13 Estilo18"><?php echo $fecha1;?></span></td>
  <td width="21%" rowspan="3" bgcolor="#F0F0F0" scope="col" onMouseOver="cambiar_color_over(this)" onMouseOut="cambiar_color_out(this)"><div align="center"></div>    <div align="center"><strong><a href="actualizar.php?id1=<?php print("$id");?>"><img src="../../../imagenes/botones/actualizar.png" alt="Actualizar" border = "0"></a></strong></div>    <div align="center"></div></td>
</tr>
<tr bgcolor="#E6E6E6">
  <td bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo28 Estilo13 Estilo7">PACIENTE:</span></div></td>
  <td bgcolor="#E0EDF3" scope="col"><span class="Estilo28 Estilo13 Estilo18"><?php echo $denominacion;?></span></td>
  </tr>
<tr bgcolor="#E6E6E6">
  <td bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo26 Estilo13 Estilo7">OBSERVACIONES</span></div></td>
  <td bgcolor="#E0EDF3" scope="col"><span class="Estilo13 Estilo7"><span class="Estilo28 Estilo13 Estilo18"><?php echo $observaciones;?></span></span></td>
  </tr>
</table>






<?php 
 $sql6 = "SELECT * FROM `nota_ajuste`  WHERE  operador = $operador";
$result6 = $db->Execute($sql6);
$forma_pago=strtoupper($result6->fields["forma_pago"]);
$porc_dto=strtoupper($result6->fields["porc_dto"]);


$sql3 = "SELECT * FROM nota_ajuste_detalle  WHERE  operador = $operador order by cod_detalle desc";
$result3 = $db->Execute($sql3);
?>
 

<table width="850" border="0">
  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td class="Estilo90" scope="col">&nbsp;</td>
    <td class="Estilo92 Estilo13 Estilo7" scope="col">&nbsp;</td>
    <td class="Estilo90" scope="col">&nbsp;</td>
    <td class="Estilo90" scope="col">&nbsp;</td>
    <td class="Estilo90" scope="col">&nbsp;</td>
    <td colspan="4" class="Estilo90" scope="col"><div align="center"><span class="Estilo14">
      <input type="Submit" name="Submit" id ="BORRAR SELECCIONADOS" value="BORRAR SELECCIONADOS">
    </span></div></td>
    </tr>
  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="5%" class="Estilo90" scope="col"><div align="center" class="Estilo2 Estilo1 Estilo93 Estilo13 Estilo7">N&ordm;</div></td>
    <td width="36%" class="Estilo92 Estilo13 Estilo7" scope="col"><div align="center" class="Estilo2 Estilo1"><span class="Estilo46">Descripcion / Mercaderia</span></div>      <div align="center" class="Estilo3"></div></td>
    <td width="7%" class="Estilo90" scope="col"><div align="center" class="Estilo2 Estilo1 Estilo93 Estilo13 Estilo7"><span class="Estilo46">Gtin</span></div></td>
	    <td width="6%" class="Estilo90" scope="col"><div align="center" class="Estilo2 Estilo1 Estilo93 Estilo13 Estilo7"><span class="Estilo46"> Lote</span></div></td>
    <td width="10%" class="Estilo90" scope="col"><div align="center" class="Estilo2 Estilo1 Estilo93 Estilo13 Estilo7"><span class="Estilo46">VTO</span></div></td>
    <td width="7%" class="Estilo90" scope="col"><div align="center" class="Estilo14"><span class="Estilo46 Estilo48 Estilo93">Serie</span></div></td>
    <td width="6%" class="Estilo90" scope="col"><div align="center" class="Estilo2 Estilo1 Estilo93 Estilo13 Estilo7"><span class="Estilo46">Total</span></div></td>
    <td width="8%" class="Estilo90" scope="col"><div align="center" class="Estilo14">Borr</div></td>
    <td width="8%" class="Estilo90" scope="col"><div align="center" class="Estilo14">Sel</div></td>
  </tr><?php 

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


 $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
$nro_serie=strtoupper($result3->fields["nro_serie"]);
$vto_lote = $mes_lote."/".$anio_lote;
$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);
$devuelve=$result3->fields["devuelve"];

 $cod_mer = $cod_merca;
$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}


if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}


if ($cod_mer != $cod_merca){

?>
<tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td height="27" colspan="6" class="Estilo90 Estilo13 Estilo7" scope="col"><div align="center" class="Estilo93">
      <div align="right">Tot:<span class="Estilo26"><?php echo number_format($canti,2);?></span></div>
    </div>      <div align="center"></div></td>
    <td height="27" class="Estilo90 Estilo13 Estilo7" scope="col">&nbsp;</td>
    <td class="Estilo90 Estilo13 Estilo7" scope="col">&nbsp;</td>
    <td class="Estilo90 Estilo13 Estilo7" scope="col">&nbsp;</td>
</tr>

  <?php
	  $canti = 1;

}


 $sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);

 $precio_u = $precio_unitario / $cant_caja;
$precio_nd = $precio_u * $cantidad;
$total_factura = $total_factura + $precio_unitario;


$cont = $cont + 1;



?>
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td class="Estilo90" scope="col"><div align="center" class="Estilo93 Estilo13 Estilo7"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
    <?php 

			



?>


    <td height="27" class="Estilo90" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo93 Estilo13 Estilo7"><span class="Estilo26"><?php echo $nombre_comercial;?> <?php echo $presentacion;?> (<?php echo $cod_droga;?>) </span></div></td>
    <td class="Estilo90" scope="col"><div align="center" class="Estilo46 Estilo93 Estilo13 Estilo7"><span class="Estilo26"><?php echo $gtin;?></span></div></td>
	    <td class="Estilo90" scope="col"><div align="center" class="Estilo46 Estilo93 Estilo13 Estilo7"><span class="Estilo26"><?php echo $lote1;?></span></div></td>
		    <td class="Estilo90" scope="col"><div align="center" class="Estilo46 Estilo93 Estilo13 Estilo7"><span class="Estilo26"><?php echo $vto_lote;?></span></div></td>

            <td class="Estilo90" scope="col"><div align="center" class="Estilo14"><span class="Estilo26"><?php echo $nro_serie;?></span></div></td>
    <td class="Estilo90" scope="col"><div align="right" class="Estilo46 Estilo93 Estilo13 Estilo7"><span class="Estilo26">$ <?php echo number_format($precio_unitario,2);?></span></div></td>
    <td class="Estilo90" scope="col"><div align="center">
	<a href="borrar_item.php?cod_detalle=<?php print("$cod_detalle");?>&&informar=<?php print("$informar");?>&&informar_anmat=<?php print("$informar_anmat");?>nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&pasada=1&&nro_os[]=<?php print("$nro_os");?>&&dia=<?php print("$dia");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$a&ntilde;o");?>&&mes=<?php print("$mes");?>&&band=<?php print("$band");?>&&operador=<?php print("$operador");?>"><IMG SRC="../../../imagenes/office/095.ico" alt="Anular"  border = "0"></a>
	
		</div></td>
    <td class="Estilo90" scope="col"><div align="center">
      <input type="checkbox" name="<?php echo enter.$cod_detalle;?>" checked>
    </div></td>
  </tr>
 
 <?php 

	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;

//include ("espacios_en_blancos_detalle.php");
$sumatoria = 0;

?>


<tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td height="27" colspan="6" class="Estilo90 Estilo13 Estilo7" scope="col"><div align="center" class="Estilo93">
      <div align="right">Tot:<span class="Estilo26"><?php echo number_format($canti,2);?></span></div>
    </div>      <div align="center"></div></td>
    <td height="27" class="Estilo90 Estilo13 Estilo7" scope="col">&nbsp;</td>
    <td class="Estilo90 Estilo13 Estilo7" scope="col">&nbsp;</td>
    <td class="Estilo90 Estilo13 Estilo7" scope="col">&nbsp;</td>
</tr>
</table>

<table width="850" border="0">
		  <tr bgcolor="#CFCFCF" >
    <td class="Estilo90" scope="col"><div align="right"><span class="Estilo94"><span class="Estilo96"></span></span><strong><span class="Estilo76">TOTAL $</span></strong></div></td>
    <td width="13%" class="Estilo97" scope="col"><div align="center"><strong><span class="Estilo76"><?php echo number_format($total_factura,2);?></span></strong></div></td>
  </tr>
<?php 

?></table>

     <input type="hidden" name="operador"  value="<?php echo $operador;?>">
</form>


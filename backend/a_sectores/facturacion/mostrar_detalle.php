
<?php include("../../conexiones/config_pro.php");
 $sql6 = "SELECT * FROM `tr_ventas1_encab_temp`  WHERE  operador = $operador";
$result6 = $db->Execute($sql6);
$forma_pago=strtoupper($result6->fields["forma_pago"]);
$porc_dto=strtoupper($result6->fields["porc_dto"]);


$sql3 = "SELECT * FROM `tr_ventas1_deta_temp`  WHERE  operador = $operador order by cod_detalle desc";
$result3 = $db->Execute($sql3);
?>
<style type="text/css">
<!--
.Estilo90 {
	font-family: "Trebuchet MS";
	font-size: 12;
}
.Estilo92 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo93 {font-size: 12px}
.Estilo94 {font-size: 10px}
.Estilo96 {font-size: 10}
.Estilo97 {font-family: "Trebuchet MS"; font-size: 10; }
.Estilo47 {font-family: Arial, Helvetica, sans-serif}
.Estilo48 {font-family: "Trebuchet MS"}
-->
</style>

<table width="800" border="0">
  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="6%" class="Estilo90" scope="col"><div align="center" class="Estilo2 Estilo1 Estilo93">N&ordm;</div></td>
    <td width="45%" class="Estilo92" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo1"></div>      <div align="center" class="Estilo3"><span class="Estilo6"><span class="Estilo46">Descripcion / Mercaderia</span></span></div></td>
    <td width="6%" class="Estilo92" scope="col"><div align="center">X Caja </div></td>
    <td width="6%" class="Estilo90" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo1 Estilo93"><span class="Estilo46">Gtin</span></div></td>
	    <td width="6%" class="Estilo90" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo1 Estilo93"><span class="Estilo46"> Lote</span></div></td>
    <td width="11%" class="Estilo90" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo1 Estilo93"><span class="Estilo46">Vencimiento</span></div></td>
    <td width="8%" class="Estilo90" scope="col"><div align="center"><span class="Estilo46 Estilo48 Estilo93">Serie</span></div></td>
    <td width="7%" class="Estilo90" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo1 Estilo93"><span class="Estilo46">Total</span></div></td>
    <td width="5%" class="Estilo90" scope="col"><div align="center" class="Estilo93"><span class="Estilo1">Borrar</span></div></td>
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
    <td height="27" colspan="9" class="Estilo90" scope="col"><div align="center" class="Estilo93">
      <div align="right">Tot:<span class="Estilo26"><?php echo number_format($canti,2);?></span></div>
    </div>      <div align="center"></div></td>
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
    <td class="Estilo90" scope="col"><div align="center" class="Estilo93"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
    <?php 

			



?>


    <td height="27" class="Estilo90" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo93"><span class="Estilo26"><?php echo $nombre_comercial;?> <?php echo $presentacion;?> (<?php echo $cod_droga;?>) </span></div></td>
    <td height="27" class="Estilo90" scope="col"><div align="center"><span class="Estilo26"><?php echo $cant_caja;?></span></div></td>
    <td class="Estilo90" scope="col"><div align="center" class="Estilo46 Estilo93"><span class="Estilo26"><?php echo $gtin;?></span></div></td>
	    <td class="Estilo90" scope="col"><div align="center" class="Estilo46 Estilo93"><span class="Estilo26"><?php echo $lote1;?></span></div></td>
		    <td class="Estilo90" scope="col"><div align="center" class="Estilo46 Estilo93"><span class="Estilo26"><?php echo $vto_lote;?></span></div></td>

            <td class="Estilo90" scope="col"><div align="center"><span class="Estilo26"><?php echo $nro_serie;?></span></div></td>
    <td class="Estilo90" scope="col"><div align="right" class="Estilo46 Estilo93"><span class="Estilo26">$ <?php echo number_format($precio_unitario,2);?></span></div></td>
   <td width="5%" bgcolor="#E0EDF3" class="Estilo6 Estilo90"><div align="center" class="Estilo93">
   <a href="borrar_item.php?cod_detalle=<?php print("$cod_detalle");?>&&informar=<?php print("$informar");?>&&informar_anmat=<?php print("$informar_anmat");?>nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&nro_afiliado=<?php print("$nro_afiliado");?>&&pasada=1&&nro_os[]=<?php print("$nro_os");?>&&dia=<?php print("$dia");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$año");?>&&mes=<?php print("$mes");?>&&band=<?php print("$band");?>&&operador=<?php print("$operador");?>" onClick="return confirm('¿Está seguro de borrar este producto?');"><IMG SRC="../../imagenes/office/095.ico" alt="Anular"  border = "0"></a>
   
 
   </div></td>
  </tr>
 
  <?php if ($devuelve > 0){?>
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td height="27" colspan="5" bgcolor="#FFD7D7" class="Estilo92" scope="col"><div align="center">Nota Devoluci&oacute;n</div></td>
    <td bgcolor="#FFD7D7" class="Estilo90" scope="col"><div align="center" class="Estilo93"><span class="Estilo26"><?php echo $cantidad;?></span></div></td>
    <td bgcolor="#FFD7D7" class="Estilo90" scope="col">&nbsp;</td>
    <td bgcolor="#FFD7D7" class="Estilo90" scope="col"><div align="center" class="Estilo93">
      <div align="right"><span class="Estilo26">$ <?php echo number_format($precio_nd,2);?></span></div>
    </div></td>
    <td bgcolor="#FFD7D7" class="Estilo6 Estilo90">&nbsp;</td>
  </tr>
<?php 
  }

	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;

//include ("espacios_en_blancos_detalle.php");
$sumatoria = 0;

?>


<tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td height="27" colspan="9" class="Estilo90" scope="col"><div align="center" class="Estilo93">
      <div align="right">Tot:<span class="Estilo26"><?php echo number_format($canti,2);?></span></div>
    </div>      <div align="center"></div></td>
  </tr>

  
</table>

<table width="800" border="0">
		  <tr bgcolor="#CFCFCF" >
    <td class="Estilo90" scope="col"><div align="right"><span class="Estilo94"><span class="Estilo96"></span></span><strong><span class="Estilo76">TOTAL $</span></strong></div></td>
    <td width="13%" class="Estilo97" scope="col"><div align="center"><strong><span class="Estilo76"><?php echo number_format($total_factura,2);?></span></strong></div></td>
  </tr>
<?php 

?></table>



<?php 

include("../../../../conexiones/config_pro.php");
 echo $usuario;
 IF ($usuario == 13){
	 echo "a";
include ("cari.php");
exit;
 }

$sql = "SELECT * FROM inventario order by cod_operacion desc LIMIT 15";
$result = $db->Execute($sql);





?>
<style type="text/css">
<!--
.Estilo6 {font-family: Arial, Helvetica, sans-serif}
.Estilo7 {font-size: 12px}
.Estilo12 {
	color: #FF0000;
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo13 {font-family: "Trebuchet MS"}
.Estilo14 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo16 {font-family: "Trebuchet MS"; font-size: 12px; font-weight: bold; }
-->
</style>

<table width="800" border="0" cellspacing="0">
  <tr bgcolor="#FFBC79">
    <td width="14%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">COD BARRA </span></div></td>
    <td width="30%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">Gtin</span></div></td>
    <td width="30%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo7">Descripcion / Mercaderia</div></td>
    <td width="6%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo7"> Droga </div></td>
		    <td width="12%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo7"> Laboratorio </div></td>
    <td width="8%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo14">Borrar</div></td>
  </tr><?php 

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {


$gtin=strtoupper($result->fields["gtin"]);
$cod_operacion=strtoupper($result->fields["cod_operacion"]);


$sql2 = "SELECT * FROM tr_existencias  WHERE  `gtin` = '$gtin'";
$result2 = $db->Execute($sql2);
$cod_mercaderia=$result2->fields["cod_mercaderia"];

$lote=strtoupper($result->fields["lote"]);
$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$precio_unitario=strtoupper($result->fields["precio_unitario"]);
$total=strtoupper($result->fields["total"]);
$cod_detalle=strtoupper($result->fields["cod_detalle"]);

$resultado=strtoupper($result->fields["resultado"]);
 $transaccion=strtoupper($result->fields["transaccion"]);


$vto_lote = $mes_lote."  ".$anio_lote;


$sql2 = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result2 = $db->Execute($sql2);
 $descripcion=strtoupper($result2->fields["nombre_comercial"]);
 $presentacion=strtoupper($result2->fields["presentacion"]);
 $cod_droga =$result2->fields["cod_droga"];
$laboratorio =$result2->fields["laboratorio"];


$sql2 = "SELECT * FROM drogas  WHERE  `cod_droga` = $cod_droga";
$result2 = $db->Execute($sql2);
$drogas=strtoupper($result2->fields["drogas"]);
 
 $sql2 = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = $laboratorio";
$result2 = $db->Execute($sql2);
$nombre_laboratorio=strtoupper($result2->fields["laboratorio"]);

if ($descripcion != ""){
?><tr bgcolor="#FFFFFF" >
    <td bgcolor="#FFFFFF" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)" scope="col"><span class="Estilo28 Estilo6 Estilo7"><?php echo $cod_mercaderia;?></span></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center"><span class="Estilo14"><span class="Estilo28 Estilo6"><?php echo $gtin;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="left" class="Estilo13 Estilo7"><span class="Estilo28"><?php echo $descripcion;?></span> <span class="Estilo14"><span class="Estilo26"><?php echo $presentacion;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo26"><?php echo $cod_droga;?></span></div></td>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo14"><span class="Estilo28"><?php echo $nombre_laboratorio;?></span></div></td>
    <td width="8%" bgcolor="#FFFFFF" class="Estilo6" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14">   <a href="borrar_item.php?cod_operacion=<?php print("$cod_operacion");?>&&borrar_item.php?id=<?php print("$id");?>"><IMG SRC="../../../../../imagenes/botones/btn_anular.gif" alt="Anular" border = "0"></a></div></td>
  </tr>
<?php 
}else{
?><tr bgcolor="#FFFFFF" >
    <td bgcolor="#FFFFFF" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)" scope="col"><span class="Estilo28 Estilo6 Estilo7"><?php echo $cod_mercaderia;?></span></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center"><span class="Estilo14"><span class="Estilo28 Estilo6"><?php echo $gtin;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="left" class="Estilo13 Estilo7"><span class="Estilo28"><?php echo $descripcion;?>NO INGRESADO EN STOCK</span> <span class="Estilo14"><span class="Estilo26"><?php echo $presentacion;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo26"><?php echo $cod_droga;?></span></div></td>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo14"><span class="Estilo28"><?php echo $nombre_laboratorio;?></span></div></td>
    <td width="8%" bgcolor="#FFFFFF" class="Estilo6" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14">   <a href="borrar_item.php?id=<?php print("$id");?>"><IMG SRC="../../../../../imagenes/botones/btn_anular.gif" alt="Anular" border = "0"></a></div></td>
  </tr>
<?php 


}


$total_unitario = $precio_unitario + $total_unitario;
$total_item = $total_item + 1;
	 $result->MoveNext();
				}

?>

<tr bgcolor="#E6E6E6">
  <td bgcolor="#CCCCCC" scope="col"><span class="Estilo14">Cantidad: <strong><?php echo $total_item;?></strong></span></td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo14">Total </span></div></td>
  <td bgcolor="#CCCCCC" scope="col"><div align="right"></div></td>
</tr>
</table>



<?php 

include("../../../../conexiones/config_pro.php");


$sql = "SELECT * FROM inventario_provisorio order by saldo, cod_mercaderia, drogas, laboratorio";
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

<table width="1050" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFBC79">
    <td width="8%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">COD BARRA </span></div></td>
    <td width="19%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">Gtin</span></div></td>
    <td width="36%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo7">Descripcion / Mercaderia</div></td>
    <td width="23%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo7"> Droga </div></td>
    <td width="11%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo7"> Laboratorio </div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo14">EXI</div></td>
  </tr><?php 

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {


$gtin=strtoupper($result->fields["gtin"]);
$cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$drogas=strtoupper($result->fields["drogas"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$estado=strtoupper($result->fields["estado"]);
$cantidad_ingresada=strtoupper($result->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result->fields["cantidad_salida"]);
$saldo=strtoupper($result->fields["saldo"]);
$presentacion=strtoupper($result->fields["presentacion"]);

 


?><tr bgcolor="#FFFFFF" >
    <td bgcolor="#FFFFFF" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)" scope="col"><span class="Estilo28 Estilo6 Estilo7"><?php echo $cod_mercaderia;?></span></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="left"><span class="Estilo14"><span class="Estilo28 Estilo6"><?php echo $gtin;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="left" class="Estilo13 Estilo7"><span class="Estilo28"><?php echo $nombre_comercial;?></span> <span class="Estilo14"><span class="Estilo26"><?php echo $presentacion;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo26"><?php echo $cod_droga;?> <?php echo $drogas;?></span></div></td>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo14"><span class="Estilo28"><?php echo $nombre_laboratorio;?></span></div></td>
    <td width="3%" bgcolor="#FFFFFF" class="Estilo6" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14">   <a href="borrar_item.php?cod_operacion=<?php print("$cod_operacion");?>"></a><span class="Estilo28"><?php echo $saldo;?></span></div></td>
  </tr>
<?php 



$total_unitario = $precio_unitario + $total_unitario;
$total_item = $total_item + 1;
	 $result->MoveNext();
				}

?>

<tr bgcolor="#E6E6E6">
  <td colspan="2" bgcolor="#CCCCCC" scope="col"><span class="Estilo14">Cantidad: <strong><?php echo $total_item;?></strong></span></td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col"><div align="right"><span class="Estilo14">Total </span></div></td>
  <td bgcolor="#CCCCCC" scope="col"><div align="right"></div></td>
</tr>
</table>



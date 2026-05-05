<?php 

include("../../../conexiones/config_pro.php");
echo "---".$id = $operador;
$sql = "SELECT * FROM nota_devolucion  WHERE  `operador` = $operador ";
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
    <td width="15%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">FECHA</span></div></td>
    <td width="16%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">NOTA ENTREGA AFECTADA </span></div></td>
    <td width="32%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo7">OBSERVACIONES</div></td>
    <td width="9%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo7">IMPORTE</div></td>
  </tr><?php 

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$operador=strtoupper($result->fields["operador"]);
$fecha=strtoupper($result->fields["fecha"]);
$nro_factura_afectado=strtoupper($result->fields["nro_factura_afectado"]);
$importe=strtoupper($result->fields["importe"]);
$observaciones=strtoupper($result->fields["observaciones"]);




$sql2 = "SELECT * FROM `monodrogas`  WHERE  (`cod_barra` = $cod_mercaderia or troquel = $cod_mercaderia )";
$result2 = $db->Execute($sql2);
 $descripcion=strtoupper($result2->fields["nombre_comercial"]);

 
?><tr bgcolor="#FFFFFF" >
    <td bgcolor="#FFFFFF" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)" scope="col"><span class="Estilo28 Estilo6 Estilo7"><?php echo $fecha1;?></span></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center"><span class="Estilo14"><span class="Estilo28 Estilo6"><?php echo $nro_factura_afectada;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="left" class="Estilo13 Estilo7"><span class="Estilo28"><?php echo $observaciones;?></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo26"><?php echo $importe;?></span></div></td>
    </tr>
<?php 



$total_unitario = $precio_unitario + $total_unitario;
$total_item = $total_item + 1;
	 $result->MoveNext();
				}

?>

<tr bgcolor="#E6E6E6">
  <td bgcolor="#CCCCCC" scope="col"></td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  <td bgcolor="#CCCCCC" scope="col">&nbsp;</td>
  </tr>

<tr bgcolor="#E6E6E6">
  <td colspan="4" scope="col"><div align="right" class="Estilo12"><BLINK>
    <div align="center">Presione actualizar para guardar la nota de ajuste por precio</div>
  </BLINK></div>    
    <div align="center"><span class="Estilo28 Estilo13 Estilo7"><strong><strong><a href="actualizar.php?id1=<?php print("$id");?>"><img src="../../../imagenes/botones/actualizar.png" alt="Actualizar" border = "0"></a></strong> </td>
  </tr>
</table>



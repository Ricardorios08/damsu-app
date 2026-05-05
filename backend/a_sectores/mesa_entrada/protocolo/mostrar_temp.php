
<?php
$cont = "";
$renglon = "";
include("../../../conexiones/config_pro.php");
$sql3 = "SELECT * FROM protocolo_detalle_temp  WHERE  `nro_protocolo` = $nro_protocolo";
$result3 = $db->Execute($sql3);
?>
<style type="text/css">
<!--
.Estilo2 {font-size: 12px}
.Estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo4 {font-family: "Trebuchet MS"}
.Estilo5 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>

<table width="800" border="0">

  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="6%" scope="col"><div align="center" class="Estilo2 Estilo4">N°</div></td>
    <td width="39%" bgcolor="#cccccc" scope="col"><div align="center" class="Estilo3 Estilo2 Estilo4"><span class="Estilo6"><span class="Estilo46">DROGA</span></span></div></td>
    <td width="21%" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4"><span class="Estilo46">DOSIS</span></div></td>
    <td width="15%" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4"><span class="Estilo46">FRECUENCIA</span></div></td>
    <td width="12%" scope="col"><div align="center" class="Estilo6 Estilo4 Estilo2"><span class="Estilo46">CANT. CICLOS</span></div></td>
    <td width="7%" scope="col"><div align="center" class="Estilo5">BORRAR</div></td>
  </tr>
  <?php 

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;



$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$nro_protocolo=strtoupper($result3->fields["nro_protocolo"]);
$cod_droga=strtoupper($result3->fields["cod_droga"]);
$forma_farmaceutica=strtoupper($result3->fields["forma_farmaceutica"]);

$dosis=strtoupper($result3->fields["dosis"]);
$frecuencia=strtoupper($result3->fields["frecuencia"]);
$cantidad_ciclos=strtoupper($result3->fields["cantidad_ciclos"]);


$cont = $cont + 1;



?>
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
    <?php 

			



?>
    <td height="27" bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2"><span class="Estilo26"><?php echo $forma_farmaceutica." (".$cod_droga.")";?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><span class="Estilo26"><?php echo $dosis;?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><span class="Estilo26"><?php echo $frecuencia;?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><span class="Estilo26"><?php echo $cantidad_ciclos;?></span></div></td>
    <td width="7%" bgcolor="#E6E6E6" class="Estilo6"><div align="center"> <a href="entrada_protocolo1.php?cod_detalle=<?php print("$cod_detalle");?>&&nro_protocolo=<?php print("$nro_protocolo");?>&&band2=1" onClick="return confirm('¿Está seguro de borrar este producto?');"><img src="../../../imagenes/office/095.ico" alt="Anular"  border = "0"></a> </div></td>
  </tr>
  <?php 

	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;

//include ("espacios_en_blancos_detalle.php");
$sumatoria = 0;

?>
</table>

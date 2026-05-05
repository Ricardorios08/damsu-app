<?php
$cont = "";
$renglon = "";
include("../../../conexiones/config_pro.php");



$documento = $a;

  $sql3="select * from receta_detalle_temp where operador = '$operador'";
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

<table width="800" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="44" height="21" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo2 Estilo4">N°</div></td>
    <td width="343" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo3 Estilo2 Estilo4"><span class="Estilo6"><span class="Estilo46">DROGA</span></span></div></td>
    <td width="220" valign="top" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4">CANTIDAD</div></td>
    <td width="99" valign="top" bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo6 Estilo2 Estilo4">BORRAR</span></div></td>
  </tr>
  <?php 


$cont = 0;
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {

$renglon = $renglon + 1;


$cod_droga=strtoupper($result3->fields["cod_droga"]);
$cod_renglon=strtoupper($result3->fields["cod_renglon"]);

 $sql1 = "SELECT * FROM drogas  WHERE  cod_droga = $cod_droga";
$result1 = $db->Execute($sql1);
$nombre_droga=strtoupper($result1->fields["droga"]);


$cantidad=$result3->fields["cantidad"];

 $cont = $cont + 1;



?>
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td height="34" bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2"><span class="Estilo26"><?php echo $nombre_droga." (".$cod_droga.")";?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><span class="Estilo26"><?php echo $cantidad;?></span></div></td>
    <td bgcolor="#E6E6E6" class="Estilo6"><div align="center"> <a href="entrada_receta.php?cod_renglon=<?php print("$cod_renglon");?>&&tipo_doc=<?php print("$tipo_doc");?>&&documento=<?php print("$a");?>&&operador=<?php print("$operador");?>&&band2=1" onClick="return confirm('¿Está seguro de borrar este producto?');"><img src="../../../imagenes/office/095.ico" alt="Anular"  border = "0"></a> </div></td>
    <?php 



	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;

?>

</table>

<!-- <iframe src="tabla_protocolo.php?cod_diagnostico=<?php print("$cod_diagnostico");?>" width="800" height="250" frameborder="0"> </iframe>
 -->
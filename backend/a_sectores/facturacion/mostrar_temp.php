<?php
$cont = "";
$renglon = "";
include("../../../conexiones/config_pro.php");

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

<table width="800" border="0" cellspacing="0">

  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="68" scope="col"><div align="center" class="Estilo2 Estilo4">N°</div></td>
    <td width="343" bgcolor="#cccccc" scope="col"><div align="center" class="Estilo3 Estilo2 Estilo4"><span class="Estilo6"><span class="Estilo46">DROGA</span></span></div></td>
    <td width="91" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4">CANTIDAD</div></td>

    <td width="109" scope="col"><div align="center"><span class="Estilo6 Estilo2 Estilo4">ESTADO</span></div></td>
    <td width="91" scope="col"><div align="center" class="Estilo5">MODIFICAR</div></td>
    <td width="86" scope="col"><div align="center" class="Estilo5">BORRAR</div></td>
  </tr>
  <?php 


$cont = 0;
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {

$renglon = $renglon + 1;


$cod_droga=strtoupper($result3->fields["cod_droga"]);



$sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result1 = $db->Execute($sql1);
$nombre_droga=strtoupper($result1->fields["nombre_comercial"]);


$cantidad=$result3->fields["cantidad"];
$estado=estados_receta($result3->fields["estado"]);
$cod_renglon=$result3->fields["cod_renglon"];

 $cont = $cont + 1;



?><tr bordercolor="#FFFFCC" bgcolor="#E0EDF3"> 



 
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
     <td height="27" bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2"><span class="Estilo26"><?php echo $nombre_droga." (".$cod_droga.")";?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2"><span class="Estilo26"><?php echo $cantidad;?></span></div></td>
	 
	 <td bgcolor="#E6E6E6" scope="col"><div align="center"><span class="Estilo26"><?php echo $estado;?></span></div></td>
	 <td bgcolor="#E6E6E6" class="Estilo6"><div align="center"> <a href="ver_detalle.php?cod_renglon=<?php print("$cod_renglon");?>&&documento=<?php print("$a");?>&&tipo_doc=<?php print("$tipo_doc");?>&&nro_receta_nuevo=<?php print("$nro_receta_nuevo");?>&&operador=<?php print("$operador");?>&&band4=1"><img src="../../../imagenes/office/045.ico" alt="Modificar"  border = "0"></a> </div></td>

    <td bgcolor="#E6E6E6" class="Estilo6"><div align="center"> <a href="ver_detalle.php?cod_renglon=<?php print("$cod_renglon");?>&&documento=<?php print("$a");?>&&tipo_doc=<?php print("$tipo_doc");?>&&nro_receta_nuevo=<?php print("$nro_receta_nuevo");?>&&operador=<?php print("$operador");?>&&band3=1" onClick="return confirm('¿Está seguro de borrar este producto?');"><img src="../../../imagenes/office/095.ico" alt="Anular"  border = "0"></a> </div></td>




  </tr>

<?php 



	 $result3->MoveNext();
				}


 $sumatoria = $cont;
		$cont = 0;

?>
</table>

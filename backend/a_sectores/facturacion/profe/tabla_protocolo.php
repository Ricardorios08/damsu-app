<style type="text/css">
<!--
.Estilo85 {font-family: "Trebuchet MS"}
.Estilo86 {font-size: 12px}
.Estilo87 {color: #000000}
-->
</style>
<table width="850" border="0" cellspacing="1">
  <!--DWLayoutTable-->
  



<?php
include("../../../conexiones/config_pro.php");

 


 $sql3 = "SELECT * FROM protocolo where nro_diagnostico LIKE '$cod_diagnostico'";
$result3 = $db->Execute($sql3);
 $nro_protocolo=strtoupper($result3->fields["nro_protocolo"]);



 $sql3 = "SELECT * FROM protocolo_detalle where nro_protocolo LIKE '$nro_protocolo'";
$result3 = $db->Execute($sql3);
 $nro_protocol=strtoupper($result3->fields["nro_protocolo"]);

if ($nro_protocol != ""){

?>
  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="18" scope="col"><div align="center" class="Estilo2 Estilo4 Estilo85 Estilo86">N°</div></td>
    <td width="230" bgcolor="#cccccc" scope="col"><div align="center" class="Estilo3 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo6"><span class="Estilo46">DROGA</span></span></div></td>
    <td width="126" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo46">DOSIS</span></div></td>
    <td width="86" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo46">FRECUENCIA</span></div></td>
    <td width="99" colspan="2" scope="col"><div align="center" class="Estilo6 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo46">CANT. CICLOS</span></div></td>
  
  </tr>
  <?php 


$sql3 = "SELECT * FROM protocolo_detalle where nro_protocolo LIKE '$nro_protocolo'";
$result3 = $db->Execute($sql3);


if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;

$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$nro_protocolo=strtoupper($result3->fields["nro_protocolo"]);
$cod_droga=strtoupper($result3->fields["cod_droga"]);
//$forma_farmaceutica=strtoupper($result3->fields["forma_farmaceutica"]);


$sql10 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result10 = $db->Execute($sql10);
$forma_farmaceutica=strtoupper($result10->fields["nombre_comercial"]);



$dosis=strtoupper($result3->fields["dosis"]);
$frecuencia=strtoupper($result3->fields["frecuencia"]);
$cantidad_ciclos=strtoupper($result3->fields["cantidad_ciclos"]);


$cont = $cont + 1;



?>
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5 Estilo85 Estilo86"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $forma_farmaceutica." (".$cod_droga.")";?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $dosis;?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $frecuencia;?></span></div></td>
    <td colspan="2" bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $cantidad_ciclos;?></span></div></td>
 
  </tr>
  <?php 

	 $result3->MoveNext();
				}

}


?>
</table>



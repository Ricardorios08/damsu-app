<style type="text/css">
<!--
.Estilo85 {font-family: "Trebuchet MS"}
.Estilo86 {font-size: 12px}
.Estilo87 {color: #000000}
-->
</style>
<table width="800" border="0" cellspacing="1">
  <!--DWLayoutTable-->
  
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td height="27" colspan="7" valign="top" bgcolor="#C9C9C9" scope="col"><div align="center"><strong><font face="Trebuchet MS">PROTOCOLO DE TRATAMIENTO </font></strong></div></td>
  </tr>
  



<?php
include("../../../conexiones/config_pro.php");

 

 


$sql="select * from `protocolo` where  nro_diagnostico like '$cod_diagnostico'";
$result = $db->Execute($sql);

$situacion=strtoupper($result->fields["situacion"]); 
$linea=strtoupper($result->fields["linea"]); 
$esquema=strtoupper($result->fields["esquema"]); 
$plan=strtoupper($result->fields["plan"]); 
$alternativa=strtoupper($result->fields["alternativa"]); 
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]); 
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);
$nro_protocolo=strtoupper($result->fields["nro_protocolo"]);



?>


  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="18" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
      <div align="center"><font size="2">N&deg;  </font></div>
    </div></td>
    <td width="230" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
      <div align="center"><font size="2">DIAGNOSTICO </font></div>
    </div></td>
    <td width="126" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
      <div align="center"><font size="2">SITUACION</font></div>
    </div></td>
	
<td width="86" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
  <div align="center"><font size="2">LINEA</font></div>
</div></td>
<td width="66" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
  <div align="center"><font size="2">ESQUEMA</font></div>
</div></td>
	<td width="33" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
	  <div align="center"><font size="2">PLAN</font></div>
	</div></td>
	<td width="89" bgcolor="#999999"><div align="center" class="Estilo4 Estilo87 Estilo85">
	  <div align="center"><font size="2">ALTERNATIVA</font></div>
	</div></td>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
	<td bgcolor="#E6E6E6"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_protocolo");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></td>
	    <td bgcolor="#E6E6E6"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$situacion");?></font></td>
		 <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$linea");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$esquema");?></font></div></td>
		  <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$plan");?></font></div></td>
		  		  <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$alternativa");?></font></div></td>


  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td scope="col"><div align="center" class="Estilo2 Estilo4 Estilo85 Estilo86">N°</div></td>
    <td bgcolor="#cccccc" scope="col"><div align="center" class="Estilo3 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo6"><span class="Estilo46">DROGA</span></span></div></td>
    <td scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo46">DOSIS</span></div></td>
    <td scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo46">FRECUENCIA</span></div></td>
    <td colspan="2" scope="col"><div align="center" class="Estilo6 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo46">CANT. CICLOS</span></div></td>
    <td>&nbsp;</td>
  </tr>
  <?php 


echo  $sql3 = "SELECT * FROM protocolo_detalle where nro_protocolo LIKE '$nro_protocolo'";
$result3 = $db->Execute($sql3);


if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;

$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$nro_protocolo=strtoupper($result3->fields["nro_protocolo"]);
$cod_droga=strtoupper($result3->fields["cod_droga"]);
//$forma_farmaceutica=strtoupper($result3->fields["forma_farmaceutica"]);


$sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result1 = $db->Execute($sql1);
$forma_farmaceutica=strtoupper($result1->fields["nombre_comercial"]);



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
    <td>&nbsp;</td>
  </tr>
  <?php 

	 $result3->MoveNext();
				}


?>
</table>

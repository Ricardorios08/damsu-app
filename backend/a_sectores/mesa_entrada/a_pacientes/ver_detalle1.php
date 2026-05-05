<style type="text/css">
<!--
.Estilo85 {font-family: "Trebuchet MS"}
.Estilo86 {font-size: 12px}
-->
</style>

<?php
include("../../../conexiones/config_pro.php");

 $nro_protocolo=$_REQUEST["nro_protocolo"];

$sql="select * from `protocolo` where  nro_protocolo = $nro_protocolo";
$result = $db->Execute($sql);

$situacion=strtoupper($result->fields["situacion"]); 
$linea=strtoupper($result->fields["linea"]); 
$esquema=strtoupper($result->fields["esquema"]); 
$plan=strtoupper($result->fields["plan"]); 
$alternativa=strtoupper($result->fields["alternativa"]); 
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]); 
$nro_protocolo=strtoupper($result->fields["nro_protocolo"]); 
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);




$sql3 = "SELECT * FROM protocolo_detalle where nro_protocolo = $nro_protocolo";
$result3 = $db->Execute($sql3);
?>



<table width="800" border="1" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="42" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">N&deg;  </font></font></div></td>
    <td width="233" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2"><font color="#FFFFFF">DIAGNOSTICO</font> </font></font></div></td>
    <td width="247" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">SITUACION</font></font></div></td>
	
<td width="47" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">LINEA</font></font></div></td>
<td width="66" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">ESQUEMA</font></font></div></td>
	<td width="45" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">PLAN</font></font></div></td>
	<td width="90" bgcolor="#999999"><div align="center" class="Estilo4"><font color="#FFFFFF"><font size="2">ALTERNATIVA</font></font></div></td>


  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_protocolo");?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></td>
	    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$situacion");?></font></td>
		 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$linea");?></font></div></td>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$esquema");?></font></div></td>
		  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$plan");?></font></div></td>
		  		  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$alternativa");?></font></div></td>

</table>
<table width="800" border="1" cellspacing="0">

  <tr bgcolor="#CFCFCF" class="Estilo26">
    <td width="6%" scope="col"><div align="center" class="Estilo2 Estilo4 Estilo85 Estilo86">N°</div></td>
    <td width="39%" bgcolor="#cccccc" scope="col"><div align="center" class="Estilo3 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo6"><span class="Estilo46">DROGA</span></span></div></td>
    <td width="21%" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo46">DOSIS</span></div></td>
    <td width="15%" scope="col"><div align="center" class="Estilo6 Estilo2 Estilo4 Estilo85 Estilo86"><span class="Estilo46">FRECUENCIA</span></div></td>
    <td width="12%" scope="col"><div align="center" class="Estilo6 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo46">CANT. CICLOS</span></div></td>
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


$sql1 = "SELECT * FROM drogas where cod_droga = $cod_droga";
$result1 = $db->Execute($sql1);
$droga=strtoupper($result1->fields["droga"]);


$cont = $cont + 1;



?>
  <tr bordercolor="#FFFFCC" bgcolor="#E0EDF3">
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo5 Estilo85 Estilo86"><span class="Estilo47 Estilo48"><span class="Estilo26"><?php echo $renglon;?></span></span></div></td>
    <td height="27" bgcolor="#E6E6E6" scope="col"><div align="left" class="Estilo47 Estilo48 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $droga;?>  <?php echo $forma_farmaceutica." (".$cod_droga.")";?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $dosis;?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $frecuencia;?></span></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo46 Estilo4 Estilo2 Estilo85 Estilo86"><span class="Estilo26"><?php echo $cantidad_ciclos;?></span></div></td>
  </tr>
  <?php 

	 $result3->MoveNext();
				}


?>
</table>
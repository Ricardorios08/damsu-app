<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;


 $a = 'MONODROGAS_CARAS 2014.xls';
 header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");

$sql="select * from monodrogas  where troquel > 2000 order by precio_actualizado desc limit 15";


	$result = $db->Execute($sql);
?>
<table width="887" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="6" valign="top" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE LAS 15 MONODROGAS MAS CARAS. Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#999999">
    <td width="77"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COD BARRA </font></div></td>
   	
    <td width="79"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">TROQUEL</font></div></td>
    <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div>      <div align="center"></div></td>
    <td width="129"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">PRECIO ULTIMA COMPRA </font></div></td>
    <td width="62"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">GRUPO</font></div></td>
    <td width="181"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">DROGA</font></div></td>
  </tr>


<?php 	

 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
 $cod_droga=strtoupper($result->fields["cod_droga"]);
$troquel=strtoupper($result->fields["troquel"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$grupo=strtoupper($result->fields["grupo"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
$frio=strtoupper($result->fields["frio"]);
$grupo=strtoupper($result->fields["grupo"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);

switch ($grupo){
	case "1":{$grupo = "COMUN";break;}
	case "2":{$grupo = "COMUN";break;}
	case "3":{$grupo = "MONOCLONAL";break;}
}



$sql1="select * from drogas where cod_droga = $cod_droga";			  
$result1 = $db->Execute($sql1);
$droga=$result1->fields["droga"];

/*$sql1="select * from laboratorios where laboratorio = '$laboratorio'";			  
$result1 = $db->Execute($sql1);
$cod_laboratorio=$result1->fields["cod_laboratorio"];

$sql = "UPDATE monodrogas SET laboratorio = '$cod_laboratorio' WHERE troquel = '$troquel'";
//$result1 = $db->Execute($sql);
*/

 $sql1="select * from laboratorios where cod_laboratorio = $laboratorio";			  
$result1 = $db->Execute($sql1);
$laboratorio=$result1->fields["laboratorio"];




?>  <tr bordercolor="#FFFFFF" bgcolor="#999999">
  <td bgcolor="#EDEDED"><font size="1" face="Trebuchet MS"><?php print("$cod_barra");?></font></td>

    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$troquel");?></font></div></td>
    <td width="333" bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$nombre_comercial");?></font> - <font size="1" face="Trebuchet MS"><?php print("$presentacion");?></font></div>      <div align="center"></div></td>
    <td bgcolor="#EDEDED"><div align="right"><font size="1" face="Trebuchet MS"><?php echo number_format($precio_actualizado,2);?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$grupo");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$droga");?></font></div></td>
    </tr>
  <?php 


$result->MoveNext();
	}

?>
</table>

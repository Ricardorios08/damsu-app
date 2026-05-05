<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;


if (is_numeric ($palabra)) {  

$sql="select * from monodrogas where cod_droga like '$palabra' or troquel like '$cod_mercaderia' or cod_barra like '$palabra' order by nombre_comercial asc ";
}
else{
 $sql="select * from monodrogas where nombre_comercial like '$palabra%' order by grupo, nombre_comercial, laboratorio, nombre_comercial asc ";

}

	$result = $db->Execute($sql);
?>
<table width="887" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="8" valign="top" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE MONODROGAS . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#999999">
    <td width="60"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COD BARRA </font></div></td>
   	
    <td width="62"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">TROQUEL</font></div></td>
    <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div>      <div align="center"></div></td>
    <td width="48"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">$</font></div></td>
    <td width="22"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">G</font></div></td>
    <td width="155"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">LABORATORIO</font></div></td>
    <td width="155"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">DROGA</font></div></td>
    <td width="35"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">MOD</font></div></td>
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
    <td width="316" bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$nombre_comercial");?></font> - <font size="1" face="Trebuchet MS"><?php print("$presentacion");?></font></div>      <div align="center"></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$precio_actualizado");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$grupo");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$laboratorio");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$droga");?></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><a href="../monodrogas/mercaderia/modificar_mercaderia.php?cod_barra=<?php print("$cod_barra");?>"><img src="../../imagenes/office/078.ico" alt="Modificar" border = "0"></a></font></div></td>
    </tr>
  <?php 


$result->MoveNext();
	}

?>
</table>

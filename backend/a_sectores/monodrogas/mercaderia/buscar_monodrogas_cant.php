<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;


if (is_numeric ($palabra)) {  

echo $sql="select * from monodrogas where cod_droga like '$palabra' or troquel like '$cod_mercaderia' or cod_barra like '$palabra' and cant_caja > 1 order by nombre_comercial asc ";
}
else{
echo $sql="select * from monodrogas where  cant_caja > 1 order by nombre_comercial asc ";

}

	$result = $db->Execute($sql);
?>
<table width="887" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="7" valign="top" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE MONODROGAS . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#999999">
    <td width="60"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">COD BARRA </font></div></td>
   	
    <td width="62"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">TROQUEL</font></div></td>
    <td colspan="2"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div>      <div align="center"></div></td>
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
$cant_caja=strtoupper($result->fields["cant_caja"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);


$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$sql1="select * from drogas where cod_droga = $cod_droga";			  
$result1 = $db->Execute($sql1);
$droga=$result1->fields["droga"];

$cant = $cant + 1;

 $sql1="select * from laboratorios where cod_laboratorio = $laboratorio";			  
$result1 = $db->Execute($sql1);
$laboratorio=$result1->fields["laboratorio"];

  $sql1="select * from tr_existencias where cod_mercaderia = $cod_barra";			  
$result1 = $db->Execute($sql1);
$cod_merca=$result1->fields["cod_mercaderia"];

if ($cod_merca != ""){
/*
 $sql1="select * from monodrogas_prueba where troquel = $troquel";			  
$result1 = $db->Execute($sql1);
$laboratorio=$result1->fields["laboratorio"];

 $sql = "UPDATE monodrogas SET laboratorio = '$laboratorio' WHERE troquel = '$troquel'";
//$result1 = $db->Execute($sql);
*/

?>  <tr bordercolor="#FFFFFF" bgcolor="#999999">
  <td bgcolor="#EDEDED"><font size="1" face="Trebuchet MS"><?php print("$cod_barra");?></font></td>

    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$troquel");?></font></div></td>
    <td width="167" bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$nombre_comercial");?></font></div>      <div align="center"></div></td>
    <td width="223" bgcolor="#EDEDED"><font size="1" face="Trebuchet MS"><?php print("$presentacion");?></font></td>
    <td bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><?php print("$cant_caja");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="1" face="Trebuchet MS"><?php print("$precio_actualizado");?></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><a href="../monodrogas/mercaderia/modificar_mercaderia.php?cod_barra=<?php print("$cod_barra");?>"><img src="../../imagenes/office/078.ico" alt="Modificar" border = "0"></a></font></div></td>
    </tr>

  <?php 

}

$result->MoveNext();
	}

?>

<tr bordercolor="#FFFFFF" bgcolor="#999999">
  <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
  <td bgcolor="#EDEDED"><div align="center">Cantidad</div></td>
  <td bgcolor="#EDEDED"><font size="1" face="Trebuchet MS"><?php print("$cant");?></font></td>
  <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><!--DWLayoutEmptyCell-->&nbsp;</td>
</tr>
</table>

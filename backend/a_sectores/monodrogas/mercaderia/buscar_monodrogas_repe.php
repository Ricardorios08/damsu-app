<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;


 
?>
<table width="887" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="7" valign="top" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE TROQUELES DUPLICADOS</font></div></td>
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
	$sql = "SELECT *, COUNT(*) FROM monodrogas GROUP BY troquel HAVING COUNT(*)>1";
$result = $db->Execute($sql);
 

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

  $troquel=$result->fields["troquel"];
 
  $cod_barra=$result->fields["cod_barra"];
 

	


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

 
   $result->MoveNext();
	}

?>

 
</table>



 
 
<table width="887" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="7" valign="top" bgcolor="#D4D0C8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE CODIGOS DE BARRAS DUPLICADOS</font></div></td>
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
	$sql = "SELECT *, COUNT(*) FROM monodrogas GROUP BY cod_barra HAVING COUNT(*)>1";
$result = $db->Execute($sql);
 

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

  $troquel=$result->fields["troquel"];
 
  $cod_barra=$result->fields["cod_barra"];
 

	


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

 
   $result->MoveNext();
	}

?>

 
</table>
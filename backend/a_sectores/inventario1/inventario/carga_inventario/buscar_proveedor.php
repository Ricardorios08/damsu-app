<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/y");
 include ("../../../conexiones/config_usu.php");

$B = 1;
$palabra=$_POST["nro_proveedor"];

if ($palabra == ""){
 $sql="select * from proveedores order by cod_proveedor asc ";
}

else
{
$sql="select * from proveedores where cod_proveedor like '%$palabra%'  or denominacion like '%$palabra%' or domicilio like '%$palabra%' order by cuenta asc ";
}


	$result = $db->Execute($sql);


?>
<table width="780" height="58" border="0">
   <tr bordercolor="#FFFFCC" bgcolor="#000099">
     <td colspan="5" bgcolor="#E6E6E6"><div align="center"><font face="Arial, Helvetica, sans-serif">LISTADO DE PROVEEDORES </font></div></td>
   <tr bordercolor="#FFFFCC" bgcolor="#000099">
    <td width="12%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Nº PROVEEDOR</font></div></td>
    <td width="33%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">RAZON SOCIAL O APELLIDO</font></div></td>
	<td width="31%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">DOMICILIO</font></div></td>
<td width="10%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">COD AREA</font></div></td>
    <td width="14%" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">TELEFONO</font></div></td>
    <?php 


 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_proveedor=strtoupper($result->fields["cod_proveedor"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$cod_area=strtoupper($result->fields["cod_area"]);
$telefono=strtoupper($result->fields["telefono"]);
$domicilio=strtoupper($result->fields["domicilio"]);

					 

	if ($B == 1) {?>
  <tr bordercolor="#FFFFCC" bgcolor="#E1F2EF">
    <?php }?>


  <td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$cod_proveedor");?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$denominacion");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$domicilio");?></font></div></td>
<td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$cod_area");?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2"><?php print("$telefono");?></font></div></td>
  </tr>

<?php 
$result->MoveNext();
	}

?>
</table>

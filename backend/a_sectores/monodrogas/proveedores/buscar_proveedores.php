<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/y");
include ("../../conexiones/config_usu.php");

$B = 1;
$palabra=$_POST["busca"];

 $sql="select * from proveedores where cod_proveedor like '%$palabra%'  or denominacion like '%$palabra%' or domicilio like '%$palabra%' order by denominacion";

	$result = $db->Execute($sql);
?>
<table width="800" height="58" border="1" cellspacing="0">
  <tr bordercolor="#FFFFCC" bgcolor="#E6E6E6">
    <td colspan="11"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE PROVEEDORES . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#000099">
   
    <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>COD </strong></font></div></td>
    <td width="33%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>DENOMINACION</strong></font></div></td>
	<td width="10%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>COD AREA</strong></font></div></td>
    <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>TELEFONO</strong></font></div></td>
    <td width="22%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>GLN</strong></font></div></td>


    <td width="7%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>MODIFICAR </strong></font></div></td>
    <td width="6%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>ELIMINAR </strong></font></div></td>
  </tr>
  <?php 


 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_proveedor=strtoupper($result->fields["cod_proveedor"]);
$denominacion=strtoupper($result->fields["denominacion"]);
$cod_area=strtoupper($result->fields["cod_area"]);
$telefono=strtoupper($result->fields["telefono"]);
$cod_area_celular=strtoupper($result->fields["cod_area_celular"]);
$celular=strtoupper($result->fields["celular"]);
$servicio=strtoupper($result->fields["servicio"]);
$denominacion_reducida=strtoupper($result->fields["denominacion_reducida"]);
$mail=strtoupper($result->fields["mail"]);
				 
$gln=strtoupper($result->fields["gln"]);
$cod_operacion=$result->fields["cod_operacion"];

	 	
?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
  
    <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_proveedor");?></font></div></td>
    <td bgcolor="#F0F0F0"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$denominacion");?></font></div></td>
    <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_area");?></font></div></td>
    <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$telefono");?></font></div></td>
<td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$gln");?></font></div></td>



   <td bordercolor="#E8DCFC" bgcolor="#F0F0F0"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../monodrogas/proveedores/modificar.php?id=<?php print("$cod_proveedor");?>"><IMG SRC="../../imagenes/office/027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#F0F0F0"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> <a href="../monodrogas/proveedores/borra_provee.php?cod_operacion=<?php print("$cod_operacion");?> " onclick="return confirm('¿Está seguro de borrar este PROVEEDOR');" ><IMG SRC="../../imagenes/office/1047.ico" alt="Eliminar" border = "0"></a></font></div></td>
  </tr>

<?php 

$result->MoveNext();
	}

?>
</table>

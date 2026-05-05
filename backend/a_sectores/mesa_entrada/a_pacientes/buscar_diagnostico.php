<?php 

include ("../../conexiones/config_usu.php");
$B = 1;

$sql="select * from diagnostico ORDER BY cod_agrupado, nro_diagnostico";
$result = $db->Execute($sql);
?>
<table width="800" border="1" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#C9C9C9">
    <td height="37" colspan="9" bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">LISTADO DE DIAGNOSTICOS DEL PROGRAMA ONCOLOGICO </font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#0000FF"> 


    <td width="8%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nº </font></font></div></td>
    <td width="43%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
        <td width="25%" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">AGRUPADO</font></div></td>
        <td width="14%" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">CODIGO  </font></div></td>
        <td width="5%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Mod</font></font></div></td>
    <td width="5%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);


$cod_agrupado=strtoupper($result->fields["cod_agrupado"]);

 $sql="select * from diagnostico_agrupado where cod_agrupado like '$cod_agrupado'";
$result1 = $db->Execute($sql);

 $nombre_agrupado=strtoupper($result1->fields["nombre_agrupado"]);


?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 

   
	<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$nro_diagnostico");?></font></div></td>
    <td bgcolor="#EDEDED"><font size="2" face="Trebuchet MS"><?php print("$nombre_diagnostico");?></font></td>
        <td bgcolor="#EDEDED"><font size="2" face="Trebuchet MS"><?php print("$nombre_agrupado");?></font></td>
        <td bgcolor="#EDEDED"><font size="2" face="Trebuchet MS"><?php print("$cod_agrupado");?></font></td>
        <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="a_pacientes/modificar_des_diagnostico.php?id=<?php print("$nro_diagnostico");?>"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a> </font></div></td>
        <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> <a href="a_pacientes/borra_diagnostico.php?id=<?php print("$nro_diagnostico");?>&&nombre_completo=<?php print("$nombre_completo");?>" onClick="return confirm('&iquest;Est&aacute; seguro de borrar esta DIAGNOSTICO');"><IMG SRC="../../imagenes/office//1047.ico" alt="Modificar" border = "0"></a> </font></div></td>
</tr>
  <?php 

$result->MoveNext();
	}

?>
</table>



	<table width="313" border="0" align="center" cellspacing="0">
     
	  <?php 
//include ("funcion_cambiar_estados.php");

	  include ("../../../conexiones/config_usu.php");
$sql3="select * from receta where nro_paciente like '$documento' order by fecha desc";
$result3 = $db->Execute($sql3);

?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="76" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">N&deg; Receta </font></div></td>
        <td width="59" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
        <td width="118" height="24" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Estado</font></div></td>
        <td width="52" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Cambiar</font></div></td>
      </tr>
      <?php 
  
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$fecha=$result3->fields["fecha"];

$fech = fecha_argentina($fecha);

$nro_receta=$result3->fields["nro_receta"];
$estado=$result3->fields["estado"];

$estad = estados_receta($estado);


?>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_receta");?></font></div></td>
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fech");?></font></div></td>
        <td height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estad");?></font></div></td>
        <td height="24" bgcolor="#E6E6E6"><div align="center"><a href="../receta/ver_detalle.php?nro_receta=<?php print("$nro_receta");?>&&band=1"><img src="../../../imagenes/office//336.ico" alt="Modificar" border = "0"></a></div></td>
      </tr>
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>   

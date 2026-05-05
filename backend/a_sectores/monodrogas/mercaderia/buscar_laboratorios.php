<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;
$palabra=$_POST["busca"];

 $sql="select * from laboratorios where cod_laboratorio like '%$palabra%' or  laboratorio  like '%$palabra%' order by laboratorio asc ";
$result = $db->Execute($sql);
?>
<table width="800" border="0" cellspacing="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="13" bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS">LISTADO DE LABORATORIOS . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

     <td width="18%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">COD LABORATORIO</font></div></td>
    <td width="50%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">LABORATORIO</font></div></td>
  
    <td width="12%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">MODIFICAR</font></div></td>
    <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">ELIMINAR </font></div></td>
  </tr>
  <?php 


 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_laboratorio=strtoupper($result->fields["cod_laboratorio"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
		  



	if ($B == 1) {

?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <?php 

			}


		?>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_laboratorio");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$laboratorio");?></font></div></td>
   
 
    <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><a href="../monodrogas/mercaderia/modificar_laboratorio.php?id=<?php print("$cod_laboratorio");?>"><IMG SRC="../../imagenes/office/027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"> <a href="../monodrogas/mercaderia/borra_laboratorio.php?cod_laboratorio=<?php print("$cod_laboratorio");?>"><IMG SRC="../../imagenes/office/1047.ico" alt="Eliminar" border = "0"></a></font></div></td>
  </tr>
  <?php 


$result->MoveNext();
	}

?>
</table>

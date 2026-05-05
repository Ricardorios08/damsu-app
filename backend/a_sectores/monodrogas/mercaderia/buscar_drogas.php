<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;
$palabra=$_POST["busca"];

 $sql="select * from drogas where cod_droga like '%$palabra%' or  droga  like '%$palabra%' order by cod_droga asc ";
$result = $db->Execute($sql);
?>
<table width="800" border="0" cellspacing="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="14" bgcolor="#EDEDED"><div align="center"><font color="#000000" face="Trebuchet MS">LISTADO DE DROGAS . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

     <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">COD DROGA</font></div></td>
    <td bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">DROGA</font></div></td>
  
    <td width="25%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">GRUPO</font></div></td>
  <td width="25%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">TRAT</font></div></td>
    <td width="9%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">MODIFICAR</font></div></td>
    <td width="8%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">ELIMINAR </font></div></td>
  </tr>
  <?php 


 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_droga=strtoupper($result->fields["cod_droga"]);
$droga=strtoupper($result->fields["droga"]);
$tipo=strtoupper($result->fields["tipo"]);	

 $cod_droga_nuevo=$result->fields["cod_droga_nuevo"];	  

if ($cod_droga_nuevo == 0){
//$cod_droga_nuevo = "Quimioterapia";
}

$cod_operacion=strtoupper($result->fields["cod_operacion"]);	


	if ($B == 1) {

?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <?php 

			}


		?>
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_droga");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$droga");?></font></div></td>
   
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$tipo");?></font></div></td>
	 <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_droga_nuevo");?></font></div></td>

    <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"><a href="../monodrogas/mercaderia/mod_droga.php?cod_operacion=<?php print("$cod_operacion");?>"><IMG SRC="../../imagenes/office/027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#EDEDED"><div align="center"><font size="1" face="Trebuchet MS"> <a href="../monodrogas/mercaderia/borr.php?id=<?php print("$cod_droga");?>"><IMG SRC="../../imagenes/office/1047.ico" alt="Eliminar" border = "0"></a></font></div></td>

		<td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Trebuchet MS"><a href="../monodrogas/mercaderia/ver_drogas.php?cod_droga=<?php print("$cod_droga");?>"><img src="../../imagenes/office/089.ico" alt="Modificar" border = "0"></a></font></div></td>
  </tr>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <td colspan="6" bgcolor="#EDEDED"><?php //include ("mono.php");?></td>
  </tr>
  <?php 


$result->MoveNext();
	}

?>
</table>

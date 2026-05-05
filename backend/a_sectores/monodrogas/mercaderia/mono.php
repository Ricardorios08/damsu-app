<?php 
 
 $sql1="select * from monodrogas where cod_droga = $cod_droga";
$result1 = $db->Execute($sql1);
?>
<table width="800" border="0" cellspacing="0">
  
  <tr bordercolor="#FFFFFF" bgcolor="#000099">

     <td width="11%" bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">COD BARRA </font></div></td>
    <td bgcolor="#666666"><div align="center"><font color="#FFFFFF" size="2" face="Trebuchet MS">NOMBRE COMERCIAL </font></div>      <div align="center"></div></td>
  </tr>
  <?php 


 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
$cod_barra=strtoupper($result1->fields["cod_barra"]);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);
 


	 

?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
 
    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_barra");?></font></div></td>
    <td bgcolor="#EDEDED"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$nombre_comercial");?></font></div>      <div align="center"></div></td>
  </tr>
  
  <?php 


$result1->MoveNext();
	}

?>
</table>

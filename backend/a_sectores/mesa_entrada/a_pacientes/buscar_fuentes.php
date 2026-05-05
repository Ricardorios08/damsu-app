<?php 

include ("../../conexiones/config_usu.php");
$B = 1;

if ($palabra == ""){
$sql="select * from fuentes";
}else{
$sql="select * from fuentes where nro_fuente like '%$palabra%' or nombre_fuente like '%$palabra%'";
}
	$result = $db->Execute($sql);
?>
<table width="800" height="66" border="1" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="8%" height="24" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nº </font></font></div></td>
    <td width="15%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
    <td width="19%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Reducido</font></font></div></td>
	
 
	<td width="6%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Mod.</font></font></div></td>
	<td width="5%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$nro_fuente=strtoupper($result->fields["nro_fuente"]);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);
$nombre_reducido_fuente=strtoupper($result->fields["nombre_reducido_fuente"]);



	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"><?php 
	$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_fuente");?></font></td>
    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_fuente");?></font></td>
	    <td bgcolor="#EDEDED"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_reducido_fuente");?></font></td>


   
   
	    <td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="a_pacientes/modificar_des_fuente.php?id=<?php print("$nro_fuente");?>"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a> </font></div></td>
		<td bgcolor="#EDEDED"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
				<a href="a_pacientes/borra_fuente.php?id=<?php print("$nro_fuente");?>&&nombre_completo=<?php print("$nombre_completo");?>" onclick="return confirm('¿Está seguro de borrar esta FUENTE');"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a>
      
	</font></div></td>
		

  </tr>
  <?php 

$result->MoveNext();
	}

?>
</table>



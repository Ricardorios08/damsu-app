<?php 

$B = 1;





		include ("../../../conexiones/config_usu.php");
 $sql="select * from pacientes where autorizados_profe = 1";
$result = $db->Execute($sql);
?>
<table width="800" height="66" border="0" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td height="24" colspan="8" bgcolor="#C9C9C9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>AUTORIZADOS PROFE </strong></font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="14%" height="24" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Doc.</font></font></div></td>
    <td width="40%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
    <td width="12%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Tel&eacute;fono</font></font></div></td>
<td width="13%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Celular</font></font></div></td>
<td width="5%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Estado</font></font></div></td>

	<td width="5%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Mod</font></font></div></td>
	<td width="5%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Diag.</font></div></td>
	<!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td> -->

	<td width="6%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Ficha</font></font></div></td>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cod_paciente=strtoupper($result->fields["cod_paciente"]);	


$documento=strtoupper($result->fields["documento"]);
$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$nombre_completo = $apellido.", ".$nombre; 

$calle=strtoupper($result->fields["calle"]);
$puerta=strtoupper($result->fields["puerta"]);
$telefono=strtoupper($result->fields["telefono"]);

$direccion= $calle." ".$puerta;
$estado=strtoupper($result->fields["estado"]);
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);

$celular_residencia=strtoupper($result->fields["celular_residencia"]);





?> <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$telefono");?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$celular_residencia");?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
   
 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="modificar_pacientes.php?id=<?php print("$documento");?>&&cod_paciente=<?php print("$cod_paciente");?>"><IMG SRC="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="modificar_pacientes.php?id=<?php print("$documento");?>&&cod_paciente=<?php print("$cod_paciente");?>"></a> </font><font size="2" face="Arial, Helvetica, sans-serif"><a href="mod_diagnostico_pac.php?id=<?php print("$documento");?>&&cod_paciente=<?php print("$cod_paciente");?>"><IMG SRC="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
				<!-- <a href="a_pacientes/borra_paciente11.php?id=<?php print("$documento");?>&&nombre_completo=<?php print("$nombre_completo");?>"><IMG SRC="../../imagenes/office//027.ico" alt="Modificar" border = "0"></a> -->
   
	</font><font size="2" face="Arial, Helvetica, sans-serif"><a href="ficha.php?id=<?php print("$documento");?>"><img src="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
		</tr>
 
 
   

  <?php 



$result->MoveNext();
	}

?>
</table>




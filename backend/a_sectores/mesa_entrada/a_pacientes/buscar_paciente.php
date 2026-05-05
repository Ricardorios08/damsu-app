<?php 

$B = 1;





	if ($bander == 1){
$sql="select * from pacientes where cod_paciente = $cod_paciente";
	}else
	{
		include ("../../../conexiones/config_usu.php");
$palabra = $_REQUEST['busca'];
if ($palabra == ""){
	$leyenda = "INGRESE DOCUMENTO O NOMBRE DEL PACIENTE";
include ("../../../alertas/campo_informacion2.php");
exit;

}
 $sql="select * from pacientes where documento like '%$palabra' or apellido like '%$palabra' or nombre like '%$palabra'";
	}

	$result = $db->Execute($sql);
?>
<table width="800" height="66" border="0" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td height="24" colspan="8" bgcolor="#C9C9C9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DATOS PERONALES</strong></font></div></td>
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




if ($bander == 1){
?> <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$telefono");?></font></div></td>
         <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$celular_residencia");?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$estado");?></font></div></td>
   
 
	    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="modificar_pacientes.php?id=<?php print("$documento");?>&&cod_paciente=<?php print("$cod_paciente");?>"><IMG SRC="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
	    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="mod_diagnostico_pac.php?cod_paciente=<?php print("$cod_paciente");?>&&cod_paciente=<?php print("$cod_paciente");?>"><IMG SRC="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a> </font></div></td>
		<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
				<!-- <a href="../a_pacientes/borra_paciente11.php?id=<?php print("$documento");?>&&nombre_completo=<?php print("$nombre_completo");?>"></a> -->
   
		</font><font size="2" face="Arial, Helvetica, sans-serif"><a href="ficha.php?id=<?php print("$documento");?>"><img src="../../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
		</tr>
  
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Domicilio:</font></div></td>
    <td colspan="5"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$direccion");?> <?php print("$localidad");?> - <?php print("$departamento");?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
  <?php
}else{
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
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Domicilio:</font></div></td>
    <td colspan="5"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$direccion");?> <?php print("$localidad");?> - <?php print("$departamento");?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
  <?php
}
?>
   


  <?php 



$result->MoveNext();
	}

?>
</table>


<?php 
 
$B = 1;


if ($palabra == ""){
   echo   $sql1="select * from afiliaciones limit 20";
}else
{
     $sql1="select * from afiliaciones where documento = $documento";
}
$result1 = $db->Execute($sql1);


?>
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="6" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>AFILIACIONES A OBRAS SOCIALES </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td width="300" valign="top" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">Obra Socia</font>l</div></td>
    <td width="105" valign="top" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font></div></td>
    <td width="95" valign="top" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">Fecha </font></div></td>
    <td width="186" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td width="44" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">Mod.</font></div></td>
    <td width="44" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Trebuchet MS">Borrar</font></div></td>
  </tr>
  
  <?php 
  
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);
$cod_operacion=strtoupper($result1->fields["cod_operacion"]);
$fecha=strtoupper($result1->fields["fecha"]);

$dia = substr($fecha,8,2);
	$mes = substr($fecha,5,2);
	$anio = substr($fecha,0,4);



$sql2="select * from obrasocial where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);

if ($nro_os == 0){
	$sigla = "SIN OBRA SOCIAL";
}

	?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$sigla");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $nro_afiliado;?></font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $otros;?></font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="modificar_afiliaciones.php?documento=<?php print("$documento");?>&&cod_operacion=<?php print("$cod_operacion");?>"><IMG SRC="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="borrar_afiliacion.php?cod_operacion=<?php print("$cod_operacion");?>&&cod_paciente=<?php print("$cod_paciente");?>"><IMG SRC="../../../imagenes/office//027.ico" alt="Modificar" border = "0"></a></font></div></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  
  
  <?php $result1->MoveNext();
	}

?>
</table>



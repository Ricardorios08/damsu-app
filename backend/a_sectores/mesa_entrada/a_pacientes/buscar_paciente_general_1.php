<?php 

include ("../../conexiones/config_usu.php");
$B = 1;
if ($bander != 1)
$palabra = $_REQUEST['busca'];
}


if ($palabra == ""){
$sql="select * from pacientes order by apellido";
}else{
 $sql="select * from pacientes where documento like '%$palabra' or apellido like '%$palabra' or nombre like '%$palabra' order by apellido";
}
	$result = $db->Execute($sql);
?>
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td colspan="5" bordercolor="#E6E6E6" bgcolor="#FFFFFF"><font color="#000000" face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font></td>
    <td colspan="2" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font size="2" face="Trebuchet MS">Agregar</font></div></td>
    <td colspan="2" bordercolor="#E6E6E6" bgcolor="#FFFFFF"><font face="Trebuchet MS">&nbsp;</font><font face="Trebuchet MS">&nbsp;</font></td>
    <td colspan="2" valign="top" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Historia Clinica</font></font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="46" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Doc.</font></font></div></td>
    <td width="158" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre </font></font></div></td>
    <td width="110" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Direcci&oacute;n</font></font></div></td>
	<td width="62" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Localidad</font></font></div></td>
	<td width="54" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Tel&eacute;fono</font></font></div></td>
<td width="62" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Afiliaci&oacute;n </font></font></div></td>
<td width="70" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Diagnostico</font></font></div></td>

	<?php if ($modifica == "SI"){?>
	<?php }?>
	<td width="46" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Ficha</font></font></div></td>

  <td width="62" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"></div></td>
    <td width="54" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Prest.</font></font></div></td>
    <td width="54" valign="top" bordercolor="#E6E6E6" bgcolor="#999999"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Drogas</font></font></div></td>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
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



	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$documento");?></font></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$nombre_completo");?></font></td>
	    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$direccion");?></font></td>
    <td bgcolor="#E6E6E6"><div align="left"><font size="2" face="Trebuchet MS"><?php print("$localidad");?></font></div></td>
     <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php print("$telefono");?></font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="a_pacientes/entrada_afiliaciones.php?documento=<?php print("$documento");?>&&band=1"><IMG SRC="../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="a_pacientes/entrada_diagnostico.php?documento=<?php print("$documento");?>&&band=1"><IMG SRC="../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>

    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="a_pacientes/ficha.php?id=<?php print("$documento");?>"><IMG SRC="../../imagenes/office//029.ico" alt="Modificar" border = "0"></a> </font></div></td>

  <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="receta/ver_receta.php?id=<?php print("$documento");?>"><img src="../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
        <td valign="top" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="../direccion/hc_paciente.php?id=<?php print("$documento");?>"><IMG SRC="../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font><font face="Trebuchet MS"></font></div></td>
  </tr>

  <?PHP 
	 $sql1="select * from afiliaciones where documento like '$documento'";
$result1 = $db->Execute($sql1);
	
	
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);


$sql2="select * from obrasocial where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);


	?>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="left"><font size="2" face="Trebuchet MS">Obra Social</font>: <font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_os");?></font></div></td>
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font>: <font size="2" face="Trebuchet MS"><?php echo $nro_afiliado;?></font></div></td>
    <td colspan="4" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha afiliaci&oacute;n: <?php echo $dia;?> / <?php echo $mes;?> / <?php echo $anio;?></font></div></td>
  </tr>
  

  
  
  
  <?php $result1->MoveNext();
	}

	?>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS">Protocolo</font></td>
    <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Receta</font></div></td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><a href="receta/entrada_receta.php?id=<?php print("$documento");?>"><img src="../../imagenes/office//029.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <?php 

$result->MoveNext();
	} 


	if ($nombre == ""){?>
		
<tr bgcolor="#FFFF99">
<td colspan="11" bgcolor="#999999"><div align="center"><font face="Trebuchet MS"><strong>NO EXISTE PACIENTE CON ESAS CARACTERISTICAS</strong></font></div></td>
</tr>
<tr bgcolor="#FFFF99">
<td colspan="11" bgcolor="#999999"><div align="center"><font face="Trebuchet MS"><a href="entrada_dato.php?documento=<?php print("$palabra");?>" class="Estilo2">INGRESAR NUEVO PACIENTE</a></font></div></td>
 </tr>
<?php }else{?>
  <tr>
    <td colspan="11"><HR noshade></td>
  </tr>
  <tr>
    <td colspan="11"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11"></td>
  </tr>
  
  


<?php }?>
</table>



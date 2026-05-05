<?php 

include ("../../../conexiones/config_usu.php");
$B = 1;


   $sql1="select * from pacientes where fecha_ingreso between '2003-01-01' and '2003-12-31'";
$result1 = $db->Execute($sql1);


?>
<table width="800" height="66" border="1" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


	
	

  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>AFILIACIONES A OBRAS SOCIALES </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font></div></td>
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Obra Social</font></div></td>
    <td colspan="4" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha </font></div></td>
    <td colspan="5" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
  </tr>
  
  <?php 
  
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$documento=$result1->fields["documento"];
$apellido=$result1->fields["apellido"];
$nombre=$result1->fields["nombre"];


  $sql1="select * from paciente_diagnostico where documento = '$documento'";
$result11 = $db->Execute($sql1);
$cod_diagnostico=$result11->fields["cod_diagnostico"];


//if ($cod_diagnostico == 'C50'){
$cont = $cont + 1;

	?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $apellido;?></font></div></td>
    <td colspan="2" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre");?></font></td>
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $dia;?> / <?php echo $cod_diagnostico;?> / <?php echo $anio;?></font></div></td>
    <td colspan="5" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"><?php echo $otros;?></font></td>
  </tr>
  
  <?php 
	  
//}

  $result1->MoveNext();
	}

?>
</table>

<?php
echo "cantidad".$cont;

?>
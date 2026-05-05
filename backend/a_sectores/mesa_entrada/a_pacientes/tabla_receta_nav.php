	<table width="367" border="0" align="center" cellspacing="0">
     
	  <?php 

	  include ("../../../conexiones/config_usu.php");

include ("../../../funciones/funciones.php");
$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];

 

$sql3="select * from paciente_diagnostico where documento like '$documento'";
$result3 = $db->Execute($sql3);


	
	?>

  <?php 
  
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$nro_ficha=$result3->fields["nro_ficha"];
$documento=$result3->fields["documento"];
$cod_diagnostico=$result3->fields["cod_diagnostico"];
$fecha_diagnostico=fecha_argentina($result3->fields["fecha_diagnostico"]);
$base=$result3->fields["base"];
$cod_fuente=$result3->fields["cod_fuente"];
$matricula=$result3->fields["matricula"];
$observaciones=$result3->fields["observaciones"];
$primario=$result3->fields["primario"];
$estadio=$result3->fields["estadio"];

$sql4="select * from diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result4 = $db->Execute($sql4);

$nombre_diagnostico=$result4->fields["nombre_diagnostico"];


$sql4="select * from fuentes where nro_fuente like '$cod_fuente'";
$result4 = $db->Execute($sql4);

$nombre_fuente=$result4->fields["nombre_fuente"];

?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Fecha</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fecha_diagnostico");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font color="#000000" size="2" face="Trebuchet MS">Diagnostico</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_diagnostico");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Localizacion</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$localizacion");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Multiples</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$primarios");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Estad&iacute;o</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estadio");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Fuente</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_fuente");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Bases</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$base");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Matricula</font></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$matricula");?></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="left"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$observaciones");?></font></td>
  </tr>
  <tr>
    <td width="40"></td>
    <td width="49"></td>
    <td width="119"></td>
    <td width="25"></td>
    <td width="3"></td>
    <td width="1"></td>
    <td width="26"></td>
    <td width="10"></td>
    <td width="8"></td>
    <td width="16"></td>
    <td width="1"></td>
    <td width="38"></td>
    <td width="40"></td>
  </tr>
  
  <?php 
  
  $result3->MoveNext();
	}
	
	?>
</table>

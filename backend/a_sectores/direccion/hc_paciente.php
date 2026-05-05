<?php 

include ("../../conexiones/config_usu.php");
$B = 1;

$id = $_REQUEST['id'];

$sql="select * from prestaciones_pacientes where documento = $id";
$result = $db->Execute($sql);


$sql2="select * from pacientes where documento = $id";
$result2 = $db->Execute($sql2);

$nombre=strtoupper($result2->fields["nombre"]);
$apellido=strtoupper($result2->fields["apellido"]);
$nombre_completo = $apellido.", ".$nombre; 

$sql6="select * from afiliaciones where documento =  $id";
$result6 = $db->Execute($sql6);

$nro_os=strtoupper($result6->fields["nro_os"]);


$sql3="select * from obrasocial where nro_os = $nro_os";
$result3 = $db->Execute($sql3);
$nombre_os=strtoupper($result3->fields["nombre_os"]);

$sql3="select * from paciente_diagnostico where documento = $id";
$result3 = $db->Execute($sql3);
$programa=strtoupper($result3->fields["programa"]);


?>
<table width="800" border="0">
  <tr bordercolor="#0066FF" bgcolor="#C9C9C9">
    <td height="29" colspan="6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">HISTORIA CLINICA PRESTACIONES </font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td colspan="6"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font color="#000000" size="2">Paciente</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">: <?php print("$documento");?> <?php print("$nombre_completo");?> </font></font><font color="#000000" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Obra Social: <?php print("$nro_os");?></font> - <font size="2"><?php print("$nombre_os");?> </font></font></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FFFFFF">
    <td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Programa: <?php print("$programa");?></font></font></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#C9C9C9">
    <td colspan="6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">PRESTACIONES</font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#0000FF">
    <td width="6%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Fecha</font></font></div></td> 
    <td width="8%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">N&ordm; Prest.</font></div></td>
    <td width="36%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"></font></div>      <div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Nombre y Descripcion </font></font></div></td>
    <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Cant.</font></font></div></td>
	 <td width="8%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"> <font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Unitario</font></font></font></div></td>
	  <td width="8%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Total</font></font></font></div></td>
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	

$cod_prestacion=strtoupper($result->fields["cod_prestacion"]);

$sql3 = "SELECT * FROM `prestaciones` where cod_prestacion = $cod_prestacion";
$result3 = $db->Execute($sql3);

$descripcion=strtoupper($result3->fields["descripcion"]);
$caracteristica=strtoupper($result3->fields["caracteristica"]);


$precio=strtoupper($result->fields["precio"]);
$cupo_mensual=strtoupper($result->fields["cupo_mensual"]);
$cant_realizado=strtoupper($result->fields["cant_realizado"]);
$observaciones=strtoupper($result->fields["observaciones"]);

$fecha_prestacion=strtoupper($result->fields["fecha_prestacion"]);

$dia = substr($fecha_prestacion,8,2);
$mes= substr($fecha_prestacion,5,2);
$anio = substr($fecha_prestacion,0,4);

$fecha_prestacion = $dia."-".$mes."-".$anio;
$total = $cant_realizado * $precio;

$total_gral = $total_gral + $total; 
?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha_prestacion");?></font></div></td> 
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cod_prestacion");?></font></div></td>
    <td><div align="center"></div>      <font size="2" face="Arial, Helvetica, sans-serif"> <?php print("$descripcion");?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cant_realizado");?></font>
	    </div></td>
		<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$precio");?></font></div></td>
		<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total");?></font></div></td>
  </tr>

  <?php 

$result->MoveNext();
	}

?>
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
  <td colspan="5">&nbsp;</td>
  <td><HR noshade></td>
  </tr>
<tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
  <td colspan="5" bordercolor="#C9C9C9"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>
  <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_gral");?></font></div></td>
  </tr>
</table>



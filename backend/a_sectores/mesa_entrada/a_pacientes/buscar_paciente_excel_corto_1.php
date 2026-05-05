<?php 

$file = "PAC.DIAGNOSTICO.XLS";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

 include ("../../../conexiones/config_usu.php");

 
  $sql="select * from  paciente_diagnostico where fecha_diagnostico between '2012-01-01' and '2018-12-31' and documento > 500 order by anio desc, cod_diagnostico, fecha_diagnostico";
$result = $db->Execute($sql);



?>
<table width="137%" border="1" cellspacing="0">
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td width="6%" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td> 
    <td width="6%" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">DNI</font></font></div></td>
    <td width="6%" bgcolor="#FFFFFF"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Fecha Nac. </font></font></td>
    <td width="6%" bgcolor="#FFFFFF"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Domicilio</font></font></td>
    <td width="6%" bgcolor="#FFFFFF"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Localidad</font></font></td>
    <td width="6%" bgcolor="#FFFFFF"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Fecha Diagnostico </font></font></td>
    <td width="6%" bgcolor="#FFFFFF"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Diagn&oacute;stico</font></font></td>
    <td width="6%" bgcolor="#FFFFFF"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Prof. Tratante </font></font></td>
    <td width="6%" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Instituci&oacute;n.</font></font></div></td>
    <!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td> -->
  </tr>


  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	$fecha_diagnostico=strtoupper($result->fields["fecha_diagnostico"]);
$dia = substr($fecha_diagnostico,8,2);
$mes = substr($fecha_diagnostico,5,2);
$anio = substr($fecha_diagnostico,0,4);

$fecha_diagnostico = $dia."/".$mes."/".$anio;

$documento=strtoupper($result->fields["documento"]);

 $sql2="select * from  pacientes where documento = $documento";
$result2 = $db->Execute($sql2);
$nombre=strtoupper($result2->fields["nombre"]);
$apellido=strtoupper($result2->fields["apellido"]);
$departamento=strtoupper($result2->fields["departamento"]);
$nombre_completo = $apellido.", ".$nombre; 
$fecha_nac=strtoupper($result2->fields["fecha_nac"]);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]);
$cod_diagnostico = trim($cod_diagnostico);

 $calle=strtoupper($result2->fields["calle"]);
$puerta=strtoupper($result2->fields["puerta"]);
$referencia=strtoupper($result2->fields["referencia"]);

$domicilio = $calle." ".$puerta." ".$referencia;

$dia_n = substr($fecha_nac,8,2);
$mes_n = substr($fecha_nac,5,2);
$anio_n = substr($fecha_nac,0,4);

$fecha_nac = $dia_n."/".$mes_n."/".$anio_n;



 $sql2="select * from  diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result2 = $db->Execute($sql2);
$nombre_diagnostico=strtoupper($result2->fields["nombre_diagnostico"]);

$cod_fuente=strtoupper($result->fields["cod_fuente"]);

 $sql2="select * from  fuentes where nro_fuente like '$cod_fuente'";
$result2 = $db->Execute($sql2);
$nombre_reducido_fuente=strtoupper($result2->fields["nombre_reducido_fuente"]);

$localizacion=strtoupper($result->fields["localizacion"]);
$base=strtoupper($result->fields["base"]);
$primario_multiple=strtoupper($result->fields["primario_multiple"]);
$estadio=strtoupper($result->fields["estado"]);


$sql2="select * from  protocolo where nro_diagnostico like '$cod_diagnostico'";
$result2 = $db->Execute($sql2);
$situacion=strtoupper($result2->fields["situacion"]);
$linea=strtoupper($result2->fields["linea"]);
$plan=strtoupper($result2->fields["plan"]);
$esquema=strtoupper($result2->fields["esquema"]);


 
 
?> 
<tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
  <td bgcolor="#FFFFFF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></div></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha_nac");?></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$domicilio");?></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$departamento");?></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha_diagnostico");?></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"></font></td>
  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_reducido_fuente");?></font></td>
  </tr>
  
<?php


$result->MoveNext();
	}

?>
</table>



<?php 

$file = "PAC.DIAGNOSTICO_2011-2013.XLS";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


 include ("../../../conexiones/config_usu.php");

 
  $sql="select * from  paciente_diagnostico where fecha_diagnostico between '2011-01-01' and '2013-12-31' and documento > 500 order by anio, cod_diagnostico, fecha_diagnostico";
$result = $db->Execute($sql);



?>
<table width="850" border="1" cellspacing="0">
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td width="6%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Fecha</font></font></div></td> 
    <td width="6%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Doc.</font></font></div></td>
    <td width="19%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
 <td width="19%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Localidad </font></font></div></td>

    <td width="18%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Diagnostico</font></font></div></td>
<!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td> -->

	<td width="9%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fuente</font></div></td>
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

$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]);
$cod_diagnostico = trim($cod_diagnostico);


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
  <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha_diagnostico");?></font></div></td>
  <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
 <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$departamento");?></font></td>


     <td bgcolor="#F0F0F0"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></div></td>
    <td bgcolor="#F0F0F0"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_reducido_fuente");?></font></div></td>
  </tr>
  
<?php


$result->MoveNext();
	}

?>
</table>



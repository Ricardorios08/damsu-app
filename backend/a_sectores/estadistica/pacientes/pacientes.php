<?php 

$B = 1;
 include ("../../../conexiones/config_usu.php");
include ("../../../funciones/funciones.php");

$file = "PAC.DIAGNOSTICO.XLS";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


$sql="select * from pacientes where departamento = 'MALARGUE' order by apellido";
$result = $db->Execute($sql);
?>
<table width="995" height="66" border="1" cellspacing="0" bordercolor="#000000">
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td height="24" colspan="5" bgcolor="#C9C9C9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>PACIENTES GENERAL ALVEAR QUIMIOTERAPIA</strong></font>  2014 </div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="10%" height="24" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Doc.</font></font></div></td>
    <td width="30%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
    <td width="15%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Ultima Atenci&oacute;n </font></font></div></td>
<td colspan="2" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Domicilio</font></div></td>
	<!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td> -->
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



 
 $sql3=" SELECT * FROM `tr_ventas_encabezado` where documento = $documento and fecha > '2012-12-31' order by fecha desc";
$result3 = $db->Execute($sql3);
$fecha=$result3->fields["fecha"];

if ($fecha != ''){
$cont = $cont + 1;
$fecha=fecha_argentina($result3->fields["fecha"]);


?> <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
  <td bordercolor="#000000" bgcolor="#FFFFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td bordercolor="#000000" bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
    <td bordercolor="#000000" bgcolor="#FFFFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha");?></font></div></td>
    <td width="29%" bordercolor="#000000" bgcolor="#FFFFFF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="modificar_pacientes.php?id=<?php print("$documento");?>&&cod_paciente=<?php print("$cod_paciente");?>"></a></font><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$direccion");?></font></div>
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"></font></div>      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">

   
	</font><font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
    <td width="16%" bordercolor="#000000" bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$departamento");?></font></td>
  </tr>
  
   
  <?php

}
$result->MoveNext();
	}

?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bordercolor="#000000" bgcolor="#B8B8B8">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="#B8B8B8">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="#B8B8B8">Cant</td>
    <td colspan="2" bordercolor="#000000" bgcolor="#B8B8B8"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></td>
  </tr>
</table>



<?php
$cont = "";
echo "<br><br>";
$sql="select * from pacientes where departamento = 'MALARGUE' order by apellido";
$result = $db->Execute($sql);
?>
<table width="995" height="66" border="1" cellspacing="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td height="24" colspan="5" bgcolor="#C9C9C9"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>PACIENTES GENERAL ALVEAR RADIOTERAPIA</strong></font>2014</div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="7%" height="24" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Doc.</font></font></div></td>
    <td width="26%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
    <td width="12%" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Ultima Atenci&oacute;n </font></font></div></td>
<td colspan="2" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Domicilio</font></div></td>
	<!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td> -->
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



 
 $sql3=" SELECT * FROM `prestaciones_pacientes` where documento = $documento and fecha_prestacion > '2012-12-31' order by fecha_prestacion desc";
$result3 = $db->Execute($sql3);
$fecha=$result3->fields["fecha_prestacion"];

if ($fecha != ''){
$cont = $cont + 1;
$fecha=fecha_argentina($result3->fields["fecha_prestacion"]);


?> 
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bordercolor="#000000" bgcolor="#FFFFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td bordercolor="#000000" bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
    <td bordercolor="#000000" bgcolor="#FFFFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$fecha");?></font></div></td>
    <td width="26%" bordercolor="#000000" bgcolor="#FFFFFF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$direccion");?></font></div>
        <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"></font></div>
    <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
    <td width="13%" bordercolor="#000000" bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$departamento");?></font></td>
  </tr>
  
   
  <?php

}
$result->MoveNext();
	}

?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bordercolor="#000000" bgcolor="#B8B8B8">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="#B8B8B8">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="#B8B8B8">Cant</td>
    <td colspan="2" bordercolor="#000000" bgcolor="#B8B8B8"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></td>
  </tr>
</table>





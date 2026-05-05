<?php 
include ("../../../conexiones/config_usu.php");

/*$file = "PAC.DIAGNOSTICO.XLS";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

*/
 /*include ("../../../conexiones/config_usu.php");
 
 echo  $sql="select * from  paciente_diagnostico where fecha_diagnostico between '2011-01-01' and '2014-12-31' order by cod_diagnostico, fecha_diagnostico";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_ficha=strtoupper($result->fields["nro_ficha"]);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]);
$cod_diagnostico = trim($cod_diagnostico);

echo $sql1 = "UPDATE `paciente_diagnostico` SET `cod_diagnostico` = '$cod_diagnostico' WHERE nro_ficha = $nro_ficha";
$result1 = $db->Execute($sql1);

echo "<br>";
$result->MoveNext();
	}
*/


	 echo  $sql="select * from  paciente_diagnostico where fecha_diagnostico between '2011-01-01' and '2014-12-31' order by anio; cod_diagnostico";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_ficha=strtoupper($result->fields["nro_ficha"]);
$fecha_diagnostico=$result->fields["fecha_diagnostico"];
$anio = substr($fecha_diagnostico,0,4);

echo $sql1 = "UPDATE `paciente_diagnostico` SET `anio` = '$anio' WHERE nro_ficha = $nro_ficha";
$result1 = $db->Execute($sql1);

echo "<br>";
$result->MoveNext();
	}
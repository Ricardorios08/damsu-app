<?php 



include("../../../conexiones/config_pro.php");
 
echo $sql="select * from paciente_diagnostico_fecha order by documento";
$result = $db->Execute($sql);

 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$documento=strtoupper($result->fields["documento"]);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]);
$fecha_diagnostico=strtoupper($result->fields["fecha_diagnostico"]);







 $sql5 = "UPDATE paciente_diagnostico SET fecha_diagnostico = '$fecha_diagnostico'  WHERE documento = '$documento' and cod_diagnostico = '$cod_diagnostico'";
//$result5 = $db->Execute($sql5);
echo "<br>";

  

$result->MoveNext();
	} 






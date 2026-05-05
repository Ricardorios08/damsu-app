<?php 



include("../../../conexiones/config_pro.php");
 
echo $sql="select * from protocolo";
$result = $db->Execute($sql);

 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]);
$nro_protocolo=strtoupper($result->fields["nro_protocolo"]);

 $sql1="select * from diagnostico where nro_diagnostico like '$nro_diagnostico' ";
$result1 = $db->Execute($sql1);
$nombre_diagnostico=strtoupper($result1->fields["nombre_diagnostico"]); 


ECHO $sql5 = "UPDATE protocolo SET `nombre_diagnostico` = '$nombre_diagnostico'  WHERE `nro_diagnostico` = '$nro_diagnostico' and nro_protocolo = '$nro_protocolo'";
$result5 = $db->Execute($sql5);
echo "<br>";

  

$result->MoveNext();
	} 






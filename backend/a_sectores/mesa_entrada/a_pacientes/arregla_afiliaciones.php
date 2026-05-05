<?php 



include("../../../conexiones/config_pro.php");
 
echo $sql="select * from pacientes order by documento";
$result = $db->Execute($sql);

 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$documento=$result->fields["documento"];
$tipo_doc=$result->fields["tipo_doc"];
$cod_paciente=$result->fields["cod_paciente"];



echo  $sql5 = "UPDATE afiliaciones SET cod_paciente = '$cod_paciente'  WHERE documento = '$documento' and tipo_doc = '$tipo_doc' LIMIT 1";
$result5 = $db->Execute($sql5);
echo "<br>";

  

$result->MoveNext();
	} 






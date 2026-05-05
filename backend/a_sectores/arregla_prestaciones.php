<?php 

include ("../conexiones/config_pro.php");


$sql1 = "select * from prestaciones_pacientes where tipo_doc = ''";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

  $documento=$result1->fields["documento"];
  $cod_operacion=$result1->fields["cod_operacion"];


$sql = "SELECT * FROM `pacientes` where documento = $documento";
$result = $db->Execute($sql);
$tipo_doc=$result->fields["tipo_doc"];
 
 

echo $sql = "UPDATE prestaciones_pacientes SET tipo_doc = '$tipo_doc'  WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);
echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>
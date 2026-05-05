<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from tr_ventas_encabezado where departamento = ''";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 
 $documento=$result1->fields["documento"];
$tipo_doc=$result1->fields["tipo_doc"];
$nro_factura=$result1->fields["nro_factura"];
 $sql = "select departamento from pacientes where documento = $documento and tipo_doc = $tipo_doc";
$result = $db->Execute($sql);
$departamento=strtoupper($result->fields["departamento"]);


echo $sql = "UPDATE tr_ventas_encabezado SET departamento = '$departamento' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);

echo "<br>";

 

   $result1->MoveNext();
	}




?>
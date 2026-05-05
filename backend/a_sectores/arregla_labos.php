<?php 

include ("../conexiones/config_pro.php");

 

 
	$sql = "SELECT cod_laboratorio, laboratorio, COUNT(*) FROM laboratorios  GROUP BY laboratorio HAVING COUNT(*)>1";
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $cod_laboratorio=$result->fields["cod_laboratorio"];

echo $laboratorio=strtoupper($result->fields["laboratorio"]);
echo "<br>";


  $sql1 = "select * from laboratorios where laboratorio = '$laboratorio'";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
 echo $cod=$result1->fields["cod_laboratorio"];
echo " (".ucwords($labos=$result1->fields["laboratorio"]).")";
 
echo "<br>";
$cont = $cont + 1;


if ($drogas == $droga){
//echo   $sql2 = "delete from drogas where tipo = 1 and cod_operacion = $cod_operacion";
//$result2 = $db->Execute($sql2);
}


   $result1->MoveNext();
	}

echo "<br>";
   $result->MoveNext();
	}


?>
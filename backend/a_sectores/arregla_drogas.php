<?php 

include ("../conexiones/config_pro.php");

 

echo "<br>";
	$sql = "SELECT cod_droga, droga, COUNT(*) FROM drogas where tipo = 1 GROUP BY droga HAVING COUNT(*)>1";
$result = $db->Execute($sql);

 if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $cod_droga=$result->fields["cod_droga"];

echo $droga=strtoupper($result->fields["droga"]);
echo "<br>";


  $sql1 = "select * from drogas where tipo = 1 and droga = '$droga'";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
echo "--".$drogas=$result1->fields["droga"];
echo " (".ucwords($cod_drogas=$result1->fields["cod_droga"]).")";
$cod_operacion=$result1->fields["cod_operacion"];
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
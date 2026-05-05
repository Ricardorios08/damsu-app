<?php 

include ("../conexiones/config_pro.php");


$anio = 2013;

  $sql = "select * from tr_stock group by departamento";
$result = $db->Execute($sql);
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$departamento=$result->fields["departamento"];

$desde = "2013-01-01";  $hasta= "2013-01-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
 $ene = $numero + $numero1;

$desde = "2013-02-01";  $hasta= "2013-02-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
echo $feb = $numero + $numero1;

$desde = "2013-03-01";  $hasta= "2013-03-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
 $mar = $numero + $numero1;

$desde = "2013-04-01";  $hasta= "2013-04-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$abr = $numero + $numero1;

$desde = "2013-05-01";  $hasta= "2013-05-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$may = $numero + $numero1;

$desde = "2013-06-01";  $hasta= "2013-06-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$jun = $numero + $numero1;

$desde = "2013-07-01";  $hasta= "2013-07-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$jul = $numero + $numero1;

/////////////////////////

$desde = "2013-08-01";  $hasta= "2013-08-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$ago = $numero + $numero1;

$desde = "2013-09-01";  $hasta= "2013-09-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$set = $numero + $numero1;

$desde = "2013-10-01";  $hasta= "2013-10-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$oct = $numero + $numero1;

$desde = "2013-11-01";  $hasta= "2013-11-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$nov = $numero + $numero1;

$desde = "2013-12-01";  $hasta= "2013-12-31";
$sql3 = "SELECT * FROM  `tr_stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero = mysql_num_rows($result3); 
$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3);
$dic = $numero + $numero1;




///////////////////////
echo $sql8 = "INSERT INTO pacientes_atendidos (`anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nov`, `dic`) VALUES ('$anio', '$departamento', '$ene', '$feb', '$mar', '$abr', '$may', '$jun', '$jul', '$ago', '$set', '$oct', '$nov', '$dic')";
$result8 = $db->Execute($sql8);

//////////////

 $result->MoveNext();
	}

exit;






$sql = "select  departamento from stock where fecha between '$desde' and '$hasta' and cod_movimiento = 6  group by departamento order by fecha";
$result = $db->Execute($sql);
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

echo $departamento=$result->fields["departamento"];

 echo " - ";

 

$sql3 = "SELECT * FROM  `stock` WHERE `fecha` between '$desde' and '$hasta' and departamento = '$departamento' AND cod_movimiento = 6 group by documento";
$result3 = mysql_query($sql3);
$numero1 = mysql_num_rows($result3); // obtenemos el número de filas
echo $numero1;  // imprimos en pantalla el número generado 



$suma1 = $suma1 + $numero1;

  
echo "<br>";
 $result->MoveNext();
	}

echo "<br>";
echo "<br>";
echo $suma1;




$sql = "INSERT INTO pacientes_atendidos (`anio`, `departamento`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `set`, `oct`, `nov`, `dic`) VALUES ('$anio', '$departamento', '$ene', '$feb', '$mar', '$abr', '$may', '$jun', '$jul', '$ago', '$set', '$oct', '$nov', '$dic');";



exit;



  $sql1 = "select  * from tr_stock where departamento = $departamento and fecha  between '$desde' and '$hasta' and cod_movimiento = 6  group by documento order by fecha";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

  $documento=$result1->fields["documento"];
 

$sql7="select departamento, provincia, sexo from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);

 $departamento=strtoupper($result7->fields["departamento"]); // numero
 

echo $tot_cant = $tot_cant + 1;
echo "<br>";

echo $sql = "UPDATE tr_stock SET departamento = '$departamento'   where documento = $documento and fecha between '$desde' and '$hasta' and cod_movimiento = 6";
$result = $db->Execute($sql);
  

  echo "<br>";
 $result1->MoveNext();
	}







exit;


  $sql1 = "select  * from tr_stock where fecha between '$desde' and '$hasta' and cod_movimiento = 6  group by documento order by fecha";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

  $documento=$result1->fields["documento"];
 

$sql7="select departamento, provincia, sexo from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);

 $departamento=strtoupper($result7->fields["departamento"]); // numero
 

echo $tot_cant = $tot_cant + 1;
echo "<br>";

echo $sql = "UPDATE tr_stock SET departamento = '$departamento'   where documento = $documento and fecha between '$desde' and '$hasta' and cod_movimiento = 6";
$result = $db->Execute($sql);
  

  echo "<br>";
 $result1->MoveNext();
	}



$tot_cant;


exit;


ECHO $sql1 = "select  departamento, COUNT(*) from tr_stock where fecha between '$desde' and '$hasta' and cod_movimiento = 6  group by documento order by fecha";















exit;


$sql1 = "select  * from stock where fecha between '$desde' and '$hasta' and cod_movimiento = 6  group by documento order by fecha";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

  $documento=$result1->fields["documento"];
 

$sql7="select departamento, provincia, sexo from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);

 $departamento=strtoupper($result7->fields["departamento"]); // numero
 

echo $tot_cant = $tot_cant + 1;
echo "<br>";

echo $sql = "UPDATE stock SET departamento = '$departamento'   where documento = '$documento' and fecha between '$desde' and '$hasta' and cod_movimiento = 6";
$result = $db->Execute($sql);
  

  echo "<br>";
 $result1->MoveNext();
	}



$tot_cant;


exit;




$desde = "2013-01-01";
$hasta= "2013-31-31";


  $sql1 = "select  * from tr_stock where fecha between '$desde' and '$hasta' and cod_movimiento = 6  group by documento order by fecha";
$result1 = $db->Execute($sql1);

  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

  $documento=$result1->fields["documento"];
 

$sql7="select departamento, provincia, sexo from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);

 $departamento=strtoupper($result7->fields["departamento"]); // numero
 

echo $tot_cant = $tot_cant + 1;
echo "<br>";

echo $sql = "UPDATE tr_stock SET departamento = '$departamento'   where documento = $documento and fecha between '$desde' and '$hasta' and cod_movimiento = 6";
$result = $db->Execute($sql);
  

  echo "<br>";
 $result1->MoveNext();
	}



$tot_cant;


exit;






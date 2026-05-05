<?php 

include ("../conexiones/config_pro.php");

$sql1 = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'c50%' AND fecha_diagnostico BETWEEN '2011-01-01'
AND '2011-12-31'";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $documento=$result1->fields["documento"];
  $tipo_doc=$result1->fields["tipo_doc"]; 
 

 
$conta = $conta + 1;
   $result1->MoveNext();
	}

echo "<br>";
echo "2011: ------------------";


echo $conta;
echo "<br>";
$sql1 = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'c50%' AND fecha_diagnostico BETWEEN '2012-01-01'
AND '2012-12-31'";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $documento=$result1->fields["documento"];
  $tipo_doc=$result1->fields["tipo_doc"]; 
 

 
$conta = $conta + 1;
   $result1->MoveNext();
	}

echo "<br>";
echo "2012: ------------------";


echo $conta;
echo "<br>";
$sql1 = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'c50%' AND fecha_diagnostico BETWEEN '2013-01-01'
AND '2013-12-31'";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $documento=$result1->fields["documento"];
  $tipo_doc=$result1->fields["tipo_doc"]; 
 

 
$conta = $conta + 1;
   $result1->MoveNext();
	}

echo "<br>";
echo "2013: ------------------";


echo $conta;
echo "<br>";









$sql1 = "select * from receta where fecha between '2012-01-01' and '2012-12-31' group by nro_paciente";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $nro_paciente=$result1->fields["nro_paciente"];
  $tipo_doc=$result1->fields["tipo_doc"]; 
 $cod_ovario = "C56";

	$sql = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'C56%' and documento = $nro_paciente and tipo_doc like '$tipo_doc'";
$result = $db->Execute($sql);
 
   $nro_ficha=$result->fields["nro_ficha"];

if ($nro_ficha != ""){
 $nro_paciente;

$cont = $cont + 1;
}

   $result1->MoveNext();
	}

echo "<br>";
echo "2012: ------------------";


echo $cont;

echo "<br>";
exit;


echo "<br>"; 
echo $cont;


/*
 $sql = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'C56%'";
$result1 = $db->Execute($sql);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 $nro_documento=$result1->fields["nro_documento"]
 $result1->MoveNext();
	}

*/



$sql1 = "select * from receta where fecha between '2011-01-01' and '2011-12-31' group by nro_paciente";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $nro_paciente=$result1->fields["nro_paciente"];
  $tipo_doc=$result1->fields["tipo_doc"]; 
 $cod_ovario = "C56";

	$sql = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'C56%' and documento = $nro_paciente and tipo_doc like '$tipo_doc'";
$result = $db->Execute($sql);
 
   $nro_ficha=$result->fields["nro_ficha"];

if ($nro_ficha != ""){
 $nro_paciente;

$cont = $cont + 1;
}

   $result1->MoveNext();
	}

echo "<br>";
echo "2011: ------------------";
echo "<br>";

echo $cont;



echo "<br>"; 
echo $cont;



 $sql = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'C56%'";
$result1 = $db->Execute($sql);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 $nro_documento=$result1->fields["nro_documento"];

 $result1->MoveNext();
	}





$sql1 = "select * from receta where fecha between '2010-01-01' and '2010-12-31' group by nro_paciente";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $nro_paciente=$result1->fields["nro_paciente"];
  $tipo_doc=$result1->fields["tipo_doc"]; 
 $cod_ovario = "C56";

	$sql = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'C56%' and documento = $nro_paciente and tipo_doc like '$tipo_doc'";
$result = $db->Execute($sql);
 
   $nro_ficha=$result->fields["nro_ficha"];

if ($nro_ficha != ""){
 $nro_paciente;

$cont = $cont + 1;
}

   $result1->MoveNext();
	}

echo "<br>";
echo "2010: ------------------";
echo "<br>";

echo $cont;



echo "<br>"; 
echo $cont;



echo $sql = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'C56%'";
$result1 = $db->Execute($sql);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

echo $nro_documento=$result1->fields["nro_documento"];
echo "<br>";
 $result1->MoveNext();
	}



?>


12860261
21373071
27063546
2012 = 3
2013 = 18


11209471
12458961
12860261
13024657
13074744
13303435
14297330
18532658
21373071
21376174
22043500
22189600
23408171
24419623
25158265
27063546
34191440
34957337

------------------
18
18
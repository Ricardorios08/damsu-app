<?php

include ("../../../conexiones/config_usu.php");

echo $departamento1 = "TUPUNGATO";

$desde= "2013-02-01";
$hasta= "2013-11-31";
echo $cod_diagnostico = "C53";
echo $cod_diagnostico1 = "D06";
echo "<br>";

   $sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto FROM `tr_ventas_encabezado` where (departamento = '$departamento1' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_diagnostico') or (departamento = '$departamento1' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_diagnostico1')";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


echo  $cant_depto=$result1->fields["cant_depto"];
echo " - ";
echo  $total_neto=$result1->fields["total_neto"];


echo "<br>";


 


     $result1->MoveNext();
	}


echo "<br>";



ECHO $departamento1 = "TUNUYAN";



echo $cod_diagnostico;
echo $cod_diagnostico1;
echo "<br>";

  $sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto FROM `tr_ventas_encabezado` where (departamento = '$departamento1' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_diagnostico') or (departamento = '$departamento1' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_diagnostico1')";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


echo  $cant_depto=$result1->fields["cant_depto"];
echo " - ";
echo  $total_neto=$result1->fields["total_neto"];


echo "<br>";


 


     $result1->MoveNext();
	}


echo "<br>";




ECHO $departamento1 = "SAN CARLOS";




echo $cod_diagnostico;
echo $cod_diagnostico1;
echo "<br>";

  $sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto FROM `tr_ventas_encabezado` where (departamento = '$departamento1' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_diagnostico') or (departamento = '$departamento1' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_diagnostico1')";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


echo  $cant_depto=$result1->fields["cant_depto"];
echo " - ";
echo  $total_neto=$result1->fields["total_neto"];


echo "<br>";


 


     $result1->MoveNext();
	}


echo "<br>";
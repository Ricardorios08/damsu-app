<?php 


include ("../../../conexiones/config_usu.php");

$sql1 = "SELECT *   FROM `cantidad_dptos`order by documento";
 $result1 = $db->Execute($sql1);


if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 
$documento=$result1->fields["documento"];


$sql = "SELECT *   FROM `prestaciones_pacientes` where documento = $documento and fecha_prestacion between '$desde1' and '$hasta1' group by documento";
 $result = $db->Execute($sql);
$doc=$result->fields["documento"];
$fecha_prestacion=$result->fields["fecha_prestacion"];
$anio = substr($fecha_prestacion,0,4);

if ($doc != ""){


switch ($anio){
	case "2009":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2009' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}

case "2010":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2010' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}

case "2011":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2011' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}

case "2012":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2012' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}

case "2013":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2013' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}


case "2014":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2014' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}

case "2015":{
$sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio_2015' WHERE documento= '$documento'";
$result2 = $db->Execute($sql2);
break;}

}

}




  $result1->MoveNext();
	}





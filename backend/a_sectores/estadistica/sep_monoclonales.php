<?php

 


$dia_d = $_REQUEST['dia'];
$mes_d = $_REQUEST['mes'];
$anio_d = $_REQUEST['anio'];

$dia_h = $_REQUEST['dia2'];
$mes_h = $_REQUEST['mes2'];
$anio_h = $_REQUEST['anio2'];


$fecha_d = $anio_d."-".$mes_d."-".$dia_d;
$fecha_h = $anio_h."-".$mes_h."-".$dia_h;

$opcio=$_POST["opcion"];
	for ($i=0;$i<count($opcio);$i++)    
	{     
	$opcion = $opcio[$i]; 
	}


switch ($opcion){
case "1":{include ("monoclonales_cuadro1.php");break;}
case "2":{include ("monoclonales_cuadro_excel.php");break;}
case "21":{include ("monoclonales2.php");break;}
}


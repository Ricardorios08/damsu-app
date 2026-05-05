<?php
include ("../../../conexiones/config_usu.php");

 
$cod_laboratorio=$_POST["cod_laboratorio"];
if ($cod_laboratorio == ""){
	$leyenda =  "Usted no ingreso codigo de Laboratorio";
	include ("../../../alertas/campo_informacion2.php");
	exit;
}



$nombre_laboratorio=$_POST["nombre_laboratorio"];
if ($nombre_laboratorio == ""){
	$leyenda =  "Usted no ingreso nombre Laboratorio";
	include ("../../../alertas/campo_informacion2.php");
	exit;
}


 $sql = "INSERT INTO `laboratorios` ( `cod_laboratorio` , `laboratorio` ) VALUES ( '$cod_laboratorio', '$nombre_laboratorio')";
mysql_query($sql);

include ("entrada_laboratorio.php");
	

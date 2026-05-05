<?php 
include ("../../../conexiones/config_usu.php");

 
$cod_laboratorio=$_POST["cod_laboratorio"];
if ($cod_laboratorio == ""){
	$leyenda =  "Usted no ingreso laboratorio";
	include ("../../../alertas/campo_vacio.php");
}
else
{



$laboratorio=$_POST["laboratorio"];

$sql = "INSERT INTO `laboratorios` ( `cod_laboratorio` , `laboratorio` ) VALUES ( '$cod_laboratorio', '$laboratorio')";

mysql_query($sql);

include ("entrada_des_laboratorio.php");
	}

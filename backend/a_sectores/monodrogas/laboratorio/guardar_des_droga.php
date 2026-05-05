<?php
include ("../../../conexiones/config_usu.php");

 
$cod_droga=$_POST["cod_droga"];
if ($cod_droga == ""){
	$leyenda =  "Usted no ingreso codigo de Droga";
	include ("../../../alertas/campo_vacio.php");
}
else
{



$droga=$_POST["droga"];

$sql = "INSERT INTO `drogas` ( `cod_droga` , `droga` ) VALUES ( '$cod_fuente', '$droga')";

mysql_query($sql);

include ("entrada_des_droga.php");
	}

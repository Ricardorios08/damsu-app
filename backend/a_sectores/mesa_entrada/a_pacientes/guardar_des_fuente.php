<?php
include ("../../../conexiones/config_usu.php");

 
$nombre_fuente=$_POST["nombre_fuente"];
$nombre_reducido_fuente=$_POST["nombre_reducido_fuente"];
$cod_fuente=$_POST["cod_fuente"];

if ($nombre_fuente == ""){
	$leyenda =  "Usted no ingreso Nombre de Fuente";
	include ("../../../alertas/campo_vacio.php");
	exit;
}
else
{




$sql = "INSERT INTO `fuentes` ( `nro_fuente` , `nombre_fuente` , `nombre_reducido_fuente` ) VALUES ( '$cod_fuente', '$nombre_fuente', '$nombre_reducido_fuente' )";

mysql_query($sql);

include ("entrada_des_fuente.php");
	}

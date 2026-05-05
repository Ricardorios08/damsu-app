<?php
include ("../../../conexiones/config_usu.php");

 
$nombre_diagnostico=$_POST["nombre_diagnostico"];
$nombre_reducido=$_POST["nombre_reducido"];
$cod_diagnostico=$_POST["cod_diagnostico"];

if ($nombre_diagnostico == ""){
	$leyenda =  "Usted no ingreso nombre de diagnostico";
	include ("../../alertas/campo_vacio.php");
	exit;
}
else
{




$sql = "INSERT INTO `diagnostico` ( `nro_diagnostico` , `nombre_diagnostico` , `nombre_reducido` ) VALUES ( '$cod_diagnostico', '$nombre_diagnostico', '$nombre_reducido' )";

mysql_query($sql);


include ("entrada_des_diagnostico.php");
	}

<?php 

include ("../../../conexiones/config_usu.php");

$cod_operacion=$_REQUEST["cod_operacion"];
$droga=$_REQUEST["droga"];

$tratamient=$_POST["tratamiento"];
	for ($i=0;$i<count($tratamient);$i++)    
	{     
	$tratamiento = $tratamient[$i];  
				}



 $sql1 = "UPDATE `drogas` SET droga = '$droga' , cod_droga_nuevo = '$tratamiento' WHERE  cod_operacion = $cod_operacion";
mysql_query($sql1);

$leyenda = "SE MODIFICO POR ".$droga;
include ("../../../alertas/campo_informacion.php");
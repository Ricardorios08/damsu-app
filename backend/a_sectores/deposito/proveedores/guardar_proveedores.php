<?php
include ("../../../conexiones/config_usu.php");
 
$cod_proveedor=$_POST["cod_proveedor"];
if ($cod_proveedor == ""){
		$leyenda = "Usted no ingreso codigo de Proveedor";
include ("../../../alertas/campo_vacio.php");
}
else
{

$denominacion=$_POST["denominacion"];
$domicilio=$_POST["domicilio"];
$cod_area=$_POST["cod_area"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$servicio=$_POST["servicio"];
$denominacion_reducida=$_POST["denominacion_reducida"];
$mail=$_POST["mail"];

echo $sql = "INSERT INTO `proveedores` ( `cod_proveedor` , `denominacion` , `cod_area` , `domicilio` , `telefono` , `cod_area_celular` , `celular` , `servicio` , `denominacion_reducida` , `mail` ) VALUES ( '$cod_proveedor' , '$denominacion' , '$cod_area' , '$domicilio' , '$telefono' , '$cod_area_celular' , '$celular' , '$servicio' , '$denominacion_reducida' , '$mail' )";
mysql_query($sql);


	}

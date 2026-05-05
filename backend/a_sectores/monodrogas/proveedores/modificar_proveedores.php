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
$cod_area_celular=$_POST["cod_area_celular"];


$telefono=$_POST["telefono"];
$celular=$_POST["celular"];

$servicio=$_POST["servicio"];
$denominacion_reducida=$_POST["denominacion_reducida"];
$mail=$_POST["mail"];
$gln=$_POST["gln"];

if ($gln == ""){
	$leyenda = "Usted no ingreso codigo de GLN";
include ("../../../alertas/campo_vacio.php");
exit;
}



echo $sql = "UPDATE proveedores SET `denominacion` = '$denominacion', `cod_area` = '$cod_area', `domicilio` = '$domicilio', `telefono` = '$telefono', `cod_area_celular` = '$cod_area_celular', `celular` = '$celular', `servicio` = '$servicio', `denominacion_reducida` = '$denominacion_reducida', `mail` = '$mail', `gln` = '$gln' WHERE cod_proveedor = $cod_proveedor";
mysql_query($sql);



	}




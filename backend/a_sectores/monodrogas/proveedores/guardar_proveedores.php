<?php 
include ("../../../conexiones/config_usu.php");
 
$cod_proveedor=$_POST["cod_proveedor"];
if ($cod_proveedor == ""){
		$leyenda = "Usted no ingreso codigo de Proveedor";
include ("../../../alertas/campo_vacio.php");
exit;
}
else
{



$sql="select * from proveedores where cod_proveedor = $cod_proveedor";
$result = $db->Execute($sql);
$cod_prove=strtoupper($result->fields["cod_proveedor"]);

if ($cod_prove != ""){
		$leyenda = "Ya existe Proveedor con ese número";
include ("../../../alertas/campo_vacio.php");
exit;
}


$denominacion=$_POST["denominacion"];
$domicilio=$_POST["domicilio"];
$cod_area=$_POST["cod_area"];
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


$sql = "INSERT INTO `proveedores` ( `cod_proveedor` , `denominacion` , `cod_area` , `domicilio` , `telefono` , `cod_area_celular` , `celular` , `servicio` , `denominacion_reducida` , `mail` , `gln` ) VALUES ( '$cod_proveedor' , '$denominacion' , '$cod_area' , '$domicilio' , '$telefono' , '$cod_area_celular' , '$celular' , '$servicio' , '$denominacion_reducida' , '$mail' , '$gln'  )";
mysql_query($sql);



	}

include ("entrada_dato.php");


<?php  
include ("../../../conexiones/config_usu.php");

 
$descripcion=$_POST["descripcion"];
$caracteristica=$_POST["caracteristica"];
$cod_prestacion=$_POST["cod_prestacion"];


$proveedo=$_POST["cod_proveedor"];
for ($i=0;$i<count($proveedo);$i++)    
{     
$proveedor = $proveedo[$i];    
}


if ($descripcion == ""){
	$leyenda =  "Usted no ingreso nombre de Prestacion";
	include ("../../../alertas/campo_vacio.php");
	exit;
}
else
{




$cupo=$_POST["cupo"];
$cant_realizada=$_POST["cant_realizada"];
$precio=$_POST["precio"];

$period=$_POST["periodo"];
for ($i=0;$i<count($period);$i++)    
{     
$periodo = $period[$i];    
}




$sql = "INSERT INTO `prestaciones` ( `cod_prestacion` , `descripcion` , `caracteristica` , `cod_proveedor` , `precio` , `cupo_mensual` , `cant_realizado` , `periodo`  ) VALUES ( '$cod_prestacion', '$descripcion', '$caracteristica' ,  '$proveedor' , '$precio' , '$cupo_mensual' , '$cant_realizado' , '$periodo')";
mysql_query($sql);


include ("entrada_des_prestaciones.php");
	}

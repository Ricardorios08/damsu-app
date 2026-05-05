<?php  
include ("../../../conexiones/config_usu.php");

 
$cod_operacion=$_POST["cod_operacion"];


$descripcion=$_POST["descripcion"];
$caracteristica=$_POST["caracteristica"];
$cod_prestacion=$_POST["cod_prestacion"];


$proveedo=$_POST["cod_proveedor"];
for ($i=0;$i<count($proveedo);$i++)    
{     
$proveedor = $proveedo[$i];    
}

if (($proveedor == 0) or ($proveedor == "")){

$sql="select * from prestacion where cod_operacion = $cod_operacion";
$result = $db->Execute($sql);

$proveedor=strtoupper($result->fields["proveedor"]);

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

if (($periodo == 0) or ($periodo == "")){

$sql="select * from prestacion where cod_operacion = $cod_operacion";
$result = $db->Execute($sql);

$periodo=strtoupper($result->fields["periodo"]);

}


echo $sql = "UPDATE prestaciones SET `descripcion` = '$descripcion', `caracteristica` = '$caracteristica', `cod_proveedor` = '$proveedor', `precio` = '$precion', `cupo_mensual` = '$cupo', `cant_realizado` = '$cant_realizada', `periodo` = '$periodo' WHERE cod_operacion = $cod_operacion";
mysql_query($sql);


	}

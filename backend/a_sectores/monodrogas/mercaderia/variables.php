<?php 

include ("../../../conexiones/config_usu.php");

 $sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_barra'";
$result = $db->Execute($sql);

$troquel=strtoupper($result->fields["troquel"]);
$grupo=strtoupper($result->fields["grupo"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
$cadena_frio=strtoupper($result->fields["cadena_frio"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_barra=strtoupper($result->fields["cod_barra"]);
$porcentaje_diferencial=strtoupper($result->fields["porcentaje_diferencial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$observaciones=strtoupper($result->fields["observaciones"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$informar=strtoupper($result->fields["informar"]);
$grupo=strtoupper($result->fields["grupo"]);

switch ($grupo){
	case "1":{$nombre_grupo = "GRUPO 1";BREAK;}
	case "2":{$nombre_grupo = "GRUPO 2";BREAK;}
	case "3":{$nombre_grupo = "MONOCLONAL";BREAK;}
}



$sql = "SELECT * FROM drogas  WHERE  cod_droga = $cod_droga";
$result = $db->Execute($sql);

$cod_droga=strtoupper($result->fields["cod_droga"]);
$nombre_droga=strtoupper($result->fields["droga"]);


$sql="select * from laboratorios where cod_laboratorio = $laboratorio";
$result = $db->Execute($sql);

$laboratorio=$result->fields["laboratorio"];
$cod_laboratorio=$result->fields["cod_laboratorio"];
$laboratorio11=$result->fields["laboratorio"];


?>

 
	
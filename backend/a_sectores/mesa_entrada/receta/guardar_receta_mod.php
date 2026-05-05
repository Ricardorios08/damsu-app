<?php

include ("../../../conexiones/config_pro.php");

 $nro_receta=$_REQUEST["nro_receta"];
$nro_paciente=$_REQUEST["nro_paciente"];
$operador=$_REQUEST["operador"];



$sql="delete from receta_detalle where nro_receta = $nro_receta ";
$result = $db->Execute($sql);


  $sql3 = "SELECT * FROM receta_detalle_temp  WHERE  operador = $operador ";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {


$cod_droga=strtoupper($result3->fields["cod_droga"]);

$cantidad=$result3->fields["cantidad"];
$estado=$result3->fields["estado"];

$sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_droga like '$cod_droga'";
$result1 = $db->Execute($sql1);
$nombre_droga=strtoupper($result1->fields["nombre_comercial"]);


  $sql = "INSERT INTO `receta_detalle` (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado`, `nro_paciente`, `cod_renglon`) VALUES ('$nro_receta', '$cod_droga', '$nombre_droga', '$cantidad', '$estado', '$nro_paciente', NULL);";
$result = $db->Execute($sql);


	 $result3->MoveNext();
				}

$hor = time();
date_default_timezone_set("America/Argentina/Mendoza");
$hora = date("H:i:s",$hor);

$fecha_preparacion = date("Y-m-d");


 $sql = "UPDATE receta SET `hora_preparacion` = '$hora' , fecha_preparacion = '$fecha_preparacion'  WHERE nro_receta = $nro_receta";
mysql_query($sql);


 $sql = "delete from  receta_temp where operador = $operador";
$result = $db->Execute($sql);

 $sql1 = "delete from  receta_detalle_temp where nro_receta = $operador";
$result1 = $db->Execute($sql1);

$leyenda = "SE MODIFICO LA RECETA CON EXITO";
include ("../../../alertas/campo_informacion.php");


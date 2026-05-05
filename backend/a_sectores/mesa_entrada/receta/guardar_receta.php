<?php

include ("../../../conexiones/config_pro.php");

$nro_receta=$_REQUEST["nro_receta"];

 $operador=$_REQUEST["operador"];
$nro_paciente=$_REQUEST["nro_paciente"];
$tipo_doc=$_REQUEST["tipo_doc"];
$fecha = date("Y-m-d");

$hor = time();
 
date_default_timezone_set("America/Argentina/Mendoza");
$hora = date("H:i:s",$hor);



 $sql="select * from `receta_temp` where `nro_receta` = '$operador'";
$result = $db->Execute($sql);



$nro_receta=$result->fields["nro_receta"];
$tipo_doc=$result->fields["tipo_doc"];

$nombre_paciente=$result->fields["nombre_paciente"];

$hoy = date("Y-m-d");

  $sql = "INSERT INTO `receta` (`fecha`, `nro_receta`, `tipo_doc` , `nro_paciente`, `nombre_paciente`, `estado` , `fecha_estado` , `operador` , `hora_ingreso`) VALUES ('$fecha', '', '$tipo_doc' ,'$nro_paciente', '$nombre_paciente', '0' , '$hoy' , '$operador' , '$hora');";
$result = $db->Execute($sql);

 $idgenerado = mysql_insert_id();


  $sql3 = "SELECT * FROM receta_detalle_temp  WHERE  nro_receta = $operador";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo31111111".$db->ErrorMsg());

 while (!$result3->EOF) {


$cod_droga=strtoupper($result3->fields["cod_droga"]);
$nombre_droga=$result3->fields["nombre_droga"];
$cantidad=$result3->fields["cantidad"];

$hoy = date("Y-m-d");
$hora = date("H:i:s");


   $sql = "INSERT INTO `receta_detalle` (`nro_receta`, `cod_droga`, `nombre_droga`, `cantidad`, `estado`, `nro_paciente`, `cod_renglon` , `fecha_modificacion` , `hora` , `operador`) VALUES ('$idgenerado', '$cod_droga', '$nombre_droga', '$cantidad', '0', '$nro_paciente', NULL , '$hoy' , '$hora' , '$operador');";
$result = $db->Execute($sql);


	 $result3->MoveNext();
				}


$sql = "TRUNCATE TABLE receta_temp";
$result = $db->Execute($sql);

$sql1 = "TRUNCATE TABLE receta_detalle_temp";
$result1 = $db->Execute($sql1);

 $palabra = $nro_paciente;

 $bander = 1;
 $id = $operador;
 $band = 1;
include ("../../facturacion/buscar_paciente_general_facturacion1.php");	


<?php

include ("../../../conexiones/config_pro.php");

$nro_protocolo=$_REQUEST["nro_protocolo"];

 $sql="select * from `protocolo_temp` where `nro_protocolo` = '$nro_protocolo'";
$result = $db->Execute($sql);

$situacion=strtoupper($result->fields["situacion"]); 
$linea=strtoupper($result->fields["linea"]); 
$esquema=strtoupper($result->fields["esquema"]); 
$plan=strtoupper($result->fields["plan"]); 
$alternativa=strtoupper($result->fields["alternativa"]); 
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]); 

$sql="select * from diagnostico where nro_diagnostico = '$nro_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 


echo $sql = "INSERT INTO protocolo (`nro_protocolo`, `nro_diagnostico`, `situacion`, `linea`, `plan`, `esquema`, `alternativa` ,  `nombre_diagnostico`) VALUES ('$nro_protocolo', '$nro_diagnostico', '$situacion', '$linea', '$plan', '$esquema', '$alternativa' , '$nombre_diagnostico');";
$result = $db->Execute($sql);

$sql3 = "SELECT * FROM protocolo_detalle_temp  WHERE  `nro_protocolo` = $nro_protocolo";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {


$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$nro_protocolo=strtoupper($result3->fields["nro_protocolo"]);
$cod_droga=strtoupper($result3->fields["cod_droga"]);
$forma_farmaceutica=strtoupper($result3->fields["forma_farmaceutica"]);

$dosis=strtoupper($result3->fields["dosis"]);
$frecuencia=strtoupper($result3->fields["frecuencia"]);
$cantidad_ciclos=strtoupper($result3->fields["cantidad_ciclos"]);



$sql = "INSERT INTO protocolo_detalle (`cod_detalle`, `nro_protocolo`, `cod_droga`, `forma_farmaceutica`, `dosis`, `frecuencia`, `cantidad_ciclos`) VALUES (NULL,'$nro_protocolo', '$cod_droga', '$forma_farmaceutica', '$dosis', '$frecuencia', '$cantidad_ciclos');";
$result = $db->Execute($sql);


	 $result3->MoveNext();
				}


$sql = "TRUNCATE TABLE protocolo_temp";
$result = $db->Execute($sql);

$sql1 = "TRUNCATE TABLE protocolo_detalle_temp";
$result1 = $db->Execute($sql1);

$leyenda = "SE GUARDO EL PROTOCOLO CON EXITO";
include ("../../../alertas/campo_informacion.php");


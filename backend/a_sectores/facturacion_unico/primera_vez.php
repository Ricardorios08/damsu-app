<?php $primera_vez = 5;
$nro_factura= $_REQUEST['nro_factura'];

$tipo_fact = "x";

$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];

$fecha= $anio.$mes.$dia;
$producto= $_REQUEST['producto'];
$cod_merquita= $_REQUEST['cod_merquita'];
$operador= $_REQUEST['operador'];

$observaciones= $_REQUEST['observaciones'];



$cod_paciente= $_REQUEST['cod_paciente'];
$nro_receta= $_REQUEST['nro_receta'];

 $sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);


 $documento=strtoupper($result->fields["documento"]);
$cod_paciente=strtoupper($result->fields["cod_paciente"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);

   $sql = "DELETE FROM `un_ventas1_deta_temp` WHERE operador = $operador";
mysql_query($sql);
  $sql = "DELETE FROM `un_ventas1_encab_temp` WHERE operador = $operador";
mysql_query($sql);


$cantidad_existente= $_REQUEST['cantidad_existente'];
$porc_dto= $_REQUEST['porc_dto'];


if ($documento == ""){
$nro_pacient=$_REQUEST["nro_paciente"];
	for ($i=0;$i<count($nro_pacient);$i++)    
	{     
	$nro_paciente = $nro_pacient[$i];    
	}

if ($nro_paciente == ""){
$leyenda = "NO INGRESO PACIENTE";
include ("../../../alertas/campo_vacio.php");
exit;

}ELSE
	{


$documento = $nro_paciente;
	}
}

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$estado=strtoupper($result7->fields["estado"]);

$doc=strtoupper($result7->fields["documento"]);

if ($doc == ""){
$leyenda = "NO EXISTE PACIENTE CON ESE DOCUMENTO";
include ("../../alertas/campo_vacio.php");
exit;

}
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;

$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero

$nombre_completo = $apellido.", ".$nombre;

 $sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


 $sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 


 $sql = "SELECT * FROM `afiliaciones` where documento = $documento order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];

$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

$nombre_os = $nombre_os." - ".$sigla." (".$nro_os.")";

$envia=$_REQUEST["enviar"];
	for ($i=0;$i<count($envia);$i++)    
	{     
	$enviar = $envia[$i];    
	}



 $sql = "INSERT INTO `un_ventas1_encab_temp` ( `tipo_fact` , `nro_factura` , `cod_operacion` , `nro_receta` , `documento` , `tipo_doc` , `plan` , `operador` , `denominacion` , `fecha` , `forma_pago` , `porc_dto` , `nombre_operador` , `nro_os` , `nombre_os` , `observaciones` , `enviar`) VALUES ( 'x'  , '$operador' , '$cod_operacion' , '$nro_receta' , '$documento' , '$tipo_doc' , '' , '$operador' , '$nombre_completo' , '$fecha' , '' , '' , '$nombre_operador' , '$nro_os' , '$nombre_os' , '$observaciones' ,  '$enviar' )";
mysql_query($sql);

?>
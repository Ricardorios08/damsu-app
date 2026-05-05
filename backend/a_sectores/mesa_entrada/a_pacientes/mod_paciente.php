
<?php  
include ("../../../conexiones/config_usu.php");

$documento=$_POST["mod"]; 

$documento=$_POST["documento"];
$cod_paciente =$_POST["cod_paciente"];

$documento_nuevo=$_POST["documento_nuevo"];
$tipo=$_POST["tipo"];

if ($documento == ""){
		$leyenda = "Usted no ingreso Documento";
include ("../../../alertas/campo_vacio.php");
}
else
{

$sql="select * from pacientes where documento = $documento";
$result = $db->Execute($sql);
$sexos=$result->fields["sexo"];
$tipo_do=$result->fields["tipo_doc"];
$esta=$result->fields["estado"];
 $esta_ci=$result->fields["estado_civil"];
$departamen=$result->fields["departamento"];

$tipo_docs=$_POST["tipo_doc"];
for ($i=0;$i<count($tipo_docs);$i++)    
{     
$tipo_doc = $tipo_docs[$i];    
}

if ($tipo_doc == ""){
$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);
$tipo_doc=$result->fields["tipo_doc"];
}

$apellido=$_POST["apellido"];
$nombre=$_POST["nombre"];
$estad=$_POST["estado"];
for ($i=0;$i<count($estad);$i++)    
{     
$estado= $estad[$i];   
}
if ($estado == ""){

$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);
$estado=$result->fields["estado"];
}

$dia_estado=$_POST["dia_estado"];
$mes_estado=$_POST["mes_estado"];
$anio_estado=$_POST["anio_estado"];
$fecha_estado=$anio_estado.$mes_estado.$dia_estado;

$observaciones=$_POST["observaciones"];

$calle=$_POST["calle"];
$puerta=$_POST["puerta"];
$referencia=$_POST["referencia"];
$localidad=$_POST["localidad"];
$departament=$_POST["departamento"];
for ($i=0;$i<count($departament);$i++)    
{     
$departamento= $departament[$i];    
}
if ($departamento == ""){
$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);
$departamento=$result->fields["departamento"];
}
$cod_postal=$_POST["cod_postal"];
$telefono=$_POST["telefono"];

$calle_residencia=$_POST["calle_residencia"];
$puerta_residencia=$_POST["puerta_residencia"];
$referencia_residencia=$_POST["referencia_residencia"];
$localidad_residencia=$_POST["localidad_residencia"];
$cod_postal_residencia=$_POST["cod_postal_residencia"];
$telefono_residencia=$_POST["telefono_residencia"];
$celular_residencia=$_POST["celular_residencia"];


$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];
$fecha_nac=$anio."-".$mes."-".$dia;

$lugar_nac=$_POST["lugar_nac"];


$sex=$_POST["sexo"];
	for ($i=0;$i<count($sex);$i++)    
	{     
	$sexo = $sex[$i];    
	}

if ($sexo == ""){
$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);
$sexo=$result->fields["sexo"];
}

$provinci=$_POST["provincia"];
for ($i=0;$i<count($provinci);$i++)    
{     
$provincia = $provinci[$i];    
}

if ($provincia == ""){
$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);
$provincia=$result->fields["provincia"];
}



$estado_civi=$_POST["estado_civil"];
for ($i=0;$i<count($estado_civi);$i++)    
{     
$estado_civil= $estado_civi[$i];    
}

if ($estado_civil == ""){
$sql="select * from pacientes where cod_paciente = $cod_paciente";
$result = $db->Execute($sql);
$estado_civil=$result->fields["estado_civil"];
}

$autorizados_profe=$_POST["autorizados_profe"];


 $sql = "UPDATE `pacientes` SET `apellido` = '$apellido', `nombre` = '$nombre', `lugar_nac` = '$lugar_nac', `estado_civil` = '$estado_civil', `sexo` = '$sexo', `calle` = '$calle', `puerta` = '$puerta', `referencia` = '$referencia', `localidad` = '$localidad', `departamento` = '$departamento', `calle_residencia` = '$calle_residencia', `puerta_residencia` = '$puerta_residencia', `referencia_residencia` = '$referencia_residencia', `localidad_residencia` = '$localidad_residencia', `cod_postal_residencia` = '$cod_postal' , `cod_postal` = '$cod_postal', `telefono` = '$telefono' , `fecha_nac` = '$fecha_nac' , `telefono_residencia` = '$telefono_residencia', `fecha_estado` = '$fecha_estado', `observaciones` = '$observaciones' , `estado` = '$estado' , `sexo` = '$sexo' ,  `celular_residencia` = '$celular_residencia' , `provincia` = '$provincia' , `autorizados_profe` = '$autorizados_profe'WHERE `cod_paciente` = $cod_paciente";
mysql_query($sql);


require_once("../../../nusoap/lib/nusoap.php");
$sql = "UPDATE `pacientes` SET `apellido` = '$apellido', `nombre` = '$nombre', `lugar_nac` = '$lugar_nac', `estado_civil` = '$estado_civil', `sexo` = '$sexo', `calle` = '$calle', `puerta` = '$puerta', `referencia` = '$referencia', `localidad` = '$localidad', `departamento` = '$departamento', `calle_residencia` = '$calle_residencia', `puerta_residencia` = '$puerta_residencia', `referencia_residencia` = '$referencia_residencia', `localidad_residencia` = '$localidad_residencia', `cod_postal_residencia` = '$cod_postal' , `cod_postal` = '$cod_postal', `telefono` = '$telefono' , `fecha_nac` = '$fecha_nac' , `telefono_residencia` = '$telefono_residencia', `fecha_estado` = '$fecha_estado', `observaciones` = '$observaciones' , `estado` = '$estado' , `sexo` = '$sexo' ,  `celular_residencia` = '$celular_residencia' , `provincia` = '$provincia' WHERE `cod_paciente` = $cod_paciente";

 $wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);





if (($documento_nuevo != "") and ($documento != "")){
 echo $sql = "UPDATE `pacientes` SET `documento` = '$documento_nuevo' WHERE `cod_paciente` = $cod_paciente";
mysql_query($sql);

 $sql = "UPDATE `paciente_diagnostico` SET `documento` = '$documento_nuevo' WHERE `documento` = $documento";
mysql_query($sql);

echo  $sql = "UPDATE `prestaciones_pacientes` SET `documento` = '$documento_nuevo' WHERE `documento` = $documento ";
mysql_query($sql);

 $sql = "UPDATE `receta` SET `nro_paciente` = '$documento_nuevo' WHERE `nro_paciente` = $documento ";
mysql_query($sql);

 $sql = "UPDATE `tr_ventas_encabezado` SET `documento` = '$documento_nuevo' WHERE `documento` = $documento ";
mysql_query($sql);

 $sql = "UPDATE `compras_encabezado` SET `documento` = '$documento_nuevo' WHERE `documento` = $documento ";
mysql_query($sql);

 $sql = "UPDATE afiliaciones SET `documento` = '$documento_nuevo' WHERE `documento` = $documento ";
mysql_query($sql);

}

$leyenda = "LOS DATOS HAN SIDO GUARDADOS EN EL SISTEMA";
include ("../../../alertas/campo_informacion.php");

if ($tipo == "modificar"){
$nro_os=$_POST["nro_os"];
$nro_afiliado=$_POST["nro_afiliado"];
$otros=$_POST["otros"];
$sigla=$_POST["sigla"];


 $palabra = $cod_paciente;
$bander = 1;

include ("buscar_paciente.php");	
}
else
	{
//include ("../a_pacientes/entrada_afiliaciones.php");	
$palabra = $cod_paciente;

 $bander = 1;
include ("buscar_paciente.php");	
	}

}
?>


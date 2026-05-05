
<?php  
include ("../../../conexiones/config_usu.php");

$documento=$_POST["mod"]; 
$operador=$_POST["operador"]; 

$documento=$_POST["documento"];
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

$provinci=$_POST["provincia"];
for ($i=0;$i<count($provinci);$i++)    
{     
$provincia = $provinci[$i];    
}

if ($provincia == ""){
$provincia = "MENDOZA";
}


if ($tipo_doc == ""){
$tipo_doc = $tipo_do;
}

$apellido=$_POST["apellido"];
$nombre=$_POST["nombre"];
$estad=$_POST["estado"];
for ($i=0;$i<count($estad);$i++)    
{     
$estado= $estad[$i];   
}
if ($estado == ""){
$estado = $esta;
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
$departamento = $departamen;
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
$fecha_nac=$anio.$mes.$dia;

$lugar_nac=$_POST["lugar_nac"];


$sex=$_POST["sexo"];
	for ($i=0;$i<count($sex);$i++)    
	{     
	$sexo = $sex[$i];    
	}

if ($sexo == ""){
$sexo = $sexos;
}



$estado_civi=$_POST["estado_civil"];
for ($i=0;$i<count($estado_civi);$i++)    
{     
$estado_civil= $estado_civi[$i];    
}

if ($estado_civil == ""){
$estado_civil = $esta_ci;
}

$hoy = date("Y-m-d");

$sql = "INSERT INTO `pacientes` ( `apellido` , `nombre` , `fecha_nac` , `lugar_nac` , `estado_civil` , `sexo` , `tipo_doc` , `documento` , `calle` , `puerta` , `referencia` , `localidad` , `departamento` , `cod_postal` , `telefono` , `calle_residencia` , `puerta_residencia` , `referencia_residencia` , `localidad_residencia` , `cod_postal_residencia` , `telefono_residencia` , `estado` , `fecha_estado` , `observaciones` , `fecha_ingreso` , `cod_paciente` , `celular_residencia` , `provincia`) VALUES ( '$apellido' , '$nombre' , '$fecha_nac' , '$lugar_nac' , '$estado_civil' , '$sexo' , '$tipo_doc' , '$documento' , '$calle' , '$puerta' , '$referencia' , '$localidad' ,'$departamento', '$cod_postal' , '$telefono' , '$calle_residencia' , '$puerta_residencia' , '$referencia_residencia' , '$localidad_residencia' , '$cod_postal_residencia' , '$telefono_residencia' , '$estado' , '$fecha_estado' , '$observaciones' , '$hoy' , '' , '$celular_residencia' , '$provincia' )";
mysql_query($sql);


/*require_once("../../../nusoap/lib/nusoap.php");
$sql = "INSERT INTO `pacientes` ( `apellido` , `nombre` , `fecha_nac` , `lugar_nac` , `estado_civil` , `sexo` , `tipo_doc` , `documento` , `calle` , `puerta` , `referencia` , `localidad` , `departamento` , `cod_postal` , `telefono` , `calle_residencia` , `puerta_residencia` , `referencia_residencia` , `localidad_residencia` , `cod_postal_residencia` , `telefono_residencia` , `estado` , `fecha_estado` , `observaciones` , `fecha_ingreso` , `cod_paciente` , `celular_residencia` , `provincia`) VALUES ( '$apellido' , '$nombre' , '$fecha_nac' , '$lugar_nac' , '$estado_civil' , '$sexo' , '$tipo_doc' , '$documento' , '$calle' , '$puerta' , '$referencia' , '$localidad' ,'$departamento', '$cod_postal' , '$telefono' , '$calle_residencia' , '$puerta_residencia' , '$referencia_residencia' , '$localidad_residencia' , '$cod_postal_residencia' , '$telefono_residencia' , '$estado' , '$fecha_estado' , '$observaciones' , '$hoy' , '' , '$celular_residencia' , '$provincia' )";

 $wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql); 
$response= $client->call('pacientes', $param1);
*/




 $idgenerado = mysql_insert_id();

$otros=$_POST["otros"];

$nro_o=$_POST["obrasocial"];
for ($i=0;$i<count($nro_o);$i++)    
{     
$nro_os= $nro_o[$i];    
}


$sql="select * from obrasocial where nro_os = $nro_os";
$result = $db->Execute($sql);

$sigla=$result->fields["nombre_os"];

$nro_afiliado=$_POST["nro_afiliado"];
$dia=$_POST["dia_a"];
$mes=$_POST["mes_a"];
$anio=$_POST["anio_a"];
$fecha=$anio."-".$mes."-".$dia;

if ($fecha == "--"){
$fecha = date("Y-m-d");
}

 

$sql = "INSERT INTO  afiliaciones (`tipo_doc`, `documento`, `nro_os`, `nombre_os`, `nro_afiliado`, `otros`, `cod_paciente`, `fecha`, `cod_operacion`) VALUES ('$tipo_doc', '$documento', '$nro_os', '$sigla', '$nro_afiliado', '$otros', '$idgenerado', '$fecha', '')";
mysql_query($sql);



$leyenda = "LOS DATOS HAN SIDO GUARDADOS EN EL SISTEMA";
include ("../../../alertas/campo_informacion.php");

	
$palabra = $documento;

 $bander = 1;
 $id = $operador;
//include ("../../facturacion/buscar_paciente_general_facturacion1.php");	


}
?>


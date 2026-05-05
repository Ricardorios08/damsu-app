<?php  
include ("../../../conexiones/config_usu.php");




$operador=$_POST["operador"];

$documento=$_POST["documento"];
 $cod_paciente=$_POST["cod_paciente"];

if ($documento == ""){
		$leyenda = "Usted no ingreso Documento";
include ("../../../alertas/campo_vacio.php");
}
else
{

$sql="select * from pacientes where documento like '$documento'";
$result1 = $db->Execute($sql);

$docu=$result1->fields["documento"];


if ($docu != $documento) {

		$leyenda = "No existe Paciente con ese Documento o no esta cargado en la base de datos. Por favor complete los datos en el sector de altas de Pacientes.";
include ("../../../alertas/campo_vacio.php");
}
	else
	{

$cod_diagnostico=$_POST[""];

$cod_diagnostic=$_POST["cod_diagnostico"];

for ($i=0;$i<count($cod_diagnostic);$i++)    
{     
$cod_diagnostico = $cod_diagnostic[$i];    
}

if (($cod_diagnostico == "") OR ($cod_diagnostico == "ninguna")) {
		$leyenda = "DEBE INGRESAR UN TUMOR";
include ("../../../alertas/campo_vacio.php");
exit;
}



$tipo_docs=$_POST["tipo_doc"];
for ($i=0;$i<count($tipo_docs);$i++)    
{     
$tipo_doc = $tipo_docs[$i];    
}

$tipo_doc;

$dia=$_REQUEST["dia"];
$mes=$_REQUEST["mes"];
$anio=$_REQUEST["anio"];
 $fecha_diagnostico=$anio."-".$mes."-".$dia;


IF ($fecha_diagnostico == ""){
$fecha_diagnostico = date("Y-m-d");
}


$fuent=$_POST["fuente"];

for ($i=0;$i<count($fuent);$i++)    
{     
$cod_fuente = $fuent[$i];    
}

$program=$_POST["programa"];

for ($i=0;$i<count($program);$i++)    
{     
$programa = $program[$i];    
}

$localizacion=$_POST["localizacion"];
$primario=$_POST["primario"];
$estadio=$_POST["estadio"];

$bas=$_POST["base"];

for ($i=0;$i<count($bas);$i++)    
{     
$base = $bas[$i];    
}



$matricula=$_POST["matricula"];
$observaciones=$_POST["observaciones"];

if ($tipo_doc == ""){

$sql="select * from pacientes where cod_paciente =  '$cod_paciente'";
$result1 = $db->Execute($sql);

$tipo_doc=$result1->fields["tipo_doc"];
}


  $sql = "INSERT INTO `paciente_diagnostico` ( `nro_ficha` ,  `tipo_doc` , `documento` , `cod_diagnostico` , `fecha_diagnostico` , `localizacion` , `base` , `primario_multiple` , `estadio` , `cod_fuente` , `matricula` , `observaciones` , `programa` )  VALUES ( '' , '$tipo_doc' , '$documento' , '$cod_diagnostico' , '$fecha_diagnostico',  '$localizacion' ,  '$base',  '$primario' ,  '$estadio' , '$cod_fuente' , '$matricula' , '$observaciones' , '$programa')";
mysql_query($sql);



$palabra = $documento;

 $bander = 1;

 $id = $operador;
include ("buscar_paciente_general.php");	

	}}
?>